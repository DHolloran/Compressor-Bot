<?php
	// Requires
	require_once "../model/AuthModel.php";
	require_once "functions.php";
	// Global Vars
	$model = new AuthModel();
	$userName = sanitize($_POST['login_username']);
	$userPass = sanitize($_POST['login_password'], false);

	// Check user name and pass
	$results = $model->getUsernamePass($userName, $userPass);
	if($results){
		session_start();
		$_SESSION['user_info'] = $results;
		$_SESSION['logged_in'] = true;
		var_dump($results[0]['start_page']);
		$rootDir = checkHost();
		$page = $results[0]['start_page'];
		echo "{$rootDir}/{$page}/";
		afterHeaderRedirect("{$rootDir}/{$page}/");
	}else{
		echo "user does not exist";
		return false;
	}


