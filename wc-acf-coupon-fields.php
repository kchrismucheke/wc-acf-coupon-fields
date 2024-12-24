<?php
/**
 * Plugin Name: WooCommerce ACF Coupon Fields
 * Description: Adds custom ACF fields to WooCommerce coupons
 * Version: 1.0.0
 * Author: Christopher Kiunye Mucheke
 * License: GPL v2 or later
 */

if (!defined('ABSPATH')) {
    exit;
}

// Plugin constants
define('WCACF_VERSION', '1.0.0');
define('WCACF_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('WCACF_PLUGIN_URL', plugin_dir_url(__FILE__));

// Autoloader
require_once WCACF_PLUGIN_DIR . 'includes/class-wcacf-autoloader.php';
new WCACF\Autoloader();

// Initialize the plugin
function wcacf_init()
{
    $plugin = new WCACF\Core\Plugin();
    $plugin->init();
}
add_action('plugins_loaded', 'wcacf_init');
