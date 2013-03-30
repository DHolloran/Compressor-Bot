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
minifyCss();