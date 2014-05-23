<?php
// Zugreifen auf Verbindung
require_once("verbindung.php");

// Variablen
$eingabe = trim(@$_GET['eingabe']);
$check = '';

$tbli = "institut";
$tblm = "mitarbeiter";
$tbls = "spezifikation";
$tblk = "kategorie";
$tblr = "rs_spez";


//////////    ABFRAGEN       ///////////	
	
// <<<<<<< HEAD
// $sql2 - NUR CHECKBOXEN ///
// =======
	
	
	function ultimateTextSearch($suchbegriff) {
		$sql  = "SELECT s.spezname, k.name AS 'kategoriename', m.vorname, m.name AS 'nachname', m.mailadresse, i.name AS 'institutname' ";
		$sql .= "FROM `spezifikation` s ";
		$sql .= "INNER JOIN `kategorie` k ON s.kategorienId = k.id ";
		$sql .= "INNER JOIN `mitarbeiter` m ON s.mitarbeiterId = m.id ";
		$sql .= "INNER JOIN `institut` i ON m.institutsId = i.Id ";
		$sql .= "WHERE s.spezname LIKE '%". $suchbegriff . "%' ";
		$sql .= "OR m.vorname LIKE '%". $suchbegriff . "%' ";
		$sql .= "OR m.name LIKE '%". $suchbegriff . "%' ";
		$sql .= "OR m.mailadresse LIKE '%". $suchbegriff . "%' ";
		$sql .= "OR k.name LIKE '%". $suchbegriff . "%' ";
		$sql .= "OR i.name LIKE '%". $suchbegriff . "%'; ";
		return $sql;
	
	
		// Zum testen in MySQL, suche nach CSS:
		/*
		SELECT * FROM `spezifikation` s
		INNER JOIN `kategorie` k ON s.kategorienId = k.id
		INNER JOIN `mitarbeiter` m ON s.mitarbeiterId = m.id
		INNER JOIN `institut` i ON m.institutsId = i.Id
		WHERE
		s.spezname LIKE '%CSS%'
		OR m.vorname LIKE '%CSS%'
		OR m.name LIKE '%CSS%'
		OR m.mailadresse LIKE '%CSS%'
		OR k.name LIKE '%CSS%'
		OR i.name LIKE '%CSS%';
		*/
	
	}
	
	
