<?php
	require_once "functions.php";
	require_once 'css-crush/CssCrush.php';
	require_once 'csstidy/class.csstidy.php';
	require_once '../model/ProfileModel.php';
// == Input ==
	$input =sanitize($_POST['input'],false);
	$action = sanitize($_POST['tool']);
	$accessAllowed = true;
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
		    $in = str_replace("\n", '', $in);
		    $in = str_replace("\t", '', $in);
		    $tabcount = 0;
		    $result = '';
		    $inquote = false;
		    $ignorenext = false;

		    // Set Tabs or spaces
		    $whiteSpace = $_POST['wsp'];
		    if($whiteSpace === 'tabs'){
		    	$tab = "\t";
		    }elseif( $whiteSpace === 'spaces'){
		    	$tab = "    ";
		    }

		    $newline = "\n";

		    for($i = 0; $i < strlen($in); $i++) {
		        $char = $in[$i];

		        if ($ignorenext) {
		            $result .= $char;
		            $ignorenext = false;
		        } else {
		            switch($char) {
		                case '{':
		                    $tabcount++;
		                    $result .= $char . $newline . str_repeat($tab, $tabcount);
		                    break;
		                case '}':
		                    $tabcount--;
		                    $result = trim($result) . $newline . str_repeat($tab, $tabcount) . $char;
		                    break;

		                case ';':
		                    $result .= $char . $newline . str_repeat($tab, $tabcount);
		                    break;
		                case '"':
		                    $inquote = !$inquote;
		                    $result .= $char;
		                    break;
		                case '\\':
		                    if ($inquote) $ignorenext = true;
		                    $result .= $char;
		                    break;
		                default:
		                    $result .= $char;
		            }
		        }
		    }
		    // Output
		    /* Check if access is allowed */
		    if(addOneBasic()){
		        // Return Result AJAX
		    	$url = outputWrite($result,'js');
		    	$output = array($result, $url);
		        echo json_encode($output);
		    }else{
		        // Return Access Denied AJAX
		        echo json_encode('access denied');
		    }
		} // decompressJS()
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
			// Output
			/* Check if access is allowed */
			if(addOneBasic()){
				$result = strip_tags($css->print->formatted());
				// Add spaces/tabs
				// Set Tabs or spaces
			    $whiteSpace = $_POST['wsp'];
			    if($whiteSpace === 'tabs'){
			    	$tab = "\t";
			    }elseif( $whiteSpace === 'spaces'){
			    	$tab = "    ";
			    }
			    $result = preg_replace("/{[\\r\\n]/um", "{\r\n".$tab, $result);
				// Write to file
				$url = outputWrite($result,'css');
				// Validate written File
				$root = checkHost();
				$fileUrl "$root/_assets/includes/helpers/files/download/$url";
				$validation = validateFile($fileUrl);
				// Rewrite file if validation errors occur
				if($validation != ''){
					$result = $validation .= $result;
					$url = outputWrite($result,'css');
				}
				// Set Output Values
		    	$output = array($result, $url);
		        echo json_encode($output);
			}else{
				echo json_encode('access denied');
			}
		} // decompressCSS()
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
			$tidy = new tidy();
			$tidy->parseString($html, $config, 'utf8');
			$tidy->cleanRepair();

			// Output
			/* Check if access is allowed */
			if(addOneBasic()){
				$url = outputWrite($tidy,'html');
		    	// Validate written File
				$root = checkHost();
				$fileUrl = "$root/_assets/includes/helpers/files/download/$url";
				$validation = validateFile($fileUrl);
				// Rewrite file if validation errors occur
				if($validation != ''){
					$tidy = $validation .= $tidy;
					$url = outputWrite($tidy,'css');
				}
				$output = array($tidy, $url);
		    	echo json_encode($output);
			}else{
				echo json_encode('access denied');
			}
		}
