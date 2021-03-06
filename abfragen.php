﻿<?php
// Zugreifen auf Verbindung
require_once("verbindung.php");

// Variablen
$eingabe = trim(@$_GET['eingabe']);
$check = '';

$tbli = "institut";
$tblm = "mitarbeiter";
$tbls = "spezifikation";
$tblk = "kategorie";


//////////    ABFRAGEN       ///////////

// $sql = Auswahl für Gesamtliste: Vorname, Name, Kategorie, 
// Spezifikation, Institut, Kontakt --> nur zum Test

    $sql = "SELECT ".$tblm.".name AS mitarbeitername, ".$tblm.".vorname AS mitarbeitervorname,";
	$sql .= " ".$tblm.".mailadresse AS mitarbeitermail, ".$tblk.".name AS kategorienname, ";
	$sql .= "".$tbls.".spezifikation AS spezifikationsname, ".$tbli.".name AS institutsname";
	$sql .= " FROM ".$tblm.", ".$tblk.", ".$tbli.", ".$tbls." ";
	$sql .= " WHERE ".$tblk.".ID = ANY(SELECT kategorienID ";
	$sql .= " FROM ".$tbls." WHERE mitarbeiterID = ANY(SELECT ID";
	$sql .= " FROM ".$tblm." WHERE institutsID = ".$tbli.".ID)) ";
	$sql .= " ORDER BY ".$tblm.".name ";
	
	function spezByMitarbeiter($mitarbeiter, $groupby) {
		$sql  = "SELECT * FROM `spezifikation` s ";
		$sql .= "INNER JOIN kategorie k ON s.kategorienID = k.ID ";
		$sql .= "WHERE mitarbeiterId = " . $mitarbeiter . " ";
		if ($groupby) {
			$sql .= "GROUP BY s.kategorienID;";
			}
		return $sql;
	}
	
	
	function spezByMitarbeiterAndKategorie($mitarbeiter, $kategorie) {
		$sql  = "SELECT * FROM `spezifikation` s ";
		$sql .= "WHERE kategorienId = " . $kategorie . " ";
		$sql .= "AND mitarbeiterId = " . $mitarbeiter . ";";
		return $sql;
	}
	
	
	function ultimateTextSearch($suchbegriff, $inCheckboxes) {
		$sql  = "SELECT s.spezname, k.ID AS 'kategorieID', k.name AS 'kategoriename', m.link AS 'mitarbeiterlink', m.ID AS 'mitarbeiterID', 
						m.vorname, m.name AS 'nachname', m.mailadresse, i.name AS 'institutname' ";
		$sql .= "FROM `spezifikation` s ";
		$sql .= "INNER JOIN `kategorie` k ON s.kategorienId = k.id ";
		$sql .= "INNER JOIN `mitarbeiter` m ON s.mitarbeiterId = m.id ";
		$sql .= "INNER JOIN `institut` i ON m.institutsId = i.Id ";
		
		//resultat nach checkboxes filtern!
		foreach($inCheckboxes as $key => $value) {
			if($key == 0) {
				$sql .= "WHERE k.name = '" . $value . "' ";
			} else {
				$sql .= "OR k.name = '" . $value . "' ";
			}
			
			//suchbegriff integrieren
			$sql = searchByText(false, $sql, $suchbegriff);
		}	
		
		//suchbegriff integrieren
		if(count($inCheckboxes) == 0) {
			$sql = searchByText(true, $sql, $suchbegriff);
		} else {
			$sql = searchByText(false, $sql, $suchbegriff);
		}
		
		//resultate nur einmal ausgeben
		$sql .= "GROUP BY m.mailadresse ";
		$sql .= ";";
		
		return $sql;
	}
	
	function searchByText($isWhere, $sql, $suchbegriff) {
			//Abfrage sucht nach suchbegriff
			if($isWhere) {
				$sql .= "WHERE (s.spezname LIKE '%". $suchbegriff . "%' ";
			} else {
				$sql .= "AND (s.spezname LIKE '%". $suchbegriff . "%' ";
			}
			$sql .= "OR m.vorname LIKE '%". $suchbegriff . "%' ";
			$sql .= "OR m.name LIKE '%". $suchbegriff . "%' ";
			$sql .= "OR m.mailadresse LIKE '%". $suchbegriff . "%' ";
			$sql .= "OR k.name LIKE '%". $suchbegriff . "%' ";
			$sql .= "OR i.name LIKE '%". $suchbegriff . "%') ";
			return $sql;
	}
	
	
