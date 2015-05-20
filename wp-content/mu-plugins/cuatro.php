<?php
/*
	4dir plugin
*/
class CUATRO {
	const version = '0.1';
	public static $settings = array();


	public static function setup() {

		add_action( 'init', array(__CLASS__, 'register_post_types') );
		add_action( 'init', array(__CLASS__, 'register_taxonomies') );
		// add_action( 'widgets_init', array(__CLASS__, 'cuatro_register_widgets') );
		// add_action( 'wp_ajax_cuatro_callback', array(__CLASS__, 'cuatro_callback') );
		// add_action( 'wp_ajax_nopriv_cuatro_callback', array(__CLASS__, 'cuatro_callback') );
		// add_action( 'template_redirect', array(__CLASS__, 'cuatro_random') );

		// add_filter( 'kc_post_settings', array(__CLASS__, 'metadata_post') );
		// add_filter( 'wp_trim_excerpt', array(__CLASS__, 'new_excerpt_more') );
		// add_filter( 'init',  array(__CLASS__, 'add_show_query_var' ) );

	}

	public static function register_post_types() {

		register_post_type( 'product', array(
			'labels'       => array(
				'name'               => __('Productos', '4dir'),
				'singular_name'      => __('Producto', '4dir'),
				'add_new_item'       => __('Nuevo Producto', '4dir'),
				'edit_item'          => __('Editar Producto', '4dir'),
				'new_item'           => __('Nuevo Producto', '4dir'),
				'view_item'          => __('Ver Producto', '4dir'),
				'search_items'       => __('Buscar Producto', '4dir'),
				'not_found'          => __('No Producto found', '4dir'),
				'not_found_in_trash' => __('No Producto found in trash', '4dir'),
				'parent_item_colon'  => __('Parent Producto', '4dir')
			),
			'public'       => true,
			'show_ui'      => true,
			'has_archive'  => true,
			'hierarchical' => false,
			'rewrite'      => array( 'slug' => 'product' ),
			'menu_position'=> 5,
			'supports'     => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' )
		) );
	}

	public static function register_taxonomies() {

		register_taxonomy( 'media-tax', array('post'), array(
			'labels'       => array(
				'name'               => __('Medio Categories', '4dir'),
				'singular_name'      => __('Medio Category', '4dir'),
				'add_new_item'       => __('Add New Medio Category', '4dir'),
				'edit_item'          => __('Edit Medio Category', '4dir'),
				'new_item'           => __('New Medio Category', '4dir'),
				'view_item'          => __('View Medio Category', '4dir'),
				'search_items'       => __('Search Medio Categories', '4dir'),
				'not_found'          => __('No Medio category found', '4dir'),
				'not_found_in_trash' => __('No Medio category found in trash', '4dir'),
				'parent_item_colon'  => __('Parent Medio Category', '4dir')
			),
			'public'       => true,
			'show_ui'      => true,
			'hierarchical' => false,
			'rewrite'      => true
		) );

		register_taxonomy( 'tema', array('post'), array(
			'labels'       => array(
				'name'               => __('Tema Categories', '4dir'),
				'singular_name'      => __('Tema Category', '4dir'),
				'add_new_item'       => __('Add New Tema Category', '4dir'),
				'edit_item'          => __('Edit Tema Category', '4dir'),
				'new_item'           => __('New Tema Category', '4dir'),
				'view_item'          => __('View Tema Category', '4dir'),
				'search_items'       => __('Search Tema Categories', '4dir'),
				'not_found'          => __('No Tema category found', '4dir'),
				'not_found_in_trash' => __('No Tema category found in trash', '4dir'),
				'parent_item_colon'  => __('Parent Tema Category', '4dir')
			),
			'public'       => true,
			'show_ui'      => true,
			'hierarchical' => false,
			'rewrite'      => true
		) );

	}

}

add_action( 'plugins_loaded', array('CUATRO', 'setup') );