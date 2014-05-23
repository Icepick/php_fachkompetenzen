
<?php
//1) Verbindung zu MySQL öffnen
$verb = openMySqlConnection();
<<<<<<< HEAD
<<<<<<< HEAD
// <<<<<<< HEAD
=======
>>>>>>> parent of ab32ee4... Merge branch 'master' of https://github.com/Icepick/php_fachkompetenzen
=======
>>>>>>> parent of 9cdae5c... << auskommentiert

$eingabe = trim(@$_POST['eingabe']);

///////////// SUCHRESULTATE ///////////////
<<<<<<< HEAD
<<<<<<< HEAD
// =======
=======
=======
>>>>>>> parent of 9cdae5c... << auskommentiert
?>

<?php

//Volltextsuche
if(!empty($_POST['eingabe'])) {
	$eingabe = $_POST['eingabe'];
}


<<<<<<< HEAD
// >>>>>>> FETCH_HEAD
=======
>>>>>>> parent of ab32ee4... Merge branch 'master' of https://github.com/Icepick/php_fachkompetenzen
=======
>>>>>>> FETCH_HEAD
>>>>>>> parent of 9cdae5c... << auskommentiert


////////////////// --1-- Nur Checkboxen, keine Eingabe ///////////////////////

if(!empty($_POST['checkbox'])) { 
	if(strlen($eingabe) == 0) {
	echo "Gewählte Kategorien:";
    foreach($_POST['checkbox'] as $check) {
            echo "<br />";
            echo $check;
<<<<<<< HEAD
<<<<<<< HEAD
// <<<<<<< HEAD
=======
>>>>>>> parent of ab32ee4... Merge branch 'master' of https://github.com/Icepick/php_fachkompetenzen
=======
>>>>>>> parent of 9cdae5c... << auskommentiert
    }  
?>
    
<table class="contenttable" id="resultattabelle">
<<<<<<< HEAD
<<<<<<< HEAD
// =======
=======
=======
>>>>>>> parent of 9cdae5c... << auskommentiert
            $checkboxStr .= $check;
            
            $i++;
            
            if($i < $count)
	            $checkboxStr .= ", ";
    }
    
?>
    
<table width="" class="contenttable">
<<<<<<< HEAD
// >>>>>>> FETCH_HEAD
=======
>>>>>>> parent of ab32ee4... Merge branch 'master' of https://github.com/Icepick/php_fachkompetenzen
=======
>>>>>>> FETCH_HEAD
>>>>>>> parent of 9cdae5c... << auskommentiert

<tr>
    <td><strong>Name / Vorname</strong></td>
    <td><strong>Kategorien</strong></td>		 		
    <td><strong>Spezifikation</strong></td>
    <td><strong>Institut</strong></td>
    <td><strong>Kontakt</strong></td>
</tr>
<tr>
    <td><strong>Nur Checkboxen, keine Eingabe</strong></td>
</tr>
<?php 
	//2) SQL Abfrage ausführen
		$result = executeSqlQuery($verb, sqlSearch2());
		while ($resultat = mysqli_fetch_assoc($result)) { 
?>
<tr>
<td rowspan="1"> 
		<?php echo $resultat['vorname']; ?>&nbsp<? echo $resultat['nachname']; ?>
</td>
<td rowspan="1"> 
<?php 
	 echo $resultat['kategorienname'];
?>
	 </td>
<td rowspan="1"> 
<?php 
	 echo $resultat['spezifikationsname'];
?>
</td>
<td rowspan="1"> 
		<?php echo $resultat['institutsname']; ?>
</td>
<td rowspan="1"> 
		<?php echo $resultat['mail']; ?>
</td>
</tr>
      </table>  

<?php } } }

/////////////////////// --2-- Checkboxen leer, nur Eingabe ////////////////////////

if(empty($_POST['checkbox'])) {
	if(strlen($eingabe) > 0) { ?>
    
<table class="contenttable" id="resultattabelle">

<tr>
    <td><strong>Name / Vorname</strong></td>
    <td><strong>Kategorien</strong></td>		 		
    <td><strong>Spezifikation</strong></td>
    <td><strong>Institut</strong></td>
    <td><strong>Kontakt</strong></td>
</tr>
<tr>
    <td><strong>Nur Eingabe, keine Checkboxen</strong></td>
</tr>
<?php 
	//2) SQL Abfrage ausführen
		$result = executeSqlQuery($verb, sqlSearch3());
		while ($resultat = mysqli_fetch_array($result)) { 
?>
<tr>
<td rowspan="1"> 
		<?php echo $resultat['vorname']; ?>&nbsp<? echo $resultat['nachname']; ?>
</td>
<td rowspan="1"> 
<?php 
	 echo $resultat['kategorienname'];
?>
	 </td>
<td rowspan="1"> 
<?php 
	 echo $resultat['spezifikationsname'];
?>
</td>
<td rowspan="1"> 
		<?php echo $resultat['institutsname']; ?>
</td>
<td rowspan="1"> 
		<?php echo $resultat['mail']; ?>
</td>
</tr>
      </table>  

<?php }}}

/////////////////////// --2-- Checkboxen UND Eingabe ////////////////////////

