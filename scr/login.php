<?php
	require_once('login_lib.php');

	if(lg_check()) {
		header('Location: ../');
	} else {
		$_pw = $_POST['pw'];
		if(md5($_pw) == '098f6bcd4621d373cade4e832627b4f6') {
			// 098f6bcd4621d373cade4e832627b4f6 == md5("test")
			lg_login();
			header('Location: ../');
		} else {
			header('Location: ../?m=pf');
		}
	}
?>
