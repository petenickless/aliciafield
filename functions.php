<?php

if ( function_exists( 'add_image_size' ) ) add_theme_support( 'post-thumbnails' );
if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'home-slider', 760, 460, false );
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

//Remove all the garbage menu items in the wp editor
add_action( 'admin_menu', 'remove_menu_pages' );

function remove_menu_pages() {
	remove_menu_page('link-manager.php');
	remove_menu_page('tools.php');	
	remove_menu_page('upload.php');	
	remove_menu_page('edit-comments.php');	
	remove_menu_page('edit.php');	
}

//Add custom meta meta box to portfolio custom post
add_action("admin_init", "portfolio_meta");
add_action('save_post', 'save_portfolio_meta_options');

function portfolio_meta(){
	add_meta_box("event-meta", "Featured", "portfolio_meta_options", "portfolio", "side", "high");
}

function portfolio_meta_options(){
	global $post;
	$custom = get_post_custom($post->ID);
	$featured = $custom["featured"][0];
	?>
		<p>
			<input type="checkbox" name="featured" value="featured" <?php if($featured == 'featured' || $_POST['featured']) { echo "checked"; }; ?>>
			<label>Tick this box if you want to feature this image on the homepage</label>
		</p>
	<?php
}

function save_portfolio_meta_options(){
	global $post;
	update_post_meta($post->ID, "featured", $_REQUEST['featured']);
}

function new_excerpt_more($more) {
       global $post;
	return '<a href="'. get_permalink($post->ID) . '">  more...</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');
?>