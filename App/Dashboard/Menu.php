<?php

namespace App\Dashboard;

class OrderMenu
{

    public function __construct()
    {
        add_action('admin_menu', [$this, 'add_menu_order']);
    }

    public function add_menu_order()
    {
        add_menu_page(
            'لیست سفارشات ووکامرس',
            'لیست سفارشات ووکامرس',
            'manage_options',
            'order_list',
            [$this, 'wc_order_list_callback'],
            'dashicons-cart',
            '40'
        );
    }

    public function wc_order_list_callback()
    {
        require_once(ORD_LI_DIR . DIRECTORY_SEPARATOR . 'src/templates/dashboard/menu.view.php');
    }
}

new OrderMenu();