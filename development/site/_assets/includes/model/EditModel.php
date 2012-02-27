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
	}
