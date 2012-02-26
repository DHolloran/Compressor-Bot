<?php
	// Gloabl Vars
	$subject = $_POST['contact_form_subject'];
	$name = $_POST['contact_form_name'];
	$email = $_POST['contact_form_email'];
	$message = $_POST['contact_form_message'];
	$to = 'compressorbot@compressorbot.com';
	$from = 'emailbot@compressorbot.com';
	$headers = "";
	$headers .= "To: Compressorbot <{$to}>" . "\r\n";
	$headers .= "Reply-To: {$email}" . "\r\n";
	$headers .= "From: {$name} <{$from}>" . "\r\n";

	//Send mail
	if(!empty($subject)&&!empty($email)&&!empty($message)){
		if(mail($to,$subject,$message,$headers)){
			echo "mail sent!";
		}
	}

