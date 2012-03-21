/* Author:
Dan Holloran http://danholloran.com
http://compressorbot.com
Copyright CompressorBot 2012 and beyond
*/
$(function(){
	var modalLink = $('.modal_link'),
		modalClose = $('.modal_close'),
		modalWindow = $('.modal_wrapper section'),
		winWidth = $(document).width(),
		toolSwitch = $('.tool_switch'),
		languageChoice = $('.language_choice'),
		htmlOptions = $('.html_options'),
		cssOptions = $('.css_options'),
		jsOptions = $('.js_options'),
		toolBtn = $('.tool_btn'),
		languageOptions = $('.languages_options')
	;

/* ==== Modal Box Control (turn on modal) ==== */
	modalLink.on('click',function(e){
		var that = $(this),
			modalWin = $(that.attr('href')),
			modalWrap = modalWin.parent()
		;
		modalWrap.css({
			'height': $(document).outerHeight()
		});
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
/* ==== Tool Control (switch to upload/insert)==== */
toolSwitch.on('click', function(e){
	var that = $(this);
	// Show compress/decompress depending on what is already showing
	$(that.attr('href')).show();
	$('#'+that.data('tool')).hide();
	e.preventDefault();
	return false;
});
/* ==== Language/Options Control (change options for each language) ==== */
	// Set what ever language is selected on page load to tool button
	(function(){
		var start = languageOptions.find('input[type=radio]:checked'),
			selected = start.data('lang')
		;
		if(selected === "js"){
			selected = "Javascript";
		}else{
			selected = selected.toUpperCase();
		}
		// For placeholder link
		toolBtn.empty();
		if($('.decompress_btn').length !== 0){
			toolBtn.append('Decompress ' + selected);
		}else{
			toolBtn.append('Compress ' + selected);
		}
		// Use for submit button
		//toolBtn.val('Compress ' + selected);
	})();
	languageChoice.on('click', function(e){
		var that = $(this),
			langSelected = that.data('lang')
		;
		htmlOptions.hide();
		cssOptions.hide();
		jsOptions.hide();
		$('.' + that.val()).show();
		$('.' + langSelected).prop('checked',true);
		if(langSelected === "js"){
			langSelected = "Javascript";
		}else{
			langSelected = langSelected.toUpperCase();
		}
		// For placeholder link
		toolBtn.empty();
		if(toolBtn.find('.decompress_btn').length !== 0){
			toolBtn.append('Decompress ' + langSelected);
		}else{
			toolBtn.append('Compress ' + langSelected);
		}
		// Use for submit button
		//toolBtn.val('Compress ' + langSelected);
	});

});
