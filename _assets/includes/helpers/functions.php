<?php

// ==== Connect to database ====
	function connectDB(){
		// Create new PDO connection
		if($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['HTTP_HOST'] == '127.0.0.1' ){
				return $pdo = new PDO('mysql:host=localhost;dbname=compressorbot_test','root','root');
			}else{
				return $pdo = new PDO('mysql:host=mysql.compressorbot.com;dbname=compressorbot_test','dholloran','N3xusS3g');
			}
	}
// ==== Check if it is Development or Live ===
	function checkHost(){
		if($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['HTTP_HOST'] == '127.0.0.1' ){
				return 'http://localhost/~dholloran/compressorbot';
			}else{
				return 'http://compressorbot.com';
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
// ==== Write Output To File ====
	function outputWrite($output,$type){
		$root = checkHost();
			// Set Language Type
			switch ($type) {
				case 'html':
					$f = fopen("files/download/index.html", "w");
					$url = "index.html";
					break;
				case 'css':
					$f = fopen("files/download/style.css", "w");
					$url = "style.css";
					break;
				case 'js':
					$f = fopen("files/download/script.js", "w");
					$url = "script.js";
					break;

				default:
					$file = '';
					break;
			}
		fwrite($f, $output);
		fclose($f);
		return $url;
	}
// ==== Add 1 to Users Limit if Basic ====
	function addOneBasic(){
		session_start();
		$model = new ProfileModel();
		$user_name = $_SESSION['user_info']['user_name'];
		$plan = $model->getUserExisting($user_name);
		if($plan['user_plan'] === 'basic'){
			if($plan['tool_uses']<10){
				$uses = $plan['tool_uses'] + 1;
				$_SESSION['user_info']['tool_uses'] = $uses;
				$model->updatePlan($user_name,$uses);
				return true;
			}else{
				return false;
			}
		}else{
			return true;
		}
	}
// ==== Validate Input (W3C Validator) ====
	function validateFile($uri){
		// URL to validate
		$url = "http://validator.w3.org/check?uri=$uri;output=json;verbose=1";
		// Send to validator
		$validate = file_get_contents($url);
		// Handle JSON Response
		$response = json_decode($validate, true);
		if( $response === NULL ){
			return false;
		}
		$messages = $response['messages'];
	    $validationOutput = '';
	    // Create validation response string
	    foreach ($messages as $value) {
	    	$line = "Line: " . $value['lastLine'] . " ";
			$col = "Column: " . $value['lastColumn'] . " ";
			$lang = "Language: " . $value['messageid'] . "\r\n";
			$msg = "Error: " . $value['message'] . "\r\n";
		    $validationOutput .= $line . $col . $lang . $msg . "\r\n";
	    }

		return $validationOutput;
	}
