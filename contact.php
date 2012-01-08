<?php
/*
	Template name: Contact
*/
?>

<?php get_header(); ?>

<div id="post_content" class="<?php wp_reset_query(); echo $post->ID; ?>">
	<div id="lh_content">	
		<?php $page_data = get_page_by_title("Contact");?>
		<?php setup_postdata($page_data); ?>
		<?php the_content(); ?>
		<form action="" id="contact_form" method="post">
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
			</p>
			<input type="hidden" name="query_sent" value="true" id="query_sent">
			<input type="text" style="display:none;" name="botcha" value="gotyah" id="botcha">
			<p>
				<input id="contact_submit" type="submit" value="Send Query &rarr;">
			</p>
		</form>
		<div id="contact_thanks" class="border">
			<h1 id="title">THANKS!</h1>
			<p>We've received your message, we'll be in touch as soon as possible with a response</p>
			<p>For now, feel free to <a href="/">keep browsing</a></p>
		</div>
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