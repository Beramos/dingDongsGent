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

/*
    add_filter('woocommerce_add_to_cart_redirect', 'theme_prefix_add_to_cart_redirect');
    function theme_prefix_add_to_cart_redirect( $url ) {
         $url = wc_get_checkout_url();
        return  $url;
    }

    add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text' ); // 2.1 +
    function woo_custom_cart_button_text() {
        return __( 'Proceed to Checkout', 'woocommerce' );
    }

    add_filter( 'woocommerce_product_add_to_cart_text', 'woo_archive_custom_cart_button_text' ); // 2.1 +
    function woo_archive_custom_cart_button_text() {
        return __( 'Proceed to Checkout', 'woocommerce' );
    }
*/

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

add_filter('woocommerce_add_to_cart_redirect', 'themeprefix_add_to_cart_redirect');
function themeprefix_add_to_cart_redirect() {
 global $woocommerce;
 $checkout_url = wc_get_checkout_url();
 return $checkout_url;
}


?>