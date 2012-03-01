<?php

// ==== Connect to database ====
	function connectDB(){
		// Create new PDO connection
		return $pdo = new PDO('mysql:host=localhost;dbname=compressorbot_test','root','root');
	}
// ==== Check if it is Development or Live ===
	function checkHost(){
		if($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['HTTP_HOST'] == '127.0.0.1' ){
				return 'http://localhost/~dholloran/compressorbot/development/site';
			}else{
				return 'http://compressorbot.com/development/site';
			}
	}
// ==== Salt the pass ====
	function saltPass($pass){
		$pass .= 'dae1235rawef3242512fr3';
		$saltPass = md5($pass);
		return $saltPass;
	}
// ==== Sanitize Input ====
	function sanitize($input,$lowercase = true){
		if($lowercase){
			return empty($input) ?'':strtolower(trim($input));
		}else{
			return empty($input) ?'':trim($input);
		}
	}
// ==== Set renew date ====
	function setRenewDate($plan){
		date_default_timezone_set( 'America/Chicago');
		$todayDate = date("Y-m-d");// current date
		if( $plan === 'basic' ){
			// No Limit For Basic
			return '00/00/0000';
		}elseif( $plan === 'monthly' ){
			//Add one month to today
			$date = strtotime(date("m/d/Y", strtotime($todayDate)) . "+1 month");

			return date('m/d/Y', $date);
		}elseif( $plan === 'yearly' ){
			//Add one Year to today
			$date = strtotime(date("m/d/Y", strtotime($todayDate)) . "+1 year");

			return date('m/d/Y', $date);
		}
	}
// ==== Redirect after page is loaded ====
	function afterHeaderRedirect($url){
		echo "<META HTTP-EQUIV=\"Refresh\" Content=\"0; URL={$url}\">";
	}
