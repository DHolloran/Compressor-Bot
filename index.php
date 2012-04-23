<?php
	require_once("_assets/includes/controller/PageView.php");
	// ========== Home Page =============
	$view = new PageView();
	// Require Header
	echo '<div id="wrap">';
		$view->show('header','partials','Home');

		// Require Modals
		$view->show('contact_modal','modals'); // Contact Us Modal
		$view->show('edit_modal','modals'); // Edit Profile Modal
		$view->show('register_modal','modals'); // Register Modal

		// Require Body
		echo '<div id="main">';
			$view->show('home_page','body');
		echo '</div><!-- /#main -->';
	echo '</div> <!-- End Sticky Footer #wrap -->';
	// Require Footer
	$view->show('footer','partials');

