<?php
/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_edit_account_form' ); ?>

<form class="woocommerce-EditAccountForm edit-account" action="" method="post">

	<?php do_action( 'woocommerce_edit_account_form_start' ); ?>

    <p class="form-row form-row-first">
        <label for="full_name"><?php _e( 'Nome completo', 'woocommerce' ); ?> <span class="required">*</span></label>
        <input type="text" class="input-text" name="full_name" id="full_name" value="<?php echo esc_attr( $user->first_name )." ".esc_attr( $user->last_name ); ?>" />
    </p>

	<p class="form-row form-row-last">
		<label for="cpf"><?php _e( 'CPF', 'woocommerce' ); ?> <span class="required">*</span></label>
		<input type="text" class="input-text" name="cpf" id="cpf" value="<?php echo esc_attr( $user->cpf ); ?>" />
	</p>

    <div class="clear"></div>

    <p class="form-row form-row-first">
        <label for="birthdate"><?php _e( 'Data de nascimento', 'woocommerce' ); ?></label>
        <input type="text" class="input-text" name="birthdate" id="birthdate" value="<?php echo esc_attr( $user->birthdate ); ?>" />
    </p>

    <p class="form-row form-row-last">
        <input type="hidden" id="sex" value="<?php echo esc_attr( $user->sex ); ?>" />
        <label for="sex"><?php _e( 'Sexo', 'woocommerce' ); ?> <span class="required">*</span></label>
        <input type="radio" name="sex" value="Feminino">&nbsp;Feminino&nbsp;&nbsp;<input type="radio" name="sex" value="Masculino">&nbsp;Masculino
    </p>

    <div class="clear"></div>

    <h3>Contatos Telefônicos</h3>

    <p class="form-row form-row-first">
        <label for="phone"><?php _e( 'Telefone Residencial', 'woocommerce' ); ?></label>
        <input type="text" class="input-text" name="phone" id="phone" value="<?php echo esc_attr( $user->phone ); ?>" />
    </p>

    <p class="form-row form-row-last">
        <label for="phone_company"><?php _e( 'Telefone Comercial', 'woocommerce' ); ?></label>
        <input type="text" class="input-text" name="phone_company" id="phone_company" value="<?php echo esc_attr( $user->phone_company ); ?>" />
    </p>

    <div class="clear"></div>

    <p class="form-row form-row-first">
        <label for="cellphone"><?php _e( 'Celular', 'woocommerce' ); ?> <span class="required">*</span></label>
        <input type="text" class="input-text" name="cellphone" id="cellphone" value="<?php echo esc_attr( $user->cellphone ); ?>" />
    </p>

    <div class="clear"></div>

    <h3>Endereço para Correspondência</h3>
    
    <p class="form-row form-row-first">
        <label for="postcode"><?php _e( 'CEP', 'woocommerce' ); ?> <span class="required">*</span></label>
        <input type="text" class="input-text" name="billing_postcode" id="billing_postcode" value="<?php echo esc_attr( $user->billing_postcode ); ?>" />
    </p>

    <div class="clear"></div>

    <p class="form-row form-row-wide">
        <label for="address_1"><?php _e( 'Logradouro', 'woocommerce' ); ?> <span class="required">*</span></label>
        <input type="text" class="input-text" name="billing_address_1" id="billing_address_1" value="<?php echo esc_attr( $user->billing_address_1 ); ?>" />
    </p>

    <div class="clear"></div>

    <p class="form-row form-row-first">
        <label for="number"><?php _e( 'Número', 'woocommerce' ); ?> <span class="required">*</span></label>
        <input type="text" class="input-text" name="billing_number" id="billing_number" value="<?php echo esc_attr( $user->billing_number ); ?>" />
    </p>

    <p class="form-row form-row-last">
        <label for="address_2"><?php _e( 'Complemento', 'woocommerce' ); ?></label>
        <input type="text" class="input-text" name="billing_address_2" id="billing_address_2" value="<?php echo esc_attr( $user->billing_address_2 ); ?>" />
    </p>

    <div class="clear"></div>

    <p class="form-row form-row-first">
    <label for="neighborhood"><?php _e( 'Bairro', 'woocommerce' ); ?> <span class="required">*</span></label>
    <input type="text" class="input-text" name="billing_neighborhood" id="billing_neighborhood" value="<?php echo esc_attr( $user->billing_neighborhood ); ?>" />
    </p>

    <p class="form-row form-row-last">
    <label for="city"><?php _e( 'Cidade', 'woocommerce' ); ?> <span class="required">*</span></label>
    <input type="text" class="input-text" name="billing_city" id="billing_city" value="<?php echo esc_attr( $user->billing_city ); ?>" />
    </p>

    <div class="clear"></div>

    <p class="form-row form-row-wide">
    <label for="state"><?php _e( 'Estado', 'woocommerce' ); ?> <span class="required">*</span></label>
    <select name="billing_state" id="state"> 
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
        <input type="hidden" id="ocupacao" value="<?php echo esc_attr( $user->ocupacao ); ?>" />
        <label for="ocupacao"><?php _e( 'Ocupação Profissional', 'woocommerce' ); ?> <span class="required">*</span></label>
        <input type="radio" name="ocupacao" value="Estudante universitário de graduação ou pós-graduação">&nbsp;Estudante universitário de graduação ou pós-graduação<br />
        <input type="radio" name="ocupacao" value="Gestor ou dirigente de IES ou rede pública educação básica">&nbsp;Gestor ou dirigente de IES ou rede pública educação básica<br />
        <input type="radio" name="ocupacao" value="Professor e pesquisador de Instituição de Educação Superior">&nbsp;Professor e pesquisador de Instituição de Educação Superior<br />
        <input type="radio" name="ocupacao" value="Profissional de nível superior de outras áreas de atuação">&nbsp;Profissional de nível superior de outras áreas de atuação<br />
        <input type="radio" name="ocupacao" value="Professor/Diretor/Coordenador Pedagógico da Educação Básica">&nbsp;Professor/Diretor/Coordenador Pedagógico da Educação Básica
    </p>

    <div class="clear"></div>

    <p class="form-row form-row-wide">
        <label for="company"><?php _e( 'Instituição em que trabalha ou estuda', 'woocommerce' ); ?> <span class="required">*</span></label>
        <input type="text" class="input-text" name="company" id="company" value="<?php echo esc_attr( $user->company ); ?>" />
    </p>

    <div class="clear"></div>

    <h3>Formação - Maior Titulação</h3>

    <p class="form-row form-row-wide">
        <input type="hidden" id="titulacao" value="<?php echo esc_attr( $user->titulacao ); ?>" />
        <label for="titulacao"><?php _e( 'Titulação', 'woocommerce' ); ?> <span class="required">*</span></label>
        <input type="radio" name="titulacao" value="Ensino Médio">&nbsp;Ensino Médio&nbsp;&nbsp;
        <input type="radio" name="titulacao" value="Graduação">&nbsp;Graduação&nbsp;&nbsp;
        <input type="radio" name="titulacao" value="Especialização">&nbsp;Especialização&nbsp;&nbsp;
        <input type="radio" name="titulacao" value="Mestrado">&nbsp;Mestrado&nbsp;&nbsp;
        <input type="radio" name="titulacao" value="Doutorado">&nbsp;Doutorado
    </p>    

    <div class="clear"></div>

    <p class="form-row form-row-wide">
        <label for="area_formacao"><?php _e( 'Área de estudo ou Especialização', 'woocommerce' ); ?> <span class="required">*</span></label>
        <input type="text" class="input-text" name="area_formacao" id="area_formacao" value="<?php echo esc_attr( $user->area_formacao ); ?>" />
    </p>

    <div class="clear"></div>

    <p class="form-row form-row-first">
        <label for="instituicao_formacao"><?php _e( 'Instituição em que se formou', 'woocommerce' ); ?> <span class="required">*</span></label>
        <input type="text" class="input-text" name="instituicao_formacao" id="instituicao_formacao" value="<?php echo esc_attr( $user->instituicao_formacao ); ?>" />
    </p>

    <p class="form-row form-row-last">
        <label for="ano_formacao"><?php _e( 'Ano de conclusão', 'woocommerce' ); ?> <span class="required">*</span></label>
        <input type="text" class="input-text" name="ano_formacao" id="ano_formacao" value="<?php echo esc_attr( $user->ano_formacao ); ?>" />
    </p>

    <div class="clear"></div>

    <h3>Dados de Acesso</h3>

	<p class="woocommerce-FormRow woocommerce-FormRow--first form-row form-row-first" style="display: none;">
		<label for="account_first_name"><?php _e( 'First name', 'woocommerce' ); ?> <span class="required">*</span></label>
		<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_first_name" id="account_first_name" value="<?php echo esc_attr( $user->first_name ); ?>" />
	</p>
	<p class="woocommerce-FormRow woocommerce-FormRow--last form-row form-row-last" style="display: none;">
		<label for="account_last_name"><?php _e( 'Last name', 'woocommerce' ); ?> <span class="required">*</span></label>
		<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_last_name" id="account_last_name" value="<?php echo esc_attr( $user->last_name ); ?>" />
	</p>

	<div class="clear"></div>

	<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
		<label for="account_email"><?php _e( 'Email address', 'woocommerce' ); ?> <span class="required">*</span></label>
		<input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="account_email" id="account_email" value="<?php echo esc_attr( $user->user_email ); ?>" />
	</p>

	<fieldset>
		<legend><?php _e( 'Password Change', 'woocommerce' ); ?></legend>

		<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
			<label for="password_current"><?php _e( 'Current Password (leave blank to leave unchanged)', 'woocommerce' ); ?></label>
			<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_current" id="password_current" />
		</p>
		<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
			<label for="password_1"><?php _e( 'New Password (leave blank to leave unchanged)', 'woocommerce' ); ?></label>
			<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_1" id="password_1" />
		</p>
		<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
			<label for="password_2"><?php _e( 'Confirm New Password', 'woocommerce' ); ?></label>
			<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_2" id="password_2" />
		</p>
	</fieldset>
	<div class="clear"></div>

	<?php do_action( 'woocommerce_edit_account_form' ); ?>

	<p>
		<?php wp_nonce_field( 'save_account_details' ); ?>
		<input type="submit" class="woocommerce-Button button" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>" />
		<input type="hidden" name="action" value="save_account_details" />
	</p>

	<?php do_action( 'woocommerce_edit_account_form_end' ); ?>
</form>

<?php do_action( 'woocommerce_after_edit_account_form' ); ?>
