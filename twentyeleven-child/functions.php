<?php
/**
 * Twenty Eleven additional functions
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

add_filter( 'attachment_template', 'ncb_attachment_template' );
add_filter( 'application_template', 'ncb_attachment_template' );
add_filter( 'audio_template', 'ncb_attachment_template' );
add_filter( 'mp4_template', 'ncb_attachment_template' );

function ncb_attachment_template( $template_path ) {
	wp_enqueue_script( 'audio-js', get_stylesheet_directory_uri() . '/js/audiojs/audiojs/audio.min.js' );
	wp_enqueue_script( 'video-js', get_stylesheet_directory_uri() . '/js/video-js/video.min.js' );
	wp_enqueue_style( 'video-js-css', get_stylesheet_directory_uri() . '/js/video-js/video-js.min.css' );
	add_action( 'wp_head', 'ncb_audio_js' );

	return $template_path;
}

function ncb_audio_js() {
	if ( ! is_admin() )
		echo '<script>audiojs.events.ready(function() {
	    var as = audiojs.createAll();
	  });
		</script>';
}