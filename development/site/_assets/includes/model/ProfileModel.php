<?php

/**
* ProfileModel
*/
class ProfileModel
{
// Vars
public $pdo;
// ==== Constructor() ====
	public function __construct()
	{
		require_once "../helpers/functions.php";
		$this->pdo = connectDB();
	} // __construct()
// ==== Create User usernameExists()====
	// Check if username already exists
	public function usernameExists($uname, $uemail){
		// Prepare Statement
		$stmt = $this->pdo->prepare("
			SELECT `user_name`, `user_email` FROM `users`
			WHERE `user_name` = :uname OR
			`user_email` = :uemail
		");

		// Execute Statement
		if($stmt->execute(array(':uname' => $uname, ':uemail' => $uemail ))){
			$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
			if(count($rows) == 1){
				return true;
			}else{
				return false;
			}
		}else{
			return PDO::errorCode();
		}

	} // usernameExists()
// ==== Create New User createUser() ====
	// Add user info and plan info
	// Add User/Plan Info to Database
	public function createUser($userName, $userEmail,$userPass,$userPlan){
		// Prepare Statement
		$stmt = $this->pdo->prepare("
			INSERT INTO `users`
			(`user_name`,`user_email`,`user_pass`,`start_page`,`tool_uses`,`user_plan`,`plan_renew`)
			VALUES
			(:uname,:uemail,:upass,:start_page,:uses,:plan,:plan_renew)
		");
		// Execute Statement
		$execute = $stmt->execute(array(':uname'=>$userName,':uemail'=>$userEmail,':upass'=>saltPass($userPass),':start_page'=>'compress',':uses'=>0,':plan'=>$userPlan, ':plan_renew'=>setRenewDate($userPlan)));

		if($execute){
			return true;
		}else{
			return false;
		}
	} // createUser()
// ==== Update Users Information updateInfo() ====
		public function updateInfo($uname,$email,$pass,$start,$plan,$renew){
			/*
				SET
				WHERE `user_name` = :uname
			*/
			// Update User Changed Info
		// Update only changed info
		/*
		*/
			// Build Query String
			$query = "UPDATE `users` SET ";
			if(!empty($email)){
				$query .= "`user_email` = :email,";
			}elseif(!empty($pass)){
				$query .= "`user_pass` = :pass,";
			}elseif(!empty($start)){
				$query .= "`start_page` = :start,";
			}elseif(!empty($plan)){
				$query .= "`user_plan` = :plan,";
			}elseif(!empty($renew)){
				$query .= "`plan_renew` = :renew,";
			}
			// Trim the last (,) off of the string
			$query = substr($query, 0, -1);
			// Add WHERE Clause for user_name
			$query .= " WHERE `user_name` = :uname";
		return $query;
		// $pass = saltPass($pass);
		// $renew = setRenewDate($renew);
			// Prepare Statement
			$this->pdo->prepare();
		} // updateInfo()
} // class
