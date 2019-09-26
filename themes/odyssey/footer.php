<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>
<!-- jumbotron start -->
<section class="blue-jumbotron">
	<span class="layred-circle rellax" data-rellax-speed="2"></span>
    <div class="container-fluid">
        <?php 
            $excited_text = get_field('idea_title', 'option');
            if($excited_text):
                echo '<h2 data-aos="fade-up" data-aos-duration="500">'.$excited_text.'</h2>';
            endif;

            $create_button = get_field('create_some_thing_button', 'option');
            if($create_button):
                $ceate_btn_url = $create_button['url'];
                $ceate_btn_title = $create_button['title'];
                echo '<a href="'.$ceate_btn_url.'" class="button button-green reveal-effact"  data-aos="fade-up" data-aos-duration="500" data-aos-delay="200">'.$ceate_btn_title.'</a>';
            endif;
        ?>
    </div>
    <span class="layred-circle sm rellax"></span>
</section>
<!-- jumbotron end -->
		

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="container sm">
				<div class="menu-section">
					<div class="logo">
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
					<?php wp_nav_menu(array('theme_location' => 'footer')); ?>
					<div class="social-menu-items">
						<?php
						if ( has_nav_menu( 'social' ) ) : ?>
							<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'twentyseventeen' ); ?>">
								<?php
									wp_nav_menu( array(
										'theme_location' => 'social',
										'menu_class'     => 'social-links-menu',
										'depth'          => 1,
										'link_before'    => '<span class="screen-reader-text">',
										'link_after'     => '</span>' . twentyseventeen_get_svg( array( 'icon' => 'chain' ) ),
									) );
								?>
							</nav><!-- .social-navigation -->
						<?php endif; ?>
					</div>
					
				</div>
				<div class="footer-widgets">
					<?php get_template_part( 'template-parts/footer/footer', 'widgets' ); ?>
				</div>
				<div class="footer-nav"><?php wp_nav_menu(array('theme_location' => 'footer')); ?></div>
				<div class="site-info-section">
					<div class="terms-codition">
						<?php wp_nav_menu(array('theme_location' => 'terms_condition')); ?>
					</div>
					<?php get_template_part( 'template-parts/footer/site', 'info' ); ?>
				</div>
			</div>
		</footer><!-- #colophon -->
		</div><!-- #content -->
	</div><!-- .site-content-contain -->
</div><!-- #page -->
<?php wp_footer(); ?>
</div>
<script>
	AOS.init({
	    startEvent: 'load'
	});

	jQuery(window).on('load', function() {
	    AOS.refresh();
	});
</script>
</body>
</html>
