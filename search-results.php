
<div id="content_center_top">
                
<h1>Suchresultate</h1>
                     
<?php 


echo "Gewählte Kategorien:";
$checkboxStr = "";

// Suchabfrage für Checkboxen /////

if(!empty($_POST['checkbox'])) {
	$count = count($_POST['checkbox']);
	$i = 0;
    foreach($_POST['checkbox'] as $check) {
            echo "<br />";
            echo $check;
            $checkboxStr .= $check;
            
            $i++;
            
            if($i < $count)
	            $checkboxStr .= ", ";
    }
}
  

 // Überprüfen, ob Eintrag in gewählter Kategorie

	$sql6 = "SELECT DISTINCT ".$tbli.".name AS institutsname, ".$tblm.".name AS nachname,";
	$sql6 .= " ".$tbls.".spezname AS spezifikationsname,";
	$sql6 .= " ".$tblk.".name AS kategorienname,";
	$sql6 .= " ".$tblm.".vorname AS vorname, ".$tblm.".mailadresse AS mail";
	$sql6 .= " FROM ".$tblm.", ".$tblk.", ".$tbli.", ".$tbls." ";
	$sql6 .= " WHERE ".$tblk.".ID = ".$tbls.".kategorienID ";
	$sql6 .= " AND ".$tbls.".mitarbeiterID = ".$tblm.".ID";
	$sql6 .= " AND ".$tblm.".institutsID = ".$tbli.".ID ";

	if(strlen($checkboxStr) > 0)
	$sql6 .= " AND ".$tblk.".name IN ('".$checkboxStr."') ";
	
	if(strlen($eingabe) > 0)
	$sql6 .= " AND ".$tblm.".name IN ('".$eingabe."') ";

$result_sql6 = mysqli_query($verb, $sql6) or die("Fehler: ".mysqli_error($verb));
print_r($result_sql6);
  ?>

      
  </div>