/* Author:
Dan Holloran http://danholloran.com
http://compressorbot.com
Copyright CompressorBot 2012 and beyond
*/
$(function(){
	var modalLink = $('.modal_link'),
		modalClose = $('.modal_close'),
		modalWindow = $('.modal_wrapper section'),
		winWidth = $(window).width(),
		toolSwitch = $('.tool_switch')
	;

/* ==== Modal Box Control (turn on modal) ==== */
	modalLink.on('click',function(e){
		var that = $(this),
			modalWin = $(that.attr('href')),
			modalWrap = modalWin.parent()
		;
		// Set modal windows top/left location
		modalWindow.css({
			'top': (modalWrap.outerHeight()/2) - (modalWin.outerHeight()/2),
			'left': (modalWrap.outerWidth()/2) - (modalWin.outerWidth()/2)
		});
		// Toggle Modal window on if it is off
		modalWrap.toggle();
		e.preventDefault();
		return false;
	});
/* ==== Modal Box Control (turn off modal) ==== */
	modalClose.on('click',function(e){
		var that = $(this);
			// Toggle modal window off if it is on
			that.parent().parent().toggle();
		e.preventDefault();
		return false;
	});
/* ==== Tool Control (switch to upload)==== */
toolSwitch.on('click', function(e){
	var that = $(this);
	$(that.attr('href')).show();
	console.log($('#'+that.data('tool')).hide());


	e.preventDefault();
	return false;
});
/* ==== Tool Control (switch to insert)==== */
/* ==== Language/Options Control (change options for each language) ==== */
});



