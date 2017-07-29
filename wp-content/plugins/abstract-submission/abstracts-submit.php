<?php 
  $error = false;
if($_POST) { 

	if (isset( $_POST["title"])) {
		if ( get_magic_quotes_gpc() ) {
			$_POST["title"] = stripslashes($_POST["title"]);
			$_POST["abstract"] = stripslashes($_POST["abstract"]);
		}

		$html = "";
		$user_id1 = NULL;
		$user_id2 = NULL;

		$wpdb->show_errors();

	  	/*if(!is_encontro_buy(get_current_user_id())){
			$error = true;
			$messages[] = "Autor não se inscreveu no Encontro FINEDUCA.";
		} else {
			if(is_submission_autor(get_current_user_id())){
				$error = true;
				$messages[] = "O usuário atual já submeteu um trabalho como autor. Só é permitido uma submissão como autor e outra como coautor.";
			}
		}*/

		//Adicionei if abaixo e comentei o de cima para permitir aos Admins enviarem pelos autores
		if($_POST['cpf_author']!=""){
			$results = $wpdb->get_results("SELECT user_id FROM wp_usermeta WHERE meta_key='cpf' AND meta_value='".$_POST['cpf_author']."'");
			if(count($results)>0){
				$user_id = $results[0]->user_id;
				if(!is_encontro_buy($user_id)){
					$error = true;
					$messages[] = "Autor não se inscreveu no Encontro FINEDUCA.";
				} 
			} else {
				$error = true;
				$messages[] = "Autor não está cadastrado.";
			}
	  	}

	  	if($_POST['cpf_coauthor1']!=""){
			$results = $wpdb->get_results("SELECT user_id FROM wp_usermeta WHERE meta_key='cpf' AND meta_value='".$_POST['cpf_coauthor1']."'");
			if(count($results)>0){
				$user_id1 = $results[0]->user_id;
				if(!is_encontro_buy($user_id1)){
					$error = true;
					$messages[] = "Coautor 1 não se inscreveu no Encontro FINEDUCA.";
				} else {
					if(is_submission_coautor($user_id1)){
						$error = true;
						$messages[] = "O primeiro Coautor já submeteu um trabalho como coautor. Só é permitido uma submissão como autor e outra como coautor.";
					}
				}
			} else {
				$error = true;
				$messages[] = "Coautor 1 não está cadastrado.";
			}
	  	}

		if($_POST['cpf_coauthor2']!=""){
		  	$results = $wpdb->get_results("SELECT user_id FROM wp_usermeta WHERE meta_key='cpf' AND meta_value='".$_POST['cpf_coauthor2']."'");
			if(count($results)>0){
				$user_id2 = $results[0]->user_id;
				if(!is_encontro_buy($user_id2)){
					$error = true;
					$messages[] = "Coautor 2 não se inscreveu no Encontro FINEDUCA.";
				} else {
					if(is_submission_coautor($user_id2)){
						$error = true;
						$messages[] = "O segundo Coautor já submeteu um trabalho como coautor. Só é permitido uma submissão como autor e outra como coautor.";
					}
				}
			} else {
				$error = true;
				$messages[] = "Coautor 2 não está cadastrado.";
			}
		}

		if(!$error){
			$wpdb->query($wpdb->prepare("INSERT INTO ".$wpdb->prefix."submitted_abstracts (title,author,co_author1,co_author2,abstract,thematic_axis,data) VALUES (%s,%s,%s,%s,%s,%s,NOW())",$_POST['title'],$user_id,$user_id1,$user_id2,$_POST['abstract'],$_POST["thematic_axis"]));
			$abstract_id = $wpdb->insert_id;

			if($_FILES['attachment']) {
				if ( ! function_exists( 'wp_handle_upload' ) ) {
			        require_once( ABSPATH . 'wp-admin/includes/file.php' );
			    }
				$result = wp_handle_upload($_FILES['attachment'],array('test_form' => false));
				$wpdb->query($wpdb->prepare("INSERT INTO ".$wpdb->prefix."abstracts_attachments (abstracts_id,fileurl,filetype) VALUES (%d,%s,%s)",$abstract_id,$result["url"],$result["type"]));
			} else {
				$error = true;
				$messages[] = "Arquivo não enviado.";
			}

			if(!$error) {
				function wpdocs_set_html_mail_content_type() {
				    return 'text/html';
				}
				add_filter( 'wp_mail_content_type', 'wpdocs_set_html_mail_content_type' );

				$emails = array();
				$userdata = get_userdata($user_id);
				$emails[] = $userdata->user_email;

				$msg_co = "" ;
				if($user_id1!=NULL) {
					$userdata1 = get_userdata($user_id1);
					$emails[] = $userdata1->user_email;
					$msg_co .= "<strong>Coautor</strong>: ".($user_id1!=NULL ? get_user_meta($user_id1,"billing_full_name",true) : "" )."<br/>";
				}
				if($user_id2!=NULL) {
					$userdata2 = get_userdata($user_id2);
					$emails[] = $userdata2->user_email;
					$msg_co .= "<strong>Coautor</strong>: ".($user_id1!=NULL ? get_user_meta($user_id2,"billing_full_name",true) : "" )."<br/>";
				}

				$html = "<p>Olá,<br>O seu trabalho foi submetido com sucesso para o <strong>V Encontro FINEDUCA 2017</strong>.<br /><br /><strong>Título:</strong> ".$_POST["title"]."<br><strong>Autor</strong>: ".get_user_meta($user_id,"billing_full_name",true)."<br>".$msg_co."<br/>A relação dos trabalhos aprovados será divulgada no dia <strong>16/07</strong>.";

				wp_mail($emails, "[Encontro FINEDUCA] Submissão de Trabalho", $html);

				remove_filter( 'wp_mail_content_type', 'wpdocs_set_html_mail_content_type' );
				wp_redirect('/meu-espaco/submissoes');
			}
		}
	}
?>
<?php }
	if(!isset( $_POST["title"]) && !is_user_logged_in()) { 
		wp_login_form();
	} else if(!isset( $_POST["title"]) || $error) {
 ?>
<form method="post" enctype="multipart/form-data" id="abs_form">
	<?php if($error){ ?>
		<ul style="text-align:justify;" class="woocommerce-error">
			<?php foreach($messages as $message){ ?>
				<li><strong><?php echo $message ?></strong>
			<?php } ?>
		</ul>
	<?php } ?>
	<p>Título <span class="red">*</span></p>
	<input type="text" name="title" class="large-text code" value="<?php echo $_POST['title'] ?>"/>

	<p>CPF do Autor <span class="red">*</span></p>
	<input type="text" required value="<?php echo $_POST['cpf_author']; //echo get_user_meta(get_current_user_id(),'cpf',true) ?>" name="cpf_author" class="large-text code cpf" cols="50" />

	<div class="row">
		<div class="column column-6">
			<p>CPF do Coautor 1	</p>
			<input type="text" name="cpf_coauthor1" class="large-text code cpf" value="<?php echo $_POST['cpf_coauthor1'] ?>" />
		</div>
		<div class="column column-6">
			<p>CPF do Coautor 2</p>
			<input type="text" name="cpf_coauthor2" class="large-text code cpf" value="<?php echo $_POST['cpf_coauthor2'] ?>" />
		</div>
	</div>

	<p>Eixos Temáticos <span class="red">*</span></p>
	<select name="thematic_axis">
		<option value="">Escolha o eixo temático</option>
		<option value="Políticas de financiamento para a educação básica e superior" <?php echo $_POST['thematic_axis']=="Políticas de financiamento para a educação básica e superior"? "selected" : "" ?>>Políticas de financiamento para a educação básica e superior</option>
		<option value="Planos, Carreira e Remuneração de professores" <?php echo $_POST['thematic_axis']=="Planos, Carreira e Remuneração de professores"? "selected" : "" ?>>Planos, Carreira e Remuneração de professores</option>
		<option value="Relações público-privado no financiamento da educação" <?php echo $_POST['thematic_axis']=="Relações público-privado no financiamento da educação"? "selected" : "" ?>>Relações público-privado no financiamento da educação</option>
	</select>

	<p>Artigo <span class="red">*</span></p>
	<div class="abstract_form_explanation">Texto em Word for Windows obedecendo às seguintes recomendações: fonte Times New Roman, tamanho 12, espaço 1,5, papel A4, margens de 2,5 cm, paginação no canto inferior direito.</div>
	<div id="abstract_form_attachments">
		<div class="abstract_form_attachment">
			<input type="file" name="attachment">
		</div>
	</div>

	<div class="obs abstract_form_explanation"><br>* Preencha todos os campos obrigatórios<br>* Arquivo no formato Word for Windows</div>
	<button type="submit">Enviar Trabalho</button>
</form>
<?php } ?>