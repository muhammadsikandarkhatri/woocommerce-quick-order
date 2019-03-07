<?php

/**
* Form Processing
 *
 * full name
 * email
 * phone
 * address
 * city
 * qty
**/

if(isset($_POST['submit'])){

    global $woocommerce, $product;

    $address = array(
        'first_name' => $_POST['full_name'],
        'email'      => $_POST['email'],
        'phone'      => $_POST['phone'],
        'address_1'  => $_POST['address'],
        'city'       => $_POST['city'],
    );

    // Now  create the order
    $order = wc_create_order();


    $order->add_product( get_product($product->id), $_POST['quantity']);
    $order->set_address( $address, 'billing' );
    $order->set_address( $address, 'shipping' );
    $order->calculate_totals();
    $order->update_status("Processing", 'Processing', TRUE);

    if($order){

        $redirect = esc_url( home_url( '/checkout/order-received/' . $order->id . '/' ) );
        $redirect  = add_query_arg( array(
            'key'   => $order->order_key,
        ), $redirect );

        wp_safe_redirect( $redirect );
        exit;
    }

}

