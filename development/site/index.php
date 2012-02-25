<?php
	require_once("_assets/includes/controller/PageView.php");
	// ========== Home Page =============
	$view = new PageView();

	// Require Header
	$view->show('header','templates');
	// Require Body
	$view->show('home_page','body');
	// Require Footer
	$view->show('footer','templates');

	// Require Modals
	$view->show('contact_modal','modals'); // Contact Modal
	$view->show('edit_modal','modals');
	$view->show('register_modal','modals');

