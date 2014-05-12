
<?php
//1) Verbindung zu MySQL öffnen
$verb = openMySqlConnection();


if(!empty($_POST['checkbox'])) {
	echo "Gewählte Kategorien:";
    foreach($_POST['checkbox'] as $check) {
            echo "<br />";
            echo $check;
    }
} 

?>


	<div id="content_center_top">

<div id="content_center_top">
                
<h1>Fachkompetenzen suchen</h1>
 
<div id="komptable"> 

<form  name="form1" method="post" action="<?php echo "index.php?page=" . $page ?>"  id="searchform"> 

<h2>Kategorie auswählen</h2>
<table class="contenttable">

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
         
</table> 

</div>

<div id="suchfunktion">

  <h2>Suche verfeinern</h2>
  
    <input  id="tags" type="text" name="eingabe"> 
    <input  type="submit" name="submit" value="Suche"> 
    
</form>    
      
	</div>
    </div>

	
<?php
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
