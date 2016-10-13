<div class="seite_titel">Einstellungen</div><br/>
<div class="msg"></div>
<br/>
<form id="einstellungen_uebernehmen" methode="get" action="scr/server_communication.php">
<div class="table-centered">
	<div class="row">
		<div class="cell-right padding-right">
			Event
		</div>
		<div class="cell-left">
			<select name="event_code" class="input_select">
				<option value="idealab">IdeaLab!</option>
				<option value="nyc">CFF - NYC</option>
			</select>
		</div>
	</div>	
	<div class="row">
		<div class="cell-right padding-right">
			System-Aktivierung
		</div>
		<div class="cell-left">
			<select name="active_code" class="input_select">
				<option value="y">Aktivieren</option>
				<option value="n">Deaktivieren</option>
			</select>
		</div>
	</div>
<div class="row">
		<div class="cell-right padding-right">
			E-Mail-Benachrichtigung
		</div>
		<div class="cell-left">
			<select name="email_code" class="input_select">
				<option value="y">Aktivieren</option>
				<option value="n">Deaktivieren</option>
			</select>
		</div>
	</div>
</div>
<input type="hidden" name="befehl" class="input_befehl" value="speichern_einstellungen">
</form>
<div id="screen_speichern" class="input_button" onClick="$('form#einstellungen_uebernehmen').submit();">Speichern</div>