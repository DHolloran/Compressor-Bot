<?php
	require_once("_assets/includes/controller/PageView.php");
	// ========== Home Page =============
	$view = new PageView();
	// Require Header
	$view->show('header','templates');

	// Require Modals
	$view->show('contact_modal','modals'); // Contact Us Modal
	$view->show('edit_modal','modals'); // Edit Profile Modal
	$view->show('register_modal','modals'); // Register Modal

	// Require Body
	$view->show('home_page','body');

	// Require Footer
	$view->show('footer','templates');

