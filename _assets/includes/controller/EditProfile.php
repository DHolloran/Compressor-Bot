<?php
	// Require EditModel
	require_once "../model/ProfileModel.php";
	// Require Functions
	require_once "../helpers/functions.php";
	// Require AuthModel
	require_once "../model/AuthModel.php";

	//Global Vars
	$model = new ProfileModel();
	$auth = new AuthModel();
	$userName = sanitize($_POST['edit_username']);
	$userEmail = sanitize($_POST['edit_email']);
	$oldPass = sanitize($_POST['edit_old_password']);
	$newPass = sanitize($_POST['edit_password1']);
	$rePass = sanitize($_POST['edit_password2']);
	$userPlan = sanitize($_POST['os0']);
	$startPage = sanitize($_POST['start_page']);
	$renewDate = setRenewDate($userPlan);
	$existingInfo = $model->getUserExisting($userName);
	$rootDir = checkHost();
	// Check If Users Old Password Is valid
	if(!empty($oldPass) && !empty($newPass) && $auth->getUsernamePass($userName,$oldPass)){
		// Check If New Pass Is not Old Pass
		// Check If Re-enter Pass Matches New Pass
		if($oldPass !== $newPass && $rePass === $newPass){
			// Send To EditModel
		if($model->updateInfo($userName,$userEmail,$newPass,$startPage,$userPlan,$renewDate)){
			if($model->planChanged){
				echo json_encode('paypal');
			}else{
				echo json_encode('basic');
			}
		}else{
			echo json_encode('false');
		}
		}
	}else{
		// Send To Edit Model With No Password Change
		if($model->updateInfo($userName,$userEmail,'',$startPage,$userPlan,$renewDate)){
			if($model->planChanged){
				echo json_encode($userPlan);
			}else{
				echo json_encode('basic');
			}
		}else{
			echo json_encode('false');
		}
	}
