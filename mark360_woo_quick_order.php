<?php

/*
Plugin Name: Woocommerce Quick Order (Mark 360)
Plugin URI: http://mark360.pk
Description: A plugin which allows customers to make a quick order on product page. To show product form use shortcode [mark360_quick_order_form]
Version: 1.1
Author: Muhammad Sikandar
Author URI: http://mark360.pk
License: GPL2 
*/

if ( ! defined( 'ABSPATH' ) ) { 
	exit; 
}

/**
* Quick order form shortcode generator
**/
function mark360_create_quick_order_form( $atts ) {

    $post_type = get_post_type();
    if(is_single() && $post_type == 'product'){

        include_once dirname( __FILE__ ) . '/quick_order_form.php';
        include_once dirname( __FILE__ ) . '/includes/order_processing.php';

    }
	return '<strong style="color:red">This quick order form will only works with single product page</strong>';
}
add_shortcode( 'mark360_quick_order_form', 'mark360_create_quick_order_form' );


/**
* register Quick_Order_Form_Widget widget
**/
require_once dirname( __FILE__ ) . '/form_widget.php';
function register_quick_order_form_widget() {
    register_widget( 'Quick_Order_Form_Widget' );
}
add_action( 'widgets_init', 'register_quick_order_form_widget' );
