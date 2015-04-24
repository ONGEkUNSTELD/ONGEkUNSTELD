/* Moving Shadow */


	var header = $(".clearHeader");
	$(window).scroll(function() {    
		var scroll = $(window).scrollTop();
		
		if (scroll >= 80) {
			header.removeClass('clearHeader').addClass('headershadow');
			} else {
			header.removeClass('headershadow').addClass('clearHeader');
		}
<<<<<<< HEAD
<<<<<<< HEAD
	});
=======
	});
>>>>>>> parent of fbba68b... Heb een test gedaan
=======
	});

/* TEST */
>>>>>>> parent of 99e4c9e... Test 2
