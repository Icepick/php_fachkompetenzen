
<?php
//1) Verbindung zu MySQL öffnen
$verb = openMySqlConnection();
?>

<?php

//Volltextsuche
if(!empty($_POST['eingabe'])) {
	$eingabe = $_POST['eingabe'];
}

//Array für empfangene checkboxes
$inCheckboxes = array();

if(!empty($_POST['checkbox'])) {
	foreach($_POST['checkbox'] as $check) {
		//checkbox in array hinzufügen
		array_push($inCheckboxes, $check);
	}
}


//$checkboxStr = "";

// Suchabfrage für Checkboxen /////
/*
if(!empty($_POST['checkbox'])) {
	echo "Gewählte Kategorien:";
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
 */ 
?>


<?php

//////////////// SUCHE //////////////////

?>

<div id="content_center_top"> 
  	                
<h1>Forschungskompetenzen suchen</h1>


<div id="komptable"> 

<form name="form1" method="post" action="<?php echo "index.php?page=" . $page ?>"  id="searchform"> 


<div id="suchfunktion">

	<body1>Bitte wählen Sie eine oder mehrere Kategorien aus und/oder geben Sie einen Suchbegriff ein.</body1><!--</p><br />-->

    <input id="tags" class="search" type="text" name="eingabe" placeholder="Suchen.." value="<?php if(!empty($eingabe)) { echo $eingabe; } ?>" />
	<input type="submit" class="search_button" name="submit" value="Suchen" /> 

</div>

<div id="searchtable">

	<?php 
		//2) SQL Abfrage ausführen
		$result = executeSqlQuery($verb, sqlSearch1());
	?>

	<ul style="margin-left:-40px">
	<?php while ($search = mysqli_fetch_array($result)) { ?>

	<li>
	<label>
	<input class="checkbox" type="checkbox" name="checkbox[<?php $search['name']; ?>]" 
		id="checkbox[<?php $search['name']; ?>]" value="<?php echo $search['name']; ?>" 
		<?php if (in_array($search['name'], $inCheckboxes)){ echo "checked"; } ?>> 
		&nbsp;<?php echo $search['name']; ?>	
	</label>
	</li>

	<?php } ?>     
	</ul>
	<br/>
</div>

<div id="suchergebnis">
	<br/>
	<h2>Suchergebnis</h2>
  
    <?php
		if(isset($eingabe) && isset($inCheckboxes)) {
			if(!empty($eingabe) || count($inCheckboxes) !== 0) {
				$result = executeSqlQuery($verb, ultimateTextSearch($eingabe, $inCheckboxes)); //suchergebnis				
				//echo "SQL Befehl<br/>" . ultimateTextSearch($eingabe, $inCheckboxes) . "<br/>";
				
				echo "<strong>Gefunden:</strong> " . $result->num_rows . " Einträge&nbsp;&nbsp;&nbsp;";
				echo "<strong>Suchbegriff:</strong> " . $eingabe . "<br/>";
				echo "<strong>Auswahl:</strong> "; foreach($inCheckboxes as $x=>$y) { echo $y . " | "; } echo "<br/><br/>";
				while ($te = mysqli_fetch_array($result)) {
					$result2 = executeSqlQuery($verb, spezByMitarbeiter($te["mitarbeiterID"], false));
					$result3 = executeSqlQuery($verb, spezByMitarbeiter($te["mitarbeiterID"], true));
					echo "<div style='border: 1px solid #000; padding:10px'>";
					echo "<strong>Mitarbeiter:</strong> " . $te["vorname"] . " " . $te["nachname"] . "<br/>";
					echo "<strong>E-Mail:</strong> "; echo "<a href='mailto:" . $te["mailadresse"] . " '> " . $te["mailadresse"]. " </a> <br/>";
					echo "<strong>Insitut:</strong> " . $te["institutname"] . "<br/>";
					echo "<strong>Kategorie:</strong> ";
					
					$j = 0;
					while ($tj = mysqli_fetch_array($result3)) {
						 if($j == 0) {
							echo $tj["name"];
						} else {
							echo ",  " . $tj["name"];
						}
						$j++;
					}
					
					echo "<br/>";
					echo "<strong>Kompetenz:</strong> ";
					
					$i = 0;
					while ($ti = mysqli_fetch_array($result2)) {
						if($i == 0) {
							echo $ti["spezname"];
						} else {
							echo ",  " . $ti["spezname"];
						}
						$i++;
					}
					
					echo "<br/>";
					echo "<a href='" . $te["mitarbeiterlink"] . " '>Link zum HTW-Profil</a> <br/>";

									
					echo "</div>";
					echo "<br/><br/>";
			}
		} else {
			echo "Es wurde keine Suche gestartet!";
		}
}
	
	?>

</div>

</form>   


</div>

	
<?php
	//4) Verbindung zu MySQL schliessen
	closeMySqlConnection($verb);
?>
	
<script src="js/jquery-2.0.3.min.js"></script>
<script src="js/jquery-ui-1.10.3.custom.min.js"></script>
<script>
	$(function() {
		var availableTags = [
			"CSS",
			"HTML",
			"Chinesisch",
			"SQL",
			"PHP",
			"AngularJS",
			"JavaScript",
			"Bootstrap",
			"Java Jersey",
			"Krisenkommunikation",
			"Photoshop",
			"Illustrator",
			"Wireframe",
			"Inszenierung",
			"Sketching",
			"Organisationskommunikation",
			"AJAX",
			"Popkultur",
			"Storyboarding",
			"Medienpsychologie",
			"Medienforschung",
			"Persönlichkeitsrecht",
			"Radioproduktion",
			"Sprechtraining",
			"Interviews",
			"Geschichte der Privatradios",
			"Organisationskommunikation",
			"Scheme" // beim letzten Wert kein Komma mehr!
		];
		$( "#tags" ).autocomplete({
			source: availableTags
		});
	});
	</script> 
