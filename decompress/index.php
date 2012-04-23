<?php
	require_once("../_assets/includes/controller/PageView.php");
	// ========== Decompress Page =============
	$view = new PageView();
	echo '<div id="wrap">';
	// Require Header
		$view->show('header','partials','Decompress');
		// Require Modals
		$view->show('contact_modal','modals'); // Contact Modal
		$view->show('edit_modal','modals');
		$view->show('decompress_modal','modals');
		echo '<div id="main">';
			// Require Body
			$view->show('decompress_page','body');
		echo '</div><!-- /#main -->';
echo '</div> <!-- End Sticky Footer #wrap -->';
	// Require Footer
	$view->show('footer','partials');
