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
 * HTML Compressor AJAX
 */
add_action('wp_ajax_build_download', 'build_download_callback');
add_action('wp_ajax_nopriv_build_download', 'build_download_callback');
function build_download_callback() {
	echo json_encode( 'works' );
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