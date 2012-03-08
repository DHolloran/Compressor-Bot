			/* Author:
Dan Holloran http://danholloran.com
http://compressorbot.com
Copyright CompressorBot 2012 and beyond
*/
$(function(){
	var modalLink = $('.modal_link'),
		modalClose = $('.modal_close'),
		modalWrapper = $('.modal_wrapper'),
		modalWindow = modalWrapper.find('section'),
		winWidth = $(document).width(),
		toolSwitch = $('.tool_switch'),
		languageChoice = $('.language_choice'),
		htmlOptions = $('.html_options'),
		cssOptions = $('.css_options'),
		jsOptions = $('.js_options'),
		toolBtn = $('.tool_btn'),
		languageOptions = $('.languages_options'),
		inputText = $('input[type=text]'),
		inputEmail = $('input[type=email]'),
		textArea = $('textarea'),
		contactUs = $('#contact_modal'),
		contactSubject = contactUs.find('select'),
		contactForm = $('#contact_form'),
		contactSubmitBtn = contactForm.find('button'),
		pass1 = $('.pass1'),
		pass2 = $('.pass2'),
		editModal = $('#edit_modal'),
		root = 'http://localhost/~dholloran/compressorbot/development/site/'
	;
// ==== Modal Output For AJAX Success ====
	function modalOutput(height,data,modal){
		var msg,
			origHeight = height,
			output = $('.output')
		;
		// Check if profile was updated
		if($.parseJSON(data) === 'true'){
			// Set and append message
			msg = 'Success!';
			output.empty().append(msg);
			// Add space for msg
			modal.css({height: height+=20});
			// Setup timer to close window/cleanup
			setTimeout(function(){
				modal.parent().fadeOut(300,function(){
					// reset css and html
					modal.css({height: origHeight});
					output.empty();
				});
			},2000);
		}else{
			msg = 'Please try again.';
			output.empty().append(msg);
			modal.css({height: height+=20});
		}
	}
// ==== Modal Box Control (turn on modal) ====
	modalLink.on('click',function(e){
		var that = $(this),
			modalWin = $(that.attr('href')),
			modalWrap = modalWin.parent()
		;
		modalWrap.css({
			'height': $(document).outerHeight(),
			'width': $(document).outerWidth()
		});
		// Set modal windows top/left location
		modalWindow.css({
			'top': (modalWrap.outerHeight()/2) - (modalWin.outerHeight()/2),
			'left': (modalWrap.outerWidth()/2) - (modalWin.outerWidth()/2)
		});
		// Toggle Modal window on if it is off
		modalWrap.fadeIn(300);
		e.preventDefault();
		return false;
	});
// ==== Modal Box Control (turn off modal) ====
		modalClose.on('click',function(e){
			var that = $(this);
			// Toggle modal window off
			modalWrapper.fadeOut(300);
			// Clear success field
			modalWrapper.find('.success').empty();
			modalWrapper.find('.output').empty();
			e.preventDefault();
			return false;
		});
//==== Tool Control (switch to upload/insert)==== */
	toolSwitch.on('click', function(e){
		var that = $(this);
		// Show compress/decompress depending on what is already showing
		$(that.attr('href')).fadeIn(300);
		$('#'+that.data('tool')).fadeOut(300);
		e.preventDefault();
		return false;
	});
// ==== Language/Options Control (change options for each language) ====
	// Set what ever language is selected on page load to tool button
	(function(){
		if(languageOptions.length !== 0){
			var start = languageOptions.find('input[type=radio]:checked'),
				selected = start.data('lang')
			;
			if(selected === "js"){
			selected = "Javascript";
			}else{
				selected = selected.toUpperCase();
			}
			// Use for submit button
			if(toolBtn.data('page') === 'decompress'){
				toolBtn.val('Decompress ' + selected);
			}else{
				toolBtn.val('Compress ' + selected);
			}
		}

	})();
	languageChoice.on('click', function(e){
		var that = $(this),
			selected = that.data('lang')
		;
		htmlOptions.hide();
		cssOptions.hide();
		jsOptions.hide();
		$('.' + that.val()).fadeIn(300);
		$('.' + selected).prop('checked',true);
		if(selected === "js"){
			selected = "Javascript";
		}else{
			selected = selected.toUpperCase();
		}
		// Use for submit button
		if(toolBtn.data('page') === 'decompress'){
			toolBtn.val('Decompress ' + selected);
		}else{
			toolBtn.val('Compress ' + selected);
		}
	});
// ==== Contact Us Bug Report Subject ====
	contactSubject.on('change', function(e){
		var that = $(this),
			msg = contactUs.find('hgroup h3')
		;
		if(that.val() === 'bug_submit'){
			msg.empty().append('We will get working on this right away');
		}else{
			msg.empty().append('Someone will contact you within 24 hours.');
		}
	});
// ==== Contact Form Send Mail ====
	contactForm.on('submit',function(e){
		var that = $(this),
			height = that.parent().outerHeight()
		;
		contactUs.find('.success').empty();
		$.post(root+'/_assets/includes/helpers/sendmail.php',that.serialize(),function(data){
			modalOutput(height,data,contactUs);
		});
		e.preventDefault();
	});

	//
// ==== Make sure passwords match for Register/Edit===
	pass2.on('change',function(e){
		var that = $(this),
			match = that.siblings('.pass1').val(),
			error = that.siblings('.error_field').hide()
		;
		if(match !== that.val()){
			error.empty().append('Passwords do not match').show();
		}
	});
// ==== Submit Edit Modal AJAX ====
	editModal.find('form').on('submit', function(e){
		var that = $(this),
			height = editModal.outerHeight()
		;
		$.post(root+'/_assets/includes/controller/EditProfile.php',that.serialize(),function(data){
			modalOutput(height,data,editModal);
		});
		e.preventDefault();
	});
// ==== H5Video Plugin ====
	$("#video_player").H5Video({
		events : {
			pause : function(){},
            play : function(){},
            end : function(){}
		},
		animationDuration : 350,
		source : {
			"video/ogg"  : root+"/_assets/media/video/compressorbot_placeholder_video.theora.ogv",
			"video/mp4"  : root+"/_assets/media/video/compressorbot_placeholder_video.mp4",
			"video/webm" : root+"/_assets/media/video/compressorbot_placeholder_video.webm"
		},
		loop : false,
		preload: true,
		autoPlay : false,
		poster : root+"/_assets/img/home/poster.png",
		supportMessage : "This browser cannot playback HTML5 videos. We encourage you to upgrade your internet browser to one of the following modern browsers:"
	});
});
