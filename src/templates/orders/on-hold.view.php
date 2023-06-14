<?php
    if (!$onhold_orders) { ?>
        <div class="card card-container-custom custom-font empty">
            <div class="card-body mr-custom">
                <img src='<?= ORD_LI_URL . 'src/icons/order-empty.svg' ?>'>
                <h1>شما سفارش در انتظار بررسی ندارید</h1>
            </div>
        </div>
<?php
    }
foreach ($onhold_orders as $order) {
    $order_number = $order->get_order_number();
    $order_date = $order->get_date_created();
    $order_total = wc_price($order->get_total());
    $order_discount = wc_price($order->get_discount_total());

    $formatted_date = date('j F  Y', strtotime($order_date));
?>
    <div class="card card-container-custom custom-font">
        <div class="card-body mr-custom">
            <div style="display:flex;">
                <span class="glyphicon glyphicon-ok-circle" style="font-size: 20px;margin-top: 20px;color: green;"></span>
                <h3 class="card-title processing-title" style="padding-right:10px"><i class="fa fa-clock"></i> جاری</h3>
            </div>
            <div class="details-container-custom">
                <p class="card-title"> تاریخ : <?= $formatted_date ?></p>
                <p class="card-title"> کد سفارش : <?= $order_number ?></p>
                <p class="card-title">مبلغ : <?= $order_total ?></p>

                <?php if ($order_discount != wc_price('0')) { ?>
                    <p class="card-title"> تخفیف : <?= $order_discount ?></p>
                <?php } ?>
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
                <a href="<?php echo esc_url($order->get_view_order_url()); ?>" style="cursor:pointer; text-decoration:none;"><i class="fa fa-receipt"></i>مشاهده فاکتور </a>
            </div>

        </div>
    </div>
    <?php

}
