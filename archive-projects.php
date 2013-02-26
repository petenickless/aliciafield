<?php
/*
	Template name: Projects
*/
?>

<?php get_header(); ?>

<?php $page = get_page_by_title('Projects'); ?>

<div id="post_content" class="<?php echo $page->ID ?>">
	<div id="lh_content">

		<?php $page_data = get_page_by_title("Portfolio");?>
		<?php setup_postdata($page_data); ?>
		<?php the_content(); ?>
		<?php $project_cat = get_category_by_slug('projects'); ?>

		<?php 
			$args = array(
			  	'orderby' => 'name',
			  	'order' => 'ASC',
				'exclude' => "1",
				'child_of' => $project_cat->term_id
			  );
			$categories = get_categories($args);
			foreach($categories as $category): ?>
				<div class="pf_cat_wrap column_three">
					<a href="<?php echo get_category_link($category->cat_ID); ?>">
					<span id="title"><?php echo strtoupper($category->name); ?></span>
					<div id="portfolio_thumb_wrap">
					<?php 
					$cat_args = array(
						"category" => $category->cat_ID, 
						"numberposts" => 1,
						"post_type" => "portfolio"
						);
					$one_post = get_posts($cat_args);
					?>
						<?php echo get_the_post_thumbnail($one_post[0]->ID, "portfolio"); ?>
					</a>
					</div>
				</div>
			<?php endforeach; ?>
	</div>
	<div id="rh_sidebar">
		<span id="title">PROJECTS</span>
		<?php 
		$args = array(
				"title_li" => "",
				'orderby' => 'name',
			  	'order' => 'ASC',
				'exclude' => "1",
				'child_of' => $project_cat->term_id
			);
		wp_list_categories( $args ); ?>
		<li class="cat-item"> 
			<a href="<?php echo get_bloginfo("url") ?>/recent-projects">Recent Projects</a>	
		</li>
		<li class="cat-item">
                        <a href="<?php echo get_bloginfo("url") ?>/video">Videos</a>
                </li>
	
	</div>
</div>

<?php get_footer(); ?>
