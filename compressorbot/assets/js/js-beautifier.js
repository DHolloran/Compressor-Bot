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
var jbOptionsCheckBox = $('#jb_options input[type="checkbox"]'),
		jbOptionsRadio = $('#jb_options input[type="radio"]'),
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
			wrap_line_length: 0
		}
;

/**
* Beautify JS
*/
function beautifyJs() {
	var beautifiedJs = js_beautify(jbInput.getVal(), jbOptions);
	jbOutput.setVal(beautifiedJs);
}

/**
* JS Beautifier Options
*/
// Checkboxes
jbOptionsCheckBox.on('change',function(){
	var that = $(this);
			selectedOption = that.attr('id').replace('jb_', '')
	;
	jbOptions.selectedOption = that.is(':checked');
	beautifyJs();
});

// Radio Buttons
jbOptionsRadio.on('change',function(){
	var that = $(this);
			selectedOption = that.attr('id').replace('jb_', '')
	;

	switch(jbInput.getVal()) {
		case 'tab':
			jbOptions.selectedOption = '\t';
			break;
		case 'fourspaces':
			jbOptions.selectedOption = '    ';
			break;
		case 'twospaces':
			jbOptions.selectedOption = '  ';
			break;
		default:
			jbOptions.selectedOption = that.val();
			break;
	}
	beautifyJs();
});

// Number Input
jbOptionsNumber.on('change',function(){
	var that = $(this);
			selectedOption = that.attr('id').replace('jb_', '')
	;
	jbOptions.selectedOption = that.val();
	beautifyJs();
});

/**
* Beautify JS Keyup
*/
jbInput.on('keyup', function(){
	beautifyJs();
});