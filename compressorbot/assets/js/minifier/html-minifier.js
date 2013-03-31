var hmInput = $('#hm_input'),
		hmOutput = $('#hm_output'),
		hmStripCommentsCheckbox = $('#hb_strip_comments'),
		ajaxUrl = ajaxObject.ajaxUrl,
		hmOptions = {
			action: 'html_compressor',
			nocomments: 1,
			html: ''
		}
;

/**
* Minify HTML
*/
function minifyHtml() {
	hmOptions.html = hmInput.val();
	$.getJSON( ajaxUrl, hmOptions, function(response){
		hmOutput.val( response.minified );
	});
}


/**
* Minify HTML Checkbox
*/
hmStripCommentsCheckbox.on('change', function(){
	if ( $(this).is(':checked') ) {
		hmOptions.nocomments = 1;
	} else {
		hmOptions.nocomments = 0;
	}
	minifyHtml();
});


/**
* Minify HTML Keyup
*/
hmInput.on('keyup', function(){
	minifyHtml();
});

/**
* Minify HTML Load
*/
// if ( hmOutput.length > 0 ) {
// 	minifyHtml();
// }