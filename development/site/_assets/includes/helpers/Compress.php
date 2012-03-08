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
// ==== Compress ====
	// ==== compressJS() ====
		function compressJS($in){
			// Remove White Space
			$out = removeWhiteSpace($in);
			// Remove Comments
			$out = removeComments($out);
			// Put spaces After Vars
			$out = str_replace('var', 'var ', $out);
			// Put Spaces After Functions
			$out = str_replace('function', 'function ', $out);
			// Except For Anonymous Functions
			$out = str_replace('function (', 'function(', $out);
			echo json_encode($out);
		}
	// ==== compressCSS() ====
		function compressCSS($in){
			$out = removeWhiteSpace($in);
			$out = removeComments($out);
			echo json_encode($out);
		}
	// ==== compressHTML() ====
		function compressHTML($in){
			$out = removeWhiteSpace($in);
			$out = removeComments($out);
			echo json_encode($out);
		}
	// ==== removeWhiteSpace() ====
		function removeWhiteSpace($in){
			// Remove Spaces
			$out = str_replace(array("\t", " "), "", $in );
			return $out;
		}
	// ==== removeComments() ====
		function removeComments($in){
			// HTML Comments
			$out = preg_replace('/<!(.*?)(--.*?--\s*)+(.*?)>/', '', $in);
			// CSS & JS Comments
		    $out = preg_replace('/#.*/','',preg_replace('#//.*#','',preg_replace('#/\*(?:[^*]*(?:\*(?!/))*)*\*/#','',($out))));
		    return $out;
		}
// ==== Decompress ====
	// ==== decompressJS() ====
	function decompressJS($in){
		// Add line break after ;
			$out = "In Progress";
		echo json_encode($out);
	}
	// ==== decompressCSS() ====
		function decompressCSS($in){
			// Add line break after ;
			$out = str_replace(";",";\r\n\t",$in);
			// Add Space After ;
			$out = str_replace(";",";\r\n ",$in);
			// Add line break after { With Tab
			$out = str_replace("{","{\r\n\t",$out);
			// Add line break after { With Space
			$out = str_replace("{","{\r\n ",$out);
			// Add line break after }
			$out = str_replace("}","}\r\n",$out);
			// Fix Tab Before }
			$out = str_replace("\t}", "}", $out);
			echo json_encode($out);
		}
	// ==== decompressHTML() ====
		function decompressHTML($in){
			$out;
			echo json_encode($out);
		}




