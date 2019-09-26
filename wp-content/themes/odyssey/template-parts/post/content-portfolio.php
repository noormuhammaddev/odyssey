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

<article id="post-<?php the_ID(); ?>" <?php post_class('project-article'); ?>>
	<?php
	if ( is_sticky() && is_home() ) :
		echo twentyseventeen_get_svg( array( 'icon' => 'thumb-tack' ) );
	endif;
	?>
	<!-- Project detail header -->
	<div class="detail-header">
		<section class="blog-header">
			<div class="container sm">
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
						the_title( '<h1 class="entry-title"><span data-aos="fade-up" data-aos-duratioin="1500">', '</span></h1>' );
					} elseif ( is_front_page() && is_home() ) {
						the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
					} else {
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					}
				?>

				<div class="name">
					<span data-aos="fade-up" data-aos-duratioin="1500">
		                <?php 
		                	$client_name = get_field('client_name');
		                	if( $client_name ):  
		                		echo $client_name;
		                	endif;
		                ?>
		            </span>
                </div>
                <a href="#pro_overview" class="go-down"></a>
			</div>
		</section>	
	</div>
	<!-- end -->

	<?php
		$pro_dark_color = get_field('dark_color_code_project');
		$pro_light_color = get_field('light_color_code_project');
		$pro_bg = get_field('pro_detail_background_image');
	?>	
	<div class="project-overview clear" id="pro_overview">
		<div class="over-view-img clear" style="background: <?php echo $pro_light_color; ?>">
			<?php
				// App Logo Position
				$logo_position_class = get_field('app_logo_position');
					

				//App Logo Icon
				$project_app_logo = get_field('project_app_logo');
				$project_app_logo_url = '';
				if($project_app_logo){
					$project_app_logo_url = $project_app_logo['url'];
				}else{
					$project_app_logo_url = get_stylesheet_directory_uri().'/assets/images/test';
				}
				echo '<div class="app-logo '.$logo_position_class.'"><img src="'.$project_app_logo_url.'" alt="App Logo Icon" /></div>';


				// large image
				$overview_img = get_field('overview_image');
				if ($overview_img) {
					$overview_img_url = $overview_img['url'];
					echo '<img src="'.$overview_img_url.'" alt="" data-aos="fade-left" data-aos-duration="1000">';
				}
			?>
		</div>
		<div class="over-view-content">
			<div class="clear">
				<div class="cols col_1" data-aos="fade-right" data-aos-duration="1500">
					<?php
						$overview_title = get_field('overview_title');
						if ($overview_title) : 
							echo '<h4>'.$overview_title.'</h4>';
						endif;
					?>
				</div>
				<div class="cols col_2" data-aos="fade-right" data-aos-duration="1500">
					<?php
						$overview_detail = get_field('overview_detail');
						if ($overview_detail) : 
							echo '<p>'.$overview_detail.'</p>';
						endif;
					?>
				</div>
				<div class="cols col_3" data-aos="fade-right" data-aos-duration="1500">
					<?php
						$project_technologies_label = get_field('project_technologies_label');
						if ($project_technologies_label) : 
							echo '<h4>'.$project_technologies_label.'</h4>';
						endif;
					?>

					<!-- Technologies start -->	
						<?php 
							$tech = get_field('select_used_tech');
						// check
						if( $tech ): ?>
						<ul class="dotted-list">
							<?php foreach( $tech as $technology ):?>

							<li><?php echo $technology['label']; ?></li>

							<?php endforeach; ?>
						</ul>
						<?php endif; ?>
					<!-- Technologies end -->
				</div>
				<div class="cols col_4" data-aos="fade-right" data-aos-duration="1500" >
					<?php
						$pro_year_label = get_field('pro_year_label');
						if ($pro_year_label) : 
							echo '<h4>'.$pro_year_label.'</h4>';
						endif;

						$project_completed_years = get_field('project_completed_years');
						if ($project_completed_years) : 
							echo '<p>'.$project_completed_years.'</p>';
						endif;
					?>
				</div>
			</div>
		</div>
	</div>
	<!-- Overview End -->

	<section class="the-challenge clear">
		<div class="inner-wrapper">
			<div class="section-header">
                <?php
                	$the_challenge_title = get_field('the_challenge_title'); 
                	if($the_challenge_title):
                		echo '<h2 class="section-heading"><span data-aos="fade-up"  data-aos-duratioin="1000">'. $the_challenge_title .'</span></h2>';
                	endif;
                	$the_challenge_desc = get_field('the_challenge_desc'); 
                	if($the_challenge_desc):
                		echo '<p class="lg" data-aos="fade-left" data-aos-duration="1000" >'. $the_challenge_desc .'</p>';
                	endif;
                ?>        
            </div>

            <div class="more-info clear">
            	<?php 
	            	$the_challenge_image = get_field('the_challenge_image');
					if ($the_challenge_image) :
						$the_challenge_image_url = $the_challenge_image['url'];

						$project_solution_image_type = get_field('project_solution_image_type');
						

						echo '<div class="img-wrapper reveal-wrapper '.$project_solution_image_type.'" data-aos="fade-up">
							<div class="reveal-img">
								<div class="img-holder">
									<img src="'.$the_challenge_image_url.'" alt="">
								</div>
							</div>
						</div>';
					endif;

					$the_challenge_more_detail = get_field('the_challenge_more_detail');
					if ($the_challenge_more_detail) :
						echo '<div class="brief-desc" style="background: '.$pro_dark_color .' url('. $pro_bt_image .'); " >
						      	<p data-aos="fade-up" data-aos-duration="1000" >'.$the_challenge_more_detail.'</p>
						      </div>';
					endif;
            	?>
            </div>
		</div>
	</section><!-- The Challenge end -->

		<!-- the solution start -->
		<?php
			$the_sol_title = get_field('the_sol_title');
			$the_sol_sub_title = get_field('the_sol_sub_title');
			$the_sol_description = get_field('the_sol_description');
			$the_sol_image = get_field('the_sol_image');
				$the_sol_img_url = $the_sol_image['url'];

			$the_sol_feature_title = get_field('the_sol_feature_title');
			$the_sol_more_sub_title = get_field('the_sol_more_sub_title');
			$the_sol_more_description = get_field('the_sol_more_description');
			$Design_dev_tag = get_field('Design_dev_tag');

			if($the_sol_title):
				echo '<section class="the-solution">
						<div class="tag-text">'.$the_sol_title.'</div>
						<div class="container sm">
							<div class="inner-wrapper" style="background: '.$pro_light_color.'">
								<div class="left-gutter" style="background: '.$pro_light_color.'"></div>
								<div class="right-gutter" style="background: '.$pro_light_color.'"></div>

								<div class="section-header">
									<h2 class="section-heading"><span data-aos="fade-up"  data-aos-duratioin="1500">'.$the_sol_title.'</span></h2>
								</div>'; ?>
				<ul class="objectives-list">	
					<?php 
					    if( have_rows('project_objective_list_repeater') ):
					        while( have_rows('project_objective_list_repeater') ) : the_row();
					?>
					    <li  data-aos="fade-up" data-aos-duratioin="500">
					        <?php
					            $project_objective_list = get_sub_field('project_objective_list');
					            echo $project_objective_list;
					        ?>
					    </li>
					<?php endwhile; endif; ?>
				</ul>
				<?php 
					echo '<div class="img-wrapper reveal-wrapper" data-aos="fade-up">
									<div class="reveal-img">
										<div class="img-holder">
											<img src="'.$the_sol_img_url.'" data-aos="fade-left" data-aos-duration="1000" />
										</div>
									</div>
								</div>

								<div class="more-inner-wrapper clear" style="background: '.$pro_dark_color.'" data-aos="fade-up" data-aos-duration="1000">
									<div class="right-gutter" style="background: '.$pro_dark_color.'"></div>
									<div class="left-gutter" style="background: '.$pro_dark_color.'"></div>
									<div class="bottom-gutter" style="background: '.$pro_dark_color.'"></div>
									<div class="detail">
										<p data-aos="fade-left" data-aos-duratioin="1500">'.$the_sol_more_description.'</p>
									</div>
								</div>
							</div>
						</div>
					</section>';
			endif;
		?>
		<!-- the solution end -->	

		<!-- other projects start -->
		<?php
			$showProjects = get_field('show_other_projects');
			$show_other_pro_title = get_field('show_other_pro_title');
			$all_work_link = get_field('all_work_link');
				if($all_work_link):
					$all_work_url = $all_work_link['url'];
					$all_work_title = $all_work_link['title'];
					$all_work_target = $all_work_link['target'];
				endif;

			if($showProjects) : 
				$className = 'show'
			?>


				<section class="related-work <?php echo $className?>">
					<div class="container">		
						<div class="section-header">
							<h2 class="section-heading"><span data-aos="fade-up"   data-aos-duratioin="1000"><?php echo $show_other_pro_title; ?></span></h2>
						</div>
						<ul class="related-projects-wrapp owl-carousel">
							<!-- Project loop start -->
				            <?php
				                $portfolio = new WP_Query(array('post_type' => 'portfolio', 'post_status' => 'publish', 'posts_per_page' => -1 ));
				                if( $portfolio -> have_posts() ):
				                    while($portfolio -> have_posts()) : $portfolio->the_post(); ?>
										<?php 
		                                    $args = array('orderby' => 'name', 'order' => 'DESC', 'fields' => 'all');
                                    		$proj_category = wp_get_post_terms( get_the_ID(), 'project-category', $args );
		                                ?>
				                        <li class="project-content element-item <?php echo $proj_category[0]->slug ?>" data-category="<?php echo $proj_category[0]->slug ?>" data-aos="fade-right" data-aos-duration="1000" >
				                        <?php
				                            $pro_background = get_field('project_background'); 
				                            if($pro_background):
				                                $bg_url =  $pro_background['url'];
				                            endif;

				                            $thumbnail_bg = get_field('project_thumbnail_background');
                            				$text_color_theme = get_field('project_text_color_theme');
				                        ?>
				                            <a href="<?php the_permalink(); ?>" class="project-block <?php echo $text_color_theme; ?>" style="background: <?php echo $thumbnail_bg; ?> url('<?php echo $bg_url; ?>'); background-size: cover;">
				                                <span class="right-arrow"></span>
				                                <h3><?php echo $proj_category[0]->name; ?></h3>
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
				                        </li>
				                <?php 
				            	endwhile; 
				                endif;
				                wp_reset_postdata();
				            ?>
				            
				            <!-- Project loop end-->
						</ul>

							<!-- <div class="view-all-work">
								<?php
									//echo '<a href="'.$all_work_url.'" target="'.$all_work_target.'" class="button button-green">'.$all_work_title.'</a>';
								?>
							</div>	 -->
					</div>
				</section>
			<?php endif ?>
		<!-- other projects end -->

		

		


	

	
	



</article><!-- #post-## -->
