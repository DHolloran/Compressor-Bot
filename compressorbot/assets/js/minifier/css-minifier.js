/**
* Minify CSS
*/
var cmInput = $('#cm_input'),
		cmOutput = $('#cm_output')
;
function minifyCss() {
	var minifiedCss = YAHOO.compressor.cssmin(cmInput.val());
	cmOutput.val( minifiedCss );
}

/**
* Minify CSS Keyup
*/
cmInput.on('keyup', function(){
	minifyCss();
});

/**
* Minify CSS Load
*/
if ( cmOutput.length > 0 ) {
	minifyCss();
}