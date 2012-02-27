<?php
	// Require Register Model
	require_once "../model/RegisterModel.php";
	// Require Functions
	require_once "../helpers/functions.php";

	//Gloabl Vars
	$model = new RegisterModel();
	$userName = $_POST['register_username'];
	$userEmail = $_POST['register_email'];
	$userPass = $_POST['register_password1'];
	$userPlan = $_POST['plan_options'];
