<?php 

/*function wpbootstrap_scripts_with_jquery()
{
	// Register the script like this for a theme:
	wp_register_script( 'custom-script', get_template_directory_uri() . '/bootstrap/js/bootstrap.js', array( 'jquery' ) );
	// For either a plugin or a theme, you can then enqueue the script:
	wp_enqueue_script( 'custom-script' );
}*/

function add_my_scripts() {
  wp_register_script(
        'lodash', // name your script so that you can attach other scripts and de-register, etc.
        get_template_directory_uri() . '/js/lodash.js', // this is the location of your script file
        array('jquery'));
  wp_enqueue_script( 'lodash');
    
  wp_register_script(
        'parallax', // name your script so that you can attach other scripts and de-register, etc.
        get_template_directory_uri() . '/js/parallax.js', // this is the location of your script file
        array('jquery'),'', true);
  wp_enqueue_script( 'parallax');
}

add_action( 'wp_enqueue_scripts', 'add_my_scripts' );


function modify_jquery_version() {
    if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery',
'https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js', false, '2.2.s');
        wp_enqueue_script('jquery');
    }
}
add_action('wp_enqueue_scripts', 'modify_jquery_version');
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
    remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

    add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
    add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

    function my_theme_wrapper_start() {
      echo '<ul class = "storeFront">';
    }

    function my_theme_wrapper_end() {
      echo '</ul>';
    }

add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

/* Remove deliver to a different Addres*/
add_filter( 'woocommerce_ship_to_different_address_checked', '__return_false' );
  
function custom_override_checkout_fields( $fields ) {
    unset($fields['billing']['billing_first_name']);
    unset($fields['billing']['billing_last_name']);
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_country']);
    unset($fields['billing']['billing_state']);
    unset($fields['billing']['billing_phone']);
    unset($fields['order']['order_comments']);
    unset($fields['billing']['billing_email']);
    unset($fields['account']['account_username']);
    unset($fields['account']['account_password']);
    unset($fields['account']['account_password-2']);
    
    unset($fields['shipping']['shipping_first_name']);
    unset($fields['shipping']['shipping_last_name']);
    unset($fields['shipping']['shipping_company']);
    unset($fields['shipping']['shipping_address_1']);
    unset($fields['shipping']['shipping_address_2']);
    unset($fields['shipping']['shipping_city']);
    unset($fields['shipping']['shipping_postcode']);
    unset($fields['shipping']['shipping_country']);
    unset($fields['shipping']['shipping_state']);
    
    unset($fields['account']['account_username']);
    
    unset($fields['order']['order_comments']);
    return $fields;
}

// define the wc_add_to_cart_message 
function empty_wc_add_to_cart_message( $message, $product_id ) { 
    return ''; 
}; 
         
add_filter( 'wc_add_to_cart_message_html', 'empty_wc_add_to_cart_message', 10, 2 );

add_filter( 'woocommerce_add_cart_item_data', 'wdm_empty_cart', 10,  3);

function wdm_empty_cart( $cart_item_data, $product_id, $variation_id ) 
{

    global $woocommerce;
    $woocommerce->cart->empty_cart();

    // Do nothing with the data and return
    return $cart_item_data;
}

// Translate add to basket
add_filter( 'woocommerce_product_add_to_cart_text', 'woo_archive_custom_cart_button_text' );    // 2.1 +
function woo_archive_custom_cart_button_text() {
return __( 'Toevoegen aan winkelmandje', 'woocommerce' );
}

// Translate place order
add_filter( 'woocommerce_order_button_text', 'woo_custom_order_button_text' ); 

function woo_custom_order_button_text() {
    return __( 'Bestel nu', 'woocommerce' ); 
}

add_filter( 'woocommerce_loop_add_to_cart_link', 'quantity_inputs_for_woocommerce_loop_add_to_cart_link', 10, 2 );
function quantity_inputs_for_woocommerce_loop_add_to_cart_link( $html, $product ) {
	if ( $product && $product->is_type( 'simple' ) && $product->is_purchasable() && $product->is_in_stock() && ! $product->is_sold_individually() ) {
		$html = '<form action="' . esc_url( $product->add_to_cart_url() ) . '" class="cart" method="post" enctype="multipart/form-data">';
		$html .= woocommerce_quantity_input( array(), $product, false );
		$html .= '<button type="submit" class="button alt">' . esc_html( $product->add_to_cart_text() ) . '</button>';
		$html .= '</form>';
	}
	return $html;
}

add_action('woocommerce_after_shop_loop', 'custom_woo_after_shop_loop');
function custom_woo_after_shop_loop() {
   wp_register_script(
        'alerter', // name your script so that you can attach other scripts and de-register, etc.
        get_template_directory_uri() . '/js/alerter.js', // this is the location of your script file
        array('jquery'));
  wp_enqueue_script( 'alerter');
}

// Remove anchor from product //
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
?>