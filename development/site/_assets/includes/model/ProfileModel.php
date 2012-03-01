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
// ==== Get Users Existing Info getUserExisting() ====
	public function getUserExisting($user){
		// Prepare Statement
		$stmt = $this->pdo->prepare("
			SELECT `user_name`, `user_email`,`user_pass`,`start_page`,`tool_uses`,`user_plan`,`plan_renew`
			FROM `users`
			WHERE `user_name` = :uname
		");
		// Execute Statement
		if($stmt->execute(array(':uname'=>$user))){
			$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
			if(count($rows) === 1){
				return $rows[0];
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
// ==== Update Users Information updateInfo() ====
	public function updateInfo($uname,$email,$pass,$start,$plan,$renew){
		// Update User Changed Info
		// Update only changed info
	// == Build Query String ==
			$query = "UPDATE `users` SET ";
			// Build Query Array
			$queryArr = array();
		// == User Email ==
			if(!empty($email)){
				$existing = $this->getUserExisting($uname);
				if($existing['user_email'] != $email){
					// Add To Query
					$query .= "`user_email` = :email,";
					// Add To Query Array
					$queryArr[':email'] = $email;
				}
			}
		// == User Password ==
			if(!empty($pass)){
				$existing = $this->getUserExisting($uname);
				if($existing['user_pass'] != $pass){
					$pass = saltPass($pass);
					// Add To Query
					$query .= "`user_pass` = :pass,";
					// Add To Query Array
					$queryArr[':pass'] = $pass;
				}
			}
		// == Start Page ==
			if(!empty($start)){
				$existing = $this->getUserExisting($uname);
				if($existing['start_page'] != $start){
					// Add To Query
					$query .= "`start_page` = :start,";
					// Add To Query Array
					$queryArr[':start'] = $start;
				}
			}
		// == User Plan ==
			if(!empty($plan)){
				// Check if plan has changed
				$existing = $this->getUserExisting($uname);
				if($existing['user_plan'] != $plan){
					// Add To Query
					$query .= "`user_plan` = :plan, `plan_renew` = :renew,";
					// Add To Query Array
					$queryArr[':plan'] = $plan;
					$queryArr[':renew'] = $renew;
				}
			}
			// Trim the last (,) off of the string
			$query = substr($query, 0, -1);
			// Add WHERE Clause for user_name
			$query .= " WHERE `user_name` = :uname";
			// Add user_name to query array
			$queryArr[':uname'] = $uname;
	// == Make Sure Something Has Been Changed ==
		if($query === "UPDATE `users` SET WHERE `user_name` = :uname"){
			return false;
		}
	// == Prepare Statement ==
		$stmt = $this->pdo->prepare($query);
	// == Execute Statement
		if($stmt->execute($queryArr)){
			// Update Session
			session_start();
			$_SESSION['user_info'] = $this->getUserExisting($uname);
			return true;
		}else{
			return false;
		}

	} // updateInfo()
} // class
