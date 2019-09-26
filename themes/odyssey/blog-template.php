<?php
	//Template Name: Blog
	get_header();
?>
<div class="blog">
	<section class="blog-header">
		<div class="container">
			<div class="section-header sm">
				<?php
					while ( have_posts() ) : the_post();
						echo '<h2 class="section-heading"><span data-aos="fade-up" data-aos-delay="200" data-aos-duratioin="1000">'. get_the_title() .'</h2>';
						echo '<div data-aos="fade-up" data-aos-delay="500" data-aos-duratioin="1000">'.get_the_content().'</div>';
					endwhile;
				?>
			</div>
		</div>
	</section>
	<!-- blog header end -->
	
	<div class="container">	
		<div class="slider-cover">
			<div class="blog-slider">
				<div class="slider-container">
					<div class="owl-carousel">
					<?php $args = array(
					  'post_type' => 'post',
					  'meta_query' => array(
					    array(
					      'key' => 'featured',
					      'value' => 'featured',
					      'compare' => 'LIKE'
					    )
					  )
					);
					?>

					<?php
		                $blog_post = new WP_Query( $args );
		                if( $blog_post -> have_posts() ):
		                    while($blog_post -> have_posts()) : $blog_post->the_post(); ?>

								<?php $cat_list = get_the_category($blog_post->the_ID());
		    	                    	$cat_slug = $cat_list[0]->slug;
			                         ?>

								<div class="slider-block">
									<div class="content-area">
										<div class="category-name">
											<span  data-aos="fade-up" data-aos-delay="200"  data-aos-duration="500">
												<?php echo $cat_slug; ?>
											</span>
										</div>
										<h3>
											<a href="<?php echo the_permalink(); ?>" data-aos="fade-up" data-aos-delay="500" data-aos-duration="1000" class="reveal-effact">
												<?php echo get_the_title(); ?>
											</a>
										</h3>
										<div class="read-time"><span  data-aos="fade-up" data-aos-delay="800" data-aos-duration="1000">	
											<?php echo  do_shortcode('[rt_reading_time]') ?> min read
											</span>
										</div>
										<!-- <div class="author-name">
											<span  data-aos="fade-up" data-aos-delay="1000" data-aos-duration="1000">
												<?php //echo get_author_name(); ?>
											</span>
										</div> -->
										<div class="date">
											<span  data-aos="fade-up" data-aos-delay="1200" data-aos-duration="1000">
												<?php echo get_the_date(); ?>
											</span>
										</div>
									</div>
									<a href="<?php echo the_permalink(); ?>" class="image reveal-wrapper" data-aos="fade-up">
										<div class="reveal-img">
											<?php echo the_post_thumbnail('custom-slider-thumbnail'); ?>
										</div>
									</a>
								</div>

						<?php endwhile; 
		                endif;
		                wp_reset_postdata();
		            ?>
					</div>
				</div>
			</div>
		</div>
		<!-- Posts slider end-->	



		<div class="show-me-strip">
			<h2 id="search_keywords_wrapper" style="display: none;">Search result for <span id="search_keywords">asdf</span></h2>	
			<div class="founded-result-subtitle" id="founded_results_title" style="display: none;">Found <span id="searchCount"></span> results</div>
			<h2 id="category_title">Show Me <span id="active_category" class="active-category-name">All Thoughts</span></h2>	
			<div class="search-navigator"></div>
			<div class="post-search-control form-group">
				<span class="close-nav" id="searchOffToggle"></span>
				<input type="text" name="keyword" class="control" placeholder="Search" id="keyword" onkeyup="fetch()"></input>
				<span id="clear_search" style="display: none;">clear</span>
			</div>	
		</div>
		<div class="category-list" id="category_list">
			<ul id="filters" class="clear">	
				<?php
                	//$blog_post = new WP_Query(array('post_type' => 'post'));

                	$cats_list = get_categories();
					if( $cats_list ):
                	foreach ($cats_list as $cat) {
                		$cat_name = $cat->name;
                    	$cate_count = $cat->category_count;
                    	$cate_slug = $cat->slug;
                 ?>
                    <li data-filter=".<?php echo $cate_slug; ?>">
                    	<span class="category-name"><?php echo $cat_name; ?></span>
                    	<span class="count"><?php echo $cate_count; ?></span>
                     </li>
            		<?php } 
            		echo '<li data-filter="*" class="active"><span class="category-name">All Thoughts</span></li>	';
            		endif;
            	?>
								
			</ul>
		</div>


		<div class="posts-wrapper clear grid-wrapper">
			<?php
                $blog_post = new WP_Query(array('post_type' => 'post'));

                if( $blog_post -> have_posts() ):
                    while($blog_post -> have_posts()) : $blog_post->the_post(); ?>

						<?php $cat_list = get_the_category();
							foreach($cat_list as $category_li){
								$cat_slug = $category_li->slug;
    	                    	$cat_name = $category_li->name;	
							?>
							<div class="post-grid clear element-item <?php echo $cat_slug; ?> " data-category="<?php echo $cat_slug; ?>">
                            <a href="<?php echo the_permalink(); ?>" class="thumbnail-wrapper">
                            		<?php echo the_post_thumbnail('custom-featured-thumbnail'); ?>
							</a>
                            <div class="post-content">
                            	<div class="category-name"><?php echo $cat_name; ?></div>
                                <h3><a href="<?php echo the_permalink(); ?>" class="reveal-effact"><?php echo the_title(); ?></a></h3>
                                <div class="reading-time">
                                	<?php echo  do_shortcode('[rt_reading_time]') ?> min read
                                </div>
                                <!-- <div class="author"><?php //echo get_author_name(); ?></div> -->
                                <div class="date"><?php echo get_the_date(); ?></div>

                            </div>
                        </div>
							<?php
    	                    	}
	                         ?>

                        
                <?php endwhile; 
                endif;
                wp_reset_postdata();
            ?>
		</div>
		
		<div class="after-search clear" id="datafetch">
			
		</div>	
	</div>

</div>




<?php
	get_footer();
?>