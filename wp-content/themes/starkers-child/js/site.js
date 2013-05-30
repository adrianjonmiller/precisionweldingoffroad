jQuery(document).ready(function($) {
	$(window).scroll(function(){
		var scrollTop = $(window).scrollTop(),
		topOffset = $('header').height() - $('nav').height();
		if(topOffset != 80) {
			topOffset = 80;
		}
			if(scrollTop >= topOffset) {
//				$('header').addClass('scroll')
				$('header').css('marginTop', headerMargin());
//				$('nav').css('left', 300);
//				$('header').css('marginTop', -40);
//				$('header h1').css('top', 45);
//				$('header h1 img').css('width', 250);
			} else {
//				$('header').removeClass('scroll');
				$('header').css('marginTop', headerMargin());
//				$('nav').css('left', 0);
//				$('header').css('marginTop', 0);
//				$('header h1').css('top', 0);
//				$('header h1 img').css('width', 350);
			}
			
			function headerMargin() {
				if(scrollTop <= topOffset){
					return -scrollTop
				} else {
					return -topOffset;
				}
			}
	});
	
//	function menuAnimation() {
//		$('nav').animate({
//			left: '300'
//		}, 1000, function() {
//			$('h1').animate({
//				top: 40
//			}, 1000
//			
//			);
//		});
//	}
	
//	$(window).resize(function() {
//		$('.home-body').backgroundPosition();
//	});


$(window).load(function(){
	if($(window).width() > 480) {
		fixedHeight();
	}
});

$(window).resize(function(){
	if($(window).width() > 720) {
		$('.obj_sameHeights').children().outerHeight('auto');
		fixedHeight();
	} else {
		$('.obj_sameHeights').children().outerHeight('auto');
	}
});

function fixedHeight() {
	var px = false;
	
	$('.obj_sameHeights').each(function(){
		var currentTallest = 0;
		$(this).children().each(function(i){
			if ($(this).height() > currentTallest) { currentTallest = $(this).height(); }
		});
	if (!px && Number.prototype.pxToEm) currentTallest = currentTallest.pxToEm(); //use ems unless px is specified
		// for ie6, set height since min-height isn't supported
		if ($.browser.msie && $.browser.version == 6.0) { $(this).children().css({'height': currentTallest}); }
		$(this).children().height(currentTallest); 
	});
}

jQuery( ".select-menu" ).change(function() { 
        window.location = jQuery(this).find("option:selected").val();
    });

$('.flexslider').flexslider({
    animation: "fade"
  });
  
  $('.banner-text h3').fitText(1);
	
});