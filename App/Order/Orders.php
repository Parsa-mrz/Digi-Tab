<?php

class Orders
{

    public function __construct()
    {
        add_filter('wc_get_template', [$this, 'load_orders_view'], 10, 5);
        add_filter('wc_get_template', [$this, 'load_view_orders_views'], 10, 5);
    }

    public function load_orders_view($located, $template_name, $args, $template_path, $default_path)
    {
        // Check if we're on the my-account/orders/ page
        if ($template_name === 'myaccount/orders.php') {
            $located = ORD_LI_DIR . 'src/templates/orders.php';
        }

        return $located;
    }

    public function load_view_orders_views($located, $template_name, $args, $template_path, $default_path)
    {
        // Check if we're on the my-account/orders/ page
        if ($template_name === 'myaccount/view-order.php') {

            $located = ORD_LI_DIR . 'src/templates/view-order.php';
        }

        return $located;
    }
}
new Orders();
