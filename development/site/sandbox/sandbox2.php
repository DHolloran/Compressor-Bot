<?php
// ==== Check if it is Development or Live ===
	function checkHost(){
		if($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['HTTP_HOST'] == '127.0.0.1' ){
				return 'http://localhost/~dholloran/compressorbot/development/site';
			}else{
				return 'http://compressorbot.com/development/site';
			}
	}
// ==== Write Output To File ====
	function outputWrite($output,$type){

		switch ($type) {
			case 'html':
				$f = fopen("output_index.html", "w");
				break;
			case 'css':
				$f = fopen("output_style.css", "w");
				break;
			case 'js':
				$f = fopen("output_script.js", "w");
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
