<?php
/**
 * Plugin Name: WooCommerce Nice Dashboard
 * Description: Customize the WooCommerce My Account dashboard with icons and styling.
 * Version: 1.0
 * Author: Yahya Bakr
 * Author URI: https://github.com/YahyaMohamedBakr/woocommerce-nice-dashboard
 * Text Domain: woocommerce-nice-dashboard
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Define plugin URL and path.
define( 'WOO_NICE_DASHBOARD_URL', plugin_dir_url( __FILE__ ) );
define( 'WOO_NICE_DASHBOARD_PATH', plugin_dir_path( __FILE__ ) );

// Include functions.
require_once WOO_NICE_DASHBOARD_PATH . 'includes/functions.php';
require_once WOO_NICE_DASHBOARD_PATH . 'includes/woo_nice_dashboard_settings_page .php';

// Enqueue styles.
function woo_nice_dashboard_enqueue_styles() {
    wp_enqueue_style( 'woo-nice-dashboard-styles', WOO_NICE_DASHBOARD_URL . 'assets/styles.css', [], '1.0' );
}
add_action( 'wp_enqueue_scripts', 'woo_nice_dashboard_enqueue_styles' );


//ِِ Add Font Awesome

function woo_nice_dashboard_enqueue_fontawesome() {
    // Check if Font Awesome is already enqueued by the theme or another plugin.
    if ( ! wp_style_is( 'font-awesome', 'enqueued' ) ) {
        wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css', [], '6.5.0' );
    }
}
add_action( 'wp_enqueue_scripts', 'woo_nice_dashboard_enqueue_fontawesome' );



// Add admin menu for settings.
function woo_nice_dashboard_add_admin_menu() {
    add_menu_page(
        __( 'WooCommerce Nice Dashboard', 'woocommerce-nice-dashboard' ),
        __( 'Nice Dashboard', 'woocommerce-nice-dashboard' ),
        'manage_options',
        'woo-nice-dashboard',
        'woo_nice_dashboard_settings_page',
        'dashicons-dashboard',
        25
    );
}
add_action( 'admin_menu', 'woo_nice_dashboard_add_admin_menu' );

// Register settings.
function woo_nice_dashboard_register_settings() {
    register_setting( 'woo_nice_dashboard_settings', 'woo_nice_dashboard_icons' );
    register_setting( 'woo_nice_dashboard_settings', 'woo_nice_dashboard_colors' );
}
add_action( 'admin_init', 'woo_nice_dashboard_register_settings' );
