<?php

/*
Theme Name: reggaecity
Author: 1UPDesign
Author URI: http://1updesign.org/
Version: 1.0

Page: single.php
*/

?>

<?php get_header(); ?>
	<div id="post_content" class="<?php echo $id; ?>">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<div id="lh_content">
			<span id="title"><?php echo strtoupper(get_the_title()); ?></span>
			<span id="lh_date"><?php the_time('j M Y'); ?></span>
			<?php the_content(); ?>
			<?php the_category(', '); ?> <?php if(has_tag()) echo" and tagged with: "; the_tags(''); ?>
		</div>
<?php endwhile; ?>
		<div id="rh_sidebar">
			<span id="title">OTHER BLOGS</span>
			<div id="hp_latest_news">
			<ul>
			<?php
			$args = array( 'post_type' => 'blog', 'posts_per_page' => -1 );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<span class="hp_date"><?php the_date(); ?></span>
				<li>
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</li>
				<?php //the_content(); ?>
			<?php endwhile; ?>
			</ul>
			</div>
			<?php wp_reset_query(); ?>
		</div>
	</div>
<?php get_footer(); ?>

<?php print_r(error_get_last()); ?>