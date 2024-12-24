<?php
namespace WCACF\Frontend;

class MessageDisplay {
    /**
     * Display custom message for applied coupons
     */
    public function show_message() {
        $applied_coupons = WC()->cart->get_applied_coupons();
        
        foreach ($applied_coupons as $coupon_code) {
            $this->render_coupon_message($coupon_code);
        }
    }

    /**
     * Render message for a specific coupon
     *
     * @param string $coupon_code
     */
    private function render_coupon_message($coupon_code) {
        $coupon = new \WC_Coupon($coupon_code);
        $coupon_id = $coupon->get_id();
        
        $custom_message = get_field('coupon_custom_message', $coupon_id);
        $coupon_icon = get_field('coupon_icon', $coupon_id);
        
        if (!$custom_message && !$coupon_icon) {
            return;
        }

        $this->render_message_html($custom_message, $coupon_icon);
    }

    /**
     * Render the HTML for the coupon message
     *
     * @param string $message
     * @param array $icon
     */
    private function render_message_html($message, $icon) {
        echo '<div class="wcacf-coupon-message">';
        if ($icon) {
            echo '<img src="' . esc_url($icon['url']) . '" alt="' . esc_attr($icon['alt']) . '">';
        }
        if ($message) {
            echo '<p>' . esc_html($message) . '</p>';
        }
        echo '</div>';
    }
}