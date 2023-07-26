<?php
require_once(ORD_LI_DIR . 'App/Dashboard/Order_list_core.php');
// order id 
$order_id = isset($_SERVER['REQUEST_URI']) ? basename($_SERVER['REQUEST_URI']) : '';
$order_id = preg_replace('/[^0-9]/', '', $order_id);
// total discount 
$discountTotal = wc_price($order->get_data()['discount_total']);
// total shipping 
// order date 
$order_date = $order->get_date_created()->format('Y-m-d');
// payment date 
$payment_date = $order->get_date_paid()->format('Y-m-d');
// number of each item 
$product_count = $order->get_item_count();
$shippingTotal = wc_price($order->get_data()['shipping_total']);
// total cost 
$total = wc_price($order->get_data()['discount_total'] + $order->get_data()['total']);
// payment total
$paymentTotal = wc_price($order->get_data()['total']);
// first name
$firstName = $order->get_data()['billing']['first_name'];
// delivery method 
$shipping_methods = $order->get_shipping_methods();
// last name
$lastName = $order->get_data()['billing']['last_name'];
// address
$address = $order->get_data()['billing']['address_1'];
// postcode 
$postcode = $order->get_data()['billing']['postcode'];
// phone number
$phone = $order->get_data()['billing']['phone'];
// payment method 
$payment = $order->get_data()['payment_method_title'];
// product img and title 
$order_items = $order->get_items();
// orders url 
$dashboard_url = get_permalink( get_option('woocommerce_myaccount_page_id') );
