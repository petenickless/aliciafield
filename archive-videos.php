<?php
/*
	Template name: Video
*/
?>

<?php get_header(); ?>

<?php $page = get_page_by_title('Video') ?>

<div id="post_content" class="<?php echo $page->ID ?>">
	<div id="lh_content">
		<?php $page_data = get_page_by_title("Video");?>
		<?php setup_postdata($page_data); ?>
		<?php the_content(); ?>
			<div id="slider_frame"></div>
			<div id="static_slider_wrap">
				<?php
				$args = array(
					'post_type' => 'video', 
					'posts_per_page' => -1
					);
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<?php 
				$custom = get_post_custom($post->ID);
				$vimeo_url = $custom["vimeo_url"][0]; 
				?>
					<div class="static_slide">
						<?php if($vimeo_url) { render_video($vimeo_url, 759, 459); } ?>
					</div>
				<?php endwhile; ?>
				<?php wp_reset_query(); ?>
			</div> <!--#slider_wrap-->
			<a href="#" id="next"></a>
			<a href="#" id="prev"></a>
		</div>
	</div>
</div>

<?php get_footer(); ?>