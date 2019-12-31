<?php

add_action( 'after_setup_theme', function() {

    add_theme_support(
        'html5',
        array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'script',
                'style',
        )
    );

    add_theme_support( 'title-tag' );

    /* WooCommerce support */
    // add_theme_support( 'woocommerce' );

} );

add_action( 'wp_enqueue_scripts', function() {

    $theme_version = wp_get_theme()->get( 'Version' );

    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/lib/bootstrap/css/bootstrap.min.css', array(), '4.4.1' );
    wp_enqueue_style( 'theme', get_stylesheet_uri(), array( 'bootstrap' ), $theme_version );
} );

add_action( 'wp_enqueue_scripts', function() {

    $theme_version = wp_get_theme()->get( 'Version' );

    wp_deregister_script( 'jquery' );
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/lib/jquery/jquery.min.js', array(), '3.4.1', true );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/lib/bootstrap/js/bootstrap.bundle.min.js', array( 'jquery' ), '4.4.1', true );

} );

add_action( 'init', function() {

    $locations = array(
                'primary'  => 'Menu principal',
    );

    register_nav_menus( $locations );

} );
