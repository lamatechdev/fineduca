<?php

add_action( 'woocommerce_created_customer', 'register_save_extra_fields' );

/**
 * Save the extra register fields.
 *
 * @param int $customer_id Current customer ID.
 */
function register_save_extra_fields( $customer_id ) {
    if ( isset( $_POST['billing_full_name'] ) ) {
        $fullname = sanitize_text_field($_POST['billing_full_name']);
        $pos = strpos($fullname, ' ');
        $ret = array();
        if($pos !== FALSE){
            $firstname = substr($fullname, 0, $pos);
            $lastname = substr($fullname, $pos+1, strlen($fullname));
        }else{
            $firstname = $fullname;
            $lastname = " ";
        }
        // WordPress default first name field.
        update_user_meta( $customer_id, 'first_name', $firstname );
        update_user_meta( $customer_id, 'billing_first_name', $firstname );
        // WordPress default last name field.
        update_user_meta( $customer_id, 'last_name', $lastname);
        update_user_meta( $customer_id, 'billing_last_name', $lastname);

        // WooCommerce billing full name.
        update_user_meta( $customer_id, 'billing_full_name', $fullname );
    }

    if(isset($_POST['evento_fineduca'])){
        update_user_meta( $customer_id, 'evento_fineduca', '2017' );
    }

    if ( isset( $_POST['billing_cpf'] ) ) {
        $cpf = sanitize_text_field( $_POST['billing_cpf'] );
        // WooCommerce billing cpf
        update_user_meta( $customer_id, 'billing_cpf', $cpf  );
        update_user_meta( $customer_id, 'cpf', $cpf );
    }

    if ( isset( $_POST['billing_birthdate'] ) ) {
        // WooCommerce billing birthdate
        update_user_meta( $customer_id, 'birthdate', sanitize_text_field( $_POST['billing_birthdate'] ) );
    }

    if ( isset( $_POST['billing_sex'] ) ) {
        // WooCommerce billing sex
        update_user_meta( $customer_id, 'sex', sanitize_text_field( $_POST['billing_sex'] ) );
    }

    if ( isset( $_POST['billing_phone'] ) ) {
        $phone = sanitize_text_field( $_POST['billing_phone'] );
        // WooCommerce billing phone
        update_user_meta( $customer_id, 'billing_phone', $phone );
        update_user_meta( $customer_id, 'phone', $phone );
    }

    if ( isset( $_POST['billing_phone_company'] ) ) {
        // WooCommerce billing phone
        update_user_meta( $customer_id, 'phone_company', sanitize_text_field( $_POST['billing_phone_company'] ) );
    }

   if ( isset( $_POST['billing_cellphone'] ) ) {
        // WooCommerce billing cellphone
        update_user_meta( $customer_id, 'billing_cellphone', sanitize_text_field( $_POST['billing_cellphone'] ) );
        update_user_meta( $customer_id, 'cellphone', sanitize_text_field( $_POST['billing_cellphone'] ) );
    }

    if ( isset( $_POST['billing_postcode'] ) ) {
        // WooCommerce billing postcode
        update_user_meta( $customer_id, 'billing_postcode', sanitize_text_field( $_POST['billing_postcode'] ) );
    }

    if ( isset( $_POST['billing_address_1'] ) ) {
        // WooCommerce billing address 1
        update_user_meta( $customer_id, 'billing_address_1', sanitize_text_field( $_POST['billing_address_1'] ) );
    }

    if ( isset( $_POST['billing_number'] ) ) {
        // WooCommerce billing number
        update_user_meta( $customer_id, 'billing_number', sanitize_text_field( $_POST['billing_number'] ) );
    }

   if ( isset( $_POST['billing_address_2'] ) ) {
        // WooCommerce billing address_2
        update_user_meta( $customer_id, 'billing_address_2', sanitize_text_field( $_POST['billing_address_2'] ) );
    }
    
    if ( isset( $_POST['billing_neighborhood'] ) ) {
        // WooCommerce billing neighborhood
        update_user_meta( $customer_id, 'billing_neighborhood', sanitize_text_field( $_POST['billing_neighborhood'] ) );
    }

    if ( isset( $_POST['billing_city'] ) ) {
        // WooCommerce billing city
        update_user_meta( $customer_id, 'billing_city', sanitize_text_field( $_POST['billing_city'] ) );
    }

    if ( isset( $_POST['billing_state'] ) ) {
        // WooCommerce billing state
        update_user_meta( $customer_id, 'billing_state', sanitize_text_field( $_POST['billing_state'] ) );
    }

    if ( isset( $_POST['billing_ocupacao'] ) ) {
        // WooCommerce billing ocupacao
        update_user_meta( $customer_id, 'ocupacao', sanitize_text_field( $_POST['billing_ocupacao'] ) );
    }

    if ( isset( $_POST['billing_company'] ) ) {
        // WooCommerce billing company
        update_user_meta( $customer_id, 'company', sanitize_text_field( $_POST['billing_company'] ) );
    }

    if ( isset( $_POST['billing_titulacao'] ) ) {
        // WooCommerce billing titulacao
        update_user_meta( $customer_id, 'titulacao', sanitize_text_field( $_POST['billing_titulacao'] ) );
    }

    if ( isset( $_POST['billing_area_formacao'] ) ) {
        // WooCommerce billing area formacao
        update_user_meta( $customer_id, 'area_formacao', sanitize_text_field( $_POST['billing_area_formacao'] ) );
    }

    if ( isset( $_POST['billing_instituicao_formacao'] ) ) {
        // WooCommerce billing instituicao formacao
        update_user_meta( $customer_id, 'instituicao_formacao', sanitize_text_field( $_POST['billing_instituicao_formacao'] ) );
    }

    if ( isset( $_POST['billing_ano_formacao'] ) ) {
        // WooCommerce billing ano formacao
        update_user_meta( $customer_id, 'ano_formacao', sanitize_text_field( $_POST['billing_ano_formacao'] ) );
    }
}

?>