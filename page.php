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
		<h1><?php echo $page_data->post_title; ?></h1>
		<?php echo $page_data->post_content; ?>
	</div>

<?php get_footer(); ?>