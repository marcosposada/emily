

jQuery(document).ready(function() {
  $('a[href*=#]').each(function() {
		if($(this).attr('href').indexOf("#") == 0) {
			$(this).click(function(e) {
				
			  e.preventDefault();
			  var targetOffset = $($(this).attr('href')).offset().top;
			  $('body').animate({scrollTop: targetOffset-80}, 450);
			});
		}
	});

	var urldomain = document.domain;
	
	if (urldomain == "www.paper-people.com") {
		urldomain = urldomain + '/emily';
	}
	
	var img1 = 'http://' + urldomain + '/wp-content/themes/emily/images/main-bg.jpg';
	$.supersized({
		slides: [{image : img1}],
	});
		
	$('input.wpcf7-submit').attr('name', 'Submit');
	
	$('input').each(function(){
		var name = $(this).attr('name');
		$(this).attr('placeholder', name);		
	});

	$('.wpcf7-textarea').attr('placeholder', 'How can we help?');		

	// Upload section
	
	$('#menu-item-13').hover(
		function() {
			$('#upload').animate({
				top: '80px'
  			}, 250 );
  			
  			$(this).find('a').css('color', '#e82693');
  		}, function() {
		  	$('#upload').mouseleave(function() {
		    	$('#upload').animate({
					top: '-315px'
		  		}, 250 );
		  		$('#menu-item-13').find('a').css('color', '#00adec');
		  	});
  		}
	);
	
	$( "#design" ).click(function() {
		$("a[href='#services']").trigger('click');
  		$( '#services' ).height(1000);
	});
	$( "#documentation" ).click(function() {
		$("a[href='#services']").trigger('click');
  		$( '#services' ).height(1000);
	});
	$( "#management" ).click(function() {
		$("a[href='#services']").trigger('click');
  		$( '#services' ).height(1000);
	});

}); //end document ready

