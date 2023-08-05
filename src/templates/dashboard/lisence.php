<?php
    $stored_key = get_option('order_list_key');
    if ($stored_key === false) {
    ?>
        <div class="blur"></div>
        <h2 class='active_message'>لطفا لایسنس افزونه را از سایت ژاکت تهیه نمایید سپس افزونه را فعال کنید</h2>
        <a href="<?= home_url('/wp-admin/admin.php?page=active_order_list') ?>" class='active_message active-btn'>فعال سازی افزونه</a>
    <?php
    }
    ?>



<?php
$stored_key = get_option('order_list_key');
if ($stored_key === false) { ?>
    <div class="blur"></div>
    <h2 class='active_message'>لطفا لایسنس افزونه را از سایت ژاکت تهیه نمایید سپس افزونه را فعال کنید</h2>
    <a href="<?= home_url('/wp-admin/admin.php?page=active_order_list') ?>" class='active_message active-btn'>فعال سازی افزونه</a>
<?php
}
?>