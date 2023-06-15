<?php

namespace App\Dashboard;

class OrderMenu
{
    public $message;

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
        $this->validate();
        $message = $this->message;
        $processing = get_option('processing-tab');
        $completed = get_option('completed-tab');
        $cancelled = get_option('cancelled-tab');
        $failed = get_option('failed-tab');
        $onhold = get_option('onhold-tab');
        $pending = get_option('pending-tab');
        $refunded = get_option('refunded-tab');
        require_once(ORD_LI_DIR . DIRECTORY_SEPARATOR . 'src/templates/dashboard/menu.view.php');
    }

    public function validate()
    {
        if (isset($_POST['submit-form'])) {
            $checkboxes = array(
                'processing' => 'processing-tab',
                'completed' => 'completed-tab',
                'cancelled' => 'cancelled-tab',
                'failed' => 'failed-tab',
                'on-hold' => 'onhold-tab',
                'pending' => 'pending-tab',
                'refunded' => 'refunded-tab'
            );
        
            foreach ($checkboxes as $checkbox => $option) {
                $value = isset($_POST[$checkbox]) && $_POST[$checkbox] === 'on' ? 1 : 0;
                update_option($option, $value);
            }
        $this->message = '<p class="allert">تنظیمات با موفقیت ذخیره شد</p>';
        }
    }
}

new OrderMenu();
