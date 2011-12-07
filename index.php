<?php

/*
Theme Name: reggaecity
Author: 1UPDesign
Author URI: http://1updesign.org/
Version: 1.0

Page: index.php
*/
?>

<?php get_header(); ?>

<?php get_sidebar(); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div id="post_content">
			<?php the_content(); ?>
		</div>
	<?php endwhile; ?>
	<?php endif; ?>

<?php get_footer(); ?>