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
<meta name="description" content="appear animation">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="my_scroll" class="content">
	<div class="open-page"></div>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentyseventeen' ); ?></a>

	<header id="masthead" class="" role="banner">
    <div class="container-fluid">
		<div class="nav-toggle"></div>
		<div class="mob-nav-toggle" id="toggle"></div>
		<div class="logo" data-aos="fade-right">
			<?php
				$dark_logo = get_field('odc_dark_logo', 'option');
				if($dark_logo && is_singular('portfolio')){ ?>
					<a href="<?php echo get_site_url(); ?>" class="custom-logo-link" rel="home" itemprop="url">
						<img src="<?php echo $dark_logo['url'] ?>" class="custom-logo" alt="Odyssey">
					</a>		
				<?php }else{
					
					the_custom_logo();
				}
			?>
		</div>
			<div class="top-nav-section">
				<!-- contact info -->
				<div class="top-contact-info">
					<ul>
						<li class="email-info" data-aos="fade-down" data-aos-duration="1000">
							<a href="mailto:info@odysseyinc.com">
								<?php the_field('header_email', 'option'); ?>
							</a>
						</li>
						<li class="phone-info" data-aos="fade-down" data-aos-duration="1500"><a href="tel:8586233310"><?php the_field('header_contact', 'option'); ?></a></li>
					</ul>
				</div>
				<!-- contact info -->

				<!-- navigation start -->
				<nav class="navigation">
					<?php if ( has_nav_menu( 'top' ) ) : ?>
						<div class="navigation-top">
							<div class="wrap">
								<span class="close-nav" id="close_nav"></span>
								<?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
							</div><!-- .wrap -->
						</div><!-- .navigation-top -->
					<?php endif; ?>

					
					<!-- <a href="#" class="lets-talk">Let's Talk</a> -->
				</nav>
				<!-- navigation start -->
			</div>
		</div>






		<?php //get_template_part( 'template-parts/header/header', 'image' ); ?>

		

	</header><!-- #masthead -->




	<!-- <div class="site-content-contain main-content"> -->
	<div class="main-content">
		<div id="content" class="site-content">
