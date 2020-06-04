<?php

//add_theme_support( 'post-thumbnails', array( 'post', 'portfolio_items', 'slider_items' ) );

function fsdtv_custom_post() {
  register_post_type('videos', array(
    'supports' => array('author', 'thumbnail', 'title', 'editor', 'custom-fields','excerpt'),
    'rewrite' => array('slug' => 'video'),
    'has_archive' => true,
    'public' => true,
    'labels' => array(
      'name' => 'Videos',
      'add_new_item' => 'Add New videos',
      'edit_item' => 'Edit videos',
      'all_items' => 'All Videos',
      'singular_name' => 'videos',
      'add_new' => 'Add New videos',
    ),
    'menu_icon' => 'dashicons-media-video'
  ));
	
}

add_action( 'init', 'fsdtv_custom_post' );


function video_taxonomy() {

	register_taxonomy(
		'video-category',   //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
		'videos', //post type name
		array(
			'hierarchical'          => true,
			'labels'				=> array(
				'name' 				=> 'Video Subject',
				'add_new_item'		=> 'Add New Subject',

			),
			'query_var'             => true,
			'rewrite'                       => array(
				'slug'                  => 'video-category', // This controls the base slug that will display before each term
				'with_front'    => true // Don't display the category base before
				),
			'show_admin_column' => TRUE
			
			)
	);

	register_taxonomy(
		'video-grade',
		'videos',
		array(
			'hierarchical'          => true,
			'label'                 => 'Video Grade',
			'labels'				=> array(
				'name' 				=> 'Video Grade',
				'add_new_item'		=> 'Add New Grade',

			),
			'query_var'             => true,
			
			'rewrite'               => array(
				'slug'              => 'video-grade',
				'with_front'    => true
			),
			'show_admin_column' => TRUE
			
		)
	);
	
	register_taxonomy(
		'video-language',   //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
		'videos', //post type name
		array(
			'hierarchical'          => true,
			'add_new_item'			=> 'Add New Language',
			'labels'				=> array(
				'name' 				=> 'Video Language',
				'add_new_item'		=> 'Add New Language',

			),
			'query_var'             => true,
			'rewrite'                       => array(
				'slug'                  => 'video-language', // This controls the base slug that will display before each term
				'with_front'    => true // Don't display the category base before
				),
			'show_admin_column' => TRUE
			
			)
	);


}
add_action( 'init', 'video_taxonomy'); 