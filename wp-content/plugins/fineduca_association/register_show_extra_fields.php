<?php

add_action( 'woocommerce_register_form_start', 'register_show_extra_fields' );

/**
 * Add new register fields for WooCommerce registration.
 */
function register_show_extra_fields() {   
    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery.maskedinput.min');
    wp_enqueue_script('script_register');

    $mae = get_post_ancestors(get_the_ID());
    if(count($mae)<=0){
?>

    <p class="form-row form-row-first">
        <label for="reg_billing_full_name"><?php _e( 'Nome completo', 'woocommerce' ); ?> <span class="required">*</span></label>
        <input type="text" class="input-text" name="billing_full_name" id="reg_billing_full_name" value="<?php if ( ! empty( $_POST['billing_full_name'] ) ) esc_attr_e( $_POST['billing_full_name'] ); ?>" />
    </p>

    <p class="form-row form-row-last">
        <label for="reg_billing_cpf"><?php _e( 'CPF', 'woocommerce' ); ?> <span class="required">*</span></label>
        <input type="text" class="input-text" name="billing_cpf" id="reg_billing_cpf" value="<?php if ( ! empty( $_POST['billing_cpf'] ) ) esc_attr_e( $_POST['billing_cpf'] ); ?>" />
    </p>

    <div class="clear"></div>

    <p class="form-row form-row-first">
        <label for="reg_billing_birthdate"><?php _e( 'Data de nascimento', 'woocommerce' ); ?></label>
        <input type="text" class="input-text" name="billing_birthdate" id="reg_billing_birthdate" value="<?php if ( ! empty( $_POST['billing_birthdate'] ) ) esc_attr_e( $_POST['billing_birthdate'] ); ?>" />
    </p>

    <p class="form-row form-row-last">
        <label for="reg_billing_sex"><?php _e( 'Sexo', 'woocommerce' ); ?> <span class="required">*</span></label>
        <input type="radio" name="billing_sex" value="Feminino">&nbsp;Feminino&nbsp;&nbsp;<input type="radio" name="billing_sex" value="Masculino">&nbsp;Masculino
    </p>

    <div class="clear"></div>

    <h3>Contatos Telefônicos</h3>

    <p class="form-row form-row-first">
        <label for="reg_billing_phone"><?php _e( 'Telefone Residencial', 'woocommerce' ); ?></label>
        <input type="text" class="input-text" name="billing_phone" id="reg_billing_phone" value="<?php if ( ! empty( $_POST['billing_phone'] ) ) esc_attr_e( $_POST['billing_phone'] ); ?>" />
    </p>

    <p class="form-row form-row-last">
        <label for="reg_billing_phone_company"><?php _e( 'Telefone Comercial', 'woocommerce' ); ?></label>
        <input type="text" class="input-text" name="billing_phone_company" id="reg_billing_phone_company" value="<?php if ( ! empty( $_POST['billing_phone_company'] ) ) esc_attr_e( $_POST['billing_phone_company'] ); ?>" />
    </p>

    <div class="clear"></div>

    <p class="form-row form-row-first">
        <label for="reg_billing_cellphone"><?php _e( 'Celular', 'woocommerce' ); ?> <span class="required">*</span></label>
        <input type="text" class="input-text" name="billing_cellphone" id="reg_billing_cellphone" value="<?php if ( ! empty( $_POST['billing_cellphone'] ) ) esc_attr_e( $_POST['billing_cellphone'] ); ?>" />
    </p>

    <div class="clear"></div>

    <h3>Endereço para Correspondência</h3>
    
    <p class="form-row form-row-first">
        <label for="reg_billing_postcode"><?php _e( 'CEP', 'woocommerce' ); ?> <span class="required">*</span></label>
        <input type="text" class="input-text" name="billing_postcode" id="reg_billing_postcode" value="<?php if ( ! empty( $_POST['billing_postcode'] ) ) esc_attr_e( $_POST['billing_postcode'] ); ?>" />
    </p>

    <div class="clear"></div>

    <p class="form-row form-row-wide">
        <label for="reg_billing_address_1"><?php _e( 'Logradouro', 'woocommerce' ); ?> <span class="required">*</span></label>
        <input type="text" class="input-text" name="billing_address_1" id="reg_billing_address_1" value="<?php if ( ! empty( $_POST['billing_address_1'] ) ) esc_attr_e( $_POST['billing_address_1'] ); ?>" />
    </p>

    <div class="clear"></div>

    <p class="form-row form-row-first">
        <label for="reg_billing_number"><?php _e( 'Número', 'woocommerce' ); ?> <span class="required">*</span></label>
        <input type="text" class="input-text" name="billing_number" id="reg_billing_number" value="<?php if ( ! empty( $_POST['billing_number'] ) ) esc_attr_e( $_POST['billing_number'] ); ?>" />
    </p>

    <p class="form-row form-row-last">
        <label for="reg_billing_address_2"><?php _e( 'Complemento', 'woocommerce' ); ?></label>
        <input type="text" class="input-text" name="billing_address_2" id="reg_billing_address_2" value="<?php if ( ! empty( $_POST['billing_address_2'] ) ) esc_attr_e( $_POST['billing_address_2'] ); ?>" />
    </p>

    <div class="clear"></div>

    <p class="form-row form-row-first">
    <label for="reg_billing_neighborhood"><?php _e( 'Bairro', 'woocommerce' ); ?> <span class="required">*</span></label>
    <input type="text" class="input-text" name="billing_neighborhood" id="reg_billing_neighborhood" value="<?php if ( ! empty( $_POST['billing_neighborhood'] ) ) esc_attr_e( $_POST['billing_neighborhood'] ); ?>" />
    </p>

    <p class="form-row form-row-last">
    <label for="reg_billing_city"><?php _e( 'Cidade', 'woocommerce' ); ?> <span class="required">*</span></label>
    <input type="text" class="input-text" name="billing_city" id="reg_billing_city" value="<?php if ( ! empty( $_POST['billing_city'] ) ) esc_attr_e( $_POST['billing_city'] ); ?>" />
    </p>

    <div class="clear"></div>

    <p class="form-row form-row-wide">
    <label for="reg_billing_state"><?php _e( 'Estado', 'woocommerce' ); ?> <span class="required">*</span></label>
    <select name="billing_state" id="reg_billing_state"> 
        <option value="">Selecione</option> 
        <option value="AC">Acre</option> 
        <option value="AL">Alagoas</option> 
        <option value="AM">Amazonas</option> 
        <option value="AP">Amapá</option> 
        <option value="BA">Bahia</option> 
        <option value="CE">Ceará</option> 
        <option value="DF">Distrito Federal</option> 
        <option value="ES">Espírito Santo</option> 
        <option value="GO">Goiás</option> 
        <option value="MA">Maranhão</option> 
        <option value="MT">Mato Grosso</option> 
        <option value="MS">Mato Grosso do Sul</option> 
        <option value="MG">Minas Gerais</option> 
        <option value="PA">Pará</option> 
        <option value="PB">Paraíba</option> 
        <option value="PR">Paraná</option> 
        <option value="PE">Pernambuco</option> 
        <option value="PI">Piauí</option> 
        <option value="RJ">Rio de Janeiro</option> 
        <option value="RN">Rio Grande do Norte</option> 
        <option value="RO">Rondônia</option> 
        <option value="RS">Rio Grande do Sul</option> 
        <option value="RR">Roraima</option> 
        <option value="SC">Santa Catarina</option> 
        <option value="SE">Sergipe</option> 
        <option value="SP">São Paulo</option> 
        <option value="TO">Tocantins</option> 
    </select>
    </p>

    <div class="clear"></div>

    <h3>Ocupação Profissional</h3>

    <p class="form-row form-row-wide">
        <label for="reg_billing_ocupacao"><?php _e( 'Ocupação Profissional', 'woocommerce' ); ?> <span class="required">*</span></label>
        <input type="radio" name="billing_ocupacao" value="Professores universitários e Pesquisadores">&nbsp;Professores universitários e Pesquisadores<br />
        <input type="radio" name="billing_ocupacao" value="Professores da educação básica">&nbsp;Professores da educação básica<br />
        <input type="radio" name="billing_ocupacao" value="Estudantes de Pós-Graduação">&nbsp;Estudantes de Pós-Graduação<br />
        <input type="radio" name="billing_ocupacao" value="Estudantes de Graduação">&nbsp;Estudantes de Graduação<br />
        <input type="radio" name="billing_ocupacao" value="Participantes de movimentos sociais">&nbsp;Participantes de movimentos sociais<br />
        <input type="radio" name="billing_ocupacao" value="Outros profissionais">&nbsp;Outros profissionais
    </p>

    <div class="clear"></div>

    <p class="form-row form-row-wide">
        <label for="reg_billing_company"><?php _e( 'Instituição em que trabalha ou estuda', 'woocommerce' ); ?> <span class="required">*</span></label>
        <input type="text" class="input-text" name="billing_company" id="reg_billing_company" value="<?php if ( ! empty( $_POST['billing_company'] ) ) esc_attr_e( $_POST['billing_company'] ); ?>" />
    </p>

    <div class="clear"></div>

    <h3>Formação - Maior Titulação</h3>

    <p class="form-row form-row-wide">
        <label for="reg_billing_ocupacao"><?php _e( 'Titulação', 'woocommerce' ); ?> <span class="required">*</span></label>
        <input type="radio" name="billing_titulacao" value="Ensino Médio">&nbsp;Ensino Médio&nbsp;&nbsp;
        <input type="radio" name="billing_titulacao" value="Graduação">&nbsp;Graduação&nbsp;&nbsp;
        <input type="radio" name="billing_titulacao" value="Especialização">&nbsp;Especialização&nbsp;&nbsp;
        <input type="radio" name="billing_titulacao" value="Mestrado">&nbsp;Mestrado&nbsp;&nbsp;
        <input type="radio" name="billing_titulacao" value="Doutorado">&nbsp;Doutorado
    </p>    

    <div class="clear"></div>

    <p class="form-row form-row-wide">
        <label for="reg_billing_area_formacao"><?php _e( 'Área de estudo ou Especialização', 'woocommerce' ); ?> <span class="required">*</span></label>
        <input type="text" class="input-text" name="billing_area_formacao" id="reg_billing_area_formacao" value="<?php if ( ! empty( $_POST['billing_area_formacao'] ) ) esc_attr_e( $_POST['billing_area_formacao'] ); ?>" />
    </p>

    <div class="clear"></div>

    <p class="form-row form-row-first">
        <label for="reg_billing_instituicao_formacao"><?php _e( 'Instituição em que se formou', 'woocommerce' ); ?> <span class="required">*</span></label>
        <input type="text" class="input-text" name="billing_instituicao_formacao" id="reg_billing_instituicao_formacao" value="<?php if ( ! empty( $_POST['billing_instituicao_formacao'] ) ) esc_attr_e( $_POST['billing_instituicao_formacao'] ); ?>" />
    </p>

    <p class="form-row form-row-last">
        <label for="reg_billing_ano_formacao"><?php _e( 'Ano de conclusão', 'woocommerce' ); ?> <span class="required">*</span></label>
        <input type="text" class="input-text" name="billing_ano_formacao" id="reg_billing_ano_formacao" value="<?php if ( ! empty( $_POST['billing_ano_formacao'] ) ) esc_attr_e( $_POST['billing_ano_formacao'] ); ?>" />
    </p>

    <div class="clear"></div>

    <h3>Dados de Acesso</h3>

    <?php
}
}
?>