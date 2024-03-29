<?php
foreach ($failed_orders as $order) {
    $order_number = $order->get_order_number();
    $order_date = $order->get_date_created();
    $order_total = wc_price($order->get_total());
    $order_discount = wc_price($order->get_discount_total());
?>
    <div class="card card-container-custom custom-font">
        <div class="card-body mr-custom">
            <div style="display:flex;">
                <span class="glyphicon glyphicon-ok-circle" style="font-size: 20px;margin-top: 20px;color: green;"></span>
                <h3 class="card-title canceled-title" style="padding-right:10px"><i class="fa fa-ban"></i> ناموفق</h3>
            </div>
            <div class="details-container-custom">
                <p class="card-title"> تاریخ : <?= wc_format_datetime($order_date) ?></p>
                <p class="card-title"> کد سفارش : <?= $order_number ?></p>
                <p class="card-title">مبلغ : <?= $order_total ?></p>
            </div>
            <hr>
            <div class='order-image'>
            <?php
                $order_items = $order->get_items();
                foreach ($order_items as $item) {
                    $product = $item->get_product();
                    $product_image = $product->get_image(); 
                    echo $product_image;
                }
                ?>
            </div>
            <hr>
            <div class="show-factor" style="display:flex;justify-content: flex-end;">
                <a href="<?php echo esc_url($order->get_view_order_url()); ?>" style="cursor:pointer; text-decoration:none;"><i class="fa fa-receipt"></i>مشاهده سفارش </a>
            </div>
        </div>
    </div>
<?php
}
if (!$failed_orders) { ?>
    <div class="card card-container-custom custom-font empty">
        <div class="card-body mr-custom">
            <img src ='<?= ORD_LI_URL . 'src/icons/order-empty.svg' ?>'>
            <h1>شما سفارش  ناموفق ندارید</h1>
        </div>
    </div>
<?php
}?>