// $sql2 
	function sqlSearch2() {
	
	$tbli = "institut";
	$tblm = "mitarbeiter";
	$tbls = "spezifikation";
	$tblk = "kategorie";
		
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
	$sql .= " FROM ".$tblm.", ".$tblk.", ".$tbli.", ".$tbls." ";
	$sql .= " WHERE ".$tblk.".ID = ".$tbls.".kategorienID ";
	$sql .= " AND ".$tbls.".mitarbeiterID = ".$tblm.".ID";
	$sql .= " AND ".$tblm.".institutsID = ".$tbli.".ID ";

	if(strlen($checkboxStr) > 0)
	$sql .= " AND ".$tblk.".name IN ('".$checkboxStr."') ";
	
	if(strlen($eingabe) > 0)

	$sql .= " AND ".$tblm.".name IN ('".$eingabe."') ";
	
	
	return $sql;

}
}
	
// $sql3 wählt den Kategoriennamen der Suchresultate

//	$sql3 = "SELECT name FROM ".$tblk." ";
//	$sql3 .= "WHERE name LIKE '%".$eingabe."%'";
	

// $sql4 wählt Variablen für das Profil --> profil.php

	$sql4 = "SELECT DISTINCT ".$tblm.".name AS mitarbeitername, ".$tblm.".vorname AS mitarbeitervorname,";
	$sql4 .= " ".$tblm.".mailadresse AS mitarbeitermail, ".$tblk.".name AS kategorienname, ";
	$sql4 .= " ".$tbls.".spezifikation AS spezifikationenname, ".$tbli.".name AS institutsname";
 	$sql4 .= " FROM ".$tblm.", ".$tblk.", ".$tbli.", ".$tbls." ";
	$sql4 .= " WHERE ".$tblk.".ID = ANY(SELECT ID ";
	$sql4 .= " FROM ".$tblk." WHERE mitarbeiterID = ANY(SELECT ID";
	$sql4 .= " FROM ".$tblm." WHERE institutsID = ".$tbli.".ID)) ";
	$sql4 .= " ORDER BY ".$tblm.".name LIMIT 0, 1";


// $sql5 wählt Namen der Kategorien für die Checkboxen --> search.php

	function sqlSearch1() {
		$sql  = "SELECT id, name FROM `kategorie` ";
		$sql .= "ORDER BY name ASC;";
		return $sql;
	}
	
// $sql6 gibt das Suchergebnis aus --> search-results.php


/////// Abfragen an Datenbank schicken //////
//$result_sql = mysqli_query($verb, $sql) or die("Fehler: ".mysqli_error($verb));
// $result_sql2 = mysqli_query($verb, $sql2) or die("Fehler: ".mysqli_error($verb));
// $result_sql3 = mysqli_query($verb, $sql3) or die("Fehler: ".mysqli_error($verb));
//$result_sql4 = mysqli_query($verb, $sql4) or die("Fehler: ".mysqli_error($verb));
// $result_sql5= mysqli_query($verb, $sql5) or die("Fehler: ".mysqli_error($verb));



// Profil: SQL Query für das auslesen der Kategorienamen
	function sqlProfil1() {
		$sql  = "SELECT id, name FROM `kategorie` ";
		$sql .= "ORDER BY name ASC;";
		return $sql;
	}
	
// Profil: SQL Query für das auslesen einer einzelnen Kategorie
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
	

?>