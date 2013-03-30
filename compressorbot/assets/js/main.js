/* Author:
Dan Holloran @dholloran
*/
// @codekit-prepend "vendor/cssbeautify.js"
// @codekit-prepend "vendor/jsbeautify.js"
// @codekit-prepend "vendor/htmlbeautify.js"
// @codekit-prepend "vendor/plugin.js"
jQuery(function($){
	$(window).ready(function(){
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
		// @codekit-prepend "beautifier.js"
		// @codekit-prepend "html-beautifier.js"
		// @codekit-prepend "css-beautifier.js"
		// @codekit-prepend "js-beautifier.js"
		// @codekit-prepend "css-compressor.js"
		// @codekit-prepend "js-compressor.js"
		// @codekit-prepend "scripts.js"
	}); // $(window).ready(
}(jQuery));


