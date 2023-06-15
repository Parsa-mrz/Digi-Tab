<?php

namespace App\Order;


class Complete
{
    public function __construct()
    {
        $this->add_shortcode();
        add_option('completed-tab',1);
    }

    public function loadView()
    {
        // pass orders to view 
        $completed_orders = $this->get_complete_order();
        include_once(ORD_LI_DIR  . '/src/templates/orders/complete.view.php');
    }
    public function add_shortcode()
    {
        add_shortcode('complete-view', [$this, 'loadView']);
        add_shortcode('complete-count', [$this, 'complete_order_count']);
    }

    public function get_complete_order()
    {
        $completed_orders = wc_get_orders(array(
            'status' => array('completed'),
            'numberposts' => -1,
            'customer_id' => get_current_user_id(),
        ));
        return $completed_orders;
    }
    public function complete_order_count()
    {
        $completed_orders = $this->get_complete_order();
        return count($completed_orders);
    }

}
new Complete();
