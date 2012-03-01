<?php

/**
*
*/
class PageView
{
	function __construct()
	{

	} // __construct()

	public function show($fileName,$folder='',$title=''){
		if($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['HTTP_HOST'] == '127.0.0.1' ){
			$root = 'http://localhost/~dholloran/compressorbot/development/site';
		}else{
			$root = '/home/dholloran/compressorbot/development/site';
		}

		if(!file_exists($fileName)){
			// Set $root to $rootDir for templates
			$rootDir = $root;

			// Set Files Directory
			if($folder != ''){
				$folder .= "/";
			}

			// Set Page Title
			if($title != ''){
				$pageTitle = $title;
			}
			include_once "views/${folder}{$fileName}.inc.php";
		}
	} // show()
} // class
