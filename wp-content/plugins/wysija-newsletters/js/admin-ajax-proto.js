function WYSIJA_AJAX_POST(b,a){$("wysija_notice_msg").update(Wysija_i18n.savingnl);$("ajax-loading").show();$("wysija_notices").show();$("wysija_notice_msg").show();$("wysija_notices").setAttribute("class","notice");wysijaAJAX._wpnonce=$("wysijax").readAttribute("value");$("wysija_notices").writeAttribute("class","notice").setStyle({opacity:1});new Ajax.Request(wysijaAJAX.ajaxurl,{method:"post",parameters:wysijaAJAX,onSuccess:function(c){$("wysija_notices").writeAttribute("class","notice");var d=Wysija_i18n.savednl;if(b!=undefined){b(c)}if("msgs" in c.responseJSON){if("error" in c.responseJSON.msgs){$("wysija_notices").writeAttribute("class","error");d=c.responseJSON.msgs.error}}if("msgs" in c.responseJSON){if("updated" in c.responseJSON.msgs){d=c.responseJSON.msgs.updated}}$("wysija_notice_msg").update(d);$("ajax-loading").hide();new Effect.Fade($("wysija_notices"),{duration:1,from:1,to:0});ajaxOver=true},onFailure:function(c){$("wysija_notices").setAttribute("class","error");if(a!=undefined){a(c)}$("ajax-loading").hide();$("wysija_notices").hide();$("wysija_notice_msg").update(Wysija_i18n.errorsavingnl);ajaxOver=true}})};