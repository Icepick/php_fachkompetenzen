<<<<<<< HEAD
<?php

if(!empty($_POST['checkbox'])) {
	echo "Gew‰hlte Kategorien:";
    foreach($_POST['checkbox'] as $check) {
            echo "<br />";
            echo $check;
    }
} 

?>


	<div id="content_center_top">
=======
<div id="content_center_top">
>>>>>>> 0a6b60054df91367463c27e9d57cdeac24a8d3b9
                
<h1>Fachkompetenzen suchen</h1>
 
<div id="komptable"> 

<form  name="form1" method="post" action="<?php echo "index.php?page=" . $page ?>"  id="searchform"> 
<table class="contenttable">

<h2>Kategorie ausw√§hlen</h2>

<? foreach ($result_sql5 as $kategorienliste) : ?>
<tr>
<td>
<label>
<input type="checkbox" name="checkbox[<? $kategorienliste['name']; ?>]" 
id="checkbox[<? $kategorienliste['name']; ?>]" value="<? echo $kategorienliste['name']; ?>"> 
&nbsp;<? echo $kategorienliste['name']; ?>
</label>
</td>
</tr>
<? endforeach; ?>             
         
</table> 

</div>

<div id="suchfunktion">

  <h2>Suche verfeinern</h2>
  
    <input  id="tags" type="text" name="eingabe"> 
    <input  type="submit" name="submit" value="Suche"> 
    
</form>    
      
	</div>
    </div>

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
