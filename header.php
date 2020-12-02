<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Henrique Artur</title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header id="page-top">
    <section class="menu-area">
        <nav>
            <div class="nav-wrapper">
                <a href="#" class="brand-logo">Logo</a>
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
                    'add_li_class'    => 'sidenav-close'
                    )); 
                ?>
            </div>
        </nav>
    </section>
</header>