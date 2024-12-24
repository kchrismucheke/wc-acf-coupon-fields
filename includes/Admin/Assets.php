<?php
namespace WCACF\Admin;

class Assets {
    /**
     * Register and enqueue admin-specific styles
     */
    public function enqueue_styles() {
        $screen = get_current_screen();
        if ($screen->id === 'shop_coupon') {
            wp_enqueue_style(
                'wcacf-admin',
                WCACF_PLUGIN_URL . 'assets/css/admin.css',
                [],
                WCACF_VERSION
            );
        }
    }
}