/* Moving Shadow */


	var header = $(".clearHeader");
	$(window).scroll(function() {    
		var scroll = $(window).scrollTop();
		
		if (scroll >= 80) {
			header.removeClass('clearHeader').addClass('headershadow');
			} else {
			header.removeClass('headershadow').addClass('clearHeader');
		}
	});
