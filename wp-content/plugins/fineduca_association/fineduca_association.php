<?php
/**
 * Plugin Name: Fineduca Association
 * Description: Adiciona campos personalizados ao formulário de cadastro
 * Author: Gabriel Vasconcelos
 * Version: 2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Mostra apenas uma tela branca se algum retarda tentar acessar o arquivo diretamente.
}

/*
 * Call javascripts
 */
add_action( 'wp_enqueue_scripts', 'validate_register_scripts' );
function validate_register_scripts(){
    wp_register_script( 'jquery', plugins_url( 'fineduca_association/js/jquery.1.8.3.min.js', dirname(__FILE__) ), array(), '1.8.3', true );

    wp_register_script( 'jquery.maskedinput.min',  plugins_url( 'fineduca_association/js/jquery.maskedinput.min.js', dirname(__FILE__) ), array( 'jquery' ), '1.3.1', true );

    wp_register_script( 'script_register', plugins_url( 'fineduca_association/js/script_register.js', dirname(__FILE__) ), array( 'jquery', 'jquery.maskedinput.min' ), '1.0', true );

    wp_register_script( 'script_update', plugins_url( 'fineduca_association/js/script_update.js', dirname(__FILE__) ), array( 'jquery', 'jquery.maskedinput.min' ), '1.0', true );

 wp_register_script( 'script_hide_userprofile_fields', plugins_url( 'fineduca_association/js/script_hide_userprofile_fields.js', dirname(__FILE__) ), array( 'jquery', 'jquery.maskedinput.min' ), '1.0', true );
 wp_register_script( 'data_table', plugins_url( 'fineduca_association/js/jquery.dataTables.js', dirname(__FILE__) ), array(), '1.10.13', true );
 
 wp_register_script('ajax_emails', plugins_url( 'fineduca_association/js/ajax_emails.js', dirname(__FILE__) ), array( 'jquery'), '1.0', true );
}

wp_register_style( 'data_table_style', plugins_url( 'fineduca_association/css/jquery.dataTables.css', dirname(__FILE__) ), array(), '1.10.13' );

wp_register_style( 'jquery_ui_style', plugins_url( 'fineduca_association/css/jquery-ui.css', dirname(__FILE__) ), array(), '1.12.1' );

function my_enqueue_scripts() {
    wp_enqueue_script('ajax_emails');
    wp_localize_script( 'ajax_emails', 'ajax_object', array('ajax_url'=>admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts','my_enqueue_scripts');

/*
 * Call .php
 */
require_once(plugin_dir_path(__FILE__).'/userprofile_save_updates_extra_fields.php');
require_once(plugin_dir_path(__FILE__).'/userprofile_show_extra_fields.php');
require_once(plugin_dir_path(__FILE__).'/register_show_extra_fields.php');
require_once(plugin_dir_path(__FILE__).'/register_validate_extra_fields.php');
require_once(plugin_dir_path(__FILE__).'/register_save_extra_fields.php');
require_once(plugin_dir_path(__FILE__).'/editaccount_show_extra_fields.php');
require_once(plugin_dir_path(__FILE__).'/editaccount_save_extra_update_fields.php');
require_once(plugin_dir_path(__FILE__).'/myaccount_edit_content.php');
require_once(plugin_dir_path(__FILE__).'/reports.php');
require_once(plugin_dir_path(__FILE__).'/getEmails.php');

/*
 * Others functions
 */
add_filter('woocommerce_enable_order_notes_field', '__return_false');
add_action( 'woocommerce_before_checkout_form', 'checkout_hide_fields', 12 );

function checkout_hide_fields() {   
    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery.maskedinput.min');
?>
<script>
    jQuery(document).ready(function( $ ){
        $("h1:contains('Finalizar compra')").text('Finalizar pagamento');
        $("h3:contains('Seu pedido')").text('Seu pagamento');
        $("th:contains('Produto')").text('Item');
        $( "#customer_details, .woocommerce-message a").css("display","none");
        if($("#billing_phone").val()==""){
        	$("#billing_phone").val($("#billing_cellphone").val());
        }
    });
</script>
<?php
}

add_action( 'woocommerce_before_customer_login_form', 'hide_options_products' );
function hide_options_products() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery.maskedinput.min');
?>
<script>
    jQuery(document).ready(function( $ ){
    if($(".woocommerce-MyAccount-navigation").length == 0) {  $("#produtos_disponiveis").css("display","none"); }
    });
</script>
<?php
}

add_action( 'woocommerce_lostpassword_form' , 'my_password_reset');

    function my_password_reset() {
         wp_enqueue_script('jquery');
    wp_enqueue_script('jquery.maskedinput.min');
?>
<script>
    jQuery(document).ready(function( $ ){
    $("#produtos_disponiveis").css("display","none");
    });
</script>
<?php
}

add_action('woocommerce_before_cart', 'customize_cart_page', 1);

function customize_cart_page() {
   wp_enqueue_script('jquery');
    wp_enqueue_script('jquery.maskedinput.min');
?>
<script>
    jQuery(document).ready(function( $ ){
    $(".product-thumbnail").remove();
    $("td.actions").attr('colspan','5');
    $("th:contains('Produto')").text('Item');
    $("h1:contains('Carrinho')").text('Pagamentos');
    $("h2:contains('Total no carrinho')").text('Total pagamento');
    $("a:contains('Ver carrinho')").hide();
    $("a:contains('Finalizar compra')").text('Finalizar solicitação');
    $("input[name='update_cart']").val('Atualizar');
    alert('oi');
    });
</script>
<?php
}

/* Limita a quantidade de produtos*/
add_filter ( 'woocommerce_before_cart' , 'allow_single_quantity_in_cart' );
add_filter ( 'woocommerce_before_checkout_form' , 'allow_single_quantity_in_cart' );
function allow_single_quantity_in_cart() {
    global $woocommerce;
    $cart_contents  =  $woocommerce->cart->get_cart();
    $keys           =  array_keys ( $cart_contents );

    foreach ( $keys as $key ) {
            $woocommerce->cart->set_quantity ( $key, 1, true );
    }
}

/*
Limita a quantidade de tipos de produtos

add_filter( 'woocommerce_add_cart_item_data', '_empty_cart' );
function _empty_cart( $cart_item_data ) {

    WC()->cart->empty_cart();

    return $cart_item_data;
}*/


add_filter('wc_add_to_cart_message', 'custom_message_add_to_cart', 10, 2);
function custom_message_add_to_cart($message, $product_id) {
	$product = wc_get_product( $product_id );
    return "O item ".$product->get_title()." foi incluído com sucesso.";
}
