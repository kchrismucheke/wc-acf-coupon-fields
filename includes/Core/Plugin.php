<?php
namespace WCACF\Core;

class Plugin {
    private $loader;
    private $assets;
    private $coupon_panel;
    private $coupon_fields;
    private $message_display;

    public function __construct() {
        $this->loader = new Loader();
        $this->assets = new \WCACF\Admin\Assets();
        $this->coupon_panel = new \WCACF\Admin\CouponPanel();
        $this->coupon_fields = new \WCACF\Fields\CouponFields();
        $this->message_display = new \WCACF\Frontend\MessageDisplay();
    }

    public function init() {
        if (!Dependencies::check()) {
            return;
        }

        $this->register_hooks();
        $this->loader->run();
    }

    private function register_hooks() {
        // Admin hooks
        $this->loader->add_action('admin_enqueue_scripts', $this->assets, 'enqueue_styles');
        $this->loader->add_filter('woocommerce_coupon_data_tabs', $this->coupon_panel, 'add_tab');
        $this->loader->add_action('woocommerce_coupon_data_panels', $this->coupon_panel, 'add_panel');

        // ACF fields
        $this->loader->add_action('init', $this->coupon_fields, 'register');

        // Frontend hooks
        $this->loader->add_action('woocommerce_before_cart', $this->message_display, 'show_message');
        $this->loader->add_action('woocommerce_before_checkout_form', $this->message_display, 'show_message');
    }
}