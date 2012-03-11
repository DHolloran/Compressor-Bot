<form action="?" method="post" accept-charset="utf-8">
	<div id="text_input">
    	<textarea name="input" placeholder="Paste your code here.">
		</textarea>
    	<input type="submit" class="tool_btn" value="Compress">
    </div><!-- END .text_input -->

</form>

<?php
require_once "../_assets/includes/helpers/functions.php";
$codeIn = sanitize($_POST['input']);

if($codeIn){
	compressHTML($codeIn);
}
function compressJS($in){
	/* REMOVE TABS, SPACES, COMMENTS & LINE BREAKS */
	$in = preg_replace('{\t}', '', $in);
	$in = str_replace(array('  ', '    ', '    '), '', $in);

	$in = preg_replace('{(^[\/]{2}[^\n]*)|([\n|\s]{1}[\/]{2}[^\n]*)}', '', $in);
	$in = preg_replace('{(^[\/]{1}+[\*]{1}+([^/][^*]*\*+)*[\/]{1})|([\n|\r][\/]{1}+[\*]{1}+([^/][^*]*\*+)*[\/]{1})}', '', $in);
	$in = preg_replace('{(?<=\s)\/\/.+}', '', $in);

	$in = preg_replace('{\n}', ' ', $in);
	$in = preg_replace('{\r}', '', $in);

	/* REMOVE UNNECESSARY SPACES */
	$in = str_replace('{ ', '{', $in);
	$in = str_replace(' }', '}', $in);
	$in = str_replace('; ', ';', $in);
	$in = str_replace(', ', ',', $in);
	$in = str_replace(' {', '{', $in);
	$in = str_replace('} ', '}', $in);
	$in = str_replace(': ', ':', $in);
	$in = str_replace(' ,', ',', $in);
	$in = str_replace(' ;', ';', $in);
	$in = str_replace(' (', '(', $in);
	$in = str_replace('( ', '(', $in);
	$in = str_replace(' )', ')', $in);
	$in = str_replace(') ', ')', $in);
	echo "<textarea>{$in}</textarea>";
}

function compressCSS($in){

	echo "<textarea>{$in}</textarea>";
}

// ==== compressHTML() ====
	function compressHTML($in){
	    $search = array(
	        '/\>[^\S ]+/s', //strip whitespaces after tags, except space
	        '/[^\S ]+\</s', //strip whitespaces before tags, except space
	        '/(\s)+/s'  // shorten multiple whitespace sequences
	        );
	    $replace = array(
	        '>',
	        '<',
	        '\\1'
	        );
	  	$in = preg_replace($search, $replace, $in);
	  // 	// Remove Comments
			// $in = preg_replace('<!--(?!\[if).*?-->', '', $in);
			// $in = preg_replace('<>', '', $in);
	  	$in = htmlspecialchars($in);
	  	echo "<textarea cols=\"80\" rows=\"40\">$in</textarea>";
		//echo json_encode($in);
	} // compressHTML()
