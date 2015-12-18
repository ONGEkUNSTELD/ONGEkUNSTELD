<?php
	/**
		* The Header for our theme
		*
		* Displays all of the <head> section and everything up till <div id="main">
		*
		* @package WordPress
		* @subpackage Twenty_Fourteen
		* @since Twenty Fourteen 1.0
	*/
?><!DOCTYPE html>
<!--[if IE 7]>
	<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
	<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
	<!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		
		<!--[if lt IE 9]>
			<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
		<![endif]-->
		
		<?php wp_head(); ?>
		
		<!-- Adobe Typekit -->
		<script src="//use.typekit.net/exf2nim.js"></script>
		<script>try{Typekit.load();}catch(e){}</script>
		
		<!-- Analytics -->
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			
			ga('create', 'UA-70887530-1', 'auto');
			ga('send', 'pageview');
			
		</script>
        
        
	</head>
	
	<body <?php body_class(); ?>>
		<div id="page" class="hfeed site">
			
			<header id="masthead" class="site-header clearHeader" role="banner">
				<div class="header-wrap">
					<div class="header-main">
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						
						
						<nav id="primary-navigation" class="site-navigation primary-navigation" role="navigation">
							<button class="menu-toggle"><?php _e( 'Primary Menu', 'twentyfourteen' ); ?></button>
							<a class="screen-reader-text skip-link" href="#content"><?php _e( 'Skip to content', 'twentyfourteen' ); ?></a>
							<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
						</nav>
					</div>
				</div>
				
				<div id="search-container" class="search-box-wrapper hide">
					<div class="search-box">
						<?php get_search_form(); ?>
					</div>
				</div>
			</header>
			
			<?php if ( get_header_image() ) : ?>
			<div id="site-banner">
				<img class="customheader" src="<?php header_image(); ?>" width="1280px" height="240px" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
			</div>
			<?php endif; ?>
			
			<!-- #masthead -->
			
			<!--introTekst -->
			<?php if ( is_home()) : ?>
			<div class="entry-header-Wrapper">
				<header class="entry-header info-header">
					<!--<h3 class="entry-title">Aanvechtbare <span style="text-transform:lowercase">k</span>UNSTKRITIEK in tekst en beeld</h3>-->
					<h3 class="entry-title"><?php the_field('headertekst', 'option'); ?></h3>
					
					<div class="entry-content"></div>
				</header>
			</div>
			<?php endif; ?>
			<!-- eind intro -->
			
		<div id="main" class="site-main">						