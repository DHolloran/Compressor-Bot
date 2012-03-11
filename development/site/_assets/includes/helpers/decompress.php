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
			include('csstidy/class.csstidy.php');

			$css = new csstidy();

			$css->set_cfg('remove_last_;',TRUE);

			$css->parse($in);

			$in = $css->print->formatted();
			// // Add line break after ;
			// $in = str_replace(";",";\r\n\t",$in);
			// // Add Space After ;
			// $in = str_replace(";",";\r\n ",$in);
			// // Add line break after { With Tab
			// $in = str_replace("{","{\r\n\t",$in);
			// // Add line break after { With Space
			// $in = str_replace("{","{\r\n ",$in);
			// // Add line break after }
			// $in = str_replace("}","}\r\n",$in);
			// // Fix Tab Before }
			// $in = str_replace("\t}", "}", $in);
			echo json_encode($in);
		}
	// ==== decompressHTML() ====
		function decompressHTML($in){
			ob_start();

			echo $in;

			$html = ob_get_clean();

			// Specify configuration
			$config = array(
			           'indent'         => true,
			           'output-html'   => true,
			           'wrap'           => 200);

			// Tidy
			$tidy = new tidy;
			$tidy->parseString($html, $config, 'utf8');
			$tidy->cleanRepair();
			// Output
			echo json_encode($tidy);
		}




