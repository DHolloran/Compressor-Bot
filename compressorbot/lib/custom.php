<?php
/**
 * HTML Compressor AJAX
 */
add_action('wp_ajax_html_compressor', 'html_compressor_callback');
add_action('wp_ajax_nopriv_html_compressor', 'html_compressor_callback');
function html_compressor_callback() {
	$options = null;
	if ( $_GET['nocomments'] == 1 )
		$options = array( 'no-comments' => true );

	$minifed_html = html_compress($_GET['html'], $options );
	// Strip new lines, tabs, and spaces
	$minifed_html = str_replace(array("\r", "\r\n", "\n", "\t", "\s"), '', $minifed_html);
	$response = array(
		'minified'	=> $minifed_html
	);
	echo json_encode( $response );
	die();
}


/**
 * Pretty Print Debug
 */
function pp( $value )
{
	if( $_SERVER['HTTP_HOST'] != 'localhost' ) return;
	echo "<pre>";
	if ( $value ) {
		print_r( $value );
	} else {
		var_dump( $value );
	}
	echo "</pre>";
}

/**
* Favicon
*/
function db_add_favicon() {
	echo '<link rel="shortcut icon" href="'.get_template_directory_uri().'/assets/img/favicon.ico" />';
} // db_add_favicon()
// Add to all front end pages
add_action( 'wp_head', 'db_add_favicon' );
// Add to login
add_action( 'login_head', 'db_add_favicon' );
// Adds a favicon for admin area
add_action( 'admin_head', 'db_add_favicon' );