<?php
	require_once('login_lib.php');

	if(lg_check()) {
		header('Location: ../');
	} else {
		$_pw = $_POST['pw'];//il2016
		if(md5($_pw) == '480e7f18691762181beba865ed7806b7') {
			lg_login();
			header('Location: ../');
		} else {
			header('Location: ../?m=pf');
		}
	}
?>
