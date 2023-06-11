<?php
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
// foreach ($order_items as $item) {
//     // list of product in order 
//     $product = $item->get_product();
//     // product price 
//     $product_price = $product->get_price();
//     // product title 
//     $product_title = $product->get_title();
//     // product image 
//     $product_image = $product->get_image();
//     echo " عکس محصول : " . $product_image;
//     echo "عنوان محصول : " . $product_title;
//     // product url 
//     $slug = $product->get_slug();
//     $product_url = home_url() . '/products/' . $slug;
//     // downloadable file 
//     $downloads = $product->get_downloads();
//     foreach ($downloads as $download) {
//         // Get the download URL
//         $download_url = $download['file'];
//         // name of downlaod url 
//         $download_name = $download['name'];
//         // Get the download limit (-1 indicates no limit)
//         $download_limit = $download['download_limit'];

//         // Get the download expiration (-1 indicates no expiration)
//         $download_expiry = $download['download_expiry'];

//         // Output the download information
//         echo "Download URL: " . $download_url;
//         echo "<br>";
//         echo $download_name;
//         echo "<br>";
//         echo "Download Limit: " . $download_limit;
//         echo "<br>";
//         echo "Download Expiration: " . $download_expiry;
//         echo "<br>";
//     }
// }