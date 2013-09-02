
$(document).ready(function() {
	$('.bbq-container').fadeIn(800);
	$('.product').each(function(){
		$(this).click(function(){
			$link = $(this).find('a').attr('href');
			$attr = $(this).find('a').attr('target');
			if ($attr == '_blank'){
				window.open($link);
			}else{
				window.location = $link;	
			}
			
		});
	});
	
	if ($(".product-gallery")) {
		$('.product-thumbnails').flexslider({
			animation: "slide",
		    controlNav: false,
		    animationLoop: false,
		    slideshow: false,
		    itemWidth: 80,
		    itemMargin: 5,
		    directionNav: false,
			asNavFor: '.product-gallery',
			controlNav: false
		});
		$('.product-gallery').flexslider({
			slideshow: false,
			animation: 'slide',
			directionNav: false,
			sync: '.product-thumbnails',
			controlNav: false
		});
	}


	$('.product-gallery, .featured-image').each(function(){
		$(this).hover(
		  function () {
		    $('.zoom').fadeIn("fast");
		  },
		  function () {
		    $('.zoom').fadeOut("fast");
		  });
	});

}); //end document ready

