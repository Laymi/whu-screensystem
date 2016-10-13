<?php
	require_once("db_connect.php"); // Verbindung zur Datenbank
	require_once("functions.php");

	switch($_GET["befehl"]) { // Anfrage auswerten
		case "speichern_screen":
			$name = $_GET["screen_name"];
			$typ = $_GET["screen_typ"];
			$temp_id = $_GET["temp_id"];
			$sql = mysqli_query($con, "INSERT INTO screensys_screens(name,typ,temp_id,lst_call) VALUES ('$name','$typ','$temp_id','0')") or die(mysqli_error());
			if($sql) {
				header('Location: ../?p=screen&m=sea');
			} else {
				header('Location: ../?p=screen&m=fa');
			}
			break;
		case "speichern_einstellungen":
			$event = $_GET["event_code"];
			$code = $_GET["active_code"];
			mysqli_query($con, "UPDATE screensys_settings SET value = '$code' WHERE setting = 'system-available'") or die(mysqli_error());
			$sqlq = mysqli_query($con, "UPDATE screensys_settings SET value = '$event' WHERE setting = 'screen-design' OR setting = 'beamer-design'") or die(mysqli_error());
			if($sqlq) {
				header('Location: ../?p=einstellungen&m=eeg');
			} else {
				header('Location: ../?p=einstellungen&m=fa');
			}
			break;
		case "speichern_template":
			$temp_id = $_GET["temp_id"];
			$name = $_GET["template_name"];
			$typ = $_GET["template_typ"];
			$inhalt = $_GET["template_inhalt"];
			$ucnext = $_GET["template_ucnext"];
			$sql = mysqli_query($con, "SELECT temp_id FROM screensys_temps WHERE temp_id = '$temp_id'") or die(mysqli_error());
			if(mysqli_num_rows($sql) >= 1) { // prüfen ob Template aktualisi>eren oder neues Template anlegen
				$sql = mysqli_query($con, "UPDATE screensys_temps SET name='$name', typ='$typ', inhalt='$inhalt', ucnext = '$ucnext' WHERE temp_id = '$temp_id'") or die(mysqli_error());
				if($sql) {
					header('Location: ../?p=template&m=teu');
				} else {
					header('Location: ../?p=template&m=fa');
				}
			} else { // neues Template
				$sql = mysqli_query($con, "INSERT INTO screensys_temps(name,typ,inhalt,ucnext) VALUES ('$name','$typ','$inhalt','$ucnext')") or die(mysqli_error());
				if($sql) {
					header('Location: ../?p=template&m=tea');
				} else {
					header('Location: ../?p=template&m=fa');
				}
			}
			break;
		case "temp_laden":
			$temp_id = $_GET["temp_id"];
				$sql = mysqli_query($con, "SELECT * FROM screensys_temps WHERE temp_id = '$temp_id'") or die(mysqli_error());
				if(mysqli_num_rows($sql) >= 1) {
					while($row = mysqli_fetch_array($sql)) {
						echo json_encode(array("id" => $row[0],"name" => $row[1],"typ" => $row[2],"inhalt" => $row[3],"ucnext" => $row[4]));
					}
				} else {
					echo json_encode(array("name" => "false","id" => naechste_id('temp')));
				}
			break;
		case "temp_loeschen":
			$temp_id = $_GET["temp_id"];
				$sql = mysqli_query($con, "DELETE FROM screensys_temps WHERE temp_id = '$temp_id'") or die(mysqli_error());
				if($sql) {
					echo json_encode(array("response" => "positive"));
				}
			break;
		case "tabelle_laden":
			$sql = mysqli_query($con, "SELECT temp_id,name,typ FROM screensys_temps ORDER BY name ASC") or die(mysqli_error());
			$temps = array();
			while($row = mysqli_fetch_array($sql)) {
				$temps[] = $row;
			}
			$screens_all = ""; $beamer_all = "";
			for($x=0;$x<=count($temps)-1;$x++) {
				if($temps[$x]["typ"] == "bildschirm") {
					$screens_all .= "<option value=\"".$temps[$x]["temp_id"]."\">".$temps[$x]["name"]."</option>";
				}
			}
			for($x=0;$x<=count($temps)-1;$x++) {
				if($temps[$x]["typ"] == "beamer") {
					$beamer_all .= "<option value=\"".$temps[$x]["temp_id"]."\">".$temps[$x]["name"]."</option>";
				}
			}


			$sql = mysqli_query($con, "SELECT * FROM screensys_screens ORDER BY name") or die(mysqli_error());
			$output = array();
			while($row = mysqli_fetch_array($sql)) {
				$output[] = $row;
			}
			$output_tbl = "<table><tr><th>ID</th><th>Name</th><th>Typ</th><th>Letzer Aufruf</th><th>Status</th><th>Template</th><th></th><th></th></tr>";
				for($i=0;$i<=count($output)-1;$i++) {
					if($output[$i]["typ"] == "bildschirm") {$typ = "<span class=\"spanicon fontawesome-desktop\"></span>";} else {$typ = "<span class=\"spanicon fontawesome-facetime-video\"></span>";}
					if(date("d.m.Y",time()) == date("d.m.Y", $output[$i]["lst_call"])) {$lst_call = date("H:i:s",$output[$i]["lst_call"]).", Heute";} elseif($output[$i]["lst_call"] == 0) {$lst_call = "noch nie";} else {$lst_call = date("H:i:s, d.m.Y",$output[$i]["lst_call"]);}
					if($output[$i]["lst_call"] < (time()-15)) {$status = "<b><red><span class=\"spanicon fontawesome-remove\"></span></red></b>"; send_mail($output[$i]["screen_id"]);} else {$status = "<b><green><span class=\"spanicon fontawesome-ok\"></span></green></b>";}
				$output_tbl .= "<tr><td>".$output[$i]["screen_id"]."</td><td><a target=\"_blank\" href=\"".($output[$i]["typ"] == "bildschirm"?"screen":"beamer").".php?s=".$output[$i]["screen_id"]."\">".$output[$i]["name"]."</a></td><td>".$typ."</td><td>".$lst_call."</td><td>".$status."</td><td><select id=\"screen_".$output[$i]["screen_id"]."\">";
					$temps_all = "";
					for($x=0;$x<=count($temps)-1;$x++) {
						if($temps[$x]["typ"] == $output[$i]["typ"]) {
							$temps_all .= "<option".($temps[$x]["temp_id"] == $output[$i]["temp_id"]?" selected":"")." value=\"".$temps[$x]["temp_id"]."\">".$temps[$x]["name"]."</option>";

						}
					}

				$output_tbl .= $temps_all;
				$output_tbl .= "</select></td><td><div class=\"cursor green_hover\" onclick=\"window.location.href='scr/server_communication.php?befehl=screen_temp_update&screen_id=".$output[$i]["screen_id"]."&temp_id='+$('#screen_".$output[$i]["screen_id"]."').val();\"><span class=\"spanicon fontawesome-save\"></span></dic></td><td><a class=\"cursor red_hover\" onclick=\"if (confirm('Anzeige wirklich löschen?')) window.location.href='scr/server_communication.php?befehl=screen_loeschen&screen_id=".$output[$i]["screen_id"]."';\"><span class=\"spanicon fontawesome-trash\"></span></a></td></tr>";
				}
			$output_tbl .= "<tr><td>X</td><td>ALLE BILDSCHIRME</td><td><span class=\"spanicon fontawesome-desktop\"></span></td><td>-</td><td><span class=\"spanicon fontawesome-ok\"></span></td><td><select id=\"bild_all\">".$screens_all."</select></td><td><div class=\"cursor green_hover\" onclick=\"window.location.href='scr/server_communication.php?befehl=screen_temp_update&screen_id=bild_all&temp_id='+$('#bild_all').val();\"><span class=\"spanicon fontawesome-save\"></span></dic></td><td></td></tr><tr><td>X</td><td>ALLE BEAMER</td><td><span class=\"spanicon fontawesome-facetime-video\"></span></td><td>-</td><td><span class=\"spanicon fontawesome-ok\"></span></td><td><select id=\"beamer_all\">".$beamer_all."</select></td><td><div class=\"cursor green_hover\" onclick=\"window.location.href='scr/server_communication.php?befehl=screen_temp_update&screen_id=beamer_all&temp_id='+$('#beamer_all').val();\"><span class=\"spanicon fontawesome-save\"></span></dic></td><td></td></tr></table>";
			echo json_encode(array("tabelle" => $output_tbl,"time" => date("H:i:s",time())));
			break;
		case "screen_temp_update":
			$screen_id = $_GET["screen_id"];
			$temp_id = $_GET["temp_id"];
			if($screen_id == "bild_all") {
				$sql = mysqli_query($con, "UPDATE screensys_screens SET temp_id = '$temp_id', lst_call = '0' WHERE typ = 'bildschirm'") or die(mysqli_error());
				while($row = mysqli_fetch_array($sql)) {
					$screens[] = $row[0];
				}
			} elseif($screen_id == "beamer_all") {
				$sql = mysqli_query($con, "UPDATE screensys_screens SET temp_id = '$temp_id', lst_call = '0' WHERE typ = 'beamer'") or die(mysqli_error());
				while($row = mysqli_fetch_array($sql)) {
					$screens[] = $row[0];
				}
			} else {
				$sql = mysqli_query($con, "UPDATE screensys_screens SET temp_id = '$temp_id', lst_call = 0 WHERE screen_id = '$screen_id'") or die(mysqli_error());
			}
			if($sql) {
				header("Location: ../?p=uebersicht&m=teu");
			}
			break;
		case "screen_loeschen":
			$screen_id = $_GET["screen_id"];
			$sql = mysqli_query($con, "DELETE FROM screensys_screens WHERE screen_id = '$screen_id'") or die(mysqli_error());
			if($sql) {
				header("Location: ../?p=uebersicht&m=seg");
			}
			break;
		case "screen_laden":
			$uc_next = ""; $temp_code = "";
			$screen_id = $_GET["screen_id"];
			$sql = mysqli_query($con, "SELECT temp_id FROM screensys_screens WHERE screen_id = '$screen_id'") or die(mysqli_error());
			while($row = mysqli_fetch_array($sql)) {
				$temp_id = $row[0];
			}
			$sql = mysqli_query($con, "SELECT inhalt,ucnext FROM screensys_temps WHERE temp_id = '$temp_id'") or die(mysqli_error());
			while($row = mysqli_fetch_array($sql)) {
				$temp_code = $row[0];
				$uc_next = $row[1];
			}
			$sql = mysqli_query($con, "UPDATE screensys_screens SET lst_call = ".time()." WHERE screen_id = '$screen_id'") or die(mysqli_error());
			if($sql) {
				echo json_encode(array("inhalt" => $temp_code,"ucnext" => $uc_next,"time" => date("d.m.Y, H:i:s",time())));
			}
			break;
	}
?>
