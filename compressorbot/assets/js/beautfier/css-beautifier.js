var cbInput = $('#cb_input'),
		cbOutput = $('#cb_output'),
		cbOptions = {
			indent: '\t',
			openbrace: 'separate-line',
			autosemicolon: true,
			csslint: true
		},
		cbOptionsElem = $('#cb_options'),
		cbIndentElem = $('.cb-spacing'),
		cbBracesElem = $('.cb-braces'),
		cbAutoSemicolon = $('.cb-auto-semicolon'),
		cbCssLint = $('#cb_csslint'),
		cbCssLintErrors = $('#cb_csslint_errors'),
		cbCssLintErrorsTextArea = cbCssLintErrors.find('textarea')
;
/**
* CSS Lint
*/
function lintBeautifiedCss(beautifiedCss) {
	if ( !cbOptions.csslint || beautifiedCss.length === 0 ) {
		cbCssLintErrorsTextArea.val('');
		return false;
	}

	var lintedCss = CSSLint.verify( beautifiedCss );
	if ( lintedCss.messages.length > 0) {
		var errorMessage = '';
		$.each(lintedCss.messages, function(){
			var obj = $(this),
					that = obj[0],
					type = that.type.toString().trim().toUpperCase() + ' ',
					column = 'col ' + that.col.toString().trim() + ' ',
					line = 'line ' + that.line.toString().trim() + ' ',
					evidence =  that.evidence.toString().trim() + ' ',
					message = that.message
			;
			errorMessage = errorMessage + type + column + line + evidence + message + "\n";
		});
		cbCssLintErrorsTextArea.val( errorMessage );
	} else {
		cbCssLintErrorsTextArea.val('Your Awesome!!!! There are no issues with your CSS!');
	}
}

/**
* CSS Beautifier
*/
function beautifyCss() {
	var beautifiedCss = cssbeautify( cbInput.val(), cbOptions );
	lintBeautifiedCss(beautifiedCss);
	cbOutput.val( beautifiedCss );
}


/**
* CSS Beautifier Options
*/
// indent is a string used for the indentation of the declaration
cbIndentElem.on('change', function(){
	switch( $(this).val() ) {
		case 'tab':
			cbOptions.indent = '\t';
			break;
		case 'fourspaces':
			cbOptions.indent = '    ';
			break;
		case 'twospaces':
			cbOptions.indent = '  ';
			break;
	}
	beautifyCss();
});

// openbrace defines the placement of open curly brace, either end-of-line
cbBracesElem.on('change', function(){
	cbOptions.openbrace = $(this).val();
	beautifyCss();
});

// autosemicolon always inserts a semicolon after the last ruleset
cbAutoSemicolon.on('change', function(){
	cbOptions.autosemicolon = $(this).is(':checked');
	beautifyCss();
});

// CSS Lint
cbCssLint.on('change', function(){
	cbOptions.csslint = $(this).is(':checked');
	if ( cbOptions.csslint ) {
		cbCssLintErrors.removeClass('hide');
	} else {
		cbCssLintErrors.addClass('hide');
	}
	beautifyCss();
});

/**
* CSS Beautifier Keyup
*/
cbInput.on('keyup', function(){
	beautifyCss();
});


/**
* Beautify CSS Load
*/
// if ( cbOutput.length > 0 ) {
// 	beautifyCss();
// }
