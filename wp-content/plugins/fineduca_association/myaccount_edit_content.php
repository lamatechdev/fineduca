<?php

add_action( 'woocommerce_account_content', 'myaccount_edit_content' );

/**
 * Add new register fields for WooCommerce registration.
 */
function myaccount_edit_content($user){   
    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery.maskedinput.min');
    
    global $wpdb;
	
	$id = get_current_user_id();
	
	$sql = "SELECT 
                p.post_status as order_status
            FROM 
                $wpdb->postmeta pm 
                JOIN $wpdb->posts p ON pm.post_id=p.ID
                JOIN {$wpdb->prefix}woocommerce_order_items o ON p.ID=o.order_id 
            WHERE 
                pm.meta_key like '_customer_user' AND 
                o.order_item_name like 'Anuidade 2017%' AND (p.post_status like 'wc-completed' OR p.post_status like 'wc-processing') AND
                pm.meta_value like '".$id."'";
    $anuidade = $wpdb->get_results($sql , OBJECT );

    $evento = get_user_meta(get_current_user_id(),'evento_fineduca',true);
    
    $opcao = "";
    
    if($evento=="2017"){
    	$produto = get_produto_evento(get_current_user_id(),get_user_meta(get_current_user_id(),'ocupacao',true),false);
    }


    if(empty($anuidade)){
		$ocupacao = esc_attr(get_the_author_meta('ocupacao', $id));
	    
		if(strcmp($ocupacao, "Professores universitários e Pesquisadores")==0 || strcmp($ocupacao, "Outros profissionais")==0){
			$opcao = do_shortcode('[wc_quick_buy_link  product="197" label="Anuidade 2017 - Professores universitários, pesquisadores e outros profissionais" qty="1" type="button"]');
		}else if(strcmp($ocupacao, "Professores da educação básica")==0 || strcmp($ocupacao, "Estudantes de Pós-Graduação")==0){
			$opcao = do_shortcode('[wc_quick_buy_link  product="203" label="Anuidade 2017 - Professores da educação básica e estudantes de pós-graduação" qty="1" type="button"]');
		}else if(strcmp($ocupacao, "Estudantes de Graduação")==0 || strcmp($ocupacao, "Participantes de movimentos sociais")==0){
			$opcao = do_shortcode('[wc_quick_buy_link  product="204" label="Anuidade 2017 - Estudantes de graduação e participantes de movimentos sociais" qty="1" type="button"]');
		}
	}

	if($opcao){
		$opcao = "Abaixo estão listadas as opções de inscrições em eventos e quitação de anuidade disponíveis:<ul><li>".$opcao."</li></ul>";
	}

echo "<div style='display: none;' id='link_anuidade'>".$opcao."</div>";
?>
<script>
jQuery(document).ready(function( $ ){

$("a:contains('Ir às compras')").parent().html('Nenhuma solicitação foi feita ainda.');
$("a:contains('Pedidos')").text('Pagamentos');
$("td.order-status:contains('Processando')").text('Pago');
$("h1:contains('Pedidos')").text('Pagamentos');
$("span:contains('Pedido')").text('Solicitação');
$(".quick_buy_container a").css("color","#9E1915").css("background-color","yellow").css("font-weight","bold");

$("#produtos_disponiveis").append($("#link_anuidade").html());
var str = window.location.href.toString();
if (str.search( 'edit' ) != -1 ){
  $("#produtos_disponiveis").css("display","none");
}else{
 $( ".woocommerce-MyAccount-content p:nth-child(4)" ).text( "No menu ao lado você pode ver seus pedidos (pagamento de anuidade e inscrições em eventos da Fineduca) e gerenciar detalhes de sua conta, tais como: informações pessoais; contatos telefônicos; endereço para correspondência; ocupação profissional e; dados de acesso." );
}
//$( ".woocommerce-MyAccount-content").css("margin-top","-55px");

});
</script>

<?php
}

?>