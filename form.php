<?php

// Verbindung
require_once("verbindung.php");

// Variablen
$eingabe = trim(@$_GET['eingabe']);

if(isset($_GET['start'])) {
		$start = $_GET['start']; }
	else { 
		$start = 0; }
		
	$zeilen = 4;
	
	
///////////// ABFRAGEN ////////////////////
 
//$sql = Auswahl für Liste aller Mitarbeiter mit Namen, Komp, Spez, Mail
$sql = "SELECT DISTINCT ".$tblm.".name AS mitarbeitername, ".$tblm.".vorname AS mitarbeitervorname, ".$tblm.".mailadresse AS mitarbeitermail, ".$tblk.".name AS kategorienname, ".$tbls.".spezifikation AS spezifikationenname, ".$tbli.".name AS institutsname FROM ".$tblm." INNER JOIN ".$tbls." ON ".$tblm.".ID = ".$tbls.".mitarbeiterID INNER JOIN ".$tblk." ON ".$tbls.".kategorienID = ".$tblk.".id INNER JOIN ".$tbli." ON ".$tblm.".institutsID = ".$tbli.".id";
$sql .= " ORDER BY ".$tblm.".name ";
	
//$sql2 = wählt das Institut

 $sql2 = "SELECT name FROM ".$tblk."";
	
// $sql3 wählt den Kategorienamen aus
$sql3 = "SELECT DISTINCT ".$tblk.".name FROM ".$tblk.", ".$tblm.", ".$tbls." ";
$sql3 .= "WHERE ".$tblk.".id = (SELECT kategorienID FROM ".$tbls." ";
$sql3 .= "WHERE ".$tbls.".mitarbeiterID = ".$tblm.".id)"; 
	
// sql4 wählt die möglichen Suchparameter aus, vorläufig nur vom Nachnamen
$sql4 = "SELECT vorname, name FROM ".$tblm." WHERE name LIKE '%".$eingabe."%'";
	
////////////////////////////////////	
	
	
// Abfrage an Datenbank schicken	
$query = mysqli_query($verb, $sql) or die("Fehler: ".mysqli_error($verb));
$query2 = mysqli_query($verb, $sql2) or die("Fehler: ".mysqli_error($verb));
$query3 = mysqli_query($verb, $sql3) or die("Fehler: ".mysqli_error($verb));
	
// Ergebnisse als Array mit dem Namen $row empfangen	
// $row = mysqli_fetch_assoc($query);
// $kategorie = mysqli_fetch_assoc($query3);

$result_query=mysqli_query($verb, $sql4);
$result_sql2=mysqli_query($verb, $sql2);

	
// Verbindungsprobleme anzeigen
echo mysqli_error($verb);
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Forschungskompetenzen</title>

<link rel="stylesheet" type="text/css" href="css/styles.css" media="all">
<link rel="stylesheet" type="text/css" href="css/font.css" media="all">
<link rel="stylesheet" type="text/css" href="css/menu.css" media="all">
<link rel="stylesheet" type="text/css" href="css/event.css" media="all">
<link rel="stylesheet" type="text/css" href="css/footer.css" media="all">
</head>

<body>

<!--###loader### begin -->
<div id="loader" style="background-color: black; opacity: 0.65; z-index:19999; position: fixed; bottom: 0px; left: 0px; text-align: center; vertical-align: middle; display: none; width: 100%; height: 20px">
<img src="images/ajax-loader.gif">
<!--###loader### end --></div>

<div id="main">
	<div id="layout">
    
<!-- start Header -->
    	<div id="header">&nbsp;
			<div id="logo">
				<a target="_blank" href="http://www.htwchur.ch"><img src="images/htw_chur_rgb.jpg" width="100%" border="0" alt="Home"></a>
			</div>
            <div id="header_content">
                <div id="search_button_top" onclick="var searchbox = document.getElementById('search_box'); if(searchbox.style.display == 'inline') { <br>
    searchbox.style.display = 'none'; } else { searchbox.style.display = 'inline'; }">
    			</div>
     		
            </div>
            
		</div>
    <!-- end Header -->
    
<div id="navigation_top">&nbsp;</div>
<div id="content">
		
<div id="content_left">

<!---------- MENU ----------------->
<ul class="menu">
<li><a href="home.php">Home</a></li>
<li><a id="aktiv" href="search_go.php">Suche</a></li>
<li><a href="profil.php">Mein Profil</a></li>
<li><a href="logout.php">Logout</a></li>
</ul>
<!---------------------->

</div>

			<div id="content_center"> 
  
				<div id="content_center_top">
                
					<h1>Kompetenzen suchen</h1>
 
<table id="profiltable" width="600" class="contenttable">

	<? foreach ($result_sql2 as $kategorienliste) : ?>
<tr>
    <td><input type="checkbox" name="<? echo $kategorienliste['name']; ?>" value="<? echo $kategorienliste['name']; ?>">    &nbsp;<? echo $kategorienliste['name']; ?>
</td>
</tr>

<? endforeach; ?>             
         
      </table> 
  
  <h2>Suche verfeinern</h2>
  
<form  method="post" action="processing.php"  id="searchform"> 
    <input  type="text" name="eingabe"> 
    <input  type="submit" name="submit" value="Eingeben"> 
</form>    

<table>
   
	<? foreach ($query as $row) : ?>
   <? foreach ($query3 as $kategorie) : ?>
<tr>
<td rowspan="1"> 
		<? echo $row['mitarbeitervorname']; ?> <? echo $row['mitarbeitername']; ?>
</td>
<td rowspan="1"> 
		<? echo $row['kategorienname']; ?>
</td>
<td rowspan="1"> 
		<? echo $row['spezifikationenname']; ?>
</td>
<td rowspan="1"> 
		<? echo $row['institutsname']; ?>
</td>
<td rowspan="1"> 
		<? echo $row['mitarbeitermail']; ?>
</td>
</tr>
<? endforeach; ?>
<? endforeach; ?>             
           
      </table> 
      

      		</div>
		
    </div>
</div>
</div>
</div>
</body>
</html>
<?php
mysqli_free_result($query);

?>