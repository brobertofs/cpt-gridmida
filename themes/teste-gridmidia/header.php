<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>

<head>
	<!-- O charset padrão -->
	<meta charset="<?php bloginfo('charset'); ?>">
	
	<!-- Necessário para layout responsivo -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- O título do blog -->
	<title><?php wp_title(''); ?></title>

	<!-- 
	O restante do cabeçalho que virá dentro da head. 
	Criado automaticamente pelo WordPress. 
	-->
	<?php wp_head(); ?>
</head>

<!-- Início do body -->
<body <?php body_class(); ?>>

<div id="pagina" class="pagina"> <!-- .pagina -->

<header class="conteudo cabecalho padding-total">
	<div class="linha clearfix">
		<div class="colunas principal">
			<div class="conteudo-coluna margem-total">
				<h1> 
					<a href="<?php bloginfo('url'); ?>">
						<?php bloginfo('name'); ?> 
					</a>
				</h1>
			</div>
		</div>
		
		<div class="colunas lateral">
			<div class="conteudo-coluna margem-total">
				<div class="search-form">
					<?php get_search_form(); ?>
				</div>
			</div>
		</div>
	</div>
</header>

<?php
$header_menu_args = array(
	'theme_location'  => 'header',
	'menu'            => '',
	'container'       => 'nav',
	'container_class' => 'main-menu clearfix',
	'container_id'    => '',
	'menu_class'      => '',
	'menu_id'         => '',
	'echo'            => true,
	'fallback_cb'     => 'wp_page_menu',
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'depth'           => 0,
	'walker'          => ''
);

wp_nav_menu( $header_menu_args );
?>

