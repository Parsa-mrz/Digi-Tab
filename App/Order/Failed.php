<?php 
namespace App\Order;

class Failed{

    public function __construct()
    {
        $this->add_shortcode();
        add_option('failed-tab',1);
    }

    public function loadView()
    {
        $failed_orders = $this->get_failed_order();
        // pass orders to view 
        include_once(ORD_LI_DIR  . '/src/templates/orders/failed.view.php');
    }

    public function add_shortcode()
    {
        add_shortcode('failed-view', [$this, 'loadView']);
        add_shortcode('failed-count', [$this, 'failed_order_count']);

    }

    public function get_failed_order()
    {
        $failed_orders = wc_get_orders(array(
            'status' => array('failed'),
            'numberposts' => -1,
            'customer_id' => get_current_user_id(),
        ));
        return $failed_orders;
    }
    public function failed_order_count()
    {
        $failed_orders = $this->get_failed_order();
        return count($failed_orders);
    }
}
new Failed();