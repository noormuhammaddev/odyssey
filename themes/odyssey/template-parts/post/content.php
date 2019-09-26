<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	if ( is_sticky() && is_home() ) :
		echo twentyseventeen_get_svg( array( 'icon' => 'thumb-tack' ) );
	endif;
	?>
	<div class="container sm">
		<div class="blog-detail-header">
			<div class="entry-header">
				<?php
					$cat_list = get_the_category();
					echo '<ul>';
					foreach($cat_list as $category) {
					   echo '<li><a href="#'.$category->slug.'" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">' . $category->name . '</a></li>';
					}
					echo '</ul>';

					if ( is_single() ) {
						the_title( '<h1 class="entry-title" data-aos="fade-up" data-aos-delay="500" data-aos-duration="1500">', '</h1>' );
					} elseif ( is_front_page() && is_home() ) {
						the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
					} else {
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					}

					echo '<div class="brief-description" data-aos="fade-up" data-aos-delay="700" data-aos-duration="1500">';
						the_excerpt(); //Brief Description
					echo '</div>';

					/*<div class="author-name" data-aos="fade-up" data-aos-delay="1000" data-aos-duration="1500">'. get_author_name() .'</div>*/
					echo '<div class="entry-meta">
					    	  
					    	  <div class="date" data-aos="fade-up" data-aos-delay="1500" data-aos-duration="1500">'. get_the_date() .'</div>
					      </div>';

				?>
			</div><!-- .entry-header -->
		</div>
	</div>

	<!-- Un comment the following code to show thumbnail -->
	<!-- 
	<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'twentyseventeen-featured-image' ); ?>
			</a>
		</div>.post-thumbnail
	<?php endif; ?> -->

	<div class="featured-image reveal-wrapper" data-aos="fade-up">
		<div class="reveal-img">
			<?php echo the_post_thumbnail(); ?>
		</div>	
	</div>
	<div class="container">
		<div class="entry-content">
			<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
				get_the_title()
			) );

			/*wp_link_pages( array(
				'before'      => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
				'after'       => '</div>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			) );*/
			?>
		</div><!-- .entry-content -->

		<div class="useful-articles clear">
			<h3 data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">Useful Articles</h3>
			<?php
                $blog_post = new WP_Query(
                	array(
                		'post_type' => 'post',
                		'posts_per_page' => 4,
                		'post__not_in' => array(get_the_ID())
                	)
                );

                if( $blog_post -> have_posts() ):
                    while($blog_post -> have_posts()) : $blog_post->the_post(); ?>

						<?php $cat_list = get_the_category();
    	                    	$cat_slug = $cat_list[0]->slug;
    	                    	$cat_name = $cat_list[0]->name;
	                         ?>

                        <div class="post-grid clear element-item <?php echo $cat_slug; ?> " data-category="<?php echo $cat_slug; ?>">
                           	<a href="<?php echo the_permalink(); ?>" class="thumbnail-wrapper">
                            		<?php echo the_post_thumbnail('custom-featured-thumbnail'); ?>
							</a>
                            <div class="post-content">
                            	<div class="category-name"><?php echo $cat_name; ?></div>
                                <h3><a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a></h3>
                                <div class="reading-time"><?php echo  do_shortcode('[rt_reading_time]') ?> min read</div>
                                <!-- <div class="author"><?php //echo get_author_name(); ?></div> -->
                                <div class="date"><?php echo get_the_date(); ?></div>

                            </div>
                        </div>
                <?php endwhile; 
                endif;
                wp_reset_postdata();
            ?>
		</div>

		<div class="explore-categories">
			<h4>Explore by Categories</h4>
			<div class="categories-wrapper">
				<ul id="filters">
					<?php
						echo '<li data-filter="*" class="active"><a href="#"><span class="category-name">All Thoughts</span></a></li>	';
	                	//$blog_post = new WP_Query(array('post_type' => 'post'));

	                	$cats_list = get_categories();
						if( $cats_list ):
	                	foreach ($cats_list as $cat) {
	                		$cat_name = $cat->name;
	                    	$cate_count = $cat->category_count;
	                    	$cate_slug = $cat->slug;
	                 ?>
	                    <li data-filter=".<?php echo $cate_slug; ?>">
	                    	<a href="#">
		                    	<span class="category-name"><?php echo $cat_name; ?></span>
		                    	<span class="count"><?php echo $cate_count; ?></span>
		                    </a>
	                     </li>
	            		<?php } 
	            		endif;
	            	?>
				</ul>
			</div>
		</div>

	<?php
	if ( is_single() ) {
		//twentyseventeen_entry_footer();
	}
	?>

</article><!-- #post-## -->
