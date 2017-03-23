<?php
	require_once('scr/login_lib.php');
	require_once('scr/db_connect.php');
	require_once('scr/functions.php');

	if(@lg_check()) {
		lg_update_active();
		require_once('pages/control_panel.php');
	} else {
		require_once('pages/login_page.php');
	}
?>
