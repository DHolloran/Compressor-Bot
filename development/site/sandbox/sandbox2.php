<?php
$uri = 'http://compressorbot.com/tests/test.html';
$url = "http://validator.w3.org/check?uri=$uri;output=json;verbose=1";
echo json_encode( file_get_contents($url) );





