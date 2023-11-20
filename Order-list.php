<?php
/*
Plugin Name:  Digi Tab
Plugin URI: https://eskanogroup.ir
Description: This plugin allows you to have own orders list to show
Author: Parsa Mirzaie
Version: 1.0.0
Author URI: https://eskanogroup.ir
Text Domain: woo_order_list
License: GPL2
Developers => 
          Parsa Mirzaie -> PHP Developer : https://github.com/Parsa-mrz/
          Masih Balali =>  Frontend Developer : https://github.com/Masihbalali

*/
defined('ABSPATH') || exit;
class OrderList
{
    public function __construct()
    {
        $this->define_constant();
        $this->init();
    }
    public function activation()
    {
        add_action('admin_notices', [$this, 'woo_order_list_activation_notice']);
        add_action('wp_dashboard_setup', [$this, 'add_dashboard_widget']);
        add_filter('admin_footer_text', [$this, 'remove_footer_admin']);
        add_action('admin_notices', [$this, 'display_custom_alert']);
        add_filter('plugin_row_meta', [$this, 'add_plugin_row_meta'], 10, 2);
    }
    public function deactivation()
    {
    }
    public function define_constant()
    {
        define("ORD_LI_DIR", plugin_dir_path(__FILE__));
        define("ORD_LI_URL", plugin_dir_url(__FILE__));
    }
    public function init()
    {
        register_activation_hook(__FILE__, [$this, 'activation']);
        register_deactivation_hook(__FILE__, [$this, 'deactivation']);
        $this->add_classes();
        add_action('wp_enqueue_scripts', [$this, 'add_style']);
        add_action('admin_enqueue_scripts', [$this, 'enqueue_custom_admin_styles']);
        add_action('admin_enqueue_scripts', [$this, 'add_admin_scripts']);
        add_action('wp_enqueue_scripts', [$this, 'add_script']);
        add_action('admin_init', [$this, 'activation']);
    }

    public function add_classes()
    {
        require_once(ORD_LI_DIR  . 'App/Dashboard/Menu.php');
        require_once(ORD_LI_DIR  . 'App/Order/Complete.php');
        require_once(ORD_LI_DIR  . 'App/Order/Refunded.php');
        require_once(ORD_LI_DIR  . 'App/Order/Failed.php');
        require_once(ORD_LI_DIR  . 'App/Order/Cancelled.php');
        require_once(ORD_LI_DIR  . 'App/Order/Pending.php');
        require_once(ORD_LI_DIR  . 'App/Order/OnHold.php');
        require_once(ORD_LI_DIR  . 'App/Order/Processing.php');
        require_once(ORD_LI_DIR  . 'App/Order/Orders.php');
    }

    public function add_style()
    {
        wp_register_style('WC_order_list_style', ORD_LI_URL . 'src/css/style.css');
        wp_enqueue_style('WC_order_list_style');
    }
    public function add_script()
    {
        wp_enqueue_script('WC_order_list-script', ORD_LI_URL . 'src/js/script.js', array('jquery'), '1.0', true);
    }
    public function enqueue_custom_admin_styles()
    {
        wp_enqueue_style('custom-admin-styles', ORD_LI_URL . 'src/css/admin.css');
    }

    public function add_admin_scripts()
    {
        wp_enqueue_script('WC_order_list_admin_script', ORD_LI_URL . 'src/js/admin.js', array('jquery'), '1.0', true);
    }
    function woo_order_list_activation_notice()
    {
        // Check if WooCommerce plugin is not active
        if (!is_plugin_active('woocommerce/woocommerce.php')) {
            $woocommerce_install_url = admin_url('plugin-install.php?s=woocommerce&tab=search&type=term');
            $message = sprintf(
                __('<strong>افزونه لیست سفارشات اسکانو</strong> نیازمند نصب و فعال سازی   <a href="%s">ووکامرس</a> میباشد', 'woo_order_list'),
                esc_url($woocommerce_install_url)
            );
            $custom_link = '<a href="https://your-custom-link.com" target="_blank">Custom Link</a>';


            echo '<div class="notice notice-warning is-dismissible"><p>' . $message . '</p><button type="button" class="notice-dismiss"><span class="screen-reader-text">' . __('Dismiss this notice', 'woo_order_list') . '</span></button></div>';
        }
    }
    public function add_dashboard_widget()
    {
        wp_add_dashboard_widget(
            'digitab_dashboard_widget',           // Widget slug
            __('دیجی تب', 'woo_order_list'),           // Widget title
            [$this, 'digitab_widget_content']    // Callback function to display content
        );
    }
    public function digitab_widget_content()
    {
        include_once(ORD_LI_DIR  . '/src/templates/dashboard/widget.php');
    }
    public function display_custom_alert()
    {
        include_once(ORD_LI_DIR  . '/src/templates/dashboard/notice.php');
    }

    function remove_footer_admin()
    {
        echo '<span id="footer-thankyou" class="font" style="font-size:15px!important">توسعه و طراحی شده توسط <a class="font" href="http://www.eskanogroup.ir" target="_blank" style="text-decoration:none">اسکانو </a></span>';
    }
    public function add_plugin_row_meta($links, $file)
    {
        if (plugin_basename(__FILE__) === $file) {
            $custom_link = '<a href="https://eskanogroup.ir" target="_blank">مشاهده افزونه های بیشتر</a>';
            $links[] = $custom_link;
        }
        return $links;
    }
}
new OrderList();
