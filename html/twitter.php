<?
	// DB Verbindung
	require_once("scr/db_connect.php");
	// System Online?
	$sql = mysql_query("SELECT value FROM screensys_settings WHERE setting = 'system-available'") or die(mysql_error());
	while($row = mysql_fetch_array($sql)) {
		if($row[0] != 'y') die("Das System ist deaktiviert.");
	}
	// Bildschirm Design
	$sql = mysql_query("SELECT value FROM screensys_settings WHERE setting = 'screen-design'") or die(mysql_error());
	while($row = mysql_fetch_array($sql)) {
		$screen_design = $row[0];
	}
	$sql = mysql_query("SELECT design_code FROM screensys_designs WHERE design_name = '$screen_design' AND design_typ = 'screen'") or die(mysql_error());
	while($row = mysql_fetch_array($sql)) {
		$design_code = $row[0];
	}
	// Bildschirm ID
	$screen_id = 0;
	if(isset($_GET["s"])) {
		$screen_id = $_GET["s"];
		$sql = mysql_query("SELECT typ FROM screensys_screens WHERE screen_id = '$screen_id'") or die(mysql_error());
		while($row = mysql_fetch_array($sql)) {
			if($row[0] != "bildschirm") {
				die(header('Location: beamer.php?s='.$screen_id));
			}
		}
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Twitter Feed</title>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700italic' rel='stylesheet' type='text/css'>
		<link href='css/screen_stylesheet.css' rel='stylesheet' type='text/css'>	
		<link href='css/screens/<?=$screen_design?>.css' rel='stylesheet' type='text/css'>
		<script src="scr/jquery.js"></script>
		<script typ="text/javascript" src="scr/screen_javascript.js"></script>
		<meta http-equiv="refresh" content="30">
	</head>
	<body id="screenbody">
		<div id="top-bar"></div>
		<img id="il_logo" src="img/screen_mat/idealab/idealab2013.png">
		<img id="whu_logo" src="img/screen_mat/whu.png">
		<div id="middle-window" style="margin:auto; text-align: center; ">
			<a class="twitter-timeline" data-dnt="true" href="https://twitter.com/hashtag/idealab14" data-widget-id="520266934802067456" width="900px" height="624px">#idealab14 Tweets</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		</div>
	</body>
</html>