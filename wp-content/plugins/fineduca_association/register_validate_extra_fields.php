<?php

add_filter( 'woocommerce_registration_errors', 'register_validate_extra_fields', 10, 3 );

/**
 * Validate the extra register fields.
 *
 * @param WP_Error $validation_errors Errors.
 * @param string   $username          Current username.
 * @param string   $email             Current email.
 *
 * @return WP_Error
 */
function register_validate_extra_fields( $errors, $username, $email ) {
    global $wpdb;

    if ( isset( $_POST['billing_full_name'] ) && empty( $_POST['billing_full_name'] ) ) {
        $errors->add( 'billing_full_name_error', __( 'Nome Completo deve ser informado', 'woocommerce' ) );
    }

    if ( isset( $_POST['billing_cpf'] ) && empty( $_POST['billing_cpf'] ) ) {
        $errors->add( 'billing_cpf_error', __( 'CPF deve ser informado', 'woocommerce' ) );
    }else{
        $cpf_count = $wpdb->get_var( "SELECT count(*) FROM $wpdb->usermeta WHERE meta_key like 'cpf' AND meta_value like '".$_POST['billing_cpf']."'" );
        if( $cpf_count) { 
          $errors->add( 'billing_cpf_error', __( 'CPF já cadastrado. <a href="http://www.fineduca.org.br/index.php/meu-espaco/lost-password/">Esqueceu a senha?</a>', 'woocommerce' ) );
        }
    }

    if ( isset( $_POST['billing_sex'] ) && empty( $_POST['billing_sex'] ) ) {
        $errors->add( 'billing_sex_error', __( 'Sexo deve ser informado', 'woocommerce' ) );
    }

    if ( isset( $_POST['billing_cellphone'] ) && empty( $_POST['billing_cellphone'] ) ) {
        $errors->add( 'billing_cellphone_error', __( 'Celular deve ser informado', 'woocommerce' ) );
    }

    if ( isset( $_POST['billing_postcode'] ) && empty( $_POST['billing_postcode'] ) ) {
        $errors->add( 'billing_postcode_error', __( 'CEP deve ser informado', 'woocommerce' ) );
    }

    if ( isset( $_POST['billing_address_1'] ) && empty( $_POST['billing_address_1'] ) ) {
        $errors->add( 'billing_address_1_error', __( 'Logradouro deve ser informado', 'woocommerce' ) );
    }

   if ( isset( $_POST['billing_number'] ) && empty( $_POST['billing_number'] ) ) {
        $errors->add( 'billing_number_error', __( 'Número is required!.', 'woocommerce' ) );
    }

    if ( isset( $_POST['billing_neighborhood'] ) && empty( $_POST['billing_neighborhood'] ) ) {
        $errors->add( 'billing_neighborhood_error', __( 'Bairro is required!.', 'woocommerce' ) );
    }

    if ( isset( $_POST['billing_city'] ) && empty( $_POST['billing_city'] ) ) {
        $errors->add( 'billing_city_error', __( 'Cidade deve ser informada', 'woocommerce' ) );
    }

    if ( isset( $_POST['billing_state'] ) && empty( $_POST['billing_state'] ) ) {
        $errors->add( 'billing_state_error', __( 'Estado deve ser informado', 'woocommerce' ) );
    }

    if ( isset( $_POST['billing_ocupacao'] ) && empty( $_POST['billing_ocupacao'] ) ) {
        $errors->add( 'billing_ocupacao_error', __( 'Ocupação Profissional deve ser informada', 'woocommerce' ) );
    }

    if ( isset( $_POST['billing_company'] ) && empty( $_POST['billing_company'] ) ) {
        $errors->add( 'billing_company_error', __( 'Instituição em que trabalha ou estuda deve ser informada', 'woocommerce' ) );
    }

    if ( isset( $_POST['billing_titulacao'] ) && empty( $_POST['billing_titulacao'] ) ) {
        $errors->add( 'billing_titulacao_error', __( 'Titulação deve ser informada', 'woocommerce' ) );
    }

    if ( isset( $_POST['billing_area_formacao'] ) && empty( $_POST['billing_area_formacao'] ) ) {
        $errors->add( 'billing_area_formacao_error', __( 'Área de estudo ou Especialização deve ser informada', 'woocommerce' ) );
    }

    if ( isset( $_POST['billing_instituicao_formacao'] ) && empty( $_POST['billing_instituicao_formacao'] ) ) {
        $errors->add( 'billing_instituicao_formacao_error', __( 'Instituição em que se formou deve ser informada', 'woocommerce' ) );
    }

    if ( isset( $_POST['billing_ano_formacao'] ) && empty( $_POST['billing_ano_formacao'] ) ) {
        $errors->add( 'billing_ano_formacao_error', __( 'Ano de conclusão deve ser informado', 'woocommerce' ) );
    }

    return $errors;
}

?>