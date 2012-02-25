<?php

/**
*
*/
class PageView
{
	function __construct()
	{

	} // __construct()

	public function show($fileName,$folder='',$arguments=array()){
		if($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['HTTP_HOST'] == '127.0.0.1' ){
			$root = 'http://localhost/~dholloran/compressorbot/development/site/';
		}else{
			$root = 'http://compressorbot.com/development/site/';
		}

		if(!file_exists($fileName)){
			$rootDir = $root;
			if($folder != ''){
				$folder .= "/";
			}
			include_once "views/${folder}{$fileName}.inc.php";
		}
	} // show()
} // class
