/* Author:
Dan Holloran @dholloran
*/
// @codekit-prepend "vendor/cssbeautify.js"
// @codekit-prepend "vendor/jsbeautify.js"
// @codekit-prepend "vendor/plugin.js"
jQuery(function($){
	$(window).ready(function(){

		var jbEditor = CodeMirror.fromTextArea(document.getElementById("jb_input"), {
				lineNumbers: true,
				matchBrackets: false,
				lineWrapping: true,
				tabSize: 4
		});
		/**
		* Options Advanced Link
		*/
		$('.options-advanced-link').on('click', function(e){
			var that = $(this),
					optionsAdvancedElem = $(that.attr('href'));
					if ( optionsAdvancedElem.hasClass('hide') ) {
						optionsAdvancedElem.removeClass('hide');
						that.text('Hide Advanced Options');
					} else {
						optionsAdvancedElem.addClass('hide');
						that.text('Show Advanced Options');
					}
			e.preventDefault();
		});
		// @codekit-prepend "vendor/codemirror/codemirror.js"
		// @codekit-prepend "vendor/codemirror/method-css.js"
		// @codekit-prepend "vendor/codemirror/method-javascript.js"
		var codeMirrorOptions = {
			lineNumbers: true,
			matchBrackets: false,
			lineWrapping: true,
			tabSize: 4
		};
		// jbInput = CodeMirror.fromTextArea(document.getElementById("jb_input"), codeMirrorOptions);
		// jbOutput = CodeMirror.fromTextArea(document.getElementById("jb_output"), codeMirrorOptions);
		// cbInput = CodeMirror.fromTextArea(document.getElementById("cd_input"), codeMirrorOptions);
		// cbOutput = CodeMirror.fromTextArea(document.getElementById("cd_output"), codeMirrorOptions);
		// @codekit-prepend "beautifier.js"
		// @codekit-prepend "css-beautifier.js"
		// @codekit-prepend "js-beautifier.js"
		// @codekit-prepend "css-compressor.js"
		// @codekit-prepend "js-compressor.js"
		// @codekit-prepend "scripts.js"
	}); // $(window).ready(
}(jQuery));


