var hbInput = $('#hb_input'),
		hbOutput = $('#hb_output'),
		hbOptionsRadio = $('#hb_options input[type="radio"]'),
		hbOptions = {
			indent_size: 1,
			indent_char: '\t',
			brace_style: "collapse",
			indent_scripts: "normal"
		}
;

/**
* Beautify HTML
*/
function beautifyHtml(){
	beautifiedHtml = style_html(hbInput.val(), hbOptions);
	hbOutput.val(beautifiedHtml);
}

/**
* Beautify HTML Options
*/
$('.hb-indent-char').on('change', function(){
	var that = $(this);

	switch(that.val()) {
		case 'fourspaces':
			hbOptions.indent_char = '    ';
			break;
		case 'twospaces':
			hbOptions.indent_char = '  ';
			break;
		default:
			hbOptions.indent_char = '\t';
			break;
	}
	beautifyHtml();
});

$('.hb-braces').on('change', function(){
	hbOptions.brace_style = $(this).val();
	beautifyHtml();
});

// Indent Scripts
$('.hb-indent-scripts').on('change', function(){
	hbOptions.indent_scripts = $(this).val();
	beautifyHtml();
});

/**
* Beautify HTML Keyup
*/
hbInput.on('keyup', function(){
	beautifyHtml();
});