
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
  	                
<h1>Fachkompetenzen suchen</h1>


<div id="komptable"> 

<form name="form1" method="post" action="<?php echo "index.php?page=" . $page ?>"  id="searchform"> 


<div id="suchfunktion">
	<p color:#d43f3a;".">Bitte wählen Sie eine Kategorie aus und/oder geben Sie einen Suchbegriff ein.</p><br />
  
    <input id="tags" class="search" type="text" name="eingabe" placeholder="Suchen.." />
    <input type="submit" class="search_button" name="submit" value="Suchen" style="margin-top:10px;"  /> 
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
		id="checkbox[<?php $search['name']; ?>]" value="<?php echo $search['name']; ?>"> 
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
		if(isset($eingabe) && !empty($eingabe)) {
			print(ultimateTextSearch($eingabe, $inCheckboxes));
			$result = executeSqlQuery($verb, ultimateTextSearch($eingabe, $inCheckboxes)); //suchergebnis
			echo "<strong>Suchbegriff: " . $eingabe . "</strong><br/><br/>";
			while ($te = mysqli_fetch_array($result)) {
				$result2 = executeSqlQuery($verb, spezByMitarbeiterAndKategorie($te["mitarbeiterID"], $te["kategorieID"]));//alle spezifikationen von kategorie x und mitarbeiter y
				echo "<div style='border: 1px solid #000; padding:10px'>";
				echo "<strong>Person:</strong> " . $te["vorname"] . " " . $te["nachname"] . "<br/>";
				echo "<strong>EMail:</strong> " . $te["mailadresse"] . "<br/>";
				echo "<strong>Insitut:</strong> " . $te["institutname"] . "<br/>";
				echo "<strong>Kategorie:</strong> " . $te["kategoriename"] . "<br/>";
				echo "<strong>Spezifikation:</strong> ";
				
				$i = 0;
				while ($ti = mysqli_fetch_array($result2)) {
					if($i == 0) {
						echo $ti["spezname"];
					} else {
						echo ",  " . $ti["spezname"];
					}
					$i++;
				}
				
								
				echo "</div>";
				echo "<br/><br/>";
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
	
<!-- Autokorrektur -->
<!--
<script src="js/jquery-2.0.3.min.js"></script>
<script src="js/jquery-ui-1.10.3.custom.min.js"></script>
<script>
	$(function() {
		var availableTags = [
			"CSS",
			"HTML",
			"Chinesisch",
			"BASIC",
			"C",
			"C++",
			"Clojure",
			"COBOL",
			"ColdFusion",
			"Erlang",
			"Fortran",
			"Groovy",
			"Haskell",
			"Java",
			"JavaScript",
			"Lisp",
			"Perl",
			"PHP",
			"Python",
			"Ruby",
			"Scala",
			"Scheme" // beim letzten Wert kein Komma mehr!
		];
		$( "#tags" ).autocomplete({
			source: availableTags
		});
	});
	</script> 
-->