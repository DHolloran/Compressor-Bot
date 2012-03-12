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
		login = $('#login_form'),
		videoPlayer = $("#video_player"),
		compressForm = $('#compress_insert'),
		compressModal = $('#compress_modal'),
		compressUpload = $('#compress_upload'),
		decompressForm = $('#decompress_insert'),
		decompressModal = $('#decompress_modal'),
		root,
		registerModal = $('#register_modal'),
		registerForm = registerModal.find('form')
	;
// ==== Set ROOT to Development/Live ===
	if(document.location.hostname === "localhost"){
		root = 'http://localhost/~dholloran/compressorbot/development/site/';
	}else{
		root = 'http://compressorbot.com/development/site';
	}
// ==== Modal Output For AJAX Success ====
	function modalOutput(height,data,modal){
		var msg,
			origHeight = height,
			output = $('.output')
		;
		// Check if profile was updated
		if($.parseJSON(data)){
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
			// Error
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
		// Set Wrapper to Document Size
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
			// Set Succes Output
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
		// Close all options
		htmlOptions.hide();
		cssOptions.hide();
		jsOptions.hide();
		// Open selected option
		$('.' + that.data('lang')+'_options').fadeIn(300);
		// Make all selected options marked
		$('.' + selected).prop('checked',true);
		// Set language text value for button
		if(selected === "js"){
			selected = "Javascript";
		}else{
			selected = selected.toUpperCase();
		}
		// Set button text
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
			height = that.parent().outerHeight(),
			error = contactUs.find('.error_field')
		;
		contactUs.find('.success').empty();
		error.hide();
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
			var post = that.serialize(),
				response = $.parseJSON(data)
			;
			console.log(data);
			if(response === 'basic'){
				modalOutput(height,data,editModal);
			}else if(response === 'monthly' || response === 'yearly'){
				window.location = 'https://www.paypal.com/cgi-bin/webscr?'+post;
			}
		});
		e.preventDefault();
	});
// ==== Submit Register Modal AJAX ====
	registerForm.on('submit', function(e){
		var that = $(this);
		$.post(root+'/_assets/includes/controller/Register.php',
			that.serialize(),
			function(data){
				var post = that.serialize(),
					response = $.parseJSON(data)
				;
				if(response === 'basic'){
					window.location = root;
				}else if(response === 'paypal'){
					window.location = 'https://www.paypal.com/cgi-bin/webscr?'+post;
					/*https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=V9GVS7ACWNXN2&on0=&os0=Yearly&currency_code=USD*/
				}
			});
		e.preventDefault();
	});
// ==== Submit Paypal AJAX ====
// ==== Login AJAX ====
	login.on('submit', function(e){
		var that = $(this),
			error = login.find('.error_field')
		;
		error.hide();
		$.post(root+'/_assets/includes/helpers/login.php',that.serialize(),function(data){
				if($.parseJSON(data)){
					error.hide();
					window.location = $.parseJSON(data)[1];
				}else{
					error.show();
				}
			}
		);
		e.preventDefault();
	});
// ==== H5Video Plugin ====
	if(videoPlayer.length !== 0){
		videoPlayer.H5Video({
			events : {
				pause:function(){},
				play:function(){},
				end:function(){}
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
	}
// ==== Validator ====
	function queryValidator(){
		// Query The Validator
		$.getJSON('sandbox2.php',function(data){
			var response = $.parseJSON(data.messages);
		});
	}
// ==== Prefix With CSS-Crush ====
	function prefixCSS(that){
		$.post('../_assets/includes/helpers/prefixer.php',
			that.serialize(),
			function(data){
				console.log(data);
			});
	}
// ==== Submit Compress AJAX ====
	compressForm.on('submit', function(e){
		var that = $(this),
			modalWrap = compressModal.parent()
		;
		// Query Validator (HTML & CSS)
		if(that.find('.css_validate:checked').length !== 0 || that.find('.html_validate:checked').length !== 0){
			console.log('validator');
		}
		// CSSLint (CSS)
		if(that.find('.css_lint:checked').length !== 0){
			// $input = cssLint(that);
			console.log('csslint');
		}
		// JSLint (JS)
		if(that.find('.js_lint:checked').length !== 0){
			// $input = cssLint(that);
			console.log('jslint');
		}

		// Send to compress.php
		$.post('../_assets/includes/helpers/compress.php',that.serialize(),function(data){
			// Set compressor modal wrapper width/height
			modalWrap.css({
			'height': $(document).outerHeight(),
			'width': $(document).outerWidth()
			});
			// Set modal windows top/left location
			modalWindow.css({
			'top': (modalWrap.outerHeight()/2) - (compressModal.outerHeight()/2),
			'left': (modalWrap.outerWidth()/2) - (compressModal.outerWidth()/2)
			});
			// Set textarea to returned value
			compressModal.find('textarea').val($.parseJSON(data));
			compressModal.parent().fadeIn(300);

		});
		e.preventDefault();
	});
// ==== Submit Decompress Ajax ====
	decompressForm.on('submit', function(e){
		var that = $(this),
			modalWrap = decompressModal.parent()
		;
		// Query Validator (HTML & CSS)
		// CSSLint (CSS)
		// JSLint (JS)
		// Preifxer (CSS)
		// Send to decompress.php
		$.post('../_assets/includes/helpers/decompress.php', that.serialize(), function(data){
			// Set decompressor modal wrapper width/height
			modalWrap.css({
				'height': $(document).outerHeight(),
				'width': $(document).outerWidth()
			});

			// Set modal windows top/left location
			modalWindow.css({
				'top': (modalWrap.outerHeight()/2) - (decompressModal.outerHeight()/2),
				'left': (modalWrap.outerWidth()/2) - (decompressModal.outerWidth()/2)
			});
			// Set textarea to returned value
			var response = $.parseJSON(data);
			if(response.value){
			decompressModal.find('textarea').val(response.value);
			}else{
			decompressModal.find('textarea').val(response);
			}
			decompressModal.parent().fadeIn(300);
		});
		e.preventDefault();
	});
// ==== Submit Upload AJAX ====
	compressUpload.on('change',function(e){
		var that  = $(this),
			uploadTable = $('#table_wrapper').find('table tbody')
		;
		uploadTable.empty();
		$.each(e.target.files, function(index, value){

			// Set file size in b/kb/mb/gb

			var fileSize=0;

			if(value.fileSize < 1024){
				// Add b for Bytes
				fileSize = fileSize +'b';
			}else if(value.fileSize >= 1024 && value.fileSize <= 1048576){
				// Make bytes equal kilobytes
				fileSize = (value.fileSize/1024);

				// Round to 2 places
				fileSize = Math.round(fileSize*100)/100;

				// Append kilobyte abbreviation
				fileSize = fileSize + "kb";

			}else if(value.fileSize >= 1048576 && value.fileSize <= 10485760){

				// Make bytes equal kilobytes
				fileSize = (value.fileSize/1048576);

				// Round to 2 places
				fileSize = Math.round(fileSize*100)/100;

				// Append kilobyte abbreviation
				fileSize = fileSize + "mb";
			}

			// Set file type as js/css/html/unknown
			var fileType = value.type;
			switch(fileType){
				case 'application/x-javascript':
					fileType = 'js';
					break;
				case 'text/css':
					fileType = 'css';
					break;
				case 'text/html':
					fileType = 'html';
					break;
				default:
					fileType ="?";
				break;
			}

			// Set The Values For Each Row
			uploadTable.append(
				'<tr><td>'+ value.fileName +'</td><td>'+ fileSize+'</td><td>' + fileType +'</td></tr>'
			);
		});
	});
});
