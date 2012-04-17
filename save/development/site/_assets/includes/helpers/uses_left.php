<?php
	session_start();
	$plan = $_SESSION['user_info']['user_plan'];
	if($plan === 'basic'){
		$uses = $_SESSION['user_info']['tool_uses'];
		echo json_encode($uses);
	}else{
		echo json_encode('Unlimited');
	}
