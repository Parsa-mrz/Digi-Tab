<?php
// order id 
$order_id = isset($_SERVER['REQUEST_URI']) ? basename($_SERVER['REQUEST_URI']) : '';
$order_id = preg_replace('/[^0-9]/', '', $order_id);
// total discount 
$discountTotal = wc_price($order->get_data()['discount_total']);
// total shipping 
$shippingTotal = wc_price($order->get_data()['shipping_total']);
// total cost 
$total = wc_price($order->get_data()['discount_total'] + $order->get_data()['total']);
// payment total
$paymentTotal = wc_price($order->get_data()['total']);
// first name
$firstName = $order->get_data()['billing']['first_name'];
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
foreach ($order_items as $item) {
    $product = $item->get_product();
    $product_price = $product->get_price();
    $product_title = $product->get_title();
    $product_image = $product->get_image();
    $slug = $product->get_slug();
    $product_url = home_url() . '/products/' . $slug;
    echo $product_image;
    echo "<br>";
    echo 'قیمت محصول :' . $product_price;
    echo "عنوان محصول : " . $product_title;
    echo "<br>";
    echo " پیوند یکتا محصول :  <a href='$product_url'>مشاهده محصول</a>";
    echo "<br>";
}
// order date 
$order_date = $order->get_date_created()->format('Y-m-d');
// payment date 
$payment_date = $order->get_date_paid()->format('Y-m-d');
// number of each item 
$product_count = $order->get_item_count();
echo "<br>";
// echo " عکس محصول : " . $product_image;
// echo "عنوان محصول : " . $product_title;
echo "<br>";
echo "تخفیف :" . $discountTotal;
echo '<br>';
echo "شماره سفارش :" . $order_id;
echo '<br>';
echo " هزینه حمل و نقل :" . $shippingTotal;
echo '<br>';
echo " مبلغ سفارش :" . $total;
echo '<br>';
echo "  تحویل گیرنده : " . $firstName . ' ' . $lastName;
echo '<br>';
echo "آدرس : " . $address;
echo "<br>";
echo "کد پستی : " . $postcode;
echo "<br>";
echo " شماره تماس : " . $phone;
echo "<br>";
echo "  روش پرداخت : " . $payment;
echo "<br>";
echo "تاریخ ثبت سفارش : " . $order_date;
echo "<br>";
echo "تاریخ  پرداخت : " . $payment_date;
echo "<br>";
echo "  مبلغ پرداخت شده : " . $paymentTotal;
echo "<br>";
echo "تعداد ایتم های سفارش" . $product_count;



// if ($order_id > 0) {
//     $order = wc_get_order($order_id);

//     if ($order) {
//         // Display order details here
//         echo '<h2>Order Details</h2>';
//         echo '<p>Order ID: ' . $order_id . '</p>';
//         echo '<p>Order Total: ' . $order->get_formatted_order_total() . '</p>';
//         // You can retrieve and display any other order details you need

//     } else {
//         echo '<p>Invalid order ID.</p>';
//     }
// } else {
//     echo '<p>No order ID specified.</p>';
// }
