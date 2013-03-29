var cssBeautifierInput = $('#css_beautifier_input'),
		cssBeautifierOutput = $('#css_beautifier_output'),
		cssBeautifierOptions = {
			indent: '\t',
			openbrace: 'separate-line',
			autosemicolon: true
		},
		cssBeautifierOptionsElem = $('#css_beautifier_options'),
		cssBeautifierSpacingElem = $('.css-beautifier-spacing'),
		cssBeautifierBracesElem = $('.css-beautifier-braces'),
		cssBeautifierAutoSemicolon = $('.css-beautifier-auto-semicolon')
;
/**
* CSS Beautifier
*/
function beautifyCss() {
	var beautifiedCss = cssbeautify( cssBeautifierInput.val(), cssBeautifierOptions );
	cssBeautifierOutput.val( beautifiedCss );
}


/**
* CSS Beautifier Options
*/
// indent is a string used for the indentation of the declaration (default is 4 spaces)
cssBeautifierSpacingElem.on('change', function(){
	switch( $(this).val() ) {
		case 'tab':
			cssBeautifierOptions.indent = '\t';
			break;
		case 'fourspaces':
			cssBeautifierOptions.indent = '    ';
			break;
		case 'twospaces':
			cssBeautifierOptions.indent = '  ';
			break;
	}
	beautifyCss();
});

// openbrace defines the placement of open curly brace, either end-of-line (default) or separate-line.
cssBeautifierBracesElem.on('change', function(){
	// end-of-line
	// separate-line
	cssBeautifierOptions.autosemicolon = $(this).val();
	console.log(cssBeautifierOptions);
	beautifyCss();
});

// autosemicolon always inserts a semicolon after the last ruleset (default is false)
cssBeautifierAutoSemicolon.on('change', function(){
	if ( $(this).is(':checked') ) {
		cssBeautifierOptions.openbrace = true;
	} else {
		cssBeautifierOptions.openbrace = false;
	}
	beautifyCss();
});

/**
* CSS Beautifier
*/
cssBeautifierInput.on('keyup', function(){
	beautifyCss();
});



