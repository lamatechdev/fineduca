<?php
/**
 * Plugin Name: Fineduca Event
 * Description: Adiciona campos personalizados ao formulário de cadastro
 * Author: Gabriel Vasconcelos
 * Version: 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Mostra apenas uma tela branca se algum retarda tentar acessar o arquivo diretamente.
}

/*
 * Call javascripts
 */

wp_register_style( 'data_table_style', plugins_url( 'fineduca_event/css/jquery.dataTables.css', dirname(__FILE__) ), array(), '1.10.13' );

/*
 * Call .php
 */
require_once(plugin_dir_path(__FILE__).'/register_fields.php');
require_once(plugin_dir_path(__FILE__).'/redirect_register.php');

/*
 * Others functions
 */
add_filter('woocommerce_enable_order_notes_field', '__return_false');
add_action( 'woocommerce_before_checkout_form', 'checkout_hide_fields_event', 12 );

function checkout_hide_fields_event() {   
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

add_action( 'woocommerce_before_customer_login_form', 'hide_options_products_event' );
function hide_options_products_event() {
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
