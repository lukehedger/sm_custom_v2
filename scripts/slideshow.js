/*
	S3: Super Simple Slideshow (jQuery)
	version 0.9
	Copyright (c) 2012 Inmo Ltd.
	Available for use in all personal or commercial projects under both MIT and GPL licenses	
	
	- Make sure to include 'jquery.easing.js' if you want to use any non standard easing functions.
*/

// Options
var settings = { 
	autoSlide: true,
	autoSlideInterval: 8000,
	panelClass: '.slide_panel',
	panelWidth: 1180,
	slideEaseDuration: 1000, 
	slideEaseFunction: 'easeInOutExpo',
	wrapperId: '#slide_wrapper'
};

// Set values
var panelCount = $(settings.panelClass).size();
var sliderCount = 1;
var navClicks = 0;
var offset = 0;


// Left Arrow Click
function slideArrowLeft(){
	navClicks++;
	if (sliderCount == 1) {
		offset = - (settings.panelWidth*(panelCount - 1));
		sliderCount = panelCount;
	} else {
		sliderCount -= 1;
		offset = - (settings.panelWidth*(sliderCount - 1));
	};
	$(settings.wrapperId).animate({ marginLeft: offset }, settings.slideEaseDuration, settings.slideEaseFunction);
	 
};

// Right Arrow Click
function slideArrowRight(){
	navClicks++;
	if (sliderCount == panelCount) {
		offset = 0;
		sliderCount = 1;
	} else {
		offset = - (settings.panelWidth*sliderCount);
		sliderCount += 1;
	};
	$(settings.wrapperId).animate({ marginLeft: offset }, settings.slideEaseDuration, settings.slideEaseFunction);
};


// Auto Slide
function autoSlide() {
	if (navClicks == 0 && settings.autoSlide == true) {
		if (sliderCount == panelCount) {
			offset = 0;
			sliderCount = 1;
		} else {
			offset = - (settings.panelWidth*sliderCount);
			sliderCount += 1;
		};
		// Slide:
		$(settings.wrapperId).animate({ marginLeft: offset }, settings.slideEaseDuration, settings.slideEaseFunction);
		setTimeout("autoSlide()",settings.autoSlideInterval);
	};
};		
// Initial Auto Slide Trigger	
$(document).ready(setTimeout("autoSlide()",settings.autoSlideInterval));