jQuery(document).ready(function($) {
	
	// fancybox load
	$("a[href$='.jpg'],a[href$='.png'],a[href$='.gif']").attr('rel', 'gallery').fancybox({
		'autoPlay'		:	'true',
		'playSpeed'		:	'2000',
		'openEffect'	:	'elastic',
		'closeEffect'	:	'elastic',
		'nextEffect'	:	'fade',
		'prevEffect'	:	'fade',
		'openSpeed'		:	400, 
		'closeSpeed'	:	200, 
		'nextSpeed'		:	600, 
		'prevSpeed'		:	600, 
		'overlayShow'	:	false
	});
});