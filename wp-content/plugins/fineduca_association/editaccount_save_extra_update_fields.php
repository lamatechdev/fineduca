<?php

add_action( 'woocommerce_save_account_details', 'editaccount_save_extra_update_fields' );

/**
 * Save the extra updates fields.
 *
 * @param int $customer_id Current customer ID.
 */
function editaccount_save_extra_update_fields( $customer_id ) {
    if ( isset( $_POST['full_name'] ) ) {

        $fullname = sanitize_text_field($_POST['full_name']);
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
        update_user_meta( $customer_id, 'full_name', $fullname );
    }

   if ( isset( $_POST['cpf'] ) ) {
        $cpf = sanitize_text_field( $_POST['cpf'] );
        // WooCommerce billing cpf
        update_user_meta( $customer_id, 'billing_cpf', $cpf  );
        update_user_meta( $customer_id, 'cpf', $cpf );
    }

    if ( isset( $_POST['birthdate'] ) ) {
        // WooCommerce billing birthdate
        update_user_meta( $customer_id, 'birthdate', sanitize_text_field( $_POST['birthdate'] ) );
    }

    if ( isset( $_POST['sex'] ) ) {
        // WooCommerce billing sex
        update_user_meta( $customer_id, 'sex', sanitize_text_field( $_POST['sex'] ) );
    }

    if ( isset( $_POST['phone'] ) ) {
        $phone = sanitize_text_field( $_POST['phone'] );
        // WooCommerce billing phone
        update_user_meta( $customer_id, 'billing_phone', $phone );
        update_user_meta( $customer_id, 'phone', $phone );
    }

    if ( isset( $_POST['phone_company'] ) ) {
        // WooCommerce billing phone
        update_user_meta( $customer_id, 'phone_company', sanitize_text_field( $_POST['phone_company'] ) );
    }

   if ( isset( $_POST['cellphone'] ) ) {
        // WooCommerce billing cellphone
        update_user_meta( $customer_id, 'billing_cellphone', sanitize_text_field( $_POST['cellphone'] ) );
        update_user_meta( $customer_id, 'cellphone', sanitize_text_field( $_POST['cellphone'] ) );
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

    if ( isset( $_POST['ocupacao'] ) ) {
        // WooCommerce billing ocupacao
        update_user_meta( $customer_id, 'ocupacao', sanitize_text_field( $_POST['ocupacao'] ) );
    }

    if ( isset( $_POST['company'] ) ) {
        // WooCommerce billing company
        update_user_meta( $customer_id, 'company', sanitize_text_field( $_POST['company'] ) );
    }

    if ( isset( $_POST['titulacao'] ) ) {
        // WooCommerce billing titulacao
        update_user_meta( $customer_id, 'titulacao', sanitize_text_field( $_POST['titulacao'] ) );
    }

    if ( isset( $_POST['area_formacao'] ) ) {
        // WooCommerce billing area formacao
        update_user_meta( $customer_id, 'area_formacao', sanitize_text_field( $_POST['area_formacao'] ) );
    }

    if ( isset( $_POST['instituicao_formacao'] ) ) {
        // WooCommerce billing instituicao formacao
        update_user_meta( $customer_id, 'instituicao_formacao', sanitize_text_field( $_POST['instituicao_formacao'] ) );
    }

    if ( isset( $_POST['ano_formacao'] ) ) {
        // WooCommerce billing ano formacao
        update_user_meta( $customer_id, 'ano_formacao', sanitize_text_field( $_POST['ano_formacao'] ) );
    }
}

?>