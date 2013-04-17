jQuery(document).ready(function($) {
	$(window).scroll(function(){
		var scrollTop = $(window).scrollTop(),
		topOffset = $('header').height() - $('nav').height();
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

$('.flexslider').flexslider({
    animation: "fade"
  });
	
});