<?php
/*
	Template name: Portfolio
*/
?>

<?php get_header(); ?>

<div id="post_content" class="9">
	<div id="lh_content">
		<?php $page_data = get_page_by_title("Portfolio");?>
		<?php setup_postdata($page_data); ?>
		<?php the_content(); ?>
		<?php 
			$args = array(
			  'orderby' => 'name',
			  'order' => 'ASC',
				'exclude' => "1"
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
			<div class="pf_cat_wrap column_three">
				<a href="<?php echo get_bloginfo("url") ?>/video">
					<span id="title">VIDEOS</span>
					<div id="portfolio_thumb_wrap">

					</div>
				</a>
			</div>
			<div class="pf_cat_wrap column_three">
				<a href="<?php echo get_bloginfo("url") ?>/recent-projects">
					<span id="title">RECENT PROJECTS</span>
					<div id="portfolio_thumb_wrap">
						<?php 
						$rp_args = array(
							"numberposts" => 1,
							"post_type" => "recent projects"
							);
						$rp_post = get_posts($rp_args);
						?>
						<?php echo get_the_post_thumbnail($rp_post[0]->ID, "portfolio"); ?>
					</div>
				</a>
			</div>
			<div class="pf_cat_wrap column_three">
				<a href="<?php echo get_bloginfo("url") ?>/category/archive/">
					<span id="title">ARCHIVE</span>
					<div id="portfolio_thumb_wrap">
						<?php 
						$a_args = array(
							"category" => 8,
							"numberposts" => 1,
							"post_type" => "portfolio"
							);
						$a_post = get_posts($a_args);
						?>
						<?php wp_reset_query(); ?>
						<?php echo get_the_post_thumbnail($a_post[0]->ID, "portfolio"); ?>
					</div>
				</a>
			</div>
	</div>
	<div id="rh_sidebar">
		<span id="title">PORTFOLIO</span>
		<?php 
		$args = array(
			"title_li" => ""
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
