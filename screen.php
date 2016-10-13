<?php
error_reporting(-1);
ini_set('display_errors', 'On');

	// DB Verbindung
	require_once("scr/db_connect.php");
	// System Online?
	$sql = mysqli_query($con, "SELECT value FROM screensys_settings WHERE setting = 'system-available'") or die(mysql_error());
	while($row = mysqli_fetch_array($sql)) {
		if($row[0] != 'y') die("Das System ist deaktiviert.");
	}
	// Bildschirm Design
	$sql = mysqli_query($con, "SELECT value FROM screensys_settings WHERE setting = 'screen-design'") or die(mysql_error());
	while($row = mysqli_fetch_array($sql)) {
		$screen_design = $row[0];
	}
	$sql = mysqli_query($con, "SELECT design_code FROM screensys_designs WHERE design_name = '$screen_design' AND design_typ = 'screen'") or die(mysql_error());
	while($row = mysqli_fetch_array($sql)) {
		$design_code = $row[0];
	}
	// Bildschirm ID
	$screen_id = 0;
	if(isset($_GET["s"])) {
		$screen_id = $_GET["s"];
		$sql = mysqli_query($con, "SELECT typ FROM screensys_screens WHERE screen_id = '$screen_id'") or die(mysql_error());
		while($row = mysqli_fetch_array($sql)) {
			if($row[0] != "bildschirm") {
				die(header('Location: beamer.php?s='.$screen_id));
			}
		}
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Screen #<?=$screen_id?></title>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700italic' rel='stylesheet' type='text/css'>
		<link href='css/screen_stylesheet.css' rel='stylesheet' type='text/css'>
		<link href='css/screens/<?=$screen_design?>.css' rel='stylesheet' type='text/css'>
		<script src="scr/jquery.js"></script>
		<script typ="text/javascript" src="scr/screen_javascript.js"></script>
		<script typ="text/javascript">
			$(document).ready(function() {
				screen_laden(<?=$screen_id?>);
				var ResInterval = window.setInterval(function () {
					var screen = screen_laden(<?=$screen_id?>);
				},10000);
			});
			var cal_hei = $(window).height()-200;
			$('.middle-window').css('height',cal_hei);
		</script>

		<meta http-equiv="refresh" content="30">
	</head>
	<?php echo $design_code."<div style=\"color:white; text-align: right; font-size:3em;\">".date('H:i',time()+(60*60*2))."</div>";?>
</html>
