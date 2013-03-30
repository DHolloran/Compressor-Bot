var cbInput = $('#cb_input'),
		cbOutput = $('#cb_output'),
		cbOptions = {
			indent: '\t',
			openbrace: 'separate-line',
			autosemicolon: true
		},
		cbOptionsElem = $('#cb_options'),
		cbIndentElem = $('.cb-spacing'),
		cbBracesElem = $('.cb-braces'),
		cbAutoSemicolon = $('.cb-auto-semicolon'),
		cbCssLint = $('.cb-css-lint')
;
/**
* CSS Beautifier
*/
function beautifyCss() {
	var beautifiedCss = cssbeautify( cbInput.val(), cbOptions );
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

/**
* CSS Beautifier Keyup
*/
cbInput.on('keyup', function(){
	beautifyCss();
});



