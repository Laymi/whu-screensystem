function screen_laden (screen_id) {
	var time = new Date().getTime();
	$.get("scr/server_communication.php?befehl=screen_laden&screen_id="+screen_id+"&time_dummy="+time,function(data) {
		$('#middle-window').html(data.inhalt);
		$('#upcoming-next-entry').html(data.ucnext);
	},"json");
}

$(document).ready(function () {
	var calc_height = $(document).height()-140-60;
	$('#middle-window').css('height',calc_height+'px');
});