<?php
	// Require Edit Model
	require_once "../model/ProfileModel.php";
	// Require Functions
	require_once "../helpers/functions.php";

	//Global Vars
	$model = new ProfileModel();
	$userName = sanitize($_POST['edit_username']);
	$userEmail = sanitize($_POST['edit_email']);
	$oldPass = sanitize($_POST['edit_old_password']);
	$newPass = sanitize($_POST['edit_password1']);
	$userPlan = sanitize($_POST['plan_options']);
	$startPage = sanitize($_POST['start_page']);
	$renewDate = setRenewDate($userPlan);
	echo "echo";
	var_dump($model->updateInfo($userName,$userEmail,$newPass,$startPage,$userPlan, $renewDate));
	// If user changes plan update new renew date;
	// If an option is not choosen do not update it
