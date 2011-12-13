<?php

/*
Theme Name: reggaecity
Author: 1UPDesign
Author URI: http://1updesign.org/
Version: 1.0

Page: home.php
*/

?>
<?php get_header(); ?>

<?php $id = $post->ID; 	$page_data = get_page($id);?>
	<div id="post_content">
		<div id="lh_content">
			<?php setup_postdata($page_data); ?>
			<span id="title"><?php echo strtoupper(get_the_title()); ?></span>
			<?php the_content(); ?>
		</div>
	</div>

<?php get_footer(); ?>