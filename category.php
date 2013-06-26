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
			<span id="title"><?php echo strtoupper(single_cat_title('',false)); ?></span>
			<?php echo category_description($cat) ?>
			<span id="title">OTHER PROJECTS</span>
			<?php $project_cat = get_category_by_slug('projects'); ?>
			<?php $args = array(
				"title_li" => "",
				'orderby' => 'name',
			  	'order' => 'ASC',
				'exclude' => "1",
				'child_of' => $project_cat->term_id
			);
			wp_list_categories( $args ); ?>		
			<br/>
		<?php endif; ?>

	</div>
</div>

<?php get_footer(); ?>
