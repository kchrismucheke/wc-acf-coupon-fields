<?php
namespace WCACF\Admin;

class Admin {
    public function init() {
        add_action('admin_enqueue_scripts', [$this, 'enqueue_admin_scripts']);
        add_filter('woocommerce_coupon_data_tabs', [$this, 'add_coupon_data_tab']);
        add_action('woocommerce_coupon_data_panels', [$this, 'add_coupon_data_panel']);
    }

    public function enqueue_admin_scripts() {
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

    public function add_coupon_data_tab($tabs) {
        $tabs['custom_fields'] = [
            'label' => __('Custom Fields', 'wc-acf-coupon-fields'),
            'target' => 'custom_coupon_fields',
            'class' => '',
        ];
        return $tabs;
    }

    public function add_coupon_data_panel() {
        echo '<div id="custom_coupon_fields" class="panel woocommerce_options_panel">';
        // ACF fields will be automatically rendered here
        echo '</div>';
    }
}