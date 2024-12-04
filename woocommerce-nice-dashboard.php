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

// Enqueue styles.
function woo_nice_dashboard_enqueue_styles() {
    wp_enqueue_style( 'woo-nice-dashboard-styles', WOO_NICE_DASHBOARD_URL . 'assets/styles.css', [], '1.0' );
}
add_action( 'wp_enqueue_scripts', 'woo_nice_dashboard_enqueue_styles' );
