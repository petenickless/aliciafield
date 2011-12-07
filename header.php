<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
	"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head>
	<title>
		<?php
		if ( is_single() ) 
			{ 
				single_post_title();  print ' | '; bloginfo(naem);
			}      
		elseif ( is_home() || is_front_page() )
			{ 
				bloginfo('name'); print ' | '; bloginfo('description'); 
			}
		elseif ( is_page() ) 
			{ 
				single_post_title(''); print ' | '; bloginfo(naem);
			}
		elseif ( is_search() )
			{ 
				bloginfo('name'); print ' | Search results for ' . wp_specialchars($s); 
			}
		elseif ( is_404() ) 
			{ 
				bloginfo('name'); print ' | Not Found'; 
			}
		else 
			{ 
				bloginfo('name'); wp_title('|');
			}
		?>
	</title>
	<meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/reset.css" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/usefulstyle.css" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/style.css" />
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js" type="text/javascript"></script>
	
	<script type="text/javascript" charset="utf-8" src="<?php ABSPATH; ?>/wp-content/themes/<?php echo get_current_theme(); ?>/assets/js/jquery.ba-hashchange.min.js"></script>
	<script type="text/javascript" charset="utf-8" src="<?php ABSPATH; ?>/wp-content/themes/<?php echo get_current_theme(); ?>/assets/js/ajax.js"></script>
	
	<?php wp_head(); ?>
</head>
<body>
	<div id="wrap">
		<div id="header">
			<div class="container">
				<div id="navigation"><?php wp_list_pages('exclude=&depth=1&title_li'); ?></div>
			</div>
		</div> <!--#header-->
		<div id="content_wrap">
	
	
	