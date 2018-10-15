<?php

namespace Agrilife;

/**
 * Add assets
 * @package Agrilife.org
 * @since 0.1.0
 */
class Assets {

    public function __construct() {

        // Register global styles used in the theme
        add_action( 'wp_enqueue_scripts', array( $this, 'register_styles' ) );

        // Enqueue extension styles
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );

        // Dequeue default styles
        add_action( 'wp_print_styles', array( $this, 'dequeue_default_styles'), 5 );

    }

    /**
     * Registers all styles used within the plugin
     * @since 0.1.0
     * @return void
     */
    public function register_styles() {

        wp_register_style(
            'agrilife-styles',
            AF_THEME_DIRURL . '/css/agrilife.css',
            array(),
            filemtime(AF_THEME_DIRPATH . '/css/agrilife.css'),
            'screen'
        );

    }

    /**
     * Enqueues extension styles
     * @since 0.1.0
     * @global $wp_styles
     * @return void
     */
    public function enqueue_styles() {

        wp_enqueue_style( 'agrilife-styles' );

    }

    /**
     * Dequeues global styles
     * @since 1.0
     * @global $wp_styles
     * @return void
     */
    public function dequeue_default_styles() {

        wp_dequeue_style( 'default-styles' );

    }

}
