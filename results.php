<?php

/*
Theme Name: reggaecity
Author: 1UPDesign
Author URI: http://1updesign.org/
Version: 1.0

Page: results.php
*/

?>

<?php get_header(); ?>

<div id="content_wrap">

<?php if ( have_posts() ) : ?>
<?php the_search_query(); ?> 
<?php while ( have_posts() ) : the_post() ?>
    <?php post_class(); ?>
    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	<?php the_excerpt(); ?>
	<?php wp_link_pages() ?>

<?php if ( $post->post_type == 'post' ) { ?>        
	<?php echo get_the_category_list(', '); ?>
	<?php the_tags() ?>
	<?php echo" | " ; the_date(); ?>
<?php } ?>    
<?php endwhile; ?>
 
<?php else : ?>
	'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'your-theme' ); ?>
	<?php get_search_form(); ?>       
<?php endif; ?>

<?php get_footer(); ?>

</div> <!--#content_wrap-->