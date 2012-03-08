<?php
	require_once "functions.php";
// == Input ==
	$input =sanitize($_POST['input'],false);
	$action = sanitize($_POST['tool']);
// ==== INIT ====
	switch ($action) {
		case 'decompress_html':
			decompressHTML($input);
			break;
		case 'decompress_css':
			decompressCSS($input);
			break;
		case 'decompress_js':
			decompressJS($input);
			break;
		default:
			echo json_encode("No language choosen");
			break;
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




