<?php
require_once(ORD_LI_DIR . "App/Order/View-orders.php");
?>
<div class="card-body mr-custom main-body-container fontLoad">
  <div class="details-container-custom" style="justify-content: flex-start;">
    <a href="<?= $dashboard_url . 'orders/'; ?>" style="display: contents;">
      <i class="fa fa-mail-forward" style="margin-top: 4px;"></i>
      <p class="card-title title-details">جزيیات سفارش</p>
    </a>
  </div>
  <div class="details-container-custom detail-container-custom-header" style="width: 500px;">
    <p class="card-title"> شماره سفارش : <?= $order_id ?></p>
    <p class="card-title"> تاریخ ثبت سفارش : <?= $order_date ?></p>
  </div>
  <div class="detail-container-custom-main-body">
    <div class="details-container-custom body-items-container">
      <p class="card-title"> تحویل گیرنده : <?= $firstName . ' ' . $lastName  ?></p>
      <p class="card-title"> شماره موبایل : <?= $phone ?></p>
      <p class="card-title"> کد پستی : <?= $postcode ?></p>
    </div>
    <div class="details-container-custom body-items-container">
      <p class="card-title">تخفیف: <?= $discountTotal ?></p>
      <p class="card-title"> هزینه ارسال : <?= $shippingTotal ?></p>
      <p class="card-title"> مبلغ : <?= $total ?></p>
    </div>
    <p class="card-title float-left more-custom" id='show-payment-info' onClick="handleClick()">
      جزيیات
      &nbsp;
      <i id="arrowsign" class="fa-solid fa-chevron-left"></i>
    </p>
    <div class="details-container-custom body-items-container" id='payment-info'>
      <p class="card-title"> آدرس : <?= $address ?></p>
      <p class="card-title"> شیوه پرداخت: <?= $payment ?></p>

      <p class="card-title"> مبلغ سفارش : <?= $paymentTotal ?> </p>
      <p class="card-title">تاریخ پرداخت : <?= $payment_date ?> </p>
    </div>
  </div>
  <hr>

  <?php
  foreach ($order_items as $item) {
    // list of product in order 
    $product = $item->get_product();
    // product price 
    $product_price = wc_price($product->get_price());
    // product title 
    $product_title = $product->get_title();
    // product image 
    $product_image = $product->get_image();
    // product url 
    $slug = $product->get_slug();
    $product_url = home_url() . '/products/' . $slug;
  ?>
    <div class="card-body mr-custom card-details-container">
      <div class="details-container-custom" style="justify-content:flex-start;">
        <a class="image-mw" href='<?= $product_url ?>' style="max-with: 40% !important;"> <?= $product_image ?></a>
        <div class="card-order-details">
          <span class="d-block"> <?= $product_title ?></span>
          <span class="d-block"> <?= $product_price ?></span>
        </div>
      </div>
    </div>
  <?php
  }
  ?>
</div>