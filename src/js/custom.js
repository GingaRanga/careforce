$(document).ready(function(){
	
	//SLICK CAROUSEL 1
	
	$('.hero').slick({
		dots: false,
		slidesToShow: 1,
		adaptiveHeight: true,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 4000,
		infinite: true,
		fade: true,
		cssEase: 'linear'
  	});
	
	//GSAP
	var applyBar 	= $('.apply');
	var navBar		= $('.hero-text');
	
	// you can also use pure JavaScript instead of jQuery such as
	// or var applyBar = document.getElementById('.apply');
	
	// you can use fromto method as long as you set a starting and ending value or set method to just set a CSS property
	// set does not require a duration
	
	TweenLite.from('.hero-text', 2, {autoAlpha: 0}); // in order. element in quotes, duration, and values in curly braces
	// autoAlpha starts at 0 opacity and visibility of none
	TweenLite.from('.apply', 1, {opacity: 0, y: 50, delay: 2}); // moves .apply from opacity zero and y offset 50px
	// setting delay to the duration of first tween allows the animation to happen in sequence
	
	//SLICK CAROUSEL 2

	$('.quick').slick({
		dots: true,
		arrows: false,
		slidesToShow: 4,
		adaptiveHeight: true,
		slidesToScroll: 4,
		autoplay: true,
		autoplaySpeed: 4000,
		infinite: true
  	});
	
});