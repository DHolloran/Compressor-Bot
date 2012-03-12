<?php
	require_once "functions.php";
	require_once 'csstidy/class.csstidy.php';
	require_once 'css-crush/CssCrush.php';
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
			/* Prefix */
			if(!empty($_POST['css_prefixer'])){
				$in = CssCrush::string($in);
			}

			/* CSSTidy */
			$css = new csstidy();
			$css->set_cfg('remove_last_;',TRUE);
			$css->set_cfg('compress_colors', TRUE);
			$css->parse($in);
			// // Add Space After ;
			// $in = str_replace(";",";\r\n ",$in);
			echo json_encode(strip_tags($css->print->formatted()));
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




