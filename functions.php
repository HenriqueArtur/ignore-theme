<?php
function load_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'load_scripts' );