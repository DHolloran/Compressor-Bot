<?php
	require_once "../functions.php";
	// Setup Downloader
  	require_once "downloader.php";
  	$downloader = new Downloader();

  	// Download Files
	if(!empty($_POST['download_url'])){
		$url = sanitize($_POST['download_url']);
		$downloader->setFolderName("compressorbot-$url");
		$file = "download/" . $url;
		$downloader->setFiles($file);
		$downloader->download();
	}else{
		echo json_encode(false);
	}
