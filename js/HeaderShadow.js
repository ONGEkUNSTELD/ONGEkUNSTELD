$j=jQuery.noConflict();

$j(window).scroll(function() {    
    var scroll = $j(window).scrollTop();

    if (scroll >= 50) {
        $j(".clearHeader").addClass("headershadow");
    } else {
        $j(".clearHeader").removeClass("headershadow");
    }
});