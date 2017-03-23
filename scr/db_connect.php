<?php
 	// Verbindung zur Datenbank

	$uName = 'root';
	$uPass = 'ea427aefd7a95e9cbe95d0b9eb4bd26374cd358c1fd13d5f';
	$dbName = 'screensys';
	$dbHost = 'localhost';

	$con = mysqli_connect($dbHost, $uName, $uPass)  or die ("Keine Verbindung zum MySQL-Server moeglich.");
	mysqli_select_db($con, $dbName) or die ("Die Datenbank '".$dbName."' existiert nicht.");
	mysqli_query($con, "SET NAMES 'utf8'");
?>
