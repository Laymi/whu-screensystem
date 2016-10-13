	function input_click(obj,default_val) {
		if($(obj).val() == default_val) {
			$(obj).select();
			$(obj).val('').css('color','#4D4D4D');
		}
	}
	
	var reloadActive = true;
	function uebersicht_laden() {
		if(reloadActive) {
			$.get("scr/server_communication.php?befehl=tabelle_laden",function(data) {
				$('.table-uebersicht').html(''+data.tabelle+'');
				$('.letzte_akt').html('<span class="spanicon cursor reloadActivebutton fontawesome-refresh"></span> - <i>'+data.time+'</i>');
			},"json");
		}
	}
	
	function input_blur(obj,default_val) {
		if($(obj).val() == '' || $(obj).val() == default_val) {
			$(obj).val(default_val).css('color','#C1C1C1');
		}
	}
	
	function temp_laden(temp_id) {
		$.get('scr/server_communication.php?befehl=temp_laden&temp_id='+temp_id,function(data) {
		if(data.name != 'false') {
			$('#template_name').css('color','#4D4D4D').attr('value',data.name);
			$('#template_id').text(data.id);
			$('#template_typ').val(data.typ);
			if(data.typ == 'bildschirm') {
				$('.fontawesome-desktop').addClass('typ_selected').removeClass('typ_notselected');
				$('.fontawesome-facetime-video').removeClass('typ_selected').addClass('typ_notselected');
			} else {
				$('.fontawesome-facetime-video').addClass('typ_selected').removeClass('typ_notselected');
				$('.fontawesome-desktop').removeClass('typ_selected').addClass('typ_notselected');
			}
			$('#template_inhalt').css('color','#4D4D4D').val(data.inhalt);
			$('#template_ucnext').css('color','#4D4D4D').val(data.ucnext);
		} else {
			$('#template_name').css('color','#C1C1C1').attr('value','Name');
			$('#template_id').text(data.id);
			$('#template_typ').val('bildschirm');
			$('.fontawesome-desktop').addClass('typ_selected').removeClass('typ_notselected');
			$('.fontawesome-facetime-video').removeClass('typ_selected').addClass('typ_notselected');
			$('#template_inhalt').css('color','#C1C1C1').val('Quellcode');
			$('#template_ucnext').css('color','#C1C1C1').val('Upcoming Next');
		}
		},"json");
	}
	
	function temp_loeschen(temp_id) {
		$.get('scr/server_communication.php?befehl=temp_loeschen&temp_id='+temp_id,function(data) {
		if(data.response == 'positive') {
			window.location.href='?p=template&m=teg';
		}
		},"json");	
	}
	
    function pasteIntoInput(el, text) {
        el.focus();
        var val = el.value;
        if (typeof el.selectionStart == "number") {
            var selStart = el.selectionStart;
            el.value = val.slice(0, selStart) + text + val.slice(el.selectionEnd);
            el.selectionEnd = el.selectionStart = selStart + text.length;
        } else if (typeof document.selection != "undefined") {
            var textRange = document.selection.createRange();
            textRange.text = text;
            textRange.collapse(false);
            textRange.select();
        }
    }

    function allowTabChar(el) {
        $(el).keydown(function(e) {
            if (e.which == 9) {
                pasteIntoInput(this, "\t");
                return false;
            }
        });

        // For Opera, which only allows suppression of keypress events, not keydown
        $(el).keypress(function(e) {
            if (e.which == 9) {
                return false;
            }
        });
    }

    $.fn.allowTabChar = function() {
        if (this.jquery) {
            this.each(function() {
                if (this.nodeType == 1) {
                    var nodeName = this.nodeName.toLowerCase();
                    if (nodeName == "textarea" || (nodeName == "input" && this.type == "text")) {
                        allowTabChar(this);
                    }
                }
            })
        }
        return this;
    }


$(function() {
    $("#template_inhalt").allowTabChar();
})