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

			<h1 id="title"><?php echo strtoupper(get_the_title()); ?></h1>
			<span id="lh_date"><?php the_date(); ?></span>
			<?php the_excerpt(); ?>
		<?php endwhile; ?>
	</div>
</div>
<?php get_footer(); ?>