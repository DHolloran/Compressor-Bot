<?php
	require_once("../_assets/includes/controller/PageView.php");
	// ========== Decompress Page =============
	$view = new PageView();

	// Require Header
	$view->show('header','partials','Decompress,');
	// Require Body
	$view->show('decompress_page','body');
	// Require Footer
	$view->show('footer','partials');

	// Require Modals
	$view->show('contact_modal','modals'); // Contact Modal
	$view->show('edit_modal','modals');
	$view->show('decompress_modal','modals');

