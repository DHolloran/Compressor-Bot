<?php
	require_once "functions.php";
	require_once 'css-crush/CssCrush.php';
	require_once '../model/ProfileModel.php';
// == Input ==
	if(!empty($_POST['input'])){
		$input =sanitize($_POST['input'],false);
	}else{
		$input = "";
	}
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
	function compressJS($result){
		/* REMOVE TABS, SPACES, COMMENTS & LINE BREAKS */
		$result = preg_replace('{\t}', '', $result);
		$result = str_replace(array('  ', '    ', '    '), '', $result);
		$result = preg_replace('{(^[\/]{2}[^\n]*)|([\n|\s]{1}[\/]{2}[^\n]*)}', '', $result);
		$result = preg_replace('{(^[\/]{1}+[\*]{1}+([^/][^*]*\*+)*[\/]{1})|([\n|\r][\/]{1}+[\*]{1}+([^/][^*]*\*+)*[\/]{1})}', '', $result);
		$result = preg_replace('{(?<=\s)\/\/.+}', '', $result);

		$result = preg_replace('{\n}', ' ', $result);
		$result = preg_replace('{\r}', '', $result);

		/* REMOVE UNNECESSARY SPACES */
		$result = str_replace('{ ', '{', $result);
		$result = str_replace(' }', '}', $result);
		$result = str_replace('; ', ';', $result);
		$result = str_replace(', ', ',', $result);
		$result = str_replace(' {', '{', $result);
		$result = str_replace('} ', '}', $result);
		$result = str_replace(': ', ':', $result);
		$result = str_replace(' ,', ',', $result);
		$result = str_replace(' ;', ';', $result);
		$result = str_replace(' (', '(', $result);
		$result = str_replace('( ', '(', $result);
		$result = str_replace(' )', ')', $result);
		$result = str_replace(') ', ')', $result);
		$result = str_replace(' = ','=',$result);
		/* Check if access is allowed */
			if(addOneBasic()){
				$url = outputWrite($result,'js');
		    	$output = array($result, $url);
		        echo json_encode($output);
			}else{
				echo json_encode('access denied');
			}
	}
// ==== compressCSS() ====
	function compressCSS($result){
		/* Prefix */
		if(!empty($_POST['css_prefixer'])){
			$result = CssCrush::string($result);
		}
		/* REMOVE COMMENTS */
		$result = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $result);
		/* REMOVE TABS, SPACES, NEW LINES, ETC */
		$result = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $result);
		/* REMOVE UNNECESSARY SPACES */
		$result = str_replace('{ ', '{', $result);
		$result = str_replace(' }', '}', $result);
		$result = str_replace('; ', ';', $result);
		$result = str_replace(', ', ',', $result);
		$result = str_replace(' {', '{', $result);
		$result = str_replace('} ', '}', $result);
		$result = str_replace(': ', ':', $result);
		$result = str_replace(' ,', ',', $result);
		$result = str_replace(' ;', ';', $result);

		/* Check if access is allowed */
			if(addOneBasic()){
				$url = outputWrite($result,'css');
		    	$output = array($result, $url);
		        echo json_encode($output);
			}else{
				echo json_encode('access denied');
			}
	} // compressCSS()
// ==== compressHTML() ====
	function compressHTML($result){
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
	  	$result = preg_replace($search, $replace, $result);
		if(addOneBasic()){
				$url = outputWrite($result,'html');
		    	$output = array($result, $url);
		        echo json_encode($output);
			}else{
				echo json_encode('access denied');
			}
	} // compressHTML()
