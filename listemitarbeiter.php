<?php

// Verbindung
require_once("verbindung.php");
	
// Variablen
include ('abfragen.php');
	
	if(isset($_GET['start'])) {
		$start = $_GET['start']; }
	else { 
		$start = 0; }
		
	$zeilen = 4;
	
	
///////////// ABFRAGEN ////////////////////
 

	
////////////////////////////////////	
	
	
// Abfrage an Datenbank schicken	
	$query = mysqli_query($verb, $sql) or die("Fehler: ".mysqli_error($verb));
	$query2 = mysqli_query($verb, $sql2) or die("Fehler: ".mysqli_error($verb));
	$query3 = mysqli_query($verb, $sql3) or die("Fehler: ".mysqli_error($verb));
	
// Ergebnisse als Array mit dem Namen $row empfangen	
$kategorie = mysqli_fetch_assoc($query3);
	
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
    	<div id="header">HEADER
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
    
		<div id="navigation_top">NAVIGATION</div>
		<div id="content">
		
            <div id="content_left">
            
<!------ MENU ------------->
<ul class="menu">
<li><a href="index.php">Home</a></li>
<li><a href="profil.php">Suche</a></li>
<li><a href="profil.php">Mein Profil</a></li>
<li><a href="logout.php">Logout</a></li>
</ul>
</div>

<div id="content_center"> 
  
<div id="content_center_top">
                
<h1>Alle Mitarbeiter</h1>
                     
    
<table width="600" class="contenttable">

<tr>
    <td rowspan="1"><strong>Name / Vorname</strong></td>
    <td rowspan="1"><strong>Kategorie</strong></td>		 		
    <td rowspan="1"><strong>Spezifikation</strong></td>
    <td rowspan="1"><strong>Institut</strong></td>
    <td rowspan="1"><strong>Kontakt</strong></td>
</tr>
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
			<div id="content_right">CONTENT RIGHT</div>
		
		</div>
		
		<div id="footer_top">
			<div id="footer_top_content">
				<div id="footer_box_1" class="footer_box">
					FOOTER TOP
				</div>
				<div id="footer_box_2" class="footer_box">
					FOOTER TOP
				</div>
				<div id="footer_box_3" class="footer_box">
					FOOTER TOP
				</div>
				<div id="footer_box_4" class="footer_box">
					FOOTER TOP
				</div>
			</div>
		</div>
		<div id="footer_bottom">
			<div id="footer_bottom_content">FOOTER BOTTOM</div>
		</div>
		
    </div>
</div>

</body>
</html>

<?php
mysqli_free_result($sql);
mysqli_free_result($sql2);
mysqli_free_result($sql3);

?>