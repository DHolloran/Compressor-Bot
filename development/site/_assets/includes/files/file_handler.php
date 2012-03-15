
<?php
	require_once "../helpers/functions.php";
	// ==== Write Output To File ====
	function outputWrite($output,$type,$tool){
		$root = checkHost();
		if($tool === 'compress'){
			// Set Language Type For Compress
			switch ($type) {
				case 'html':
					$f = fopen("compress/index.html", "w");
					$url = "$root/_assets/includes/files/compress/index.html";
					break;
				case 'css':
					$f = fopen("compress/style.css", "w");
					$url = "$root/_assets/includes/files/compress/style.css";
					break;
				case 'js':
					$f = fopen("compress/script.js", "w");
					$url = "$root/_assets/includes/files/compress/script.js";
					break;

				default:
					$file = '';
					break;
			}
		}elseif($tool === 'decompress'){
			// Set Language Type For Decompress
			switch ($type) {
				case 'html':
					$f = fopen("decompress/index.html", "w");
					$url = "$root/_assets/includes/files/decompress/index.html";
					break;
				case 'css':
					$f = fopen("decompress/style.css", "w");
					$url = "$root/_assets/includes/files/decompress/style.css";
					break;
				case 'js':
					$f = fopen("decompress/script.js", "w");
					$url = "$root/_assets/includes/files/decompress/script.js";
					break;

				default:
					$file = '';
					break;
			}
		}
		fwrite($f, $output);
		fclose($f);
		return $url;
	}
?>
