	<form action="?" method="post" >
		<textarea name="input" value="" rows="15" cols="50" placeholder="code">
body{text-decoration:none; color:navy; font-family:"arial"; font-size:12pt; font-weight:medium;} .title{text-decoration:bold; color:green; font-family:"mssansserif"; font-size:24pt; font-weight:heavy;} .bold{text-decoration:bold; color:black; font-family:"courier,arial"; font-size:14pt; font-weight:heavy;} a:link{text-decoration:none; color:red; font-family:"mssansserif"; font-size:12pt; font-weight:heavy;} .head{color: font-family:"mssansserif"; font-size:35px; margin-top:35px; margin-left:28px;} .foo{text-decoration:underline; color: font-family:"courier"; font-size:14pt; font-weight:heavy;}
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
			echo $out;
		}
	// ==== compressCSS() ====
		function compressCSS($in){
			$out = removeWhiteSpace($in);
			$out = removeComments($out);
			echo $out;
		}
	// ==== compressHTML() ====
		function compressHTML($in){
			$out = removeWhiteSpace($in);
			$out = removeComments($out);
			echo "<textarea>$out</textarea>";
		}
	// ==== removeWhiteSpace() ====
		function removeWhiteSpace($in){
			// Remove Spaces
			$out = str_replace(" ", "", $in );
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
		//echo echo "<textarea cols=\"30\" rows=\"20\">$out</textarea>";
	}
// ==== decompressCSS() ====
	function decompressCSS($in){
		// Add line break after ;
		$out = str_replace(";",";\r\n",$in);
		// Add line break after {
		$out = str_replace("{","{\r\n",$out);
		// Add line break after }
		$out = str_replace("}","}\r\n",$out);
		echo "<textarea cols=\"30\" rows=\"20\">$out</textarea>";
		echo $out;
	}
// ==== decompressHTML() ====
	function decompressHTML($in){
		//echo "<textarea>$out</textarea>";
	}
// ==== INIT Functions ====
	//compressHTML($input);
	//compressCSS($input);
	//compressJS($input);
	//decompressHTML($input);
	decompressCSS($input);
	//decompressJS($input);

