﻿<?php

// Search4 für Eingabe und Kategorien

// Search3 nur für Eingabe ohne Kategorien

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


<<<<<<< HEAD

//////////    ABFRAGEN       ///////////	
=======
<<<<<<< HEAD

//////////    ABFRAGEN       ///////////	
=======
//////////    ABFRAGEN       ///////////	
	
<<<<<<< HEAD
<<<<<<< HEAD
// <<<<<<< HEAD
=======
>>>>>>> parent of 9cdae5c... << auskommentiert
// $sql2 - NUR CHECKBOXEN ///
=======
>>>>>>> 67ac163c6fc5018f86399ea74e5245addb07044e
	
>>>>>>> 564f9f5f817b1fdd68e46ee9fc4b2777169e6009
	
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



// sqlSearch1() wählt Namen der Kategorien für die Checkboxen --> search.php

	function sqlSearch1() {
		$sql  = "SELECT id, name FROM `kategorie` ";
		$sql .= "ORDER BY name ASC;";
		return $sql;
	}
<<<<<<< HEAD

	// $sql2 

	function sqlSearch2() {
	
		$tbli = "institut";
		$tblm = "mitarbeiter";
		$tbls = "spezifikation";
		$tblk = "kategorie";
		$tblr = "rs_spez";
 	 
	 	foreach($_POST as $name => $wert) {
  			// Nur Formularelemente, welche mit 'cB' beginnen, wegen Submit/senden
  			if (substr($name,0,2) == "cB") {
   				$check .= "'".$wert."'".",";
	 
				 // Überprüfen, ob Eintrag in gewählter Kategorie
				$sql = "SELECT ".$tbli.".name AS institutsname, ".$tblm.".name AS nachname,";

		
				$checkboxStr = "";

	
				if(!empty($_POST['checkbox'])) {
				$count = count($_POST['checkbox']);
				$i = 0;
				$eingabe = trim(@$_GET['eingabe']);


				// Überprüfen, ob Eintrag in gewählter Kategorie
			
				$sql = "SELECT DISTINCT ".$tbli.".name AS institutsname, ".$tblm.".name AS nachname,";
				$sql .= " ".$tbls.".spezname AS spezifikationsname,";
				$sql .= " ".$tblk.".name AS kategorienname,";
				$sql .= " ".$tblm.".vorname AS vorname, ".$tblm.".mailadresse AS mail";
				$sql .= " FROM ".$tblm.", ".$tblk.", ".$tbli.", ".$tbls.", ".$tblr." ";
				$sql .= " WHERE ".$tblm.".ID = ANY(SELECT fs_maID FROM ".$tblr." ";
				$sql .= " WHERE fs_spezID = ANY(SELECT ID FROM ".$tbls." ";
				$sql .= " WHERE kategorienID = ";
				$sql .= " (SELECT ID FROM ".$tblk." WHERE name IN(".$check.")))) ";
				}
			} 
		}
		return $sql;
	}
	
=======
	
