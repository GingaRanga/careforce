$(document).ready(function(){
	
	//SLICK CAROUSEL 1
	
	$('.hero').slick({
		dots: false,
		slidesToShow: 1,
		adaptiveHeight: true,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 3500,
		infinite: true,
		fade: true,
		cssEase: 'linear'
  	});
	
	//GSAP
	var applyBar 		= $('.apply'),
		navBar			= $('.hero-text'),
		socialCard		= $('.hero-social'),
		tl				= new TimelineLite();
	
	// you can also use pure JavaScript instead of jQuery such as
	// or var applyBar = document.getElementById('.apply');
	
	// you can use fromto method as long as you set a starting and ending value or set method to just set a CSS property
	// set does not require a duration
	
	/*
	TweenLite.from(navBar, 3, {autoAlpha: 0}); // in order. element in quotes, duration, and values in curly braces
	// autoAlpha starts at 0 opacity and visibility of none
	TweenLite.from(applyBar, 1, {autoAlpha: 0, y: 50, delay: 2}); // moves .apply from opacity zero and y offset 50px
	// setting delay to the duration of first tween allows the animation to happen in sequence
	TweenLite.from(socialCard, 1, {ease: Power3.easeOut, y: -500, delay: 5});
	*/
	
	tl
		.from(navBar, 2, {autoAlpha: 0})
		.from(applyBar, 1, {autoAlpha: 0, y: 50}, '-=0.30') /* use scrollmagic for this eventually. The -=15 is starting the tween 0.15 seconds earlier than the original start of tween so it overlaps by that amount. */
		.from(socialCard, 1, {ease: Power3.easeOut, y: -700, delay: 1}); /* added delay in timeline bc on another slide */
		// You can make a delay in timeline by adding '+=' instead of '-=' and are both relative positioning
		// absolute positioning can be added simply by adding , then timeframe in seconds instead of quotes and a +=
	
	//SLICK CAROUSEL 2

	$('.quick').slick({
		dots: true,
		arrows: false,
		slidesToShow: 4,
		adaptiveHeight: true,
		slidesToScroll: 4,
		autoplay: true,
		autoplaySpeed: 4000,
		infinite: true,
		responsive: [
    	{
      		breakpoint: 1024,
      		settings: {
        		slidesToShow: 3,
        		slidesToScroll: 3,
        		infinite: true,
        		dots: true
      		}
    	},
    	{
      		breakpoint: 600,
      		settings: {
        		slidesToShow: 1,
        		slidesToScroll: 1
      		}
    	},
    	{
      		breakpoint: 480,
      		settings: {
        		slidesToShow: 1,
        		slidesToScroll: 1
      		}
    	}
		// You can unslick at a given breakpoint now by adding:
		// settings: "unslick"
		// instead of a settings object
  		]
  	});
	
});