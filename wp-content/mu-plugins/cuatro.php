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

		add_filter( 'kc_post_settings', array(__CLASS__, 'metadata_post') );

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

		public static function metadata_post( $groups ) {
		$groups[] = array(
			'post' => array(
				array(
					'id'      => 'post-data',
					'title'   => __('Project properties', '4dir'),
					'fields'  => array(
						array(
							'id'      => 'video-file',
							'title'   => 'Video URL',
							'desc'    => 'The vimeo URL, not embed code. (ex: https://vimeo.com/2308859)',
							'type'    => 'text'
						),
						array(
							'id'	=> 'video-duracion',
							'title'	=> 'Duración',
							'desc'  => 'EJ: 89 x 79 HDV',
							'type'	=> 'text'
						),
						array(
							'id'	=> 'video-pdf',
							'title'	=> 'PDF',
							'desc'  => 'Link completo a PDF, opcional',
							'type'	=> 'text'
						),
						array(
							'id'	=> 'video-vhx',
							'title'	=> 'Link de VHX',
							'desc'  => 'Link de compra en VHX, opcional',
							'type'	=> 'text'
						),
						array(
							'id'          => 'video-realizadores',
							'title'       => 'Realizadores',
							'desc'        => 'Selecciona realizadores',
							'type'        => 'media', // Not supported in theme customizer
							'multiple'    => true,
							/**
							 * This is the image size that will be used for the preview in the backend.
							 * You can use 'full', 'large', 'medium', 'thumbnail' or any other
							 * registered custom image size here.
							 */
							'preview_size' => 'thumbnail',
						),
						array(
							'id'          => 'video-premios',
							'title'       => 'Premios',
							'desc'        => 'Selecciona premios',
							'type'        => 'media', // Not supported in theme customizer
							'multiple'    => true,
							/**
							 * This is the image size that will be used for the preview in the backend.
							 * You can use 'full', 'large', 'medium', 'thumbnail' or any other
							 * registered custom image size here.
							 */
							'preview_size' => 'thumbnail',
						),
						array(
							'id'          => 'video-galeria',
							'title'       => 'Galeria',
							'desc'        => 'Selecciona fotos para galeria',
							'type'        => 'media', // Not supported in theme customizer
							'multiple'    => true,
							/**
							 * This is the image size that will be used for the preview in the backend.
							 * You can use 'full', 'large', 'medium', 'thumbnail' or any other
							 * registered custom image size here.
							 */
							'preview_size' => 'thumbnail',
						),
						array(
							'id'          => 'video-thumb',
							'title'       => 'Imagen panal',
							'desc'        => 'Selecciona la imagen que se debe usar para el panal de proyectos si la destacada no funciona bien',
							'type'        => 'media', // Not supported in theme customizer
							'multiple'    => false,
							/**
							 * This is the image size that will be used for the preview in the backend.
							 * You can use 'full', 'large', 'medium', 'thumbnail' or any other
							 * registered custom image size here.
							 */
							'preview_size' => 'thumbnail',
						)
					)
				)
			)
		);
		return $groups;
	}

}

add_action( 'plugins_loaded', array('CUATRO', 'setup') );