// $sql2 
// >>>>>>> FETCH_HEAD
	function sqlSearch2() {
	
	$tbli = "institut";
	$tblm = "mitarbeiter";
	$tbls = "spezifikation";
	$tblk = "kategorie";
// <<<<<<< HEAD
	$tblr = "rs_spez";
 	 foreach($_POST as $name => $wert) {
  // Nur Formularelemente, welche mit 'cB' beginnen, wegen Submit/senden
  if (substr($name,0,2) == "cB") {
   $check .= "'".$wert."'".",";
	 
	 // Überprüfen, ob Eintrag in gewählter Kategorie
	$sql = "SELECT ".$tbli.".name AS institutsname, ".$tblm.".name AS nachname,";
// =======
		
	$checkboxStr = "";

	
	if(!empty($_POST['checkbox'])) {
	$count = count($_POST['checkbox']);
	$i = 0;
	$eingabe = trim(@$_GET['eingabe']);


 // Überprüfen, ob Eintrag in gewählter Kategorie

	$sql = "SELECT DISTINCT ".$tbli.".name AS institutsname, ".$tblm.".name AS nachname,";
// >>>>>>> FETCH_HEAD
	$sql .= " ".$tbls.".spezname AS spezifikationsname,";
	$sql .= " ".$tblk.".name AS kategorienname,";
	$sql .= " ".$tblm.".vorname AS vorname, ".$tblm.".mailadresse AS mail";
	$sql .= " FROM ".$tblm.", ".$tblk.", ".$tbli.", ".$tbls.", ".$tblr." ";
	$sql .= " WHERE ".$tblm.".ID = ANY(SELECT fs_maID FROM ".$tblr." ";
	$sql .= " WHERE fs_spezID = ANY(SELECT ID FROM ".$tbls." ";
	$sql .= " WHERE kategorienID = ";
	$sql .= " (SELECT ID FROM ".$tblk." WHERE name IN(".$check.")))) ";
} }
	return $sql;
}


// sqlSearch1() wählt Namen der Kategorien für die Checkboxen --> search.php

	function sqlSearch1() {
		$sql  = "SELECT id, name FROM `kategorie` ";
		$sql .= "ORDER BY name ASC;";
		return $sql;
	}
	
	
// Search3 nur für Eingabe ohne Kategorien

	function sqlSearch3() {
	
	$eingabe = trim(@$_GET['eingabe']);

	
	$tbli = "institut";
	$tblm = "mitarbeiter";
	$tbls = "spezifikation";
	$tblk = "kategorie";
	$tblr = "rs_spez";

	$sql = "SELECT ".$tbli.".name AS institutsname, ".$tblm.".name AS nachname,";
	$sql .= " ".$tbls.".spezname AS spezifikationsname,";
	$sql .= " ".$tblk.".name AS kategorienname,";
	$sql .= " ".$tblm.".vorname AS vorname, ".$tblm.".mailadresse AS mail";
	$sql .= " FROM ".$tblm.", ".$tblk.", ".$tbli.", ".$tbls.", ".$tblr." ";
	$sql .= " WHERE ".$tblk.".ID = ".$tblr.".fs_spezID ";
	$sql .= " AND ".$tblr.".fs_spezID = ".$tblr.".fs_maID";
	$sql .= " AND ".$tblr.".fs_maID = ".$tblm.".ID ";
	$sql .= " AND ".$tblm.".name LIKE ('%.$eingabe.%') "; 
	$sql .= " OR ".$tblm.".vorname LIKE ('%.$eingabe.%') "; 	
	
	return $sql;
}

	
// Search4 für Eingabe und Kategorien

	function sqlSearch4() {
	
	$eingabe = trim(@$_GET['eingabe']);
	$checkboxStr = "";
	$count = count($_POST['checkbox']);
	$i = 0;
    foreach($_POST['checkbox'] as $check) {
            $checkboxStr .= $check;
            
            $i++;
            
            if($i < $count)
	            $checkboxStr .= ", ";
	
	$tbli = "institut";
	$tblm = "mitarbeiter";
	$tbls = "spezifikation";
	$tblk = "kategorie";
	$tblr = "rs_spez";

	$sql = "SELECT ".$tbli.".name AS institutsname, ".$tblm.".name AS nachname,";
	$sql .= " ".$tbls.".spezname AS spezifikationsname,";
	$sql .= " ".$tblk.".name AS kategorienname,";
	$sql .= " ".$tblm.".vorname AS vorname, ".$tblm.".mailadresse AS mail";
	$sql .= " FROM ".$tblm.", ".$tblk.", ".$tbli.", ".$tbls.", ".$tblr." ";
	$sql .= " WHERE ".$tblk.".ID = ".$tblr.".fs_spezID ";
	$sql .= " AND ".$tblr.".fs_spezID = ".$tblr.".fs_maID";
	$sql .= " AND ".$tblr.".fs_maID = ".$tblm.".ID ";
	$sql .= " AND ".$tblm.".name IN ('".$eingabe."') "; 
	$sql .= " OR ".$tblm.".vorname IN ('".$eingabe."') "; 
	$sql .= " AND ".$tblk.".name IN ('".$checkboxStr."') ";
	}
	return $sql;
}

	

// Profil: SQL Query für das Auslesen der Kategorienamen
	function sqlProfil1() {
		$sql  = "SELECT id, name FROM `kategorie` ";
		$sql .= "ORDER BY name ASC;";
		return $sql;
	}
	
// Profil: SQL Query für das Auslesen einer einzelnen Kategorie
	function sqlProfil2($id) {
		$sql  = "SELECT id, name FROM `kategorie` ";
		$sql .= "WHERE id = " . $id . ";";
		return $sql;
	}
	
// Profil: SQL Query für das hinzufügen neuer Spezifikationen
	function sqlProfil3($kategorieId, $spezifikation, $mitarbeiterId) {	
		$sql  = "INSERT INTO spezifikation (spezname, kategorienID, mitarbeiterID) ";
		$sql .= "VALUES ('$spezifikation', '$kategorieId', '$mitarbeiterId')";
		return $sql;
	}
	
// Profil: SQL Query für das auslesen von mitarbeiter
	function sqlProfil4($id) {	
		$sql  = "SELECT vorname, m.name MName, mailadresse, link, i.name IName FROM `mitarbeiter` m ";
		$sql .= "INNER JOIN `institut` i ON m.institutsId = i.id ";
		$sql .= "WHERE m.id = " . $id . ";";
		return $sql;
	}
	
// Profil: SQL Query für das auslesen der spezifikationen eines mitarbeiters
	function sqlProfil5($mitarbeiterId) {
		$sql  = "SELECT DISTINCT s.mitarbeiterId, k.id, k.name FROM `spezifikation` s ";
		$sql .= "INNER JOIN `kategorie` k ON s.kategorienID = k.id ";
		$sql .= "WHERE s.mitarbeiterId = " . $mitarbeiterId . " ";
		$sql .= "ORDER BY k.name ASC;";
		return $sql;
	}
	
	// Profil: SQL Query für das auslesen der spezifikationen eines mitarbeiters
	function sqlProfil6($mitarbeiterId, $kategorieId) {
		$sql  = "SELECT s.id, s.spezname, s.mitarbeiterId, k.name FROM `spezifikation` s ";
		$sql .= "INNER JOIN `kategorie` k ON s.kategorienID = k.id ";
		$sql .= "WHERE s.mitarbeiterId = " . $mitarbeiterId . " AND s.kategorienId = " . $kategorieId . " ";
		$sql .= "ORDER BY s.spezname ASC;";
		return $sql;
	}
	
// Profil: SQL Query für das entfernen einer Spezifikation
	function sqlProfil7($spezifikationId) {	
		$sql  = "DELETE FROM spezifikation ";
		$sql .= "WHERE id = " . $spezifikationId . " ;";
		return $sql;
	}
	}

?>