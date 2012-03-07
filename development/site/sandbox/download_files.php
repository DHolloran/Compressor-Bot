<?php
	require_once "downloader.php";
	$downloader = new Downloader();
	$downloader->enableDebug();
	$folderPath = 'files/$fileid';
	$downloader->setFiles('files/');
	$downloader->download();
?>
