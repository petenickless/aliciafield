<?php

/*
Theme Name: reggaecity
Author: 1UPDesign
Author URI: http://1updesign.org/
Version: 1.0

Page: category.php
*/

?>
<?php get_header(); ?>

<?php 
$this_category = get_category($cat); 
$parent_category = get_category($this_category->category_parent);

if($parent_category->slug == "portfolio"){
	$page_id = get_page_by_title('portfolio');
}elseif($parent_category->slug == "projects"){
	$page_id = get_page_by_title('projects');
}
?>
<div id="post_content" class="<?php echo $page_id->ID ?>">
	<div id="lh_content">
		<div id="slider_frame"></div>
		<div id="slider_wrap">

			<?php
			if($parent_category->slug == "portfolio"){
				$args = array(
					'post_type' => 'portfolio', 
					'posts_per_page' => -1, 
					'cat' => $cat
					);
			}elseif($parent_category->slug == "projects"){
				$args = array(
					'post_type' => 'projects', 
					'posts_per_page' => -1, 
					'cat' => $cat
					);
			}
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'home-slider'); ?>
				<div class="slide" style="background-image:url('<?php echo $large_image_url[0]; ?>');" title="<?php echo $large_image_url[0]; ?>"></div>
				
				<?php //the_post_thumbnail('home-slider'); ?>
			<?php endwhile; ?>
			<?php wp_reset_query(); ?>
		</div> <!--#slider_wrap-->
	</div>

	<div id="rh_sidebar">
		<div id="slider_nav"></div>

		<?php if($parent_cateogry->slug == "portfolio"): ?>
			<span id="title">PORTFOLIO</span>
			<?php wp_list_categories("exclude=1&title_li="); ?>
		<?php elseif($parent_category->slug == "projects"): ?>
			<span id="title">PROJECTS</span>
			<?php echo category_description($cat) ?>
		<?php endif; ?>

	</div>
</div>

<?php get_footer(); ?>