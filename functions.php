function get_coupon_custom_data($coupon_code) {
$coupon = new WC_Coupon($coupon_code);
$coupon_post = get_post($coupon->get_id());

return [
'custom_field' => get_field('your_field_name', $coupon_post->ID),
'another_field' => get_field('another_field_name', $coupon_post->ID)
];
}
