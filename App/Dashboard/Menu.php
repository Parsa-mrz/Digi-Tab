<?php

namespace App\Dashboard;

use Order_list_core;

require_once(ORD_LI_DIR . 'App/Dashboard/Order_list_core.php');
class OrderMenu
{
    public $message;
    public $key_token;
    public $product_token = 'd15bfb85-ee15-4ac8-b30a-b4185ae278ac';

    public function __construct()
    {
        add_action('admin_menu', [$this, 'add_menu_order']);
    }

    public function add_menu_order()
    {
        add_menu_page(
            'دیجی تب',
            'دیجی تب',
            'manage_options',
            'order_list',
            [$this, 'wc_order_list_callback'],
            'dashicons-cart',
            '40'
        );
        add_submenu_page(
            'order_list',
            'فعال سازی افزونه',
            'فعال سازی افزونه',
            'manage_options',
            'active_order_list',
            [$this, 'wc_active_order_list_callback']
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
        $color = get_option('digi_tab_color');
        require_once(ORD_LI_DIR . DIRECTORY_SEPARATOR . 'src/templates/dashboard/menu.view.php');
    }
    public function wc_active_order_list_callback()
    {
        $this->key_token = $_POST['active'];
        $stored_key = get_option('order_list_key');
        if ($stored_key === false) {
            $this->activation($this->key_token, $this->product_token);
            $this->check_activation($stored_key);
        } else {
            $this->check_activation($stored_key);
        }
        require_once(ORD_LI_DIR . DIRECTORY_SEPARATOR . 'src/templates/dashboard/core.view.php');
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
            $color = $_POST['global_color'];
            update_option( 'digi_tab_color', $color );

            foreach ($checkboxes as $checkbox => $option) {
                $value = isset($_POST[$checkbox]) && $_POST[$checkbox] === 'on' ? 1 : 0;
                update_option($option, $value);
            }
            $this->message = '<p class="alert">تنظیمات با موفقیت ذخیره شد</p>';
        }
    }
    public function activation($key_token, $product_token)
    {
        $result = Order_list_core::install($key_token, $product_token);

        if ($result->status == 'successful') {
            add_option('order_list_key', $key_token);
            echo ('<div style="color:#fff;background-color:green;padding:10px;display: block;border-radius: 6px;margin: 30px;">' . $result->message . '</div>');
        } else {
            if (!is_object($result->message)) {
                echo ('<div style="color:#fff;background-color:red;padding:10px;display: block;border-radius: 6px;margin: 30px;">' . $result->message . '</div>');
            } else {
                foreach ($result->message as $message) {
                    foreach ($message as $msg) {
                        echo $msg . '<br>';
                    }
                }
            }
        }
    }
    public static function check_activation($key_token)
    {

        $result = Order_list_core::isValid($key_token);

        if ($result->status == 'successful') {
            echo ('<div class="alert" style="color:#fff;background-color:green;padding:10pxmargin: 30px;display: block;border-radius: 6px;margin: 30px;">' . $result->message . '</div>');
        } else {
            if (!is_object($result->message)) {
                echo ('<div class="alert" style="color:#fff;background-color:red;padding:10pxmargin: 30px;display: block;border-radius: 6px;margin: 30px;">' . $result->message . '</div>');
            } else {
                foreach ($result->message as $message) {
                    foreach ($message as $msg) {
                        echo $msg . '<br>';
                    }
                }
            }
        }
    }
}

new OrderMenu();
