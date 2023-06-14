<?php 
namespace App\Order;

class Cancelled{

    public function __construct()
    {
        $this->add_shortcode();
    }

    public function loadView()
    {
        $cancelled_orders = $this->get_cancelled_order();
        // pass orders to view 
        include_once(ORD_LI_DIR  . '/src/templates/orders/cancelled.view.php');
    }

    public function add_shortcode()
    {
        add_shortcode('cancelled-view', [$this, 'loadView']);
        add_shortcode('cancelled-count', [$this, 'cancelled_order_count']);

    }

    public function get_cancelled_order()
    {
        $cancelled_orders = wc_get_orders(array(
            'status' => array('cancelled'),
            'numberposts' => -1,
            'customer_id' => get_current_user_id(),
        ));
        return $cancelled_orders;
    }
    public function cancelled_order_count()
    {
        $cancelled_orders = $this->get_cancelled_order();
        return count($cancelled_orders);
    }
}
new Cancelled();