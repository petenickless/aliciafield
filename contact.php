<?php
/*
	Template name: Contact
*/
?>

<?php get_header(); ?>

<div id="post_content">
	<div id="lh_content">
		<?php $page_data = get_page_by_title("Contact");?>
		<?php setup_postdata($page_data); ?>
		<?php the_content(); ?>
		<form action="" method="get" accept-charset="utf-8" id="contact_form">
			<p>
				<label for="contact_name">Contact name</label>
				<input type="text" name="contact_name" value="" id="contact_name">
			</p>
			<p>
				<label for="contact_email">Contact email</label>
				<input type="text" name="contact_email" value="" id="contact_email">
			</p>
			<p>
				<label for="contact_query">Query</label>
				<textarea id="contact_query" name="contact_query"></textarea>
			<p><input type="submit" value="Continue &rarr;"></p>
		</form>
	</div>
	<div id="rh_sidebar">
		<span id="title">HATE FORMS?</span>
		<div id="contact_details">
			<p><strong>Tel:</strong> +44 (0) 7952 467 248</p>
			<p><strong>Email:</strong> alicia (at) aliciafield.co.uk</p>
		</div>
	</div>
</div>

<?php get_footer(); ?>