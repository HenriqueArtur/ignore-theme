<?php
function load_scripts() {
	wp_enqueue_style( 'materialize-css', 'https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css', array(), '1.0.0', 'all' );
	wp_enqueue_script( 'materialize-js', 'https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js', array(), '1.0.0', true );
	wp_enqueue_style( 'style', get_stylesheet_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'load_scripts' );

// Presentation Section
require_once get_template_directory() . '/functions/presentation_section.php';

// Custom Post Type
require_once get_template_directory() . '/functions/custom_post_type/social_medias.php';