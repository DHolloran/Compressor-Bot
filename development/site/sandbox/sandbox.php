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
$(function(){function y(a,b,c){var d,e=a,f=$(".output");if($.parseJSON(b)){d="Success!";f.empty().append(d);c.css({height:a+=20});setTimeout(function(){c.parent().fadeOut(300,function(){c.css({height:e});f.empty()})},2e3)}else{d="Please try again.";f.empty().append(d);c.css({height:a+=20})}}var a=$(".modal_link"),b=$(".modal_close"),c=$(".modal_wrapper"),d=c.find("section"),e=$(document).width(),f=$(".tool_switch"),g=$(".language_choice"),h=$(".html_options"),i=$(".css_options"),j=$(".js_options"),k=$(".tool_btn"),l=$(".languages_options"),m=$("input[type=text]"),n=$("input[type=email]"),o=$("textarea"),p=$("#contact_modal"),q=p.find("select"),r=$("#contact_form"),s=r.find("button"),t=$(".pass1"),u=$(".pass2"),v=$("#edit_modal"),w="http://localhost/~dholloran/compressorbot/development/site/",x=$("#login_form");a.on("click",function(a){var b=$(this),c=$(b.attr("href")),e=c.parent();e.css({height:$(document).outerHeight(),width:$(document).outerWidth()});d.css({top:e.outerHeight()/2-c.outerHeight()/2,left:e.outerWidth()/2-c.outerWidth()/2});e.fadeIn(300);a.preventDefault();return!1});b.on("click",function(a){var b=$(this);c.fadeOut(300);c.find(".success").empty();c.find(".output").empty();a.preventDefault();return!1});f.on("click",function(a){var b=$(this);$(b.attr("href")).fadeIn(300);$("#"+b.data("tool")).fadeOut(300);a.preventDefault();return!1});(function(){if(l.length!==0){var a=l.find("input[type=radio]:checked"),b=a.data("lang");b==="js"?b="Javascript":b=b.toUpperCase();k.data("page")==="decompress"?k.val("Decompress "+b):k.val("Compress "+b)}})();g.on("click",function(a){var b=$(this),c=b.data("lang");h.hide();i.hide();j.hide();$("."+b.val()).fadeIn(300);$("."+c).prop("checked",!0);c==="js"?c="Javascript":c=c.toUpperCase();k.data("page")==="decompress"?k.val("Decompress "+c):k.val("Compress "+c)});q.on("change",function(a){var b=$(this),c=p.find("hgroup h3");b.val()==="bug_submit"?c.empty().append("We will get working on this right away"):c.empty().append("Someone will contact you within 24 hours.")});r.on("submit",function(a){var b=$(this),c=b.parent().outerHeight(),d=p.find(".error_field");p.find(".success").empty();d.hide();$.post(w+"/_assets/includes/helpers/sendmail.php",b.serialize(),function(a){y(c,a,p)});a.preventDefault()});u.on("change",function(a){var b=$(this),c=b.siblings(".pass1").val(),d=b.siblings(".error_field").hide();c!==b.val()&&d.empty().append("Passwords do not match").show()});v.find("form").on("submit",function(a){var b=$(this),c=v.outerHeight();$.post(w+"/_assets/includes/controller/EditProfile.php",b.serialize(),function(a){y(c,a,v)});a.preventDefault()});x.on("submit",function(a){var b=$(this),c=x.find(".error_field");c.hide();$.post(w+"/_assets/includes/helpers/login.php",b.serialize(),function(a){if($.parseJSON(a)){c.hide();window.location=$.parseJSON(a)[1]}else c.show()});a.preventDefault()});$("#video_player").H5Video({events:{pause:function(){},play:function(){},end:function(){}},animationDuration:350,source:{"video/ogg":w+"/_assets/media/video/compressorbot_placeholder_video.theora.ogv","video/mp4":w+"/_assets/media/video/compressorbot_placeholder_video.mp4","video/webm":w+"/_assets/media/video/compressorbot_placeholder_video.webm"},loop:!1,preload:!0,autoPlay:!1,poster:w+"/_assets/img/home/poster.png",supportMessage:"This browser cannot playback HTML5 videos. We encourage you to upgrade your internet browser to one of the following modern browsers:"})});
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




