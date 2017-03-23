<html>
<head>
	<meta charset="utf-8">
	<title>Screensystem v2</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700italic' rel='stylesheet' type='text/css'>
	<link href='css/stylesheet.css' rel='stylesheet' type='text/css'>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script typ="text/javascript">
		$(document).ready(function() {

			$('.login_pw').focusin(function() {if($(this).val() == 'Passwort') $(this).attr('type','password').css('color','#4D4D4D').val('');});
			$('.login_pw').focusout(function() {if($(this).val() == '') {$(this).attr('type','text').val('Passwort').css('color','#C1C1C1');}})
			$('.login_button').click(function() {if($('.login_pw').val() != 'Passwort') {$('#form_login').submit();}});

			<?php if(isset($_GET["m"])) {
				switch($_GET["m"]) {
					case "pf":
						$msg = "<red>Das Passwort ist falsch!</red>";
						break;
					case "eag":
						$msg = "<green>Du wurdest erfolgreich ausgeloggt.</green>";
						break;
				}
				echo "$('.msg').css('display','none').html('".$msg."').fadeIn(1000);";
				}
			?>
		});
	</script>
</head>
<body>
	<div class="table"><div class="row"><div class="cell">
	<div class="login">
		<form id="form_login" method="post" action="scr/login.php">
			<input type="text" class="login_pw" name="pw" placeholder="Passwort"><br />
			<div class="login_button"><span class="fontawesome-key"></span></div><br />
			<div class="msg" style="margin-top:5px;"></div>
		</form>
	</div>
	</div></div></div>
	<div class="sys_info">Screensystem v2<br /><a class="robin_link" href="http://www.robinweishaupt.de" target="_blank">Kontakt</a></div>
</body>
</html>
