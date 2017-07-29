<style type="text/css">
	.cpf{
		text-align: center;
		width: 60%;
		margin: 0 auto !important;
		margin-bottom: 60px !important;
	}

	.cpf .cpf-input{
		width: 100%;
		text-align: center;
	}

	.cpf button{
		padding: 8px;
		color:white !important;
		background: #FF8E1D;
		transition: all 1s;
		width: 100%;
	}

	.cpf button:disabled{
		background: grey;
	}

	.cpf button:hover{
		background: #d06800;
		transition: all 1s;
		color:white;
	}

	#tabela_valores thead tr {background-color: #5C6995; color: #FFF;}
	
	#tabela_valores  tbody tr:nth-child(even) {background-color: #CACDDC}
</style>
<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Tortuga
 */

get_header(); ?>
	
	<div id="content" class="site-content container clearfix">
		<div class="type-page cpf">
			<?php 
			if(isset($_POST['cpf'])){
				$users = get_users( array(
				                "meta_key" => "cpf",
				                "meta_value" => $_POST['cpf'],
				                "fields" => "ID"
				            ));
			}

			if(!isset($_POST['cpf']) && !isset($_POST['billing_full_name'])){ ?>
			<form method="post">
				<h1 class="page-title">1º Passo: Digite seu CPF</h1>
				<p class="form-row form-row-wide">
			        <input type="text" placeholder="CPF" class="input-text cpf-input" name="cpf" id="cpf" value="<?php if ( ! empty( $_POST['cpf'] ) ) $_POST['cpf'] ?>" />
			    </p>
			    <button type="submit">Avançar</button>
		    </form>
		    <?php } else if(isset($_POST['cpf']) && count($users)>0 && is_encontro_buy($users[0])) { ?>
		    	<ul style='text-align:justify;' class='woocommerce-error'>
				    <li>Verficamos que o usuário com esse CPF já se inscreveu no Encontro FINEDUCA</li>
				</ul>
		    	<form method="post">
					<h1 class="page-title">1º Passo: Digite seu CPF</h1>
					<p class="form-row form-row-wide">
				        <input type="text" placeholder="CPF" class="input-text cpf-input" name="cpf" id="cpf" value="<?php if ( ! empty( $_POST['cpf'] ) ) $_POST['cpf'] ?>" />
				    </p>
				    <button type="submit">Avançar</button>
			    </form>
		    <?php
		    	} else if(isset($_POST['billing_full_name'])){
		    		foreach($_POST as $key => $value){
		    			update_user_meta($_POST['user_id'],$key,$value);
		    			if($key=="cpf" || $key=="cellphone" || $key=="phone"){
		    				update_user_meta($_POST['user_id'],'billing_'.$key,$value);
		    			}
		    		}
		    		WC()->cart->empty_cart();
		    		if(isset($_POST['add_anuidade'])){
		    			$produto = get_produto_evento($_POST['user_id'],$_POST['ocupacao'], true);
		    			$anuidade = get_anuidade($_POST['ocupacao']);
		    			$woocommerce->cart->add_to_cart($anuidade);
		    			$woocommerce->cart->add_to_cart($produto);
		    		} else{
		    			$produto = get_produto_evento($_POST['user_id'],$_POST['ocupacao'], false);
		    			$woocommerce->cart->add_to_cart($produto);
		    		}
		    		wp_redirect('finalizar-compra');	
		    	} else {

			    $users = get_users( array(
			                "meta_key" => "cpf",
			                "meta_value" => $_POST['cpf'],
			                "fields" => "ID"
			            ));
			    if(count($users)==0) wp_redirect('cadastro');
			    else {
				    $user_id = $users[0];


		    ?>
			<h1 class="page-title">2º Passo: Confirmar Dados</h1>
		    <div class="registration-form woocommerce">
		    <form method="post" class="register">
		    <?php
		    $anuidade = get_anuidade_quite($user_id);
				    if(empty($anuidade)){
				    	?>
				    <ul style='text-align:justify;' class='woocommerce-error'>
				    	<li>Verficamos que a <strong>Anuidade 2017 referente ao CPF informado não está paga</strong>.<br />Os associados com anuidade paga recebem desconto na inscrição do V Encontro Fineduca.<br />
				    	<table id="tabela_valores" class="text-center">
			                <thead>
			                	<tr>
			                		<td rowspan="2"><strong>Tipos de Inscrição</strong></td>
			                		<td rowspan="2"><strong>Anuidade</strong></td>
			                        <td colspan="2">
			                        	<strong>Inscrição até 24/07/2017</strong>
			                        </td>
								</tr>
								<tr>
			                        <td>
			                        	<strong>Associado/a com anuidade 2017 paga</strong>
			                        </td>
			                        <td>
			                        	<strong>Associado/a não quite em 2017</strong>
			                        </td>
								</tr>
							</thead>
							<tbody>
								<tr>
			                		<td>Professores universitários e Pesquisadores</td>
			                        <td>R$ 100,00</td>
			                        <td>R$ 50,00</td>
			                        <td>R$ 150,00</td>
								</tr>
								<tr>
			                		<td>Professores da educação básica</td>
			                		<td>R$ 50,00</td>
			                        <td>R$ 25,00</td>
			                        <td>R$ 75,00</td>
								</tr>
								<tr>
			                		<td>Estudantes de Pós-Graduação</td>
			                		<td>R$ 50,00</td>
			                        <td>R$ 25,00</td>
			                        <td>R$ 75,00</td>
								</tr>
								<tr>
			                		<td>Estudantes de Graduação</td>
			                		<td>R$ 20,00</td>
			                        <td>R$ 10,00</td>
			                        <td>R$ 30,00</td>
								</tr>
								<tr>
			                		<td>Participantes de movimentos sociais</td>
			                		<td>R$ 20,00</td>
			                        <td>R$ 10,00</td>
			                        <td>R$ 30,00</td>
								</tr>
								<tr>
			                		<td>Outros Profissionais</td>
			                		<td>R$ 100,00</td>
			                        <td>R$ 50,00</td>
			                        <td>R$ 150,00</td>
								</tr>
			               	</tbody>
			            </table>
			            </li>
				    	<li><p><strong>Deseja incluir a anuidade?</strong> <input type='checkbox' name='add_anuidade' value='Sim' /></p></li></ul>
				    	<div class='clear'></div>
				    	<?php
				    }
		    ?>
			<p class="form-row form-row-first">
		        <label for="reg_billing_full_name"><?php _e( 'Nome completo', 'woocommerce' ); ?> <span class="required">*</span></label>
		        <input type="text" class="input-text" name="billing_full_name" id="reg_billing_full_name" value="<?php echo get_user_meta($user_id,'billing_full_name',true) ?>" />
		    </p>

		    <p class="form-row form-row-last">
		        <label for="reg_billing_cpf"><?php _e( 'CPF', 'woocommerce' ); ?> <span class="required">*</span></label>
		        <input type="text" class="input-text" name="cpf" id="reg_billing_cpf" value="<?php echo get_user_meta($user_id,'cpf',true) ?>" />
		    </p>

		    <div class="clear"></div>

		    <p class="form-row form-row-first">
		        <label for="reg_billing_birthdate"><?php _e( 'Data de nascimento', 'woocommerce' ); ?></label>
		        <input type="text" class="input-text" name="birthdate" id="reg_billing_birthdate" value="<?php echo get_user_meta($user_id,'birthdate',true) ?>" />
		    </p>

		    <p class="form-row form-row-last">
		        <label for="reg_billing_sex"><?php _e( 'Sexo', 'woocommerce' ); ?> <span class="required">*</span></label>
		            <input type="radio" name="sex" value="Feminino" <?php echo get_user_meta($user_id,'sex',true)=="Feminino" ? 'checked' : ''  ?>>&nbsp;Feminino&nbsp;&nbsp;<input type="radio" name="sex" value="Masculino" <?php echo get_user_meta($user_id,'sex',true)=="Masculino" ? 'checked' : ''  ?>>&nbsp;Masculino
		    </p>

		    <div class="clear"></div>

		    <h3>Contatos Telefônicos</h3>

		    <p class="form-row form-row-first">
		        <label for="reg_billing_phone"><?php _e( 'Telefone Residencial', 'woocommerce' ); ?></label>
		        <input type="text" class="input-text" name="phone" id="reg_billing_phone" value="<?php echo get_user_meta($user_id,'phone',true) ?>" />
		    </p>

		    <p class="form-row form-row-last">
		        <label for="reg_billing_phone_company"><?php _e( 'Telefone Comercial', 'woocommerce' ); ?></label>
		        <input type="text" class="input-text" name="phone_company" id="reg_billing_phone_company" value="<?php echo get_user_meta($user_id,'phone_company',true) ?>" />
		    </p>

		    <div class="clear"></div>

		    <p class="form-row form-row-first">
		        <label for="reg_billing_cellphone"><?php _e( 'Celular', 'woocommerce' ); ?> <span class="required">*</span></label>
		        <input type="text" class="input-text" name="cellphone" id="reg_billing_cellphone" value="<?php echo get_user_meta($user_id,'cellphone',true) ?>" />
		    </p>

		    <div class="clear"></div>

		    <h3>Endereço para Correspondência</h3>
		    
		    <p class="form-row form-row-first">
		        <label for="reg_billing_postcode"><?php _e( 'CEP', 'woocommerce' ); ?> <span class="required">*</span></label>
		        <input type="text" class="input-text" name="billing_postcode" id="reg_billing_postcode" value="<?php echo get_user_meta($user_id,'billing_postcode',true) ?>" />
		    </p>

		    <div class="clear"></div>

		    <p class="form-row form-row-wide">
		        <label for="reg_billing_address_1"><?php _e( 'Logradouro', 'woocommerce' ); ?> <span class="required">*</span></label>
		        <input type="text" class="input-text" name="billing_address_1" id="reg_billing_address_1" value="<?php echo get_user_meta($user_id,'billing_address_1',true) ?>" />
		    </p>

		    <div class="clear"></div>

		    <p class="form-row form-row-first">
		        <label for="reg_billing_number"><?php _e( 'Número', 'woocommerce' ); ?> <span class="required">*</span></label>
		        <input type="text" class="input-text" name="billing_number" id="reg_billing_number" value="<?php echo get_user_meta($user_id,'billing_number',true) ?>" />
		    </p>

		    <p class="form-row form-row-last">
		        <label for="reg_billing_address_2"><?php _e( 'Complemento', 'woocommerce' ); ?></label>
		        <input type="text" class="input-text" name="billing_address_2" id="reg_billing_address_2" value="<?php echo get_user_meta($user_id,'billing_address_2',true) ?>" />
		    </p>

		    <div class="clear"></div>

		    <p class="form-row form-row-first">
		    <label for="reg_billing_neighborhood"><?php _e( 'Bairro', 'woocommerce' ); ?> <span class="required">*</span></label>
		    <input type="text" class="input-text" name="billing_neighborhood" id="reg_billing_neighborhood" value="<?php echo get_user_meta($user_id,'billing_neighborhood',true) ?>" />
		    </p>

		    <p class="form-row form-row-last">
		    <label for="reg_billing_city"><?php _e( 'Cidade', 'woocommerce' ); ?> <span class="required">*</span></label>
		    <input type="text" class="input-text" name="billing_city" id="reg_billing_city" value="<?php echo get_user_meta($user_id,'billing_city',true) ?>" />
		    </p>

		    <div class="clear"></div>

		    <p class="form-row form-row-wide">
		    <label for="reg_billing_state"><?php _e( 'Estado', 'woocommerce' ); ?> <span class="required">*</span></label>
		    <select name="billing_state" id="reg_billing_state"> 
		        <option>Selecione</option>
		        <option value="AC" <?php echo get_user_meta($user_id,'billing_state',true)=="AC" ? 'selected' : '' ?>>Acre</option> 
		        <option value="AL" <?php echo get_user_meta($user_id,'billing_state',true)=='AL' ? 'selected' : '' ?>>Alagoas</option> 
		        <option value="AM" <?php echo get_user_meta($user_id,'billing_state',true)=='AM' ? 'selected' : '' ?>>Amazonas</option> 
		        <option value="AP" <?php echo get_user_meta($user_id,'billing_state',true)=='AP' ? 'selected' : '' ?>>Amapá</option> 
		        <option value="BA" <?php echo get_user_meta($user_id,'billing_state',true)=='BA' ? 'selected' : '' ?>>Bahia</option> 
		        <option value="CE" <?php echo get_user_meta($user_id,'billing_state',true)=='CE' ? 'selected' : '' ?>>Ceará</option> 
		        <option value="DF" <?php echo get_user_meta($user_id,'billing_state',true)=='DF' ? 'selected' : '' ?>>Distrito Federal</option> 
		        <option value="ES" <?php echo get_user_meta($user_id,'billing_state',true)=='ES' ? 'selected' : '' ?>>Espírito Santo</option> 
		        <option value="GO" <?php echo get_user_meta($user_id,'billing_state',true)=='GO' ? 'selected' : '' ?>>Goiás</option> 
		        <option value="MA" <?php echo get_user_meta($user_id,'billing_state',true)=='MA' ? 'selected' : '' ?>>Maranhão</option> 
		        <option value="MT" <?php echo get_user_meta($user_id,'billing_state',true)=='MT' ? 'selected' : '' ?>>Mato Grosso</option> 
		        <option value="MS" <?php echo get_user_meta($user_id,'billing_state',true)=='MS' ? 'selected' : '' ?>>Mato Grosso do Sul</option> 
		        <option value="MG" <?php echo get_user_meta($user_id,'billing_state',true)=='MG' ? 'selected' : '' ?>>Minas Gerais</option> 
		        <option value="PA" <?php echo get_user_meta($user_id,'billing_state',true)=='PA' ? 'selected' : '' ?>>Pará</option> 
		        <option value="PB" <?php echo get_user_meta($user_id,'billing_state',true)=='PB' ? 'selected' : '' ?>>Paraíba</option> 
		        <option value="PR" <?php echo get_user_meta($user_id,'billing_state',true)=='PR' ? 'selected' : '' ?>>Paraná</option> 
		        <option value="PE" <?php echo get_user_meta($user_id,'billing_state',true)=='PE' ? 'selected' : '' ?>>Pernambuco</option> 
		        <option value="PI" <?php echo get_user_meta($user_id,'billing_state',true)=='PI' ? 'selected' : '' ?>>Piauí</option> 
		        <option value="RJ" <?php echo get_user_meta($user_id,'billing_state',true)=='RJ' ? 'selected' : '' ?>>Rio de Janeiro</option> 
		        <option value="RN" <?php echo get_user_meta($user_id,'billing_state',true)=='RN' ? 'selected' : '' ?>>Rio Grande do Norte</option> 
		        <option value="RO" <?php echo get_user_meta($user_id,'billing_state',true)=='RO' ? 'selected' : '' ?>>Rondônia</option> 
		        <option value="RS" <?php echo get_user_meta($user_id,'billing_state',true)=='RS' ? 'selected' : '' ?>>Rio Grande do Sul</option> 
		        <option value="RR" <?php echo get_user_meta($user_id,'billing_state',true)=='RR' ? 'selected' : '' ?>>Roraima</option> 
		        <option value="SC" <?php echo get_user_meta($user_id,'billing_state',true)=='SC' ? 'selected' : '' ?>>Santa Catarina</option> 
		        <option value="SE" <?php echo get_user_meta($user_id,'billing_state',true)=='SE' ? 'selected' : '' ?>>Sergipe</option> 
		        <option value="SP" <?php echo get_user_meta($user_id,'billing_state',true)=='SP' ? 'selected' : '' ?>>São Paulo</option> 
		        <option value="TO" <?php echo get_user_meta($user_id,'billing_state',true)=='TO' ? 'selected' : '' ?>>Tocantins</option> 
		    </select>
		    </p>

		    <div class="clear"></div>

		    <h3>Ocupação Profissional</h3>

		    <p class="form-row form-row-wide">
		        <label for="reg_billing_ocupacao"><?php _e( 'Ocupação Profissional', 'woocommerce' ); ?> <span class="required">*</span></label>
		        <input type="radio" name="ocupacao" value="Professores universitários e Pesquisadores" <?php echo get_user_meta($user_id,'ocupacao',true)=="Professores universitários e Pesquisadores" ? 'checked' : ''  ?>>&nbsp;Professores universitários e Pesquisadores<br />
		        <input type="radio" name="ocupacao" value="Professores da educação básica" <?php echo get_user_meta($user_id,'ocupacao',true)=="Professores da educação básica" ? 'checked' : ''  ?>>&nbsp;Professores da educação básica<br />
		        <input type="radio" name="ocupacao" value="Estudantes de Pós-Graduação" <?php echo get_user_meta($user_id,'ocupacao',true)=="Estudantes de Pós-Graduação" ? 'checked' : ''  ?>>&nbsp;Estudantes de Pós-Graduação<br />
		        <input type="radio" name="ocupacao" value="Estudantes de Graduação" <?php echo get_user_meta($user_id,'ocupacao',true)=="Estudantes de Graduação" ? 'checked' : ''  ?>>&nbsp;Estudantes de Graduação<br />
		        <input type="radio" name="ocupacao" value="Participantes de movimentos sociais" <?php echo get_user_meta($user_id,'ocupacao',true)=="Participantes de movimentos sociais" ? 'checked' : ''  ?>>&nbsp;Participantes de movimentos sociais<br />
		        <input type="radio" name="ocupacao" value="Outros profissionais" <?php echo get_user_meta($user_id,'ocupacao',true)=="Outros profissionais" ? 'checked' : ''  ?>>&nbsp;Outros profissionais
		    </p>

		    <div class="clear"></div>

		    <p class="form-row form-row-wide">
		        <label for="reg_billing_company"><?php _e( 'Instituição em que trabalha ou estuda', 'woocommerce' ); ?> <span class="required">*</span></label>
		        <input type="text" class="input-text" name="company" id="reg_billing_company" value="<?php echo get_user_meta($user_id,'company',true) ?>" />
		    </p>

		    <div class="clear"></div>

		    <h3>Formação - Maior Titulação</h3>

		    <p class="form-row form-row-wide">
		        <label for="reg_billing_ocupacao"><?php _e( 'Titulação', 'woocommerce' ); ?> <span class="required">*</span></label>

		        <input type="radio" name="titulacao" value="Ensino Médio" <?php echo get_user_meta($user_id,'titulacao',true)=="Ensino Médio" ? 'checked' : ''  ?>>&nbsp;Ensino Médio&nbsp;&nbsp;
		        <input type="radio" name="titulacao" value="Graduação" <?php echo get_user_meta($user_id,'titulacao',true)=="Graduação" ? 'checked' : ''  ?>>&nbsp;Graduação&nbsp;&nbsp;
		        <input type="radio" name="titulacao" value="Especialização" <?php echo get_user_meta($user_id,'titulacao',true)=="Especialização" ? 'checked' : ''  ?>>&nbsp;Especialização&nbsp;&nbsp;
		        <input type="radio" name="titulacao" value="Mestrado" <?php echo get_user_meta($user_id,'titulacao',true)=="Mestrado" ? 'checked' : ''  ?>>&nbsp;Mestrado&nbsp;&nbsp;
		        <input type="radio" name="titulacao" value="Doutorado" <?php echo get_user_meta($user_id,'titulacao',true)=="Doutorado" ? 'checked' : ''  ?>>&nbsp;Doutorado
		    </p>    

		    <div class="clear"></div>

		    <p class="form-row form-row-wide">
		        <label for="reg_billing_area_formacao"><?php _e( 'Área de estudo ou Especialização', 'woocommerce' ); ?> <span class="required">*</span></label>
		        <input type="text" class="input-text" name="area_formacao" id="reg_billing_area_formacao" value="<?php echo get_user_meta($user_id,'area_formacao',true) ?>" />
		    </p>

		    <div class="clear"></div>

		    <p class="form-row form-row-first">
		        <label for="reg_billing_instituicao_formacao"><?php _e( 'Instituição em que se formou', 'woocommerce' ); ?> <span class="required">*</span></label>
		        <input type="text" class="input-text" name="instituicao_formacao" id="reg_billing_instituicao_formacao" value="<?php echo get_user_meta($user_id,'instituicao_formacao',true) ?>" />
		    </p>

		    <p class="form-row form-row-last">
		        <label for="reg_billing_ano_formacao"><?php _e( 'Ano de conclusão', 'woocommerce' ); ?> <span class="required">*</span></label>
		        <input type="text" class="input-text" name="ano_formacao" id="reg_billing_ano_formacao" value="<?php echo get_user_meta($user_id,'ano_formacao',true) ?>" />
		    </p>

		    <div class="clear"></div>

    		<input type="hidden" name="evento_fineduca" value="2017" />
    		<input type="hidden" name="user_id" value="<?php echo $user_id ?>" />
    		<br>
    		<p class="obs" style="color:red; font-weight: bold;">* Preencha todos os campos obrigatórios</p>
    		<button class="replace" type="submit">Finalizar</button>
    </form>
    </div>
		    <?php }} ?>
    	</div>
    </div>
    </div>
