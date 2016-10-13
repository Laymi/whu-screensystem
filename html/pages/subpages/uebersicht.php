
<script>
	$(document).ready(function () {
		uebersicht_laden();
		var ResInterval = window.setInterval(function () {
			var tabelle = uebersicht_laden();
		},10000);
		$('.letzte_akt').click(function () {
			if(reloadActive == true) {
				reloadActive = false;
				$('.reloadActivebutton').css('color','#C1C1C1');
			} else {
				reloadActive = true;
				$('.reloadActivebutton').css('color','#B3C95A');
			}
		});
	});
</script>
<div class="seite_titel">Übersicht</div><br />
<div class="msg"></div>
<div class="table-centered"><div class="cell">
	<div class="table-uebersicht"></div>
</div></div>
<div class="letzte_akt"></div>