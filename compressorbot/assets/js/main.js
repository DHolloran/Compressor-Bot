/* Author:
Dan Holloran @dholloran
*/
// @codekit-prepend "vendor/cssbeautify.js"
// @codekit-prepend "vendor/jsbeautify.js"
// @codekit-prepend "vendor/htmlbeautify.js"
// @codekit-prepend "plugins.js"
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
		// @codekit-prepend "beautfier/beautifier.js"
		// @codekit-prepend "beautfier/html-beautifier.js"
		// @codekit-prepend "beautfier/css-beautifier.js"
		// @codekit-prepend "beautfier/js-beautifier.js"
		// @codekit-prepend "compressor/compressor.js"
		// @codekit-prepend "compressor/css-compressor.js"
		// @codekit-prepend "compressor/js-compressor.js"
		// @codekit-prepend "compressor/html-compressor.js"
		// @codekit-prepend "scripts.js"
	}); // $(window).ready(
}(jQuery));


