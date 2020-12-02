<?php
add_action( 'wp_enqueue_scripts', 'load_global_scripts' );
function load_global_scripts() {
	wp_enqueue_style( 'materialize-css', 'https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css', array(), '1.0.0', 'all' );
	wp_enqueue_script( 'materialize-js', 'https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js', array(), '1.0.0', true );
	wp_enqueue_style( 'style', get_stylesheet_directory_uri() . '/style.css' );
	
	wp_enqueue_script( 'materialize-front-functions', get_stylesheet_directory_uri() . '/assets/js/front/materialize.js', array( 'jquery' ), '1.0.0', true );
}

add_action( 'admin_enqueue_scripts', 'load_scripts_adm' );
function load_scripts_adm() {
	wp_enqueue_script( 'upload-profile-helper', get_stylesheet_directory_uri() . '/assets/js/wp_helpes/upload-profile.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'dynamic-fields-helper', get_stylesheet_directory_uri() . '/assets/js/wp_helpes/dynamic-fields.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_style( 'css-helper', get_stylesheet_directory_uri() . '/assets/css/wp_helpes.css', array(), '1.0.0', 'all' );
}

add_action( 'wp_enqueue_scripts', 'load_style_scripts' );
function load_style_scripts() {
	wp_enqueue_script( 'grid', get_stylesheet_directory_uri() . '/assets/js/elements/grid.js', array(), '1.0.0', true );
}

/* Custom Media Uploader */ 
add_action( 'admin_enqueue_scripts', 'load_media_files' );
function load_media_files() {
    wp_enqueue_media();
}

/* Header */
function custom_header_menu() {
    register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'custom_header_menu' );

function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

// Presentation Section
require_once get_template_directory() . '/functions/presentation_section.php';

// Custom Post Type
require_once get_template_directory() . '/functions/custom_post_type/social_medias.php';
require_once get_template_directory() . '/functions/custom_post_type/wp_projects.php';
