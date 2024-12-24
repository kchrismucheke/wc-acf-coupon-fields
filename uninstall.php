<?php
if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit;
}

// Clean up plugin data if needed
$acf_fields = [
    'field_coupon_custom_message',
    'field_coupon_icon'
];

foreach ($acf_fields as $field) {
    delete_metadata('post', 0, $field, '', true);
}