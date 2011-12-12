<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>

<div id="post_content">
	<div id="lh_content">
		<div id="slider_frame"></div>
		<div id="slider_wrap">
			<?php
			$args = array( 'post_type' => 'slider', 'posts_per_page' => -1 );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<?php the_post_thumbnail('home-slider'); ?>
			<?php endwhile; ?>
			<?php wp_reset_query(); ?>
		</div> <!--#slider_wrap-->
	</div>
	<div id="rh_sidebar">
		<div id="slider_nav"></div>
		<div id="hp_latest_news" class="clearboth">
			<span id="title">LATEST NEWS</span>
			<ul>
			<?php
			$args = array( 'post_type' => 'news', 'posts_per_page' => -1 );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); ?>
				
				<span class="hp_date"><?php the_date(); ?></span>
				<li>
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</li>
				<?php //the_content(); ?>
			<?php endwhile; ?>
			</ul>
			<?php wp_reset_query(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>