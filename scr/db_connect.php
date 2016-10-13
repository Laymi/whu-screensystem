<?php
 	// Verbindung zur Datenbank

	$uName = 'root';
	$uPass = 'somepassword';
	//$uName = 'root';
	//$uPass = 'root';
	$dbName = 'screensys';

	$con = mysqli_connect("localhost", 'root', 'somepassword')  or die ("Keine Verbindung zum MySQL-Server moeglich.");
	mysqli_select_db($con, 'screensys') or die ("Die Datenbank '".$dbName."' existiert nicht.");
	mysqli_query($con, "SET NAMES 'utf8'");
?>
