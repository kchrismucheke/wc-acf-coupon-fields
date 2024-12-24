<?php
namespace WCACF\Core;

class Dependencies {
    /**
     * Check if all required plugins are active
     *
     * @return bool
     */
    public static function check() {
        if (!class_exists('ACF') || !class_exists('WooCommerce')) {
            add_action('admin_notices', [__CLASS__, 'show_notice']);
            return false;
        }
        return true;
    }

    /**
     * Display dependency notice
     */
    public static function show_notice() {
        echo '<div class="error"><p>';
        echo esc_html__('WooCommerce ACF Coupon Fields requires both WooCommerce and Advanced Custom Fields to be installed and activated.', 'wc-acf-coupon-fields');
        echo '</p></div>';
    }
}