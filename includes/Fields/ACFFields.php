<?php
namespace WCACF\Fields;

class ACFFields {
    public function register_fields() {
        if (function_exists('acf_add_local_field_group')) {
            acf_add_local_field_group([
                'key' => 'group_wc_coupon_fields',
                'title' => 'Additional Coupon Fields',
                'fields' => [
                    [
                        'key' => 'field_coupon_custom_message',
                        'label' => 'Custom Message',
                        'name' => 'coupon_custom_message',
                        'type' => 'textarea',
                        'instructions' => 'Enter a custom message for this coupon',
                        'required' => 0,
                    ],
                    [
                        'key' => 'field_coupon_icon',
                        'label' => 'Coupon Icon',
                        'name' => 'coupon_icon',
                        'type' => 'image',
                        'return_format' => 'array',
                        'preview_size' => 'thumbnail',
                    ],
                ],
                'location' => [
                    [
                        [
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'shop_coupon',
                        ],
                    ],
                ],
                'position' => 'normal',
                'style' => 'default',
                'active' => true,
            ]);
        }
    }
}