<img src="<?php echo get_bloginfo('template_url') ?>/images/rodape.jpg">

<script type="text/javascript" src="<?php echo get_bloginfo('template_url') ?>/js/jquery.maskedinput.min.js"></script>
<script>
	(function($) {
		if($("input[name='billing_full_name']").val()!="" && $("input[name='cpf']").val()!="" && $("input[name='sex']").val()!="" && $("input[name='cpf']").val()!=""  && $("input[name='cellphone']").val()!="" && $("input[name='billing_postcode']").val()!="" && $("input[name='billing_address_1']").val()!="" && $("input[name='billing_number']").val()!="" && $("input[name='billing_neighborhood']").val()!="" && $("input[name='billing_city']").val()!="" && $("input[name='ocupacao']").val()!="" && $("input[name='cpf']").val()!="company" && $("input[name='instituicao_formacao']").val()!="" && $("input[name='cpf']").val()!="titulacao" && $("input[name='area_formacao']").val()!="" && $("input[name='ano_formacao']").val()!=""){
				$('.replace').removeAttr('disabled');
				$('.obs').css('display','none');	
		} else {
			$('.replace').attr('disabled', 'disabled');
			$('.obs').css('display','block');
		}

		$('form :input').change(function(){
			if($("input[name='billing_full_name']").val()!="" && $("input[name='cpf']").val()!="" && $("input[name='sex']").val()!="" && $("input[name='cpf']").val()!=""  && $("input[name='cellphone']").val()!="" && $("input[name='billing_postcode']").val()!="" && $("input[name='billing_address_1']").val()!="" && $("input[name='billing_number']").val()!="" && $("input[name='billing_neighborhood']").val()!="" && $("input[name='billing_city']").val()!="" && $("input[name='ocupacao']").val()!="" && $("input[name='cpf']").val()!="company" && $("input[name='instituicao_formacao']").val()!="" && $("input[name='cpf']").val()!="titulacao" && $("input[name='area_formacao']").val()!="" && $("input[name='ano_formacao']").val()!=""){
				$('.replace').removeAttr('disabled');
				$('.obs').css('display','none');
			} else {
				$('.replace').attr('disabled', 'disabled');
				$('.obs').css('display','block');
			}
		});

		$.mask.definitions['~'] = "[+-]";
	    $("#reg_billing_cpf,.cpf-input").mask("999.999.999-99");
	    $("#reg_billing_birthdate").mask("99/99/9999");
	    $("#reg_billing_postcode").mask("99999-999");
	    $('#reg_billing_cellphone').mask("(99) 99999-999?9");
	    $('#reg_billing_phone, #reg_billing_phone_company').mask("(99) 9999-9999?9");

	    //Quando o campo cep perde o foco.
	    $("#reg_billing_postcode").blur(function() {

	        //Nova variável "cep" somente com dígitos.
	        var cep = $(this).val().replace(/\D/g, '');

	        //Verifica se campo cep possui valor informado.
	        if (cep != "") {

	            $("#reg_billing_address_1, #reg_billing_neighborhood, #reg_billing_city").val("Carregando...");
	            $("#reg_billing_state").val("");

	            //Expressão regular para validar o CEP.
	            var validacep = /^[0-9]{8}$/;

	            //Valida o formato do CEP.
	            if(validacep.test(cep)) {

	                //Consulta o webservice viacep.com.br/
	                $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

	                    if (!("erro" in dados)) {
	                        //Atualiza os campos com os valores da consulta.
	                        $("#reg_billing_address_1").val(dados.logradouro);
	                        $("#reg_billing_neighborhood").val(dados.bairro);
	                        $("#reg_billing_city").val(dados.localidade);
	                        $("#reg_billing_state").val(dados.uf);
	                    } //end if.
	                    else {
	                        //CEP pesquisado não foi encontrado.
	                        alert("CEP não encontrado.\nPreencha as informações de Logradouro, Bairro, Cidade e Estado manualmente.");
		    		        $("#reg_billing_address_1, #reg_billing_neighborhood, #reg_billing_city, #reg_billing_state").val("");
	                    }
	                });
	            } //end if.
	            else {
	                //cep é inválido.
	                alert("Formato de CEP inválido.");
		            $("#reg_billing_address_1, #reg_billing_neighborhood, #reg_billing_city, #reg_billing_state").val("");
	            }
	        } 
	    });
	})( jQuery );
</script>