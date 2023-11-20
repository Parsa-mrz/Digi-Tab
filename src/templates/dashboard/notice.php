<div class="notice notice-info is-dismissible font" style="border-right-color: #ff5168!important;">
    <div class="digi_title" style="display: flex; align-items: center;">
        <?php
        if (get_option('order_list_key') == true) {
            $link = home_url('/wp-admin/admin.php?page=order_list');
        } else {
            $link = home_url('/wp-admin/admin.php?page=active_order_list');
        }
        ?>
        <img src="<?= (ORD_LI_URL . 'src/img/80.jpg') ?>" alt="DigiTab" width="10%">
        <div>
            <a style="text-decoration: none;" href="<?= $link ?>">
                <h1 class='font' style="padding-right: 17px;"> دیجی تب</h1>
            </a>
            <p class='font' style="padding-right: 17px;">پیشرفته ترین افزونه نمایش سفارشات برای ووکامرس</p>
        </div>

    </div>
    <div class="digi_links" style="display: flex;">
        <p><a class="font button button-primary " href="https://www.zhaket.com" target="_blank" style="  background: #ff5168 !important;border-color: #ff5168 !important;"> درخواست تغییرات اختصاصی در پلاگین دیجی تب</a></p>
        <p><a class="font button button-primary " href="https://www.zhaket.com" target="_blank" style="  background: #ff5168 !important;border-color: #ff5168 !important;"> مشاهده پلاگین پیگیری سفارشات ووکامرس اسکانو</a></p>
        <p><a class="font button button-primary " href="https://www.zhaket.com" target="_blank" style="  background: #ff5168 !important;border-color: #ff5168 !important;">مشاهده تمامی افزونه های اسکانو</a></p>
    </div>
</div>