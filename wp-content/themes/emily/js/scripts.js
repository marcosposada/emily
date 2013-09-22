

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
	
	var img1 = 'http://' + document.domain + '/wp-content/themes/emily/images/main-bg.jpg';
	$.supersized({
		slides 					:  	[			// Slideshow Images
											{image : img1}
									],
	});
	
	$('input.wpcf7-submit').attr('name', 'Submit');
	
	
	$('input').each(function(){
		var name = $(this).attr('name');
		$(this).attr('placeholder', name);		
	});

	
		$('.wpcf7-textarea').attr('placeholder', 'How can we help?');		


}); //end document ready

