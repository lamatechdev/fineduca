<?php
	add_filter( 'woocommerce_registration_redirect', 'redirect_login');

	function redirect_login($redirect){
		if(isset($_POST['evento_fineduca'])) {
			add_cart($_POST['add_anuidade'],get_user_meta(get_current_user_id(),'ocupacao',true),get_current_user_id());
			$redirect = get_permalink( get_page_by_title('Finalizar compra')->ID);
		}
		else {
			$redirect = get_permalink( get_page_by_title('Meu Espaço')->ID);
		}
		return $redirect;
	}
?>