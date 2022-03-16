<?php
// Remove a barra de admin
add_filter('show_admin_bar', '__return_false');

// Remover link RSD
remove_action ('wp_head', 'rsd_link');

// Remove wlwmanifest_link - Recurso usado pelo Windows Live Writer. 
remove_action( 'wp_head', 'wlwmanifest_link');

// Remove a versão do WordPress do cabeçalho
remove_action('wp_head', 'wp_generator');

// Remove os shortlinks dos posts
remove_action( 'wp_head', 'wp_shortlink_wp_head');

// Estilos e scripts
function gridmidia_enqueue_scripts () {
	// Versão do tema
	$gridmidia_version = '1.0';
	
	// Style.css
	wp_enqueue_style( 'gridmidia-style-description', get_stylesheet_uri(), array(), $grimidia_version, 'all' );
	
	// Um arquivo de CSS qualquer dentro da pasta css/
	wp_enqueue_style( 'gridmidia-style', get_template_directory_uri() . '/css/main-style.css', array(), $gridmidia_version, 'all' );

	// Ativa HTML5 para navegadores velhos
	wp_enqueue_script( 'grimidia-html5', get_template_directory_uri() . '/js/html5.js', false, $gridmidia_version );

	// Um arquivo de script qualquer dentro da pasta js/
	wp_enqueue_script( 'gridmidia-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), $grimidia_version, true );

}
// Carrega os estilos e scripts
add_action( 'wp_enqueue_scripts', 'gridmidia_enqueue_scripts' );


// Registra as sidebars
function gridmidia_sidebars()	{
	register_sidebar( array(
		'name'          => 'Sidebar',
		'id'            => 'sidebar-1',
		'description'   => 'Widgets da sidebar.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="sidebar-widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => 'Rodapé',
		'id'            => 'footer-1',
		'description'   => 'Widgets do rodapé.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="footer-widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'gridmidia_sidebars' );

// Adiciona novos campos de contato no perfil do usuário
function gridmidia_new_contact_fields( $contact_fields ) {
	// Adiciona o twitter
	$contact_fields['twitter'] = 'Twitter';
	
	// Adiciona o Facebbok
	$contact_fields['facebook'] = 'Facebook';
	
	// Adiciona o Google+
	$contact_fields['googleplus'] = 'Google+';

	return $contact_fields;
}
add_filter('user_contactmethods', 'gridmidia_new_contact_fields', 10, 1);


// Configurações do tema
function gridmidia_setup() {		
	// Ativa o feed
	add_theme_support( 'automatic-feed-links' );
	
	// Ativa imagens destacadas
	add_theme_support( 'post-thumbnails' );
	
	// Ativa posts-formats
	add_theme_support( 'post-formats', array( 'audio', 'aside', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video' ) );
	
	// Adiciona tamanhos de imagens customizados
	add_image_size( 'gridmidia-small', 430, 286, true );
	add_image_size( 'gridmidia-large', 1140, 1140, false );
	add_image_size( 'gridmidia-thumbnails', 200, 133, true );

	// Registra um menu
	register_nav_menus( array(
		'header' => 'Header',
	) );
}
add_action( 'after_setup_theme', 'gridmidia_setup' );

// Força o wordpress a ler shortcodes em textos de widgets
add_filter('widget_text', 'do_shortcode');

/**
 * Troca <p> ... <iframe... </p>
 * Para <p class="videowrapper"> ... <iframe... </p>
 */
function fix_videos( $content ) {
	$content = preg_replace('/^(<p[^>]*>)([^<]*)(<iframe.*?src=[\'|\"].*?youtube.com.*?[\'|\"].*?<\/iframe>)([^<]*)(<\/p>)$/mis', 
	'<p class="videowrapper">\\3</p>',
	$content);

	return $content;
}
add_filter( 'the_content', 'fix_videos' );

/*----------------------------------------------------------------------------*
 * #Change_excerpt
/*----------------------------------------------------------------------------*/
function new_excerpt_more( $more ) {
	return '... [ <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Saiba mais', 'gridmidia') . '</a> ] ';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

/* Change Excerpt length */
function custom_excerpt_length( $length ) {
   return 30;
}
add_filter( "excerpt_length", "custom_excerpt_length", 999 );

/* Paginação */
function paginacao() {
	global $wp_query;
	$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
	$big = 999999999;

	return paginate_links(
		array(
			'base' => @add_query_arg('paged','%#%'),
			'format' => '?paged=%#%',
			'current' => $current,
			'total' => $wp_query->max_num_pages,
			'prev_next'    => false
		)
	);
}

