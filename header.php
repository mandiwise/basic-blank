<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
	
	<meta charset="<?php bloginfo('charset'); ?>" />

	<?php if (is_search()) { ?>
	   <meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>

	<title>
		<?php
			if (is_category()) { echo 'Category: '; wp_title(''); echo ' - '; bloginfo('name'); } 
			elseif (function_exists('is_tag') && is_tag()) { single_tag_title('Tag Archive for &quot;'); echo '&quot; - '; bloginfo('name'); }
			elseif (is_home()) { wp_title(''); echo ' - '; bloginfo('name'); }
			elseif (is_front_page()) { bloginfo('name'); echo ' - '; bloginfo('description'); }
			elseif (is_page()) { echo wp_title(''); echo ' - ';	bloginfo('name'); } 
			elseif (is_archive()) {	wp_title(''); echo ' Archive - '; bloginfo('name'); } 
			elseif (is_search()) { echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; bloginfo('name'); } 
			elseif (!(is_404()) && (is_single()) || (is_page())) { wp_title(''); echo ' - '; bloginfo('name'); } 
			elseif (is_404()) {	echo 'Not Found - '; bloginfo('name'); } 
		?>
	</title>
	
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/x-icon" />
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon.png">
	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
	<!--[if IE]><link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ie.css" type="text/css" /><![endif]-->
	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

	<?php wp_head(); ?>
	
	<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
</head>

<body <?php body_class(); ?>>
	
	<div id="container"><!-- begin page container -->

		<header>
      <hgroup>
        <h1><a href="<?php echo home_url() ?>/"><?php bloginfo('name'); ?></a></h1>
        <div class="description"><?php bloginfo('description'); ?></div>
      </hgroup>
		</header>
		
		<nav>
			<?php wp_nav_menu( array( 'theme_location' => 'main-nav-menu', 'menu_class' => 'main-nav', ) ); ?>		
		</nav>