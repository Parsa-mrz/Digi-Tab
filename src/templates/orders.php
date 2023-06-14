<?php

/**
 * WooCommerce Orders Template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/orders.php.
 */
defined('ABSPATH') || exit;

do_action('woocommerce_before_account_orders', $has_orders); // Action hook before displaying orders
?>
<div class='my-orders'>
    <h2>تاریخچه سفارشات</h2>
    <div class="tab">
        <button class="tablinks" onclick="openTab(event, 'Tab1')"> جاری</button>
        <button class="tablinks" onclick="openTab(event, 'Tab2')"> تکمیل شده</button>
        <button class="tablinks" onclick="openTab(event, 'Tab3')">مرجوع شده</button>
        <button class="tablinks" onclick="openTab(event, 'Tab4')">ناموفق</button>
        <button class="tablinks" onclick="openTab(event, 'Tab5')">در انتظار پرداخت</button>
        <button class="tablinks" onclick="openTab(event, 'Tab6')">لغو شده</button>
        <button class="tablinks" onclick="openTab(event, 'Tab7')">در انتظار بررسی </button>
    </div>
    <div class='my-orders-tabs'>

        <div id="Tab1" class="tabcontent">
            <?php do_shortcode('[processing-view]') ?>
        </div>

        <div id="Tab2" class="tabcontent">
            <?php do_shortcode('[complete-view]') ?>
        </div>

        <div id="Tab3" class="tabcontent">
            <?php do_shortcode('[refund-view]') ?>
        </div>

        <div id="Tab4" class="tabcontent">
            <?php do_shortcode('[failed-view]') ?>
        </div>
        <div id="Tab5" class="tabcontent">
            <?php do_shortcode('[pending-view]') ?>
        </div>
        <div id="Tab6" class="tabcontent">
            <?php do_shortcode('[cancelled-view]') ?>
        </div>
        <div id="Tab7" class="tabcontent">
            <?php do_shortcode('[onhold-view]') ?>
        </div>
    </div>
</div>
<?php
do_action('woocommerce_after_account_orders', $has_orders); // Action hook after displaying orders
?>