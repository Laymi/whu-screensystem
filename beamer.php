<?php
	// DB Verbindung
	require_once("scr/db_connect.php");
	// System Online?
	$sql = mysql_query("SELECT value FROM screensys_settings WHERE setting = 'system-available'") or die(mysql_error());
	while($row = mysql_fetch_array($sql)) {
		if($row[0] != 'y') die("Das System ist deaktiviert.");
	}
	// Beamer Design
	$sql = mysql_query("SELECT value FROM screensys_settings WHERE setting = 'beamer-design'") or die(mysql_error());
	while($row = mysql_fetch_array($sql)) {
		$screen_design = $row[0];
	}
	$design_code = "";
	$sql = mysql_query("SELECT design_code FROM screensys_designs WHERE design_name = '$screen_design' AND design_typ = 'beamer'") or die(mysql_error());
	while($row = mysql_fetch_array($sql)) {
		$design_code = $row[0];
	}
	// Beamer ID
	$screen_id = 0;
	if(isset($_GET["s"])) {
		$screen_id = $_GET["s"];
		$sql = mysql_query("SELECT typ FROM screensys_screens WHERE screen_id = '$screen_id'") or die(mysql_error());
		while($row = mysql_fetch_array($sql)) {
			if($row[0] != "beamer") {
				die(header('Location: screen.php?s='.$screen_id));
			}
		}
	}

?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Beamer #<?php echo($screen_id) ?></title>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700italic' rel='stylesheet' type='text/css'>
		<link href='css/beamer_stylesheet.css' rel='stylesheet' type='text/css'>
		<link href='css/beamer/<?php echo($screen_design) ?>.css' rel='stylesheet' type='text/css'>
		<script src="scr/jquery.js"></script>
		<script typ="text/javascript" src="scr/beamer_javascript.js"></script>
		<script typ="text/javascript">
			$(document).ready(function() {
				screen_laden(<?php echo($screen_id) ?>);
				var ResInterval = window.setInterval(function () {
					var screen = screen_laden(<?php echo($screen_id) ?>);
				},10000);
			});
		</script>
	</head>
		<?php echo $design_code; ?>
</html>
