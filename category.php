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

<div id="post_content" class="9">
	<div id="lh_content">
		<div id="slider_frame"></div>
		<div id="slider_wrap">
			<?php
			$args = array(
				'post_type' => 'portfolio', 
				'posts_per_page' => -1, 
				'cat' => $cat
				);
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<?php the_post_thumbnail('home-slider'); ?>
			<?php endwhile; ?>
			<?php wp_reset_query(); ?>
		</div> <!--#slider_wrap-->
	</div>
	<div id="rh_sidebar">
		<div id="slider_nav"></div>
		<span id="title">PORTFOLIO</span>
		<?php wp_list_categories("exclude=1&title_li="); ?>
	</div>
</div>

<?php get_footer(); ?>