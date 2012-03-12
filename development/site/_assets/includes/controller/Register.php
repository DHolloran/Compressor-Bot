<?php
	// Require Register Model
	require_once "../model/ProfileModel.php";
	// Require Functions
	require_once "../helpers/functions.php";

	//Gloabl Vars
	$model = new ProfileModel();
	$userName = sanitize($_POST['register_username']);
	$userEmail = sanitize($_POST['register_email']);
	$userPass = sanitize($_POST['register_password1'],false);
	$userPlan = sanitize($_POST['os0']);
	$rootDir = checkHost();
	// Check if user exists
	if($model->usernameExists($userName, $userEmail)){
		echo json_encode(true);
	}else{
		if($model->createUser($userName, $userEmail, $userPass,$userPlan)){
			if($userPlan === 'basic'){
			echo json_encode("basic");
			}elseif($userPlan === 'monthly' || $userPlan === 'yearly'){
				echo json_encode("paypal");
			}
		}else{
			echo json_encode(false);
		}
	}
