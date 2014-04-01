<?php
	require_once("verbindung.php");
	
	if(isset($_GET['start']))
	{
		$start = $_GET['start'];
	}
	else
	{
		$start = 0;
	}
	$zeilen = 4;
 
	//$sql = "SELECT * FROM ".$tbl." ORDER BY name ASC LIMIT ".$start.", ".$zeilen.";"; // ASC beginnt mit 1. Item, DESC mit letztem
	$sql = "SELECT * FROM ".$tbl.", ".$tblf;
	$sql .= " WHERE ".$tbl.".energie = ".$tblf.".id";
	$sql .= " ORDER BY ".$tbl.".name ASC LIMIT ".$start.", ".$zeilen;
	
	$sql2 = "SELECT * FROM ".$tbl.", ".$tblf;
	$sql2 .= " WHERE ".$tbl.".energie = ".$tblf.".id ";
	
	$query = mysqli_query($verb, $sql) or die("Fehler: ".mysqli_error($verb));
	$query2 = mysqli_query($verb, $sql2) or die("Fehler: ".mysqli_error($verb));
	
	$row = mysqli_fetch_assoc($query);
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

<div id="loader" style="background-color: black; opacity: 0.65; z-index:19999; position: fixed; bottom: 0px; left: 0px; text-align: center; vertical-align: middle; display: none; width: 100%; height: 20px"><!--###loader### begin --><img src="fileadmin/templates/images/ajax-loader.gif"><!--###loader### end --></div>

<div id="main">
	<div id="layout">
    <!-- start Header -->
    	<div id="header">HEADER
			<div id="logo">
				<a target="_blank" href="http://www.htwchur.ch"><img src="/images/logo.png" width="382" height="69" border="0" alt="Home"></a>
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
		
			<div id="content_left">CONTENT LEFT</div>
			<div id="content_center"> 
  
				<div id="content_center_top">
					<h1>Herzlich Willkommen zu Forschungskompetenzen</h>
                    
                    <table width="600" class="contenttable"><tbody><tr>
                          <td rowspan="1"><strong>Name / Vorname</strong></td><br>
						  <td rowspan="1"><strong>Kategorie</strong></td>						  <td rowspan="1"><strong>Spezifikation</strong></td>
                          <td rowspan="1"><strong>Institut</strong></td
                          ><td rowspan="1"><strong>Kontakt</strong></td
                          
                          ></tr>         
                          <tr><td rowspan="1"></td>
                          <td rowspan="1">test</td><td></td></tr><tr>
                          <td rowspan="1">test</td>
                          <td rowspan="1">test</td>
                          <td rowspan="1">test</td>
                          <td rowspan="1">test</td>
                          <td rowspan="1">test</td></tr><tr>
                          <td rowspan="1"><p class="bodytext">Integrierte Natels zu Swisscom-Fixnet </p><p>und nicht integrierten Swisscom-Natels</p></td><td rowspan="1">SFr. 0.40</td><td><p class="bodytext"> pro Gespräch</p><p> und Stunde</p></td></tr><tr><td rowspan="1">Integrierte Natels zu Fixnet &amp; Mobile (CH) anderer Anbieter</td><td rowspan="1">SFr. 0.34</td><td>pro Minute</td></tr><tr><td rowspan="1">SMS</td><td rowspan="1">SFr. 0.10 </td><td>pro Stück</td></tr><tr><td rowspan="1">&nbsp;</td><td rowspan="1"></td><td rowspan="1"></td></tr><tr><td rowspan="1"><em>Optional:</em></td><td rowspan="1"></td><td rowspan="1"></td></tr><tr><td rowspan="1">Data Option Business Start 500MB</td><td rowspan="1"><p class="bodytext">SFr. 9.00</p><p>SFr. 0.10</p></td><td rowspan="1"><p class="bodytext">pro Monat</p><p>für jedes weitere MB</p></td></tr><tr><td rowspan="1">Data Option Cap (10GB)<em> <br></em></td><td rowspan="1">SFr. 20.00</td><td rowspan="1"><p class="bodytext">pro Monat</p></td></tr></tbody></table>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
				</div>
                
				CONTENT CENTER
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
