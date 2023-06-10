<?php
require_once ("App/Order/View-orders.php");
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
?>
<div class="card-body mr-custom main-body-container">
          <!-- <div style="display:flex;">
            <span class="glyphicon glyphicon-ok-circle" style="font-size: 20px;margin-top: 20px;color: green;"></span>
            <h3 class="card-title" style="padding-right:10px">تحویل شده </h3>
          </div> -->
          <div class="details-container-custom" style="width: 500px;">
            <p class="card-title"> کد پیگیری سفارش</p>
            <p class="card-title"> تاریخ ثبت سفارش </p>
          </div>
          <hr>
          <div class="details-container-custom" style="width: 400px;">
            <p class="card-title"> تحویل گیرنده</p>
            <p class="card-title"> شماره موبایل </p>
          </div>
          <div class="details-container-custom">
            <p class="card-title"> آدرس </p>
          </div>
          <hr>
          <div class="details-container-custom">
            <p class="card-title"> مبلغ </p>
            <p class="card-title">تخفیف: </p>
            <p class="card-title"> شیوه پرداخت: </p>
          </div>
          <div class="details-container-custom">

            <p class="card-title"> مبلغ سفارش - پرداخت موفق </p>
            <p class="card-title"> ۲۱۸۳۷۶﷼ </p>
            <p class="card-title"> ۱۲/۸/۱۴۰۱ </p>
          </div>


          <!-- <div style="background-color: antiquewhite; border: 1px solid #ccc; border-radius: 5px; ">
            <div class="details-container-custom">
              <p class="card-title"> آدرس </p>
            </div>
          </div> -->
          <!-- <div style="display:flex;justify-content: flex-end; color:blue;">
            <a href="#" style="cursor:pointer; text-decoration:none;">مشاهده فاکتور</a>
          </div> -->
