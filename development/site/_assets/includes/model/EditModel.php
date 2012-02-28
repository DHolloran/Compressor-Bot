<?php
	/**
	* EditModel
	*/
	class EditModel
	{

		function __construct()
		{
			require_once "../helpers/functions.php";
			$this->pdo = connectDB();
		}
		// Update User Info
		// Update only changed info
		/*
			UPDATE `users`
			SET `user_email` = :email,
				`user_pass` = :pass,
				`start_page` = :start,
				`user_plan` = :plan,
				`plan_renew` = :renew
			WHERE `user_name` = :uname
		*/
		/* Build query string with
			$query = "UPDATE `users` SET "
			if(!empty($var)){
				$query .= "`col` = :value,";
			}
			**** Then trim the last , off of the string ****
			then $query .= " WHERE `user_name` = :uname"
		*/
		// $pass = saltPass($pass);
		// $renew = setRenewDate($renew);
	}
