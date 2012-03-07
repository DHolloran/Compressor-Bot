<?php
$url = "http://validator.w3.org/check?uri=http://danholloran.com/;output=json";
echo json_encode( file_get_contents($url) );
//<m:errors> and <m:warnings>




