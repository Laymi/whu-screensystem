<?php
	// DB Verbindung
	require_once(__DIR__ ."/../scr/db_connect.php");

	// ggf. Seite auswerten
		$page = "uebersicht"; if(isset($_GET["p"])) $page = $_GET["p"];
	// ggf. Nachricht auswerten
	if(isset($_GET["m"])) {
		switch($_GET["m"]) {
			case "sea":
				$msg = "<green>Screen erfolgreich angelegt.</green>";
				break;
			case "tea":
				$msg = "<green>Template erfolgreich angelegt.</green>";
				break;
			case "teu":
				$msg = "<green>Template erfolgreich geupdated.</green>";
				break;
			case "teg":
				$msg = "<green>Template erfolgreich gelöscht.</green>";
				break;
			case "fa":
				$msg = "<red>Es ist ein Fehler aufgetreten(fa).</red>";
				break;
			case "eeg":
				$msg = "<green>Einstellungen erfolgreich geändert.</green>";
				break;
			case "seg":
				$msg = "<red>Screen erfolgreich gelöscht.</red>";
		}
	}
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Screensystem v2</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700italic' rel='stylesheet' type='text/css'>
	<link href='css/stylesheet.css' rel='stylesheet' type='text/css'>
	<?php if($page == "template") {
		// Bildschirm Design
		$sql = mysqli_query($con, "SELECT value FROM screensys_settings WHERE setting = 'screen-design'") or die(mysqli_error());
		while($row = mysqli_fetch_array($sql)) {
			$screen_design = $row[0];
		}
	?>
		<link href='css/screens/<?php echo($screen_design) ?>.css' rel='stylesheet' type='text/css'>
	<?php } ?>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script typ="text/javascript" src="scr/javascript.js"></script>
	<script typ="text/javascript">
		$(document).ready(function() {
			<?php if(isset($_GET["m"])) echo "$('.msg').css('display','none').html('".$msg."').fadeIn(1000);"; ?>
		});
	</script>
</head>
<body>
	<div class="table-centered"><div class="cell">
		<div class="panel">
			<div class="panel_nav">
				<a class="keine_deco" href="?p=uebersicht"><div id="uebersicht" class="nav_element">Übersicht</div></a>
				<a class="keine_deco" href="?p=template"><div id="neues_template" class="nav_element">+Template</div></a>
				<a class="keine_deco" href="?p=screen"><div id="neuer_screen" class="nav_element">+Screen</div></a>
				<a class="keine_deco" href="?p=einstellungen"><div id="einstellungen" class="nav_element">Einstellungen</div></a>
				<a class="keine_deco" href="scr/logout.php"><div class="nav_element_logout"><span class="fontawesome-signout"></span></div></a>
			</div>
			<div class="panel_content">
				<?php require_once("pages/subpages/".$page.".php"); ?>
			</div>
		</div>
	</div></div>
	<div class="sys_info">Screensystem v2<br /><a class="robin_link" href="http://www.robinweishaupt.de" target="_blank">Kontakt</a></div>
</body>
</html>
