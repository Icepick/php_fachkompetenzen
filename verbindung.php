<?php
// Wichtigste Verbindungsparameter als Variablen
$host = "localhost"; 
$db = "forschungskompetenzen";
$user = "root";
$pwd = "";
$tbl = "tbl_pokemon3";
$tblf = "tbl_farbe";
$verb = mysqli_connect($host, $user, $pwd, $db);

// Fehler ausgeben
error_reporting(E_ALL);
ini_set('display_errors', '1');
// Zeichensatz utf8
mysqli_query($verb,"SET NAMES 'utf8' COLLATE 
'utf8_general_ci'") or die("Fehler:
".mysqli_connect_error());
// Keine Enter unterhalb letzter Zeile!
?>