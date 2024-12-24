<?php
namespace WCACF\Frontend;

class Display {
    public function __construct() {
        add_action('woocommerce_before_cart', [$this, 'display_coupon_message']);
        add_action('woocommerce_before_checkout_form', [$this, 'display_coupon_message']);
    }

    public function display_coupon_message() {
        $applied_coupons = WC()->cart->get_applied_coupons();
        
        foreach ($applied_coupons as $coupon_code) {
            $coupon = new \WC_Coupon($coupon_code);
            $coupon_id = $coupon->get_id();
            
            $custom_message = get_field('coupon_custom_message', $coupon_id);
            $coupon_icon = get_field('coupon_icon', $coupon_id);
            
            if ($custom_message || $coupon_icon) {
                echo '<div class="wcacf-coupon-message">';
                if ($coupon_icon) {
                    echo '<img src="' . esc_url($coupon_icon['url']) . '" alt="' . esc_attr($coupon_icon['alt']) . '">';
                }
                if ($custom_message) {
                    echo '<p>' . esc_html($custom_message) . '</p>';
                }
                echo '</div>';
            }
        }
    }
}