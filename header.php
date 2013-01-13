<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="<?php get_bloginfo( 'description', 'display' ); ?>">

    <title><?php
        wp_title( '|', true, 'right' );
        bloginfo( 'name' );
    ?></title>

    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
    <![endif]-->

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <header id="header" class="header">
        
        <a href="<?php echo home_url( '/' ); ?>" class="logo" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>

        <?php
        wp_nav_menu( array(
            'menu'              => 'Main Menu',
            'menu_class'        => 'mainNav',
            'container'         => false,
            'theme_location'    => 'main_menu'
        ));
        ?>

    </header>

    <section class="content">