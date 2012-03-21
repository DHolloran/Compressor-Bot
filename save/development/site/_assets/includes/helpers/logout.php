<?php
	// Require functions file
	require_once "functions.php";
	$rootDir = checkHost();
	// Unset Session
	if(!session_start()){
		session_start();
	}

	session_unset($_SESSION['user_info'],$_SESSION['logged_in']);

	session_destroy();

	header("Location: {$rootDir}");
	exit;
