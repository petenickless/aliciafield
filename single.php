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

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<?php the_title(); ?>
	<?php the_time('j M Y'); ?>
	<?php the_content(); ?>
	<?php the_category(', '); ?> <?php if(has_tag()) echo" and tagged with: "; the_tags(''); ?>
<?php endwhile; ?>

<?php get_footer(); ?>

<?php print_r(error_get_last()); ?>