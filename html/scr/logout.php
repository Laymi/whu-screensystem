<?php
	require_once('login_lib.php');
	
	if(lg_logout()) {
		header('Location: ../?m=eag');
	} else {
		echo "Es ist ein Fehler aufgetreten.";
	}
?>
