<?php
	require_once "functions.php";
// == Input ==
	$input =sanitize($_POST['input'],false);
	$action = sanitize($_POST['tool']);
// ==== INIT ====
	switch ($action) {
		case 'compress_html':
			compressHTML($input);
			break;
		case 'compress_css':
			compressCSS($input);
			break;
		case 'compress_js':
			compressJS($input);
			break;
		default:
			echo json_encode("No language choosen");
			break;
	}

// ==== compressJS() ====
	function compressJS($in){
		/* REMOVE TABS, SPACES, COMMENTS & LINE BREAKS */
		$in = preg_replace('{\t}', '', $in);
		$in = str_replace(array('  ', '    ', '    '), '', $in);
		$in = preg_replace('{(^[\/]{2}[^\n]*)|([\n|\s]{1}[\/]{2}[^\n]*)}', '', $in);
		$in = preg_replace('{(^[\/]{1}+[\*]{1}+([^/][^*]*\*+)*[\/]{1})|([\n|\r][\/]{1}+[\*]{1}+([^/][^*]*\*+)*[\/]{1})}', '', $in);
		$in = preg_replace('{(?<=\s)\/\/.+}', '', $in);

		$in = preg_replace('{\n}', ' ', $in);
		$in = preg_replace('{\r}', '', $in);

		/* REMOVE UNNECESSARY SPACES */
		$in = str_replace('{ ', '{', $in);
		$in = str_replace(' }', '}', $in);
		$in = str_replace('; ', ';', $in);
		$in = str_replace(', ', ',', $in);
		$in = str_replace(' {', '{', $in);
		$in = str_replace('} ', '}', $in);
		$in = str_replace(': ', ':', $in);
		$in = str_replace(' ,', ',', $in);
		$in = str_replace(' ;', ';', $in);
		$in = str_replace(' (', '(', $in);
		$in = str_replace('( ', '(', $in);
		$in = str_replace(' )', ')', $in);
		$in = str_replace(') ', ')', $in);
		$in = str_replace(' = ','=',$in);
		echo json_encode($in);
	}
// ==== compressCSS() ====
	function compressCSS($in){
		/* REMOVE COMMENTS */
		$in = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $in);
		/* REMOVE TABS, SPACES, NEW LINES, ETC */
		$in = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $in);
		/* REMOVE UNNECESSARY SPACES */
		$in = str_replace('{ ', '{', $in);
		$in = str_replace(' }', '}', $in);
		$in = str_replace('; ', ';', $in);
		$in = str_replace(', ', ',', $in);
		$in = str_replace(' {', '{', $in);
		$in = str_replace('} ', '}', $in);
		$in = str_replace(': ', ':', $in);
		$in = str_replace(' ,', ',', $in);
		$in = str_replace(' ;', ';', $in);
		echo json_encode($in);
	} // compressCSS()
// ==== compressHTML() ====
	function compressHTML($in){
	    $search = array(
	        '/\>[^\S ]+/s', //strip whitespaces after tags, except space
	        '/[^\S ]+\</s', //strip whitespaces before tags, except space
	        '/(\s)+/s'  // shorten multiple whitespace sequences
	        );
	    $replace = array(
	        '>',
	        '<',
	        '\\1'
	        );
	  	$in = preg_replace($search, $replace, $in);
		echo json_encode($in);
	} // compressHTML()
