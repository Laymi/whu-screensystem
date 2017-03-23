<?php
	function naechste_id($typ) {
		global $con;
		if($typ == 'screen') {
			$sql = mysqli_query($con, "SELECT screen_id FROM screensys_screens ORDER BY screen_id DESC LIMIT 1") or die(mysqli_error($con));
				while($row = mysqli_fetch_array($sql)) {
					return $row[0]+1;
				}
		} elseif($typ == 'temp') {
			$sql = mysqli_query($con, "SELECT temp_id FROM screensys_temps ORDER BY temp_id DESC LIMIT 1") or die(mysqli_error($con));
				while($row = mysqli_fetch_array($sql)) {
					return $row[0]+1;
				}
		}
	}

	function temps_laden() {
		global $con;
		$sql = mysqli_query($con, "SELECT * FROM screensys_temps ORDER BY name ASC") or die(mysqli_error($con));
		$output = array();
		while($row = mysqli_fetch_array($sql)) {
			$output[] = array("temp_id" => $row[0],"name" => $row[1],"typ" => $row[2],"inhalt" => $row[3]);
		}
		for($i=0;$i<=count($output);$i++) {
			if($output[$i]["name"] == "Leere Anzeige") {
				unset($output[$i]);
			}
		}
		return array_merge($output);
	}

	function temp_liste($temp_array,$option) {
		global $con;
		$output = "";
		switch ($option) {
			case "":
				for($i=0;$i<=count($temp_array)-1;$i++) {
					$output .= "<option value=\"".$temp_array[$i]["temp_id"]."\">".$temp_array[$i]["name"]."</option>";
				}
				break;
			case "onclick":
				for($i=0;$i<=count($temp_array)-1;$i++) {
					$output .= "<option value=\"".$temp_array[$i]["temp_id"]."\" onclick=\"temp_laden('".$temp_array[$i]["temp_id"]."');\">".$temp_array[$i]["name"]."</option>";
				}
				break;
		}
		return $output;
	}

	function send_mail($screen_id) {
		global $con;
		// $sqlq = mysqli_query($con, "SELECT notified FROM screensys_screens WHERE screen_id = '$screen_id'") or die(mysqli_error($con));
		// while($row = mysqli_fetch_array($sqlq)) {
		// 	$screen_notified = $row[0];
		// }
		// mysqli_query($con, "UPDATE screensys_screens SET notified = 1 WHERE screen_id = '$screen_id'");
		//
		// $sql = mysqli_query($con, "SELECT name FROM screensys_screens WHERE screen_id = '$screen_id'") or die(mysqli_error($con));
		// while($row = mysqli_fetch_array($sql)) {
		// 	$screen_name = $row[0];
		// }
		// $to = "daniel.pesch@whu.edu";
		// $subject = "SCREEN SYS v2 - Bildschirm '".$screen_name."' - AUSGEFALLEN";
		// $msg = "Der Bildschirm mit der ID ".$screen_id." und dem Namen ".$screen_name." ist ausgefallen! Um ".date("H:i:s, d.m.Y",time());
		// if($screen_notified == 0) mail($to,$subject,$msg);
	}

	function lade_temp_notizen($screen_design) {
		global $con;
		$output = "";
		$sql = mysqli_query($con, "SELECT design_notes FROM screensys_designs WHERE design_name = '$screen_design' AND design_typ = 'screen'") or die(mysqli_error($con));
		while($row = mysqli_fetch_array($sql)) {
			$output = $row[0];
		}
		return $output;
	}
?>
