<?php

if ( function_exists( 'add_image_size' ) ) add_theme_support( 'post-thumbnails' );
if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'featured-artist-image-thumb', 100, false );
}

function get_catID($slug) {
$idObj = get_category_by_slug($slug); 
return $id = $idObj->term_id;
}

function p($objoect) {
	?><pre><?php
	print_r("jfafafa");
	?></pre><?php
}

function custom_wp_list_pages($args){
	$pages = get_pages($args);
	foreach($pages as $page) {
		$custom = get_post_custom($page->ID);
		$ul = "<li class='page_item_title' id='".$page->ID."'><a href='/".$page->post_name."'>";
		$ul .= strtoupper($page->post_title);
		$ul .= "</a></ul>";
		print $ul;
	}
}

?>