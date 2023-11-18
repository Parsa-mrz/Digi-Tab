<?php

/**
 * WooCommerce Orders Template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/orders.php.
 */
defined('ABSPATH') || exit;

$processing = get_option('processing-tab');
$completed = get_option('completed-tab');
$cancelled = get_option('cancelled-tab');
$failed = get_option('failed-tab');
$onhold = get_option('onhold-tab');
$pending = get_option('pending-tab');
$refunded = get_option('refunded-tab');
$color = get_option('digi_tab_color');

do_action('woocommerce_before_account_orders', $has_orders); // Action hook before displaying orders
?>
<!-- LISENCE FORM -->



<div class='my-orders'>
    <h2>تاریخچه سفارشات</h2>
    <div class="tab">
        <style>
            button.tablinks.active,
            button.tablinks:hover {
                color: <?= $color ?>;
                border-bottom: 4px solid <?= $color ?> !important;
            }

            button.tablinks.active .count,
            button.tablinks:hover .count {
                background-color: <?= $color ?>;
            }
        </style>
        <button class="tablinks active <?php echo $processing == 0 ? 'none' : '' ?>" onclick="openTab(event, 'Tab1')"> جاری <span class='count'><?= do_shortcode('[processing-count]') ?></span> </button>
        <button class="tablinks <?php echo $completed == 0 ? 'none' : '' ?>" onclick="openTab(event, 'Tab2')"> تکمیل شده <span class='count'><?= do_shortcode('[complete-count]') ?></span></button>
        <button class="tablinks <?php echo $refunded == 0 ? 'none' : '' ?>" onclick="openTab(event, 'Tab3')">مرجوع شده <span class='count'><?= do_shortcode('[refund-count]') ?></span></button>
        <button class="tablinks <?php echo $failed == 0 ? 'none' : '' ?>" onclick="openTab(event, 'Tab4')">ناموفق <span class='count'><?= do_shortcode('[failed-count]') ?></span></button>
        <button class="tablinks <?php echo $onhold == 0 ? 'none' : '' ?>" onclick="openTab(event, 'Tab5')">در انتظار پرداخت <span class='count'><?= do_shortcode('[onhold-count]') ?></span></button>
        <button class="tablinks <?php echo $cancelled == 0 ? 'none' : '' ?>" onclick="openTab(event, 'Tab6')">لغو شده <span class='count'><?= do_shortcode('[cancelled-count]') ?></span></button>
        <button class="tablinks <?php echo $pending == 0 ? 'none' : '' ?>" onclick="openTab(event, 'Tab7')">در انتظار بررسی <span class='count'><?= do_shortcode('[pending-count]') ?></span></button>
    </div>
    <div class='my-orders-tabs'>

        <div id="Tab1" class="tabcontent <?php echo $processing == 0 ? 'none' : '' ?> ">
            <?php do_shortcode('[processing-view]') ?>
        </div>

        <div id="Tab2" class="tabcontent <?php echo $completed == 0 ? 'none' : '' ?>">
            <?php do_shortcode('[complete-view]') ?>
        </div>

        <div id="Tab3" class="tabcontent <?php echo $refunded == 0 ? 'none' : '' ?>">
            <?php do_shortcode('[refund-view]') ?>
        </div>

        <div id="Tab4" class="tabcontent <?php echo $failed == 0 ? 'none' : '' ?>">
            <?php do_shortcode('[failed-view]') ?>
        </div>
        <div id="Tab5" class="tabcontent <?php echo $pending == 0 ? 'none' : '' ?>">
            <?php do_shortcode('[pending-view]') ?>
        </div>
        <div id="Tab6" class="tabcontent <?php echo $cancelled == 0 ? 'none' : '' ?>">
            <?php do_shortcode('[cancelled-view]') ?>
        </div>
        <div id="Tab7" class="tabcontent <?php echo $onhold == 0 ? 'none' : '' ?>">
            <?php do_shortcode('[onhold-view]') ?>
        </div>
    </div>
</div>
<?php
do_action('woocommerce_after_account_orders', $has_orders); // Action hook after displaying orders
?>