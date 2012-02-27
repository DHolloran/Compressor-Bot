<?php

/**
* RegisterModel
*/
class RegisterModel
{
// Vars
public $pdo;
// Constructor
	public function __construct()
	{
		require_once "../helpers/functions.php";
		$this->pdo = connectDB();
	} // __construct()

	// ==== Create User ====
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
} // class
