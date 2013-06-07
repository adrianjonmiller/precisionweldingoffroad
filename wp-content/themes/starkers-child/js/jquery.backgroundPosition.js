(function( $ ){

  $.fn.backgroundPosition = function( options ) {
  	
	  	this.each(function () {
	  		var offset = $(this).offset().top;
	  		
	  		$("#main").css('backgroundPosition', 'left'+ offset);
	  			  		
	  		return this;
	  	});
  
  
    };
  })( jQuery );
