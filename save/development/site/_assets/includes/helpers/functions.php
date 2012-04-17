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
// ==== Create Zip File ====
	function create_zip($files = array(),$destination = '',$overwrite = true) {
	  //if the zip file already exists and overwrite is false, return false
	  if(file_exists($destination) && !$overwrite) { return false; }
	  //vars
	  $valid_files = array();
	  //if files were passed in...
	  if(is_array($files)) {
	    //cycle through each file
	    foreach($files as $file) {
	      //make sure the file exists
	      if(file_exists($file)) {
	        $valid_files[] = $file;
	      }
	    }
	  }
	  //if we have good files...
	  if(count($valid_files)) {
	    //create the archive
	    $zip = new ZipArchive();
	    if($zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) {
	      return false;
	    }
	    //add the files
	    foreach($valid_files as $file) {
	      $zip->addFile($file,$file);
	    }
	    //debug
	    //echo 'The zip archive contains ',$zip->numFiles,' files with a status of ',$zip->status;

	    //close the zip -- done!
	    $zip->close();

	    //check to make sure the file exists
	    return file_exists($destination);
	  }
	  else
	  {
	    return false;
	  }
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
