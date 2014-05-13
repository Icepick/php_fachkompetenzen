<?php

//Verbindung zu MySQL öffnen
function openMySqlConnection() {
	// Verbindungsparameter für MySQL
	$host = "localhost"; 
	$db = "ets817";
	$user = "root";
	$pwd = "";

	//Verbindung mit MySQL erstellen
	$verb = mysqli_connect($host, $user, $pwd, $db);

	//Verbindung mit MySQL testen
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		exit();
	}

	// Fehler ausgeben
	error_reporting(E_ALL);
	ini_set('display_errors', '1');

	// Zeichensatz utf8
	mysqli_query($verb,"SET NAMES 'utf8' COLLATE 
	'utf8_general_ci'") or die("Fehler:
	".mysqli_connect_error());
	// Keine Enter unterhalb letzter Zeile!
	
	return $verb;
}

?>

<?php
//Abfrage durchführen
function executeSqlQuery($verb, $sql) {
	$result = mysqli_query($verb, $sql) or die("Fehler: ".mysqli_error($verb));
	return $result;
}
?>


<?php
//Verbindung zu MySQL schliessen
function closeMySqlConnection($verb) {
	mysqli_close($verb);
}
?>