<<<<<<< HEAD
	// $sql2 

	function sqlSearch2() {
	
		$tbli = "institut";
		$tblm = "mitarbeiter";
		$tbls = "spezifikation";
		$tblk = "kategorie";
		$tblr = "rs_spez";
 	 
	 	foreach($_POST as $name => $wert) {
  			// Nur Formularelemente, welche mit 'cB' beginnen, wegen Submit/senden
  			if (substr($name,0,2) == "cB") {
   				$check .= "'".$wert."'".",";
	 
				 // Überprüfen, ob Eintrag in gewählter Kategorie
				$sql = "SELECT ".$tbli.".name AS institutsname, ".$tblm.".name AS nachname,";
=======
	
// $sql2 
<<<<<<< HEAD
// >>>>>>> FETCH_HEAD
=======
// $sql2 - NUR CHECKBOXEN ///
>>>>>>> parent of ab32ee4... Merge branch 'master' of https://github.com/Icepick/php_fachkompetenzen
=======
>>>>>>> FETCH_HEAD
>>>>>>> parent of 9cdae5c... << auskommentiert
	function sqlSearch2() {
	
	$tbli = "institut";
	$tblm = "mitarbeiter";
	$tbls = "spezifikation";
	$tblk = "kategorie";
<<<<<<< HEAD
<<<<<<< HEAD
// <<<<<<< HEAD
=======
>>>>>>> parent of ab32ee4... Merge branch 'master' of https://github.com/Icepick/php_fachkompetenzen
=======
>>>>>>> parent of 9cdae5c... << auskommentiert
	$tblr = "rs_spez";
 	 foreach($_POST as $name => $wert) {
  // Nur Formularelemente, welche mit 'cB' beginnen, wegen Submit/senden
  if (substr($name,0,2) == "cB") {
   $check .= "'".$wert."'".",";
	 
	 // Überprüfen, ob Eintrag in gewählter Kategorie
	$sql = "SELECT ".$tbli.".name AS institutsname, ".$tblm.".name AS nachname,";
<<<<<<< HEAD
<<<<<<< HEAD
// =======
=======
=======
>>>>>>> parent of 9cdae5c... << auskommentiert
>>>>>>> 564f9f5f817b1fdd68e46ee9fc4b2777169e6009
		
				$checkboxStr = "";
>>>>>>> 67ac163c6fc5018f86399ea74e5245addb07044e

	function sqlSearch3() {
	
<<<<<<< HEAD
=======
				if(!empty($_POST['checkbox'])) {
				$count = count($_POST['checkbox']);
				$i = 0;
				$eingabe = trim(@$_GET['eingabe']);


				// Überprüfen, ob Eintrag in gewählter Kategorie
			
				$sql = "SELECT DISTINCT ".$tbli.".name AS institutsname, ".$tblm.".name AS nachname,";
				$sql .= " ".$tbls.".spezname AS spezifikationsname,";
				$sql .= " ".$tblk.".name AS kategorienname,";
				$sql .= " ".$tblm.".vorname AS vorname, ".$tblm.".mailadresse AS mail";
				$sql .= " FROM ".$tblm.", ".$tblk.", ".$tbli.", ".$tbls.", ".$tblr." ";
				$sql .= " WHERE ".$tblm.".ID = ANY(SELECT fs_maID FROM ".$tblr." ";
				$sql .= " WHERE fs_spezID = ANY(SELECT ID FROM ".$tbls." ";
				$sql .= " WHERE kategorienID = ";
				$sql .= " (SELECT ID FROM ".$tblk." WHERE name IN(".$check.")))) ";
				}
			} 
		}
		return $sql;
	}
	

	function sqlSearch3() {
	
>>>>>>> 67ac163c6fc5018f86399ea74e5245addb07044e
	$eingabe = trim(@$_GET['eingabe']);

	
	$tbli = "institut";
	$tblm = "mitarbeiter";
	$tbls = "spezifikation";
	$tblk = "kategorie";
	$tblr = "rs_spez";

<<<<<<< HEAD
	$sql = "SELECT ".$tbli.".name AS institutsname, ".$tblm.".name AS nachname,";
=======
 // Überprüfen, ob Eintrag in gewählter Kategorie

	$sql = "SELECT DISTINCT ".$tbli.".name AS institutsname, ".$tblm.".name AS nachname,";
<<<<<<< HEAD
// >>>>>>> FETCH_HEAD
=======
>>>>>>> parent of ab32ee4... Merge branch 'master' of https://github.com/Icepick/php_fachkompetenzen
=======
>>>>>>> FETCH_HEAD
>>>>>>> parent of 9cdae5c... << auskommentiert
>>>>>>> 564f9f5f817b1fdd68e46ee9fc4b2777169e6009
	$sql .= " ".$tbls.".spezname AS spezifikationsname,";
	$sql .= " ".$tblk.".name AS kategorienname,";
	$sql .= " ".$tblm.".vorname AS vorname, ".$tblm.".mailadresse AS mail";
	$sql .= " FROM ".$tblm.", ".$tblk.", ".$tbli.", ".$tbls.", ".$tblr." ";
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 67ac163c6fc5018f86399ea74e5245addb07044e
	$sql .= " WHERE ".$tblk.".ID = ".$tblr.".fs_spezID ";
	$sql .= " AND ".$tblr.".fs_spezID = ".$tblr.".fs_maID";
	$sql .= " AND ".$tblr.".fs_maID = ".$tblm.".ID ";
	$sql .= " AND ".$tblm.".name LIKE ('%.$eingabe.%') "; 
	$sql .= " OR ".$tblm.".vorname LIKE ('%.$eingabe.%') "; 	
<<<<<<< HEAD
=======
	
	return $sql;
	}


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
>>>>>>> 67ac163c6fc5018f86399ea74e5245addb07044e
	
=======
	$sql .= " WHERE ".$tblm.".ID = ANY(SELECT fs_maID FROM ".$tblr." ";
	$sql .= " WHERE fs_spezID = ANY(SELECT ID FROM ".$tbls." ";
	$sql .= " WHERE kategorienID = ";
	$sql .= " (SELECT ID FROM ".$tblk." WHERE name IN(".$check.")))) ";
} }
	return $sql;
<<<<<<< HEAD
	}


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

	$sql .= " WHERE ".$tblm.".ID = ANY(SELECT fs_maID FROM ".$tblr." ";
	$sql .= " WHERE fs_spezID = ANY(SELECT ID FROM ".$tbls." ";
	$sql .= " WHERE kategorienID = ";
	$sql .= " (SELECT ID FROM ".$tblk." WHERE name IN(".$check.")))) ";
	 }
	return $sql;
}

=======
}


// sqlSearch1() wählt Namen der Kategorien für die Checkboxen --> search.php
>>>>>>> 67ac163c6fc5018f86399ea74e5245addb07044e

	
	
<<<<<<< HEAD
=======
// Search3 nur für Eingabe ohne Kategorien

	function sqlSearch3() {
	
	$eingabe = trim(@$_GET['eingabe']);

	
>>>>>>> 564f9f5f817b1fdd68e46ee9fc4b2777169e6009
	$tbli = "institut";
	$tblm = "mitarbeiter";
	$tbls = "spezifikation";
	$tblk = "kategorie";
	$tblr = "rs_spez";
<<<<<<< HEAD

=======
>>>>>>> 67ac163c6fc5018f86399ea74e5245addb07044e

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

<<<<<<< HEAD
=======
	
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

>>>>>>> 564f9f5f817b1fdd68e46ee9fc4b2777169e6009
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
<<<<<<< HEAD
=======

	
>>>>>>> 564f9f5f817b1fdd68e46ee9fc4b2777169e6009

>>>>>>> 67ac163c6fc5018f86399ea74e5245addb07044e
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
	
// Profil:
	function sqlProfil5() {
	
	}
<<<<<<< HEAD
=======
<<<<<<< HEAD

=======
	
>>>>>>> 564f9f5f817b1fdd68e46ee9fc4b2777169e6009
>>>>>>> 67ac163c6fc5018f86399ea74e5245addb07044e

?>