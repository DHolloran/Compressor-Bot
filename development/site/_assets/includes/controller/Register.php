<?php

	// Require Register Model
	require_once "../model/RegisterModel.php";
	// Require Functions
	require_once "../helpers/functions.php";

	//Gloabl Vars
	$model = new RegisterModel();
	$userName = sanitize($_POST['register_username']);
	$userEmail = sanitize($_POST['register_email']);
	$userPass = sanitize($_POST['register_password1'],false);
	$userPlan = sanitize($_POST['plan_options']);

	// Check if user exists
	if($model->usernameExists($userName, $userEmail)){
		echo "User exists";
	}else{

		if($model->createUser($userName, $userEmail, $userPass,$userPlan)){
			completionRedirect($userPlan);
		}else{
// Put something went wrong code here

		}
	}

	// Redirect to paypal if paid plan or compress page if not
	function completionRedirect($plan){
		if($plan === 'basic'){
			$rootDir =  checkHost();
			afterHeaderRedirect("$rootDir}/compress/");
    		exit;
		}elseif($plan === 'monthly'){
			afterHeaderRedirect('http://paypal.com');
    		exit;
		}elseif($plan === 'yearly'){
			afterHeaderRedirect('http://paypal.com');
		}
	}
