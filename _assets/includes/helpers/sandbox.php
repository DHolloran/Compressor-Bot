<?php
	require_once "functions.php";

	$validate = validateFile('http://compressorbot.com/tests/test.html');
	echo "/*"."\r\n" . $validate . "*/" . "\r\n" . "\r\n";
	echo "/*\r\n" . $validate . "*/" . "\r\n" . "\r\n";
	echo "<!--\r\n" . $validate . "-->" . "\r\n" . "\r\n";
