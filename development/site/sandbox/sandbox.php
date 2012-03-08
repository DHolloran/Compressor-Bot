	<form action="?" method="post" >
		<h2>Compress</h2>
		<input type="radio" name="tool" id="compress_html" value="compress_html">
			<label for="compress_html">Compress HTML</label><br>

		<input type="radio" name="tool" id="compress_css" value="compress_css">
			<label for="compress_css">Compress CSS</label><br>

		<input type="radio" name="tool" id="compress_JS" value="compress_js">
			<label for="compress_JS">Compress JS</label><br>

		<h2>Decompress</h2>
		<input type="radio" name="tool" id="decompress_html" value="decompress_html">
			<label for="decompress_html">Decompress HTML</label><br>
		<input type="radio" name="tool" id="decompress_css" value="decompress_css">
			<label for="decompress_css">Decompress CSS</label><br>
		<input type="radio" name="tool" id="decompress_JS" value="decompress_js" checked="checked">
			<label for="decompress_JS">Decompress JS</label><br>
		<textarea name="input" value="" rows="15" cols="50" placeholder="code">

		</textarea><br><br>
		<button type="submit">Submit</button>
	</form>
<?php
// ==== Sanitize Input ====
	function sanitize($input,$lowercase = true){
		if($lowercase){
			return empty($input) ?'':strtolower(trim($input));
		}else{
			return empty($input) ?'':trim($input);
		}
	}
// == Input ==
	$input =sanitize($_POST['input'],false);
	$action = sanitize($_POST['tool']);
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
			echo "<textarea cols=\"30\" rows=\"20\">$out</textarea>";
		}
	// ==== compressCSS() ====
		function compressCSS($in){
			$out = removeWhiteSpace($in);
			$out = removeComments($out);
			echo "<textarea cols=\"30\" rows=\"20\">$out</textarea>";
		}
	// ==== compressHTML() ====
		function compressHTML($in){
			$out = removeWhiteSpace($in);
			$out = removeComments($out);
			echo "<textarea cols=\"30\" rows=\"20\">$out</textarea>";
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
		echo "<textarea cols=\"30\" rows=\"20\">$out</textarea>";
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
			echo "<textarea cols=\"30\" rows=\"20\">$out</textarea>";
		}
	// ==== decompressHTML() ====
		function decompressHTML($in){
			$out;
			echo "<textarea cols=\"30\" rows=\"20\">$out</textarea>";
		}
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
			echo "choose a language";
			break;
	}




