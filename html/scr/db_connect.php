<?php
 	// Verbindung zur Datenbank
	
	$uName = 'root';
	$uPass = 'd462defb34ce25a465c77ff67dc1ee1a5b94997b1b3c9d8b';
	//$uName = 'root';
	//$uPass = 'root';
	$dbName = 'screensys';
	
	$con = mysqli_connect("localhost", $uName, $uPass)  or die ("Keine Verbindung zum MySQL-Server moeglich.");
	mysqli_select_db($con, $dbName) or die ("Die Datenbank '".$dbName."' existiert nicht.");
	mysqli_query($con, "SET NAMES 'utf8'");
?>
