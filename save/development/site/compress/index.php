<?php
	require_once("../_assets/includes/controller/PageView.php");
	// ========== Compress Page =============
	$view = new PageView();

	// Require Header
	$view->show('header','partials','Compress');
	// Require Body
	$view->show('compress_page','body');
	// Require Footer
	$view->show('footer','partials');

	// Require Modals
	$view->show('contact_modal','modals'); // Contact Modal
	$view->show('edit_modal','modals');
	$view->show('compress_modal','modals');

