<?php
require_once(ORD_LI_DIR . "App/Order/View-orders.php");
?>
<div class="card-body mr-custom main-body-container fontLoad">
  <div class="details-container-custom" style="width: 500px;">
    <p class="card-title"> کد پیگیری سفارش : <?= $order_id ?></p>
    <p class="card-title"> تاریخ ثبت سفارش : <?= $order_date ?></p>
  </div>
  <hr>
  <div class="details-container-custom" style="width: 400px;">
    <p class="card-title"> تحویل گیرنده : <?= $firstName . ' ' . $lastName  ?></p>
    <p class="card-title"> شماره موبایل : <?= $phone ?></p>
    <p class="card-title"> کد پستی : <?= $postcode ?></p>

  </div>
  <div class="details-container-custom">
    <p class="card-title"> آدرس : <?= $address ?></p>
  </div>
  <hr>

  <div class="details-container-custom">
    <p class="card-title"> مبلغ : <?= $total ?></p>
    <p class="card-title">تخفیف: <?= $discountTotal ?></p>
    <p class="card-title"> شیوه پرداخت: <?= $payment ?></p>
    <p class="card-title"> هزینه ارسال : <?= $shippingTotal ?></p>
    <p class="card-title more-custom" id='show-payment-info'> جزيیات </p>
  </div>

  <div class="details-container-custom" id='payment-info'>
    <p class="card-title"> مبلغ سفارش - پرداخت موفق </p>
    <p class="card-title"> <?= $paymentTotal ?> </p>
    <p class="card-title"> <?= $payment_date ?> </p>
  </div>
  <hr>
  <?php
  foreach ($order_items as $item) {
    // list of product in order 
    $product = $item->get_product();
    // product price 
    $product_price = $product->get_price();
    // product title 
    $product_title = $product->get_title();
    // product image 
    $product_image = $product->get_image();
    // product url 
    $slug = $product->get_slug();
    $product_url = home_url() . '/products/' . $slug;
  ?>
    <div class="card-body mr-custom card-details-container">
      <div class="details-container-custom">
        <p class="card-title"> مرسوله ۱ از ۱</p>
        <p class="card-title" style="color:red;"> ارسال عادی <i class="fa fa-truck"></i></p>
      </div>
      <div>
      </div>
      <div class="details-container-custom">
        <p class="card-title"> مبلغ مرسوله : <?= $product_price ?></p>
      </div>
      <hr>
      <div class="details-container-custom" style="justify-content:flex-start;">
        <!-- <img src="./airpod.jpg" class="card-img-right card-img-custom" alt="Loading..."> -->
        <?= $product_image ?>
        <div class="card-order-details">
          <span><?= $product_title ?></span>
        </div>
      </div>
    </div>
  <?php
  }
  ?>



</div>