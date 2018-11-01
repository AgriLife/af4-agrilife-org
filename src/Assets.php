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
            ALAF4_DIR_URL . 'css/agrilife.css',
            array(),
            filemtime(ALAF4_DIR_PATH . 'css/agrilife.css'),
            'screen'
        );

        wp_register_style(
            'agrilife-home-styles',
            ALAF4_DIR_URL . 'css/agrilife-home.css',
            array(),
            filemtime(ALAF4_DIR_PATH . 'css/agrilife-home.css'),
            'screen'
        );

        wp_register_style(
            'agrilife-extension-styles',
            ALAF4_DIR_URL . 'css/agrilife-extension.css',
            array(),
            filemtime(ALAF4_DIR_PATH . 'css/agrilife-extension.css'),
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

        if( is_page_template('home.php') ){
            wp_enqueue_style( 'agrilife-home-styles' );
        }

        if( is_page_template('extension.php') ){
            wp_enqueue_style( 'agrilife-extension-styles' );
        }

    }

    /**
     * Dequeues global styles
     * @since 1.0
     * @global $wp_styles
     * @return void
     */
    public function dequeue_default_styles() {

        wp_dequeue_style( 'agriflex-default-styles' );

    }

}
