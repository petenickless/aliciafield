<?php

if ( function_exists( 'add_image_size' ) ) add_theme_support( 'post-thumbnails' );
if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'home-slider', 760, false );
	add_image_size( 'portfolio', 235, false );
}

function get_catID($slug) {
$idObj = get_category_by_slug($slug); 
return $id = $idObj->term_id;
}

function p($object) {
	?><pre><?php
	print_r($object);
	?></pre><?php
}

function custom_wp_list_pages($args){
	$pages = get_pages($args);
	foreach($pages as $page) {
		$custom = get_post_custom($page->ID);
		$ul = "<li class='".$current." page_item_title' id='".$page->ID."'><a href='".get_bloginfo("url")."/".$page->post_name."'>";
		$ul .= strtoupper($page->post_title);
		$ul .= "</a></ul>";
		print $ul;
	}
}
add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'portfolio',
		array(
			'labels' => array(
				'name' => __( 'Portfolio' ),
				'singular_name' => __( 'Portolio' )
			),
		'public' => true,
		'has_archive' => true,
		'rewrite' => array('slug' => 'portfolio'),
		'taxonomies' => array('category'), // this is IMPORTANT
		'supports' => array('title','thumbnail')
		)
	);
	
	register_post_type( 'blog',
		array(
			'labels' => array(
				'name' => __( 'Blog' ),
				'singular_name' => __( 'Blog' )
			),
		'public' => true,
		'has_archive' => true,
		'rewrite' => array('slug' => 'blog'),
		'taxonomies' => array('post_tag'), // this is IMPORTANT
		'supports' => array('title','thumbnail','editor')
		)
	);
}

function new_excerpt_more($more) {
       global $post;
	return '<a href="'. get_permalink($post->ID) . '">  more...</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');
?>