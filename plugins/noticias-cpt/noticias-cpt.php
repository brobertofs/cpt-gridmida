<?php
/*
Plugin Name: Teste Gridmidia CPT
Plugin URI: https://github.com/brobertofs/wp-gridmidia-cpt
Description: Plugin para criação de Custom Post Types
Version: 1.0
Text Domain: teste_gridmidia_cpt
Author: Bruno Roberto
Author URI: https://www.linkedin.com/in/brobertofs/
License: GPL
*/


// Custom post
function gridmidia_cpt_noticias() {
	$labels = array(
		'name'               => 'Notícias',
		'singular_name'      => 'Notícia',
		'menu_name'          => 'Notícias',
		'name_admin_bar'     => 'Notícia',
		'add_new'            => 'Adicionar nova',
		'add_new_item'       => 'Adicionar nova notícia',
		'new_item'           => 'Nova notícia',
		'edit_item'          => 'Editar notícia',
		'view_item'          => 'Visualizar notícia',
		'all_items'          => 'Todas as notícias',
		'search_items'       => 'Procuar notícias',
		'not_found'          => 'Nada encontrado.',
		'not_found_in_trash' => 'Nada encontrado.',
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'menu_icon'          => 'dashicons-media-document',
		'query_var'          => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'rewrite' => array('slug' => 'gridmidia_noticias'),
		'can_export' => true,
		'taxonomies' => array('categories', 'post_tag'),
		'supports' => array(
			'title', 
			'editor', 
			'thumbnail',  
			'custom-fields',
			/*'page-attributes',*/
			'post-formats'
		),
	);
	
	// Registra o custom post
	register_post_type( 'gridmidia_noticias', $args );
	
	// Registra a categoria personalizada
	register_taxonomy( 
		'gridmidia_noticias_category', 
		array( 
			'gridmidia_noticias' 
		), 
		array(
			'hierarchical' => true,
			'label' => __( 'Categoria' ),
			'show_ui' => true,
			'show_in_tag_cloud' => true,
			'query_var' => true,
			'rewrite' => array('slug' => 'gridmidia_noticias_category'),
		)
	);
}
add_action( 'init', 'gridmidia_cpt_noticias' );

// Adiciona o custom posts na query principal
function add_my_post_types_to_query( $query ) {
	if ( $query->is_main_query() && is_home() ) {
		$query->set( 'post_type', array( 'post', 'gridmidia_noticias' ) );
		return $query;
	}
}
add_action( 'pre_get_posts', 'add_my_post_types_to_query' );


//Criando campo para inserção de uma URL

	
function create_field( $field ) {
        $defaults = [
            'type'          => 'URL',
            'input_name'    => '',
            'input_class'   => '',
            'options'       => [],
            'value'         => 'https://',
        ];

        $field = (object) array_merge( $defaults, (array) $field );
        CFS()->fields[ $field->type ]->html( $field );
    }
	