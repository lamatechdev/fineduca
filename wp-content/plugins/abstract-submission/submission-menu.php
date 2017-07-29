<?php

function add_endpoints() {
	add_rewrite_endpoint( 'submissoes', EP_ROOT | EP_PAGES );
}
add_action( 'init', 'add_endpoints');

function add_query_vars( $vars ) {
	$vars[] = 'submissoes';
	return $vars;
}
add_filter( 'query_vars', 'add_query_vars', 0 );

function my_custom_flush_rewrite_rules() {
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'my_custom_flush_rewrite_rules' );

function new_menu_items( $items ) {
	$logout = $items['customer-logout'];
	unset( $items['customer-logout'] );
	$items[ 'submissoes' ] = __( 'Submissões', 'woocommerce' );
	$items['customer-logout'] = $logout;
	return $items;
}
add_filter( 'woocommerce_account_menu_items', 'new_menu_items' );

function endpoint_title( $title ) {
	global $wp_query;
	$is_endpoint = isset( $wp_query->query_vars['submissoes'] );
	if ( $is_endpoint && ! is_admin() && is_main_query() && in_the_loop() && is_account_page() ) {
		$title = __( 'Minhas Submissões', 'woocommerce' );
		remove_filter( 'the_title', array( $this, 'endpoint_title' ) );
	}
	return $title;
}
add_filter('the_title', 'endpoint_title');

function endpoint_content() {
	global $wpdb;

		$abstracts = $wpdb->get_results("SELECT *, YEAR(sa.data) as ano, DATE_FORMAT(sa.data, '%d/%m/%Y') as data FROM ".$wpdb->prefix."submitted_abstracts sa WHERE sa.author=".get_current_user_id()." OR sa.co_author1=".get_current_user_id()." OR sa.co_author2=".get_current_user_id()." ORDER BY data DESC");

		?>

		<style>
			.lista{
				border-bottom: 1px #CCC solid;
				width: 100%;
				height: auto;
				padding: 20px 10px;
				font-size: 10pt;
				line-height: 15px;
				text-align: justify;
			}

			.lista:last-child{
				border-bottom: none;
			}

			.titulo{
				font-family: 'Titillium Web', Tahoma, Arial;
				color:#FF8E1D;
				font-size: 18pt;
			}

			.lista .download{
				padding: 5px;
				color:white !important;
				background: #FF8E1D;
				transition: all 1s;
				margin: 0px !important;
				font-size: 10pt;
			}

			.lista .download:hover{
				background: #d06800;
				transition: all 1s;
				color:white;
			}

		</style>
		<?php if(count($abstracts)==0){ ?>
			<span class="titulo">Nenhuma submissão realizada.</span>
		<?php } foreach ($abstracts as $value) { ?>
			<?php 
			$aux = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."abstracts_attachments WHERE abstracts_id=".$value->id);
			$archive = $aux[0];
			 ?>
			<div class="lista">
				<span class="titulo">Encontro FINEDUCA <?php echo $value->ano ?></span><br><br>
				<strong>Título</strong>: <?php echo $value->title ?><br>
				<strong>Eixo Temático</strong>: <?php echo $value->thematic_axis ?><br>
				<strong>Autor</strong>: <?php echo get_user_meta($value->author,"billing_full_name",true) ?><br>
				<?php if($value->co_author1!=0) { ?><strong>Coautor</strong>: <?php echo get_user_meta($value->co_author1,"billing_full_name",true) ?><br><?php } ?>
				<?php if($value->co_author2!=0) { ?><strong>Coautor</strong>: <?php echo get_user_meta($value->co_author2,"billing_full_name",true) ?><br><?php } ?>
		        <strong>Data</strong>: <?php echo $value->data ?><br>
		        <strong>Status</strong>: 
		        <?php 
		        	if ($value->avaliacao=="2") echo "Não Aceito";
					else if ($value->avaliacao=="1") echo "Aceito";
					else echo "Em Análise"; 
				?><br>
				<?php if($value->observacao){ echo "<strong>Observação</strong>: ".$value->observacao."<br />"; } ?><br>
		        <a class="download" href="<?php echo $archive->fileurl ?>">Download</a>
	        </div>
		<?php } 
}
add_action( 'woocommerce_account_submissoes_endpoint', 'endpoint_content' );



