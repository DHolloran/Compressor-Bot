/*
brace_style = "collapse" | "expand" | "end-expand" | "expand-strict";
indent_size = int;
indent_char = '\t' | ' ';
preserve_newlines = true | false;
break_chained_methods = false | true;
max_preserve_newlines = int;
jslint_happy = false | true; // jslint-stricter mode
keep_array_indentation = false | true;
space_before_conditional = true | false;
unescape_strings = false | true;
wrap_line_length = int;
*/
var jbInput = $('#jb_input'),
		jbOutput = $('#jb_output'),
		jbOptionsCheckBox = $('#jb_options input[type="checkbox"]'),
		jbOptionsIndentRadio = $('.jb-indent-char'),
		jbOptionsBracesRadio = $('.jb-braces'),
		jbOptionsNumber = $('#jb_options input[type="number"]'),
		jbOptions = {
			brace_style: "collapse",
			indent_size: 1,
			indent_char: '\t',
			preserve_newlines: true,
			break_chained_methods: false,
			max_preserve_newlines: 0,
			jslint_happy: false,
			keep_array_indentation: false,
			space_before_conditional: true,
			unescape_strings: false,
			wrap_line_length: 0,
			jshint: true
		},
		jbJsHint = $('#jb_jshint'),
		jbJsHintErrors = $('#jb_jshint_errors'),
		jbJsHintErrorsTextArea = $('#jb_jshint_errors').find('textarea')
;

/**
* JSHint
*/
function executeJShint(beautifedJs) {
	if (!jbOptions.jshint || beautifedJs.length === 0) {
		jbJsHintErrorsTextArea.val('');
		return beautifedJs;
	}
	// character: 35
	// evidence: "		console.log(JSHINT.errors)"
	// line: 10
	// reason: "Missing semicolon."
	var jshintSuccess = JSHINT(beautifedJs);
	if ( jshintSuccess ) {
		jbJsHintErrorsTextArea.val('Your Awesome!!!! There are no issues with your JS!');
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
		jbJsHintErrorsTextArea.val(errorMsg);
	}
}

/**
* Beautify JS
*/
function beautifyJs() {
	var beautifiedJs = js_beautify(jbInput.val(), jbOptions);
	executeJShint(beautifiedJs);
	jbOutput.val(beautifiedJs);
}

/**
* JS Beautifier Options
*/

// Checkboxes
jbOptionsCheckBox.on('change',function(){
	var that = $(this),
			isChecked = that.is(':checked')
	;
	switch( that.attr('name') ) {
		case 'jb_preserve_newlines':
			jbOptions.preserve_newlines = isChecked;
			break;
		case 'jb_break_chained_methods':
			jbOptions.break_chained_methods = isChecked;
			break;
		case 'jb_jslint_happy':
			jbOptions.jslint_happy = isChecked;
			break;
		case 'jb_keep_array_indentation':
			jbOptions.keep_array_indentation = isChecked;
			break;
		case 'jb_space_before_conditional':
			jbOptions.space_before_conditional = isChecked;
			break;
		case 'jb_unescape_strings':
			jbOptions.unescape_strings = isChecked;
			break;
		case 'jb_linting':
			jbOptions.jshint = isChecked;
			if ( jbOptions.jshint ) {
				jbJsHintErrors.removeClass('hide');
			} else {
				jbJsHintErrors.addClass('hide');
			}
			break;
	}
	jbOptions.selectedOption = that.is(':checked');
	beautifyJs();
});

// Indent Radio
jbOptionsIndentRadio.on('change',function(){
	var that = $(this);

	switch( that.val() ) {
		case 'tab':
			jbOptions.indent_char = '\t';
			break;
		case 'fourspaces':
			jbOptions.indent_char = '    ';
			break;
		case 'twospaces':
			jbOptions.indent_char = '  ';
			break;
		default:
			jbOptions.indent_char = '\t';
			break;
	}
	beautifyJs();
});

// Braces Radio
jbOptionsBracesRadio.on('change',function(){
	var that = $(this);

	switch( that.val() ) {
		case 'collapse':
			jbOptions.brace_style = 'collapse';
			break;
		case 'expand':
			jbOptions.brace_style = 'expand';
			break;
		case 'end-expand':
			jbOptions.brace_style = 'end-expand';
			break;
		case 'expand-strict':
			jbOptions.brace_style = 'expand-strict';
			break;
		default:
			jbOptions.brace_style = 'collapse';
			break;
	}
	beautifyJs();
});

// Number Inputs
jbOptionsNumber.on('change',function(){
	var that = $(this);
	if ( that.attr('name') === 'jb_max_preserve_newlines') {
		jbOptions.max_preserve_newlines = that.val();
	}

	if ( that.attr('name') === 'jb_wrap_line_length') {
		jbOptions.wrap_line_length = that.val();
	}
	beautifyJs();
});

/**
* Beautify JS Keyup
*/
jbInput.on('keyup', function(){
	beautifyJs();
});


/**
* Beautify JS Load
*/
// if ( jbOutput.length > 0 ) {
// 	beautifyJs();
// }