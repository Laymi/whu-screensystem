<div class="seite_titel">+Screen</div><br />
<div class="msg"></div>
<br/>
<form id="neuer_screen" methode="get" action="scr/server_communication.php">
<div class="table-centered">
	<div class="row">
		<div class="cell-right padding-right">
			ID
		</div>
		<div class="cell-left">
			<? echo naechste_id('screen'); ?>
		</div>
	</div>
	<div class="row">
		<div class="cell-right padding-right">
			Name
		</div>
		<div class="cell-left">
			<input type="text" name="screen_name" class="input_text" value="Screen-Name" onClick="input_click(this,'Screen-Name');" onBlur="input_blur(this,'Screen-Name');">
		</div>
	</div>
	<div class="row">
		<div class="cell-right padding-right">
			Typ
		</div>
		<div class="cell-left">
			<select name="screen_typ" class="input_select">
				<option value="bildschirm">Bildschirm</option>
				<option value="beamer">Beamer</option>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="cell-right padding-right">
			Template
		</div>
		<div class="cell-left">
			<select name="temp_id" class="input_select">
				<option>Kein Template</option>
				<? echo temp_liste(temps_laden(),''); ?>
			</select>
		</div>
	</div>	
</div>
<input type="hidden" name="befehl" class="input_befehl" value="speichern_screen">
</form>
<div id="screen_speichern" class="input_button" onClick="$('form#neuer_screen').submit();">Speichern</div>