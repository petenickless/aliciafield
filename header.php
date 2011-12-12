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
	
	<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js" type="text/javascript"></script>
	-->	
	<script type="text/javascript" charset="utf-8" src="<?php ABSPATH; ?>/wp-content/themes/<?php echo get_current_theme(); ?>/assets/js/jquery.js"></script>
	<script type="text/javascript" charset="utf-8" src="<?php ABSPATH; ?>/wp-content/themes/<?php echo get_current_theme(); ?>/assets/js/jquery.ba-hashchange.min.js"></script>
	<script type="text/javascript" charset="utf-8" src="<?php ABSPATH; ?>/wp-content/themes/<?php echo get_current_theme(); ?>/assets/js/ajax.js"></script>
	<script type="text/javascript" charset="utf-8" src="<?php ABSPATH; ?>/wp-content/themes/<?php echo get_current_theme(); ?>/assets/js/jquery.cycle.all.min.js"></script>
	<?php wp_head(); ?>
</head>
<body>
	<div id="wrap">
		<div id="header" class="blueline_bottom">
			<div class="container">
				<div id="navigation"><?php custom_wp_list_pages('exclude=&depth=1&title_li&sort_column=menu_order'); ?></div>
			</div>
		</div> <!--#header-->
		<div class="container">
			<div id="logo">
				<img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/afp_logo.png" width="144" height="121" alt="Afp Logo">
			</div>
		</div>
		<div id="content_wrap" class="clearboth">
			<div class="container">
	
	
	