<?php
	require_once "ProfileModel.php";
	require_once "functions.php";
	// Init
	date_default_timezone_set( 'America/Chicago');
	$todayDate = date("Y-m-d");// current date
	session_start();
	$model = new ProfileModel();
	$user = $_SESSION['user_info']['user_name'];
	$existing = $model->getUserExisting($user);
	$renewDate = $existing['plan_renew'];
	$plan = $existing['user_plan'];
	if($plan === 'basic'){
		if(checkRenewDate($renewDate)){
			echo "not past";
		}else{
			// Renew Date Has Past
			$renew = setRenewDate($plan);
			var_dump($model->updateRenewUses($user, $renew));
		}
	}elseif( $plan === 'monthly' ){
		if(checkRenewDate($renewDate)){
			echo "not past";
		}else{
			echo "past";
		}
	}elseif( $plan === 'yearly' ){
		if(checkRenewDate($renewDate)){
			echo "not past";
		}else{
			echo "past";
		}
	}

// ==== Check Date ====
	function checkRenewDate($date){
		if( strtotime($date) < time() ){
	    // Renewal has past
			return false;
		} else {
	    // Renewal has not past
			return true;
		}
	}
