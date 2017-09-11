$(document).ready(function(){
	
	$(".owl-carousel").owlCarousel({
		animateOut: 'slideOutLeft',
		items:1,
		loop:true,
		autoplay:true,
		nav:true,
		dots:false,
		autoplayHoverPause:true,
		autoplayTimeout:5000
	});
	
	$(window).scroll(function() {
  		if ($(document).scrollTop() > 50) {
    		$('top-nav').addClass('hidden');
  		} else {
    		$('top-nav').removeClass('hidden');
  		}
	});
	
});