----------------------
HTML-Datei
----------------------
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Checkbox</title>
</head>
<body>
<form name="form1" method="post" action="checkboxes_einfach.php">
  <p><input name="a1" type="checkbox" id="a1" value="a1">a1</p>
  <p><input name="a2" type="checkbox" id="a2" value="a2">a2</p>
  <p><input name="a3" type="checkbox" id="a3" value="a3">a3</p>
  <p><input name="a4" type="checkbox" id="a4" value="a4">a4</p>
  <p><input name="a5" type="checkbox" id="a5" value="a5">a5</p>
  <p><input type="submit" name="submit" id="submit" value="Senden"></p>
</form>
</body>
</html>

----------------------
Datei checkboxes_einfach.php
----------------------
<?php
 
 $check = '';
 
 // Durch alle POST Variablen durchgehen
 // Inhalte in Array packen
 foreach($_POST as $name => $wert) {
  // Nur Formularelemente, welche mit 'a' beginnen
  if (substr($name,0,1) == "a") {
   $check .= "'".$wert."'".",";
  }
    }
 // Letztes Komma weg
 $check = substr($check,0,strlen($check)-1);
 // Überprüfen, ob Eintrag
 if (strlen($check) > 0) {
  $checksql = "  xxx IN (".$check.")";
 }
 
 echo "SELECT * FROM ... WHERE ".$checksql.";";
?>
 