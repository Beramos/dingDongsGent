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
        array('jquery'));
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
add_action('init', 'modify_jquery_version');

?>