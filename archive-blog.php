<?php
/*
	Template name: Blog
*/
?>

<?php get_header(); ?>
<div id="post_content" class="15">
	<div id="lh_content">
		<?php
		$args = array( 'post_type' => 'blog', 'posts_per_page' => -1 );
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post(); ?>
		<?php $img = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'blog'); ?>
			<div class="blog_post clearboth">
				<h1 id="title"><?php echo strtoupper(get_the_title()); ?></h1>
				<?php if($img): ?>
				<div class="column_two">
					<div id="image" style="background-image:url('<?php echo $img[0]; ?>');"></div>				
				</div>
				<div class="column_two column_right">
					<span id="lh_date"><?php the_date(); ?></span>
					<?php the_excerpt(); ?>
				</div>
				<?php else: ?>
					<span id="lh_date"><?php the_date(); ?></span>
					<?php the_excerpt(); ?>
				<?php endif; ?>
			</div>
		<?php endwhile; ?>
	</div>
	<div id="rh_sidebar">
		<span id="title">ALL BLOGS</span>
		<div id="hp_latest_news">
		<ul>
		<?php
		wp_reset_query();
		$args = array( 'post_type' => 'blog', 'posts_per_page' => -1, 'offset' => 2 );
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
</div>
<?php get_footer(); ?>