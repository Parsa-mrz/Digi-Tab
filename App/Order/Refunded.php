<?php 
namespace App\Order;

class Refunded{

    public function __construct()
    {
        $this->add_shortcode();
    }

    public function loadView()
    {
        $refunded_orders = $this->get_refund_order();
        // pass orders to view 
        include_once(ORD_LI_DIR  . '/src/templates/orders/refund.view.php');
    }

    public function add_shortcode()
    {
        add_shortcode('refund-view', [$this, 'loadView']);
        add_shortcode('refund-count', [$this, 'refund_order_count']);
    }

    public function get_refund_order()
    {
        $refunded_orders = wc_get_orders(array(
            'status' => array('refunded'),
            'numberposts' => -1,
            'customer_id' => get_current_user_id(),
        ));
        return $refunded_orders;
    }
    public function refund_order_count()
    {
        $refund_orders = $this->get_refund_order();
        return count($refund_orders);
    }
}
new Refunded();