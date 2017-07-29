<?php

add_action( 'woocommerce_edit_account_form_start', 'editaccount_show_extra_fields' );

/**
 * Add new register fields for WooCommerce registration.
 */
function editaccount_show_extra_fields($user) {   
    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery.maskedinput.min');
    wp_enqueue_script('script_update');
}

?>