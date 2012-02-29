<?php

/**
* AuthModel
*/
class AuthModel
{
	public $pdo;

// Constructor
	public function __construct()
	{
		require_once "../helpers/functions.php";
		$this->pdo = connectDB();
	} // __construct()
// Validate user login
	public function getUsernamePass($user,$pass){
		// Prepare Statement
		$stmt = $this->pdo->prepare("
			SELECT
			`user_name`,`user_email`,`user_pass`,`start_page`,`tool_uses`,`user_plan`,`plan_renew`
			FROM `users`
			WHERE
			`user_name` = :uname
			AND
			`user_pass` = :pass
		");

		// Execute Statement
		$pass = saltPass($pass);
		if($stmt->execute(array(':uname'=>$user, ':pass'=>$pass))){
			$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
			if(count($rows) === 1){
				// If users pass/name exists
				return $rows[0];
			}else{
				// If users pass/name does not exist
				return false;
			}
		}else{
			return false;
		}
		return $stmt;
	} // getUsernamePass()
// Get all users info
	public function getUserInfo($user){
		// Prepare Statement
		$stmt = $this->pdo->prepare("
			SELECT
			`user_name`,`user_email`,`user_pass`,`start_page`,`tool_uses`,`user_plan`,`plan_renew`
			FROM `users`
			WHERE
			`user_name` = :uname
		");
	//Execute Statement
		if($stmt->execute(array(':uname'=>$user))){
			$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
			if(count($rows) === 1){
				return $rows;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
}
