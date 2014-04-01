<?php
// Wichtigste Verbindungsparameter als Variablen
<<<<<<< HEAD
$host = "10.0.254.77"; 
$db = "ets817";
$user = "ets817";
=======
$host = "localhost"; 
$db = "forschungskompetenzen";
$user = "root";
>>>>>>> FETCH_HEAD
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