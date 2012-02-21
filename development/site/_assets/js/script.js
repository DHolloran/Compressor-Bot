/* Author:
Dan Holloran http://danholloran.com
http://compressorbot.com
Copyright CompressorBot 2012 and beyond
*/
$(function(){
	var modalLink = $('.modal_link'),
		modalClose = $('.modal_close'),
		modalWindow = $('.modal_wrapper section'),
		winWidth = $(window).width()
	;

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
		// Toggle Modal window on/off
		modalWrap.toggle();
		e.preventDefault();
		return false;
	});

	modalClose.on('click',function(e){
		var that = $(this);
			that.parent().parent().toggle();
		e.preventDefault();
		return false;
	});
});