if(!empty($_POST['checkbox'])) {
	if(strlen($eingabe) > 0) { ?>
    
<table class="contenttable" id="resultattabelle">

<tr>
    <td><strong>Name / Vorname</strong></td>
    <td><strong>Kategorien</strong></td>		 		
    <td><strong>Spezifikation</strong></td>
    <td><strong>Institut</strong></td>
    <td><strong>Kontakt</strong></td>
</tr>
    <td><strong>Checkboxen UND Eingabe</strong></td>

<?php 
			//2) SQL Abfrage ausführen
		$result = executeSqlQuery($verb, sqlSearch4());
		while ($resultat = mysqli_fetch_array($result)) { 
?>
<tr>
<td rowspan="1"> 
		<?php echo $resultat['vorname']; ?>&nbsp<? echo $resultat['nachname']; ?>
</td>
<td rowspan="1"> 
<?php 
	 echo $resultat['kategorienname'];
?>
	 </td>
<td rowspan="1"> 
<?php 
	 echo $resultat['spezifikationsname'];
?>
</td>
<td rowspan="1"> 
		<?php echo $resultat['institutsname']; ?>
</td>
<td rowspan="1"> 
		<?php echo $resultat['mail']; ?>
</td>
</tr>
      </table>  
<?php
 }} }?>

<!--  //////////////// SUCHE //////////////////  -->

<?php
if(empty($_POST['checkbox'])) {
	if(empty($eingabe)) {
 ?> 

<div id="content_center_top"> 
  	                
<h1>Fachkompetenzen suchen</h1>
 
 <div id="content_center"> 

<div id="komptable"> 

<h2>Kategorie auswählen</h2>


<form  name="form1" method="post" action="<?php echo "index.php?page=" . $page ?>"  id="searchform"> 

<<<<<<< HEAD
<<<<<<< HEAD
// <<<<<<< HEAD
=======
>>>>>>> parent of ab32ee4... Merge branch 'master' of https://github.com/Icepick/php_fachkompetenzen
=======
>>>>>>> parent of 9cdae5c... << auskommentiert
<table id="searchtable">

<?php 
	//2) SQL Abfrage ausführen
	$result = executeSqlQuery($verb, sqlSearch1());
?>
 
<?php while ($search = mysqli_fetch_array($result)) { ?>

<tr>
<td>
<label>
	<input name="<?php echo "cB".$search['name']; ?>" class="checkbox" type="checkbox" value="<?php echo $search['name']; ?>" 
 id="checkbox[<?php echo $search['name']; ?>]" > 
	&nbsp;<?php echo $search['name']; ?>
</label>
</td>
</tr>
<?php } ?>             
        </table> 
<<<<<<< HEAD
<<<<<<< HEAD
// =======
=======
=======
>>>>>>> parent of 9cdae5c... << auskommentiert
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
<<<<<<< HEAD
// >>>>>>> FETCH_HEAD
=======
>>>>>>> parent of ab32ee4... Merge branch 'master' of https://github.com/Icepick/php_fachkompetenzen
=======
>>>>>>> FETCH_HEAD
>>>>>>> parent of 9cdae5c... << auskommentiert

</div>

<div id="suchfunktion">

  <h2>Suche verfeinern</h2>
  
<<<<<<< HEAD
<<<<<<< HEAD
// <<<<<<< HEAD
=======
>>>>>>> parent of ab32ee4... Merge branch 'master' of https://github.com/Icepick/php_fachkompetenzen
=======
>>>>>>> parent of 9cdae5c... << auskommentiert
    <input  id="tags" type="text" name="eingabe" style="width:200px;">  <br/>
    <input  type="submit" name="submit" value="Suche" style="margin-top:10px;"> 

</div>

</form>
<br/>    
<p color:#d43f3a;".">Bitte wählen Sie eine Kategorie aus oder geben Sie einen Suchbegriff ein.</p><br />
<<<<<<< HEAD
<<<<<<< HEAD
// =======
=======
=======
>>>>>>> parent of 9cdae5c... << auskommentiert
    <?php
		if(isset($eingabe) && !empty($eingabe)) {
			$result = executeSqlQuery($verb, ultimateTextSearch($eingabe));
			echo "<strong>Suchbegriff: " . $eingabe . "</strong><br/><br/>";
			while ($te = mysqli_fetch_array($result)) {
				echo "<div style='border: 1px solid #000; padding:10px'>";
				echo "<strong>Person:</strong> " . $te["vorname"] . " " . $te["nachname"] . "<br/>";
				echo "<strong>EMail:</strong> " . $te["mailadresse"] . "<br/>";
				echo "<strong>Insitut:</strong> " . $te["institutname"] . "<br/>";
				echo "<strong>Kategorie:</strong> " . $te["kategoriename"] . "<br/>";
				echo "<strong>Spezifikation:</strong> " . $te["spezname"];				
				echo "</div>";
				echo "<br/><br/>";
		}
}
	
	?>

</div>

</form>   


</div>
<<<<<<< HEAD
// >>>>>>> FETCH_HEAD
=======
>>>>>>> parent of ab32ee4... Merge branch 'master' of https://github.com/Icepick/php_fachkompetenzen
=======
>>>>>>> FETCH_HEAD
>>>>>>> parent of 9cdae5c... << auskommentiert

	</div>
    </div>
	
<?php
}  }
//4) Verbindung zu MySQL schliessen
	closeMySqlConnection($verb);
?>
	
<!-- Autokorrektur

<script src="js/jquery-2.0.3.min.js"></script>
<script src="js/jquery-ui-1.10.3.custom.min.js"></script>
<script>
	$(function() {
		var availableTags = [
			"CSS",
			"HTML",
			"Chinesisch",
			"SQL",
			"Eventplanung",
			"Scheme" // beim letzten Wert kein Komma mehr!
		];
		$( "#tags" ).autocomplete({
			source: availableTags
		});
	});
	</script>  -->
