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

<article id="post-<?php the_ID(); ?>" <?php post_class('service-article'); ?>>
	<?php
	if ( is_sticky() && is_home() ) :
		echo twentyseventeen_get_svg( array( 'icon' => 'thumb-tack' ) );
	endif;
	?>
	<div class="entry-header">
		
	</div><!-- .entry-header -->

	<div class="service-detail-cotainer">
		<!-- Service detail header -->
		<div class="detail-header">
			<div class="container sm clear">
				<div class="layers-wrap right">
					<span class="layer-1"></span>
					<span class="layer-2"></span>
					<span class="layer-3"></span>
					<a href="<?php the_permalink(); ?>" class="inner-img-wrap"><?php echo the_post_thumbnail(); ?></a>
				</div>
				<div class="left">
					<?php $services_categories = get_the_terms(get_the_ID(), 'services-category');?>
					<h3><span data-aos="fade-up" data-aos-delay="100" data-aos-duratioin="1500"><?php echo $services_categories[0]->name; ?></span></h3>
					<?php
						if ( 'post' === get_post_type() ) {
							echo '<div class="entry-meta">';
								if ( is_single() ) {
									twentyseventeen_posted_on();
								} else {
									echo twentyseventeen_time_link();
									twentyseventeen_edit_link();
								};
							echo '</div>';
						};

						if ( is_single() ) {
							the_title( '<h1 class="entry-title" id="service_title"><div data-aos="fade-up" data-aos-delay="300" data-aos-duratioin="1500">', '<span></span></div></h1>' );
						} elseif ( is_front_page() && is_home() ) {
							the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
						} else {
							the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
						}
					?>
					
					<div class="all-services">
						<ul>
							<?php
			                    $services = new WP_Query(array('post_type' => 'services'));
			                    if( $services -> have_posts() ):
			                        while($services -> have_posts()) : $services->the_post(); ?>
			                            <li>
			                            	<a href="<?php the_permalink(); ?>" class="reveal-effact">
		                                        <?php echo the_title(); ?>
		                                    </a>
			                            </li>
			                    <?php endwhile; 
			                    endif;
			                    wp_reset_postdata();
			                ?>
						</ul>
					</div>

					<p class="entry-content" data-aos="fade-up" data-aos-delay="500" data-aos-duratioin="1500">
						<?php echo the_excerpt(); ?>
					</p><!-- .entry-content -->

				</div>
			</div>
		</div>
		<!-- end -->

		<!-- More Detail section start -->
			<div class="container sm">
				<div class="more-detail">
					<div class="left">
						<?php
							$moreDetailTitle = get_field('more_detail_title');
							if ( $moreDetailTitle ) :
								echo '<h2>'.$moreDetailTitle.'</h2>';
							endif;

							$moreDetailDesc = get_field('more_detail_brief_discussion');
							if ( $moreDetailDesc ) :
								echo '<p>'.$moreDetailDesc.'</p>';
							endif;
						?>
					</div>
					<div class="service-tag">
						<?php 
							$tagLine = get_field('service_tag'); 
							if( $tagLine ): 
								echo $tagLine;
							endif;
						?>
					</div>	

					<!-- More detail -->
					<div class="more-detail-inner reveal-wrapper" data-aos="fade-up">
						<div class="img-lg reveal-img">
							<?php 
								$lg_img = get_field('service_large_image'); 
								if( $lg_img ): 
									$lg_img_url = $lg_img['url'];
									echo '<img src="'.$lg_img_url.'" />';
								endif;
							?>
						</div>
						<div class="more-detail-2">
							<?php
								$workForCustomerTitle = get_field('work_for_customer_title');
								if ( $workForCustomerTitle ) :
									echo '<h3><span data-aos="fade-up" data-aos-delay="200" data-aos-duratioin="1500">'.$workForCustomerTitle.'</span></h3>';
								endif;

								$workForCustomerDesc = get_field('work_for_customer_detail');
								if ( $workForCustomerDesc ) :
									echo '<p data-aos="fade-up" data-aos-delay="500" data-aos-duratioin="1500">'.$workForCustomerDesc.'</p>';
								endif;
							?>
						</div>
					</div>
				</div>
			</div>
		<!-- end -->

		<section class="service-features">
			<div class="container sm">
				<div class="section-header">
				    <h3><span data-aos="fade-up" data-aos-duratioin="1500"><?php the_title(); ?></span></h3>
					<?php
						$featureSecTitle = get_field('feature_section_title');
						if ( $featureSecTitle ) :
							echo '<h2 class="section-heading"><span data-aos="fade-up" data-aos-duratioin="1500">'.$featureSecTitle.'</span></h2>';
						endif;

						$featureSecDescription = get_field('feature_section_detail');
						if ( $featureSecDescription ) :
							echo '<p data-aos="fade-up" data-aos-duratioin="1500">'.$featureSecDescription.'</p>';
						endif;
					?>
				</div>

				<div class="list-tabs-container clear">
					<div class="tab-list">
						<ul>
							<?php 
				                if( have_rows('feature_tabs') ):
				                    while( have_rows('feature_tabs') ) : the_row();
				            ?>

				            <li id="tab_<?php the_sub_field('feature_tab_no'); ?>"><?php the_sub_field('feature_tab_item'); ?></li>

							<?php
								endwhile; 
				               endif;
				            ?>
						</ul>
					</div>
					<div class="content-wrapper">
						<?php 
			                if( have_rows('feature_tabs') ):
			                    while( have_rows('feature_tabs') ) : the_row();
			            ?>

			            <div class="tabs-data" id="tab_<?php the_sub_field('feature_tab_no'); ?>_content">
							<div class="icon-wrapper">
								<?php 
									$tab_img = get_sub_field('tab_content_icon'); 
									$tab_img_url = $tab_img['url'];
								?>
								<img src="<?php echo $tab_img_url; ?>" />
							</div>
							<h4><?php the_sub_field('tab_content_title'); ?></h4>
							<p><?php the_sub_field('tab_content_detail'); ?></p>

							<ul>
								<?php 
					                if( have_rows('tab_feature_sub_items') ):
					                    while( have_rows('tab_feature_sub_items') ) : the_row();
					            ?>
									<li>
										<?php 
											$feature_inner_list_link = get_sub_field('feature_inner_list_link'); 
											if(isset($feature_inner_list_link) && !empty($feature_inner_list_link)){
												echo '<a href="'.$feature_inner_list_link.'">';
											}
											echo get_sub_field('feature_inner_list');
											if(isset($feature_inner_list_link) && !empty($feature_inner_list_link)){
												echo '</a>';
											}
											 ?>
									</li>
					            <?php 
					            	endwhile;
					            	endif;
					            ?>
							</ul>
						</div>

						<?php
							endwhile; 
			               endif;
			            ?>
						<span class="layerd-circle rellax" data-rellax-speed="3"></span>
					</div>
			    </div>
			</div>
		</section>

		<?php
			$projectCategory = get_field('show_other_projects');
			if( $projectCategory ): 
				$visibleClass = "show";
			endif;
		?>
		<section class="related-work <?php echo $visibleClass ?> ">
			<div class="container">
				<div class="section-header">
					<?php 
						$rel_pro_title = get_field('related_work_title'); 
						if( $rel_pro_title ) :
							echo '<h2 class="section-heading">'. $rel_pro_title .'</h2>';
						endif;
					?>
				    
				</div>

				<div class="related-projects-bundle">
					<div class="row">
						<?php
							$portfolio = new WP_Query( array(
							    'post_type'         => 'portfolio',
							    'posts_per_page'    => 3,
							    'tax_query' => array(
							        array(
							            'taxonomy' => 'category',
							            'field' => 'slug',
							            'terms' => array($projectCategory) // Array of service categories you wish to retrieve posts from
							        )
							    ),
							) );

	                        if( $portfolio -> have_posts() ):
	                            while($portfolio -> have_posts()) : $portfolio->the_post(); ?>
	                                <div class="project-content">
		                                <?php
		                                    $pro_background = get_field('project_background'); 
		                                    if($pro_background):
		                                        $bg_url =  $pro_background['url'];
		                                    endif;
		                                    $thumbnail_bg = get_field('project_thumbnail_background');
	                            			$text_color_theme = get_field('project_text_color_theme');
		                                ?>
	                                	<a href="<?php the_permalink(); ?>" class="project-block reveal-effact <?php echo $text_color_theme; ?>" style="background: <?php echo $thumbnail_bg; ?> url('<?php echo $bg_url; ?>'); background-size: cover; ">
	                                        <span class="right-arrow"></span>
	                                        <h3><?php echo the_category(); ?></h3>
	                                        <h2><?php echo the_title(); ?></h2>
	                                        <div class="name">
	                                        <?php if( get_field('client_name') ): ?>
	                                            <?php the_field('client_name'); ?>
	                                        <?php endif; ?>
	                                        </div>
	                                        <div class="project-thumbnail">
	                                            <?php echo the_post_thumbnail(); ?>                            
	                                        </div>
	                                    </a>
	                                </div>
	                        <?php endwhile; 
	                        endif;
	                        wp_reset_postdata();
	                    ?>
					</div>
				</div>
				<div class="text-center">
					<?php 
						$view_all_btn = get_field('view_all_work_button'); 
						if( $view_all_btn ) :
							$_btn_url = $view_all_btn['url'];
							$_btn_title = $view_all_btn['title'];
							echo '<a href="'.$_btn_url.'" class="button button-green reveal-effact">'.$_btn_title.'</a>';
						endif;
					?>
				</div>
			</div>
		</section>
	</div>

	
	



</article><!-- #post-## -->
