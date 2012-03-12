
<?php
	require_once "../_assets/includes/helpers/functions.php";
	// ==== Write Output To File ====
	function outputWrite($output,$type){

		switch ($type) {
			case 'html':
				$f = fopen("decompress/index.html", "w");
				break;
			case 'css':
				$f = fopen("decompress/style.css", "w");
				break;
			case 'js':
				$f = fopen("decompress/script.js", "w");
				break;

			default:
				$file = '';
				break;
		}
		$home = checkHost();
		fwrite($f, $output);
		fclose($f);
	}

	outputWrite('Write To JS File', 'js');
?>
