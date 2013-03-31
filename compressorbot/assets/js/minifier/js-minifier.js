// Compressor options
// You need to pass --compress (-c) to enable the compressor. Optionally you can pass a comma-separated list of options. Options are in the form foo=bar, or just foo (the latter implies a boolean option that you want to set true; it's effectively a shortcut for foo=true).

// sequences -- join consecutive simple statements using the comma operator
// properties -- rewrite property access using the dot notation, for example foo["bar"] → foo.bar
// dead_code -- remove unreachable code
// drop_debugger -- remove debugger; statements
// unsafe (default: false) -- apply "unsafe" transformations (discussion below)
// conditionals -- apply optimizations for if-s and conditional expressions
// comparisons -- apply certain optimizations to binary nodes, for example: !(a <= b) → a > b (only when unsafe), attempts to negate binary nodes, e.g. a = !b && !c && !d && !e → a=!(b||c||d||e) etc.
// evaluate -- attempt to evaluate constant expressions
// booleans -- various optimizations for boolean context, for example !!a ? b : c → a ? b : c
// loops -- optimizations for do, while and for loops when we can statically determine the condition
// unused -- drop unreferenced functions and variables
// hoist_funs -- hoist function declarations
// hoist_vars (default: false) -- hoist var declarations (this is false by default because it seems to increase the size of the output in general)
// if_return -- optimizations for if/return and if/continue
// join_vars -- join consecutive var statements
// cascade -- small optimization for sequences, transform x, x into x and x = something(), x into x = something()
// warnings -- display warnings when dropping unreachable code or unused declarations etc.

var jmInput = $('#jm_input'),
		jmOutput = $('#jm_output'),
		jmOptions = {
			jshint: true
		},
		jmJsHint = $('#jm_jshint'),
		jmJsHintErrors = $('#jm_jshint_errors'),
		jmJsHintErrorsTextArea = $('#jm_jshint_errors').find('textarea')
;

/**
* JSHint
*/
function executeJShint(minifiedJs) {
	if (!jmOptions.jshint || minifiedJs.length === 0) {
		jmJsHintErrorsTextArea.val('');
		return minifiedJs;
	}
	var jshintSuccess = JSHINT(minifiedJs);
	if ( jshintSuccess ) {
		jmJsHintErrorsTextArea.val('Your Awesome!!!! There are no issues with your JS!');
	} else {
		var errorMsg = '';
		$.each(JSHINT.errors, function() {
			var obj = $(this),
					that = obj[0],
					error = that.id.toString().trim().toUpperCase() + ' ',
					character = 'col ' + that.character.toString().trim() + ' ',
					line = 'line ' + that.line.toString().trim() + ' ',
					evidence = that.evidence.toString().trim() + ' ',
					message = that.reason.toString().trim() + ' '
			;

			errorMsg = errorMsg + error + character + line + evidence + message + "\n";
		});
		jmJsHintErrorsTextArea.val(errorMsg);
	}
}

/**
* Toggle JSHint
*/
jmJsHint.on('change', function(){
	jmOptions.jshint = $(this).is(':checked');
	if ( jmOptions.jshint ) {
		jmJsHintErrors.removeClass('hide');
	} else {
		jmJsHintErrors.addClass('hide');
	}
});

/**
* Beautify JS
*/
function minifyJs() {
	ast = UglifyJS.parse( jmInput.val() );
	ast.figure_out_scope();
	compressor = UglifyJS.Compressor( {} );
	ast = ast.transform( compressor );
	minifiedJs = ast.print_to_string();
	executeJShint( jmInput.val() );
	jmOutput.val( minifiedJs );
}
/**
* Beautify JS Keyup
*/
jmInput.on('keyup', function(){
	minifyJs();
});


/**
* Beautify JS Load
*/
// if ( jmOutput.length > 0 ) {
// 	minifyJs();
// }