<?php
	session_start();
	$_timeout = 60*60; // defines the time until a SESSION times out (in minutes)
	
	function lg_login() { // logs in the SESSION
		$_SESSION['status'] = '1';
		$_SESSION['lt_active'] = time();
		
		return true;
	}
	
	function lg_logout() { // logs out the SESSION
		$_SESSION['status'] = '0';
		$_SESSION['lt_active'] = '0';
		
		return true;
	}
	
	function lg_update_active() { // updates the lt_active time of a SESSION to now
		$_SESSION['lt_active'] = time();
		
		return true;
	}
	
	function lg_check() { // checks if SESSION is logged in and not timed out
	global $_timeout;
		if($_SESSION['status'] == '1') {
			if(time() - $_SESSION['lt_active'] <= $_timeout) {
				return true;
			} else {
				return false; 
				// if you want to differ 'timed out' & 'not logged' in,
				// change return value here to e.g. 'timed-out', beware
				// you have to catch the feedback diffrent
			}
		}
		return false;
	}
?>
