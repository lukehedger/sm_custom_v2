// Resize teaser boxes (jQuery version)
var defineheight = function (thisboxes) {			
	var content = thisboxes, i = 0, max = 0, thisheight = 0;			
	
	thisboxes.each(function() {
		thisheight = content[i].offsetHeight;
		if (thisheight > max) { max = thisheight; }	
		i++;
		if (i == thisboxes.length) { thisboxes.height(max); }
	});
};		

defineheight($('.excerpt')); // change this back to .stretch if you want the 'view now buttons to sit directly beneath each paragraph

