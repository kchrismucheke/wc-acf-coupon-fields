<?php
namespace WCACF\Admin;

class CouponPanel {
    /**
     * Add custom tab to coupon data tabs
     *
     * @param array $tabs
     * @return array
     */
    public function add_tab($tabs) {
        $tabs['custom_fields'] = [
            'label'  => __('Custom Fields', 'wc-acf-coupon-fields'),
            'target' => 'custom_coupon_fields',
            'class'  => '',
        ];
        return $tabs;
    }

    /**
     * Add custom panel to coupon data panels
     */
    public function add_panel() {
        echo '<div id="custom_coupon_fields" class="panel woocommerce_options_panel">';
        // ACF fields will be automatically rendered here
        echo '</div>';
    }
}