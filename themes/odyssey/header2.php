<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentyseventeen' ); ?></a>

	<!-- <header id="masthead" class="site-header header-new site-header" role="banner"> -->
	<header id="masthead" class="" role="banner">

    <div class="container-fluid">
		<div class="logo">
    	<?php the_custom_logo(); ?>
		</div>
			<div class="top-nav-section">
				<!-- contact info -->
				<div class="top-contact-info">
					<ul>
						<li><a href="#">email@odyssey.com</a></li>
						<li><a href="#">+16361236754</a></li>
					</ul>
				</div>
				<!-- contact info -->

				<!-- navigation start -->
				<nav>
					<ul>	
						<li class="active"><a href="#">Home</a></li>		
						<li><a href="#">About</a></li>		
						<li><a href="#">Services</a></li>		
						<li><a href="#">Work</a></li>		
						<li><a href="#">Blog</a></li>		
						<li><a href="#">R&D</a></li>		
						<li><a href="#">Contact</a></li>		
					</ul>		
					<a href="#" class="lets-talk">Let's Talk</a>
				</nav>
				<!-- navigation start -->
			</div>
		</div>






		<?php //get_template_part( 'template-parts/header/header', 'image' ); ?>

		<?php if ( has_nav_menu( 'top' ) ) : ?>
			<div class="navigation-top">
				<div class="wrap">
					<?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
				</div><!-- .wrap -->
			</div><!-- .navigation-top -->
		<?php endif; ?>

	</header><!-- #masthead -->

	<?php

	/*
	 * If a regular post or page, and not the front page, show the featured image.
	 * Using get_queried_object_id() here since the $post global may not be set before a call to the_post().
	 */
	if ( ( is_single() || ( is_page() && ! twentyseventeen_is_frontpage() ) ) && has_post_thumbnail( get_queried_object_id() ) ) :
		echo '<div class="single-featured-image-header">';
		echo get_the_post_thumbnail( get_queried_object_id(), 'twentyseventeen-featured-image' );
		echo '</div><!-- .single-featured-image-header -->';
	endif;
	?>

	<div class="site-content-contain">
		<div id="content" class="site-content">
