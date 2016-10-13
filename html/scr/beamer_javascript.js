function screen_laden (screen_id) {
	var time = new Date().getTime();
	$.get("scr/server_communication.php?befehl=screen_laden&screen_id="+screen_id+"&time_dummy="+time,function(data) {
		$('#middle-window').html(data.inhalt);
	},"json");
}