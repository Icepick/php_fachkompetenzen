
<?php
//1) Verbindung zu MySQL öffnen
$verb = openMySqlConnection();
// <<<<<<< HEAD
// =======

	
//TODO: SQL Abfragen für Suche (SQL in abfrage.php & Abfrage wie unten)


// >>>>>>> FETCH_HEAD
?>

<!-- //TODO: Code für das Anzeige von Suchresultat -->

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
    
<table width="600" class="contenttable">

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



// SUCHE //
if(strlen($checkboxStr) == 0) { ?> 


<div id="content_center"> 
  
	<div id="content_center_top">
	
<p color:#d43f3a;".">Bitte wählen Sie ein Kriterium aus.</p><br />
                
<h1>Fachkompetenzen suchen</h1>
 
<div id="komptable"> 

<form  name="form1" method="post" action="<?php echo "index.php?page=" . $page ?>"  id="searchform"> 

<h2>Kategorie auswählen</h2>

<table width:"600" class="contenttable">

<?php 
	//2) SQL Abfrage ausführen
	$result = executeSqlQuery($verb, sqlSearch1());
?>

<?php while ($search = mysqli_fetch_array($result)) { ?>

<tr>
<td>
<label>
	<input type="checkbox" name="checkbox[<?php $search['name']; ?>]" 
	id="checkbox[<?php $search['name']; ?>]" value="<?php echo $search['name']; ?>"> 
	&nbsp;<?php echo $search['name']; ?>
</label>
</td>
</tr>
<?php } ?>             
         
</div>

<div id="suchfunktion">

  <h2>Suche verfeinern</h2>
  
    <input  id="tags" type="text" name="eingabe"> 
    <input  type="submit" name="submit" value="Suche"> 

</div>

</form>    
      
	
</table> 

	</div>
    </div>
	
<?php
}
	//4) Verbindung zu MySQL schliessen
	closeMySqlConnection($verb);
?>
	
	
	
<!--  
<script src="js/jquery-2.0.3.min.js"></script>
<script src="js/jquery-ui-1.10.3.custom.min.js"></script>
<script>
	$(function() {
		var availableTags = [
			"CSS",
			"HTML",
			"Sprechtraining",
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
			"Scheme"
		];
		$( "#tags" ).autocomplete({
			source: availableTags
		});
	});
	</script> -->
