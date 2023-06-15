<?php

namespace App\Order;

class Pending
{

    public function __construct()
    {
        $this->add_shortcode();
        add_option('pending-tab',1);
    }

    public function loadView()
    {
        // pass orders to view 
        $pending_orders = $this->get_proeccessing_order();
        include_once(ORD_LI_DIR  . '/src/templates/orders/pending.view.php');
    }
    public function add_shortcode()
    {
        add_shortcode('pending-view', [$this, 'loadView']);
        add_shortcode('pending-count', [$this, 'pending_order_count']);
    }

    public function get_proeccessing_order()
    {
        $pending_orders = wc_get_orders(array(
            'status' => array('pending'),
            'numberposts' => -1,
            'customer_id' => get_current_user_id(),
        ));
        return $pending_orders;
    }
    public function pending_order_count()
    {
        $pending_orders = $this->get_proeccessing_order();
        return count($pending_orders);
    }
}
new Pending();
