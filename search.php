
<?php
//1) Verbindung zu MySQL öffnen
$verb = openMySqlConnection();
?>

<?php 

$checkboxStr = "";

// Suchabfrage für Checkboxen /////

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
    
?>
    
<table width="" class="contenttable">

<tr>
    <td rowspan="1"><strong>Name / Vorname</strong></td>
    <td rowspan="1"><strong>Kategorie</strong></td>		 		
    <td rowspan="1"><strong>Spezifikation</strong></td>
    <td rowspan="1"><strong>Institut</strong></td>
    <td rowspan="1"><strong>Kontakt</strong></td>
</tr>
<?php 
			//2) SQL Abfrage ausführen
		$result = executeSqlQuery($verb, sqlSearch2());
		while ($resultat = mysqli_fetch_array($result)) { 
?>
<tr>
<td rowspan="1"> 
		<?php echo $resultat['vorname']; ?>&nbsp<? echo $resultat['nachname']; ?>

</td>
<td rowspan="1"> 
<?php 
	 //2) SQL Abfrage ausführen
	 $result2 = executeSqlQuery($verb, sqlSearch2());
	 while ($kategorienausgabe = mysqli_fetch_array($result2)){ 
	 echo $kategorienausgabe['kategorienname'];
	 } ?>
	 </td>
<td rowspan="1"> 
<?php 
	 //2) SQL Abfrage ausführen
	 $result3 = executeSqlQuery($verb, sqlSearch2());
	 while ($spezifikationenausgabe = mysqli_fetch_array($result3)){ 
	 echo $spezifikationenausgabe['spezifikationsname'];
	 } ?>
</td>
<td rowspan="1"> 
		<?php echo $resultat['institutsname']; ?>
</td>
<td rowspan="1"> 
		<?php echo $resultat['mail']; ?>
</td>
</tr>
      </table>  
<?php } } ?>

<?php



//////////////// SUCHE //////////////////

if(strlen($checkboxStr) == 0) { ?> 

<div id="content_center_top"> 
  	                
<h1>Fachkompetenzen suchen</h1>


<div id="komptable"> 

<h2>Kategorie auswählen</h2>

<p color:#d43f3a;".">Bitte wählen Sie eine Kategorie aus.</p><br />


<form  name="form1" method="post" action="<?php echo "index.php?page=" . $page ?>"  id="searchform"> 

<div id="searchtable">
	<?php 
		//2) SQL Abfrage ausführen
		$result = executeSqlQuery($verb, sqlSearch1());
	?>

	<ul>
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
</div>


<div id="suchfunktion">
	<br/>
	<h2>Suche verfeinern</h2>
  
    <input id="tags" class="search" type="text" name="eingabe">
    <input type="submit" name="submit" value="Suche" style="margin-top:10px;"> 

</div>

<div id="suchfunktion">
	<br/>
	<h2>Suchergebnis</h2>
	<h3>DEMO Statische</h3>
  
    <?php
		//DEMO Textsuche --> suche nach CSS
		$begriff = "CSS";
		$r = executeSqlQuery($verb, ultimateTextSearch($begriff));
		while ($te = mysqli_fetch_array($r)) {
			echo "<strong>Suchbegriff " . $begriff . " wurde gefunden in:</strong><br/>";
			echo "<strong>Institut/Person:</strong> " .  $te["institutname"] . " | " . $te["vorname"] . " " . $te["nachname"] . " | " . $te["mailadresse"] . "<br/>";
			echo "<strong>Kategorie/Spezifikation:</strong> " . $te["kategoriename"] . " | " . $te["spezname"] . "<br/>";
			echo "<br/><br/>";
}
	
	?>

</div>

</form>   


</div>

	
<?php
}
	//4) Verbindung zu MySQL schliessen
	closeMySqlConnection($verb);
?>
	
<!-- Autokorrektur -->

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
