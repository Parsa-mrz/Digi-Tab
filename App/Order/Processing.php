<?php

namespace App\Order;

class processing
{

    public function __construct()
    {
        $this->add_shortcode();
        add_option('processing-tab',1);
    }

    public function loadView()
    {
        // pass orders to view 
        $processing_orders = $this->get_proeccessing_order();
        include_once(ORD_LI_DIR  . '/src/templates/orders/processing.view.php');
    }
    public function add_shortcode()
    {
        add_shortcode('processing-view', [$this, 'loadView']);
        add_shortcode('processing-count', [$this, 'processing_order_count']);
    }

    public function get_proeccessing_order()
    {
        $processing_orders = wc_get_orders(array(
            'status' => array('processing'),
            'numberposts' => -1,
            'customer_id' => get_current_user_id(),
        ));
        return $processing_orders;
    }
    public function processing_order_count()
    {
        $processing_orders = $this->get_proeccessing_order();
        return count($processing_orders);
    }
}
new processing();
