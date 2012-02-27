<?php

	// Require Register Model
	require_once "../model/RegisterModel.php";
	// Require Functions
	require_once "../helpers/functions.php";

	//Gloabl Vars
	$model = new RegisterModel();
	$userName = $_POST['register_username'];
	$userEmail = $_POST['register_email'];
	$userPass = $_POST['register_password1'];
	$userPlan = $_POST['plan_options'];

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
			echo "<META HTTP-EQUIV=\"Refresh\" Content=\"0; URL={$rootDir}/compress/\">";
    		exit;
		}elseif($plan === 'monthly'){
			echo "<META HTTP-EQUIV=\"Refresh\" Content=\"0; URL=http://paypal.com\">";
    		exit;
		}elseif($plan === 'yearly'){
			echo "<META HTTP-EQUIV=\"Refresh\" Content=\"0; URL=http://paypal.com\">";
		}
	}
