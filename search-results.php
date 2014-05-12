
<div id="content_center_top">
                
<h1>Suchresultate</h1>
                     
<?php
echo "Gewählte Kategorien:";
if(!empty($_POST['checkbox'])) {
    foreach($_POST['checkbox'] as $check) {
            echo "<br />";
            echo $check;
    }
} 
  
// Suchabfrage für Checkboxen /////

 // Durch alle POST Variablen durchgehen
 // Inhalte in Array packen
foreach($_POST as $name => $wert) {
  
// $check .= "'".$wert."'".",";
  

// Letztes Komma weg
// $check = substr($check,0,strlen($check)-1);

 // Überprüfen, ob Eintrag in gewählter Kategorie
 
if (strlen($check) > 0) {
	$sql6 = "SELECT DISTINCT ".$tbli.".name AS institutsname,  ".$tblm.".name AS nachname,";
	$sql6 .= " ".$tbls.".spezifikation AS spezifikationsname,";
	$sql6 .= " ".$tblk.".name AS kategorienname,";
	$sql6 .= " ".$tblm.".vorname AS vorname, ".$tblm.".mailadresse AS mail";
	$sql6 .= " FROM ".$tblm.", ".$tblk.", ".$tbli.", ".$tbls." ";
	$sql6 .= " WHERE ".$tblk.".ID = ".$tbls.".kategorienID ";
	$sql6 .= " AND ".$tbls.".mitarbeiterID = ".$tblm.".ID";
	$sql6 .= " AND ".$tblm.".institutsID = ".$tbli.".ID ";
//	$sql6 .= " AND ".$tblm.".name";
//	$sql6 .= " LIKE '%".$eingabe."%'";
	$sql6 .= " AND ".$tblk.".name IN ('".$check."') ";
	
$result_sql6 = mysqli_query($verb, $sql6) or die("Fehler: ".mysqli_error($verb));
}

if (strlen($check) == 0) {
	$sql6 = "SELECT ".$tbli.".name AS institutsname,  ".$tblm.".name AS nachname,";
	$sql6 .= " ".$tbls.".spezifikation AS spezifikationsname,";
	$sql6 .= " ".$tblk.".name AS kategorienname,";
	$sql6 .= " ".$tblm.".vorname AS vorname, ".$tblm.".mailadresse AS mail";
	$sql6 .= " FROM ".$tblm.", ".$tblk.", ".$tbli.", ".$tbls." ";
	$sql6 .= " WHERE ".$tblk.".ID = ".$tbls.".kategorienID ";
	$sql6 .= " AND ".$tbls.".mitarbeiterID = ".$tblm.".ID";
	$sql6 .= " AND ".$tblm.".institutsID = ".$tbli.".ID ";
//	$sql6 .= " AND ".$tblm.".name";
//	$sql6 .= " LIKE '%".$eingabe."%'";
	
$result_sql6 = mysqli_query($verb, $sql6) or die("Fehler: ".mysqli_error($verb));
}


}
  
  foreach ($result_sql6 as $ergebnis6) : ?>
    

      		<? endforeach; ?>

      
  </div>