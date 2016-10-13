<script>
	$(document).ready(function () {
		$('.fontawesome-desktop').click(function () {
			$('#template_typ').val('bildschirm');
			$('.fontawesome-desktop').addClass('typ_selected').removeClass('typ_notselected');
			$('.fontawesome-facetime-video').removeClass('typ_selected').addClass('typ_notselected');
		});
		$('.fontawesome-facetime-video').click(function () {
			$('#template_typ').val('beamer');
			$('.fontawesome-facetime-video').addClass('typ_selected').removeClass('typ_notselected');
			$('.fontawesome-desktop').removeClass('typ_selected').addClass('typ_notselected');
		});
	});
</script>
<div class="seite_titel">+Template</div><br />
<div class="msg"></div>
<form id="neues_template" methode="get" action="scr/server_communication.php">
<?php $naechste_id = naechste_id('temp'); ?>
<br/>
<div class="table-centered">
	<div class="row">
		<div class="cell top padding-right left">
			<b>Templates Liste</b><br/>
			<?php $temps = temps_laden(); ?>
			<select id="temps_list" name="temp_id" class="input_select" size="50">
				<option selected value="leer" onclick="temp_laden('<? echo $naechste_id; ?>');"><span style="color:#B38E59;">Neues Template</span></option>
				<?php echo temp_liste($temps,'onclick'); ?>
			</select><br/>
			<div id="temp_speichern" class="input_button" onClick="$('form#neues_template').submit();"><span class="spanicon green_hover fontawesome-save"></span></div> <div id="templ_loeschen" class="input_button" onClick="if($('#temps_list').has('[selected]') && $('#temps_list').val() != 'leer') {if (confirm('Template wirklich löschen?')) temp_loeschen($('#temps_list').val());}"><span class="spanicon red_hover fontawesome-trash"></span></div>
		</div>
		<div class="cell left top">
			<input type="text" id="template_name" name="template_name" class="input_text" value="Name" onClick="input_click(this,'Name');" onBlur="input_blur(this,'Name');"> | <span class="spanicon typ_selected fontawesome-desktop"></span> <span class="spanicon typ_notselected fontawesome-facetime-video"></span><input type="hidden" id="template_typ" name="template_typ" value="bildschirm">
			<br/>
			<textarea id="template_inhalt" name="template_inhalt" class="textarea_inhalt" onClick="input_click(this,'Quellcode');" onBlur="input_blur(this,'Quellcode');">Quellcode</textarea><br/>
			<input type="text" id="template_ucnext" name="template_ucnext" class="input_text" style="width:400px;" value="Upcoming Next" onClick="input_click(this,'Upcoming Next');">
		</div>
	</div>
</div>
<input type="hidden" name="befehl" class="input_befehl" value="speichern_template">
</form>
<?php $notizen = lade_temp_notizen($screen_design); if($notizen != "") { ?>
<br/>
<center><b>Vordefinierte (Farb-)Tags & Hinweise</b><br/ style="margin-bottom:10px;"><?php echo $notizen;?></center>
<?php } ?>
