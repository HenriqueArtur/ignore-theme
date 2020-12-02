<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Primary Meta Tags -->
    <title><?php echo get_option('site_name_value');?></title>
    <meta name="title"       content="<?php echo get_option('site_name_value');?>">
    <meta name="description" content="<?php echo get_option('site_description_value');?>">

    <!-- Open Graph / Facebook -->
    <meta property="og:type"        content="website">
    <meta property="og:url"         content="<?php echo get_site_url(); ?>">
    <meta property="og:title"       content="<?php echo get_option('site_name_value');?>">
    <meta property="og:description" content="<?php echo get_option('site_description_value');?>">
    <meta property="og:image"       content="<?php echo get_option('site_banner_img_value');?>">

    <!-- Twitter -->
    <meta property="twitter:card"        content="summary_large_image">
    <meta property="twitter:url"         content="<?php echo get_site_url(); ?>">
    <meta property="twitter:title"       content="<?php echo get_option('site_name_value');?>">
    <meta property="twitter:description" content="<?php echo get_option('site_description_value');?>">
    <meta property="twitter:image"       content="<?php echo get_option('site_banner_img_value');?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header id="page-top" class="scrollspy">
    <section class="menu-area">
        <nav id="watchScroll">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo valign-wrapper">
                    <img src="<?php echo get_option('logo_img_value'); ?>" alt="logo">
                </a>
                <a href="#" data-target="slide-out" class="sidenav-trigger">
                  <i class="fas fa-bars"></i>
                </a>
                <?php
                wp_nav_menu( array( 
                    'theme_location'  => 'header-menu', 
                    'menu_class'      => 'header-web right hide-on-med-and-down',
                    'menu_id'         => 'menu-web',
                    'container'       => 'ul',
                    ));
                
                wp_nav_menu( array( 
                    'theme_location'  => 'header-menu', 
                    'menu_class'      => 'sidenav',
                    'menu_id'         => 'slide-out',
                    'container'       => 'ul',
                    'add_li_class'    => 'sidenav-close',
                    'walker'          => new Add_button_of_Sublevel_Walker,
                    )); 
                ?>
            </div>
        </nav>
    </section>
</header>
<div class="to-up">
    <a href="#page-top" class="to-up-icon">
        <i class="fas fa-arrow-up"></i>
    </a>
</div>