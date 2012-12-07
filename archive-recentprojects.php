<?php
/*
	Template name: Recent Projects
*/
?>

<?php get_header(); ?>

<div id="post_content" class="9">
	<div id="lh_content">
		<?php setup_postdata($page_data); ?>
		<?php the_content(); ?>
		<div id="slider_frame"></div>
		<div id="slider_wrap">
			<?php
			$args = array(
				'post_type' => 'recent projects', 
				'posts_per_page' => -1
				);
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'home-slider'); ?>
				<div class="slide" style="background-image:url('<?php echo $large_image_url[0]; ?>');" title="<?php echo $large_image_url[0]; ?>">
					<div class="caption">
						<h1 id="title"><?php echo strtoupper(get_the_title()); ?></h1>
						<?php the_content() ?>
					</div>
				</div>
			<?php endwhile; ?>
		</div> <!--#slider_wrap-->
		</div>
		<div id="rh_sidebar">
			<span id="title">OTHER RECENT PROJECTS</span>
			<div id="hp_latest_news">
			<ul>
			<?php
			wp_reset_query();
			$args = array( 'post_type' => 'recent projects', 'posts_per_page' => -1, 'offset' => 2 );
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
