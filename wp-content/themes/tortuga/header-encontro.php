<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Tortuga
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<style>

	.topo{
		position: absolute;
		text-align: center;
		width: 100%;
		height: auto;
	}

	.topo .title{
		color: white;
		width: 100%;
		text-align: center;
		font-weight: 900;
		text-shadow: 1px 2px 1px rgba(0,0,0,.8);
		margin-top: 2%;
		margin-bottom: 5%;
	}

	.topo a{
		padding: 12px;
		color:white !important;
		background: #FF8E1D;
		transition: all 1s;
	}

	.topo a:hover{
		background: #d06800;
		transition: all 1s;
		color:white;
	}

	@media screen and (max-width: 768px) {
	  .topo .title{
	  	font-size: 30pt;
	  	line-height: 40px;
	  }
	  .topo a{
	  	padding: 8px;
	  	font-size: 10pt;
	  }
	}

	@media screen and (min-width: 768px) and (max-width: 992px) {
	  .topo .title{
	  	font-size: 60pt;
	  	line-height: 80px;
	  }
	  .topo a{
	  	padding: 12px;
	  	font-size: 16pt;
	  }
	}

	@media screen and (min-width: 992px) {
	  .topo .title{
	  	font-size: 80pt;
	  	line-height: 100px;
	  }
	  .topo a{
	  	padding: 12px;
	  	font-size: 18pt;
	  }
	}

	.primary-navigation-wrap{
		position:fixed;
		top:0;
		width:100%;
		z-index:20;
	}

	.site{
		margin-top: 105px !important;
	}

</style>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="main-navigation-wrap" class="primary-navigation-wrap">
		<nav id="main-navigation" class="primary-navigation navigation container clearfix" role="navigation">
			<ul id="menu-menu" class="main-navigation-menu">
				<li class="menu-item menu-item-type-custom menu-item-object-custom">
					<a href="#sobre" class="ancora">Sobre</a>
				</li>
				
				<!--<li class="menu-item menu-item-type-custom menu-item-object-custom">
					<a href="#palestrantes" class="ancora">Palestrantes</a>
				</li>-->
				<li class="menu-item menu-item-type-custom menu-item-object-custom">
					<a href="#programacao" class="ancora">Programação</a>
				</li>
				<li class="menu-item menu-item-type-custom menu-item-object-custom">
					<a href="#local" class="ancora">Local</a>
				</li>
				<li class="menu-item menu-item-type-custom menu-item-object-custom">
					<a href="#datas" class="ancora">Datas Importantes</a>
				</li>
				<li class="menu-item menu-item-type-custom menu-item-object-custom">
					<a href="#eixos" class="ancora">Eixos Temáticos</a>
				</li>
				<li class="menu-item menu-item-type-custom menu-item-object-custom">
					<a href="#inscricao" class="ancora">Inscrição</a>
				</li>				
				<li class="menu-item menu-item-type-custom menu-item-object-custom">
					<a href="#submissao" class="ancora">Submissão de Trabalhos</a>
				</li>
				<li class="menu-item menu-item-type-custom menu-item-object-custom">
					<a href="#organizacao" class="ancora">Organização</a>
				</li>
				<li class="menu-item menu-item-type-custom menu-item-object-custom">
					<a href="#aprovados" class="ancora">Trabalhos Aprovados</a>
				</li>
				<li class="menu-item menu-item-type-custom menu-item-object-custom">
					<a href="#contato" class="ancora">Contato</a>
				</li>
				<li class="menu-item menu-item-type-custom menu-item-object-custom">
					<a href="#informacoes" class="ancora">Informações Úteis</a>
				</li>
			</ul>
		</nav>
</div>
	<div id="page" class="hfeed site">

		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'tortuga' ); ?></a>

		<div id="header-top" class="header-bar-wrap"><?php do_action( 'tortuga_header_bar' ); ?></div>

		<div class="topo">
			<div class="title">V Encontro<br>FINEDUCA</div>
			<!--<a href="#">Inscreva-se agora!</a>-->
			<a href="evento-fineduca/inscreva-se">Inscreva-se!</a>
		</div>
		<img src="<?php echo get_bloginfo('template_url') ?>/images/capa.jpg">


