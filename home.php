<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>

<div id="post_content" class="<?php wp_reset_query();  echo $post->ID; ?>">
	<div id="lh_content">
		<div id="slider_frame"></div>
		<div id="slider_wrap">
			<?php
			$args = array( 'post_type' => 'portfolio', 'posts_per_page' => -1, 'meta_key' => 'featured', 'meta_value' => 'featured' );
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
		<!-- <div id="hp_latest_news" class="clearboth">
					<span id="title">LATEST NEWS</span>
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
					<?php wp_reset_query(); ?>
					<BR/>
				</div> -->
		<div id="hp_about_me">
			<span id="title">ABOUT ALICIA</span>
			<?php 
			$page = get_page_by_title( 'About (short)' );
			setup_postdata($page);
			the_content();
			?>
		</div>
	</div>
</div>
<?php get_footer(); ?>