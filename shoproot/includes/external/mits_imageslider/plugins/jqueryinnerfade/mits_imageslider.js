// Imageslider v2.01 (c)2008-2016 by Hetfield - www.MerZ-IT-SerVice.de
$(document).ready(function(){										
	$('.imageslider').innerFade({
		animationType: 	'fade', 
		animate:		true,
		first_slide: 	0,
		speed: 			1000,
		timeout: 		5000,
		easing: 		'linear',
		startDelay: 	'0',
		loop: 			true,
		type: 			'sequence',	
		containerHeight:'auto',
		runningClass: 	'innerfade',
		children: 		null,	
		cancelLink: 	null,
		pauseLink: 		'.pause',
		prevLink: 		'.prev',
		nextLink: 		'.next',	
		indexContainer: null,	
		currentItemContainer:null,
		totalItemsContainer: null,	
		callback_index_update:null
	});
});