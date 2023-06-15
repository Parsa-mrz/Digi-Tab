<?php 
namespace App\Order;

class OnHold{

    public function __construct()
    {
        $this->add_shortcode();
        add_option('onhold-tab',1);
    }

    public function loadView()
    {
        $onhold_orders = $this->get_onhold_order();
        // pass orders to view 
        include_once(ORD_LI_DIR  . '/src/templates/orders/on-hold.view.php');
    }

    public function add_shortcode()
    {
        add_shortcode('onhold-view', [$this, 'loadView']);
        add_shortcode('onhold-count', [$this, 'onhold_order_count']);

    }

    public function get_onhold_order()
    {
        $onhold_orders = wc_get_orders(array(
            'status' => array('on-hold'),
            'numberposts' => -1,
            'customer_id' => get_current_user_id(),
        ));
        return $onhold_orders;
    }
    public function onhold_order_count()
    {
        $onhold_orders = $this->get_onhold_order();
        return count($onhold_orders);
    }
}
new OnHold();