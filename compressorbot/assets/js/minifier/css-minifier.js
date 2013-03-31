/**
* Minify CSS
*/
var cmInput = $('#cm_input'),
		cmOutput = $('#cm_output'),
		cmOptions = {
			csslint: true
		},
		cmCssLint = $('#cm_csslint'),
		cmCssLintErrors = $('#cm_csslint_errors'),
		cmCssLintErrorsTextArea = cmCssLintErrors.find('textarea')
;

/**
* CSS Lint
*/
function lintMinifiedCss(minifiedCss) {
	if ( !cmOptions.csslint || minifiedCss.length === 0 ) {
		cmCssLintErrorsTextArea.val('');
		return false;
	}

	var lintedCss = CSSLint.verify( minifiedCss );
	if ( lintedCss.messages.length > 0) {
		var errorMessage = '';
		$.each(lintedCss.messages, function(){
			var obj = $(this),
					that = obj[0],
					type = that.type.toString().trim().toUpperCase() + ' ',
					column = 'col ' + that.col.toString().trim() + ' ',
					line = 'line ' + that.line.toString().trim() + ' ',
					evidence =  that.evidence.toString().trim() + ' ',
					message = that.message.toString().trim()
			;
			errorMessage = errorMessage + type + column + line + evidence + message + "\n";
		});
		cmCssLintErrorsTextArea.val( errorMessage );
	} else {
		cmCssLintErrorsTextArea.val('Your Awesome!!!! There are no issues with your CSS!');
	}
}

/**
* Minify CSS
*/
function minifyCss() {
	lintMinifiedCss(cmInput.val());
	var minifiedCss = YAHOO.compressor.cssmin(cmInput.val());
	cmOutput.val( minifiedCss );
}

/**
* CSS Minifier Options
*/

// CSS Lint
cmCssLint.on('change', function(){
	cmOptions.csslint = $(this).is(':checked');
	if ( cmOptions.csslint ) {
		cmCssLintErrors.removeClass('hide');
	} else {
		cmCssLintErrors.addClass('hide');
	}
	minifyCss();
});

/**
* Minify CSS Keyup
*/
cmInput.on('keyup', function(){
	minifyCss();
});

/**
* Minify CSS Load
*/
// if ( cmOutput.length > 0 ) {
// 	minifyCss();
// }