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
						the_title( '<h1 class="entry-title"><span data-aos="fade-up" data-aos-delay="100" data-aos-duratioin="1500">', '</span></h1>' );
					} elseif ( is_front_page() && is_home() ) {
						the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
					} else {
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					}
				?>

				<div class="name">
					<span data-aos="fade-up" data-aos-delay="500" data-aos-duratioin="1500">
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
		$pro_bt_image = $pro_bg['url'];
	?>	
	<div class="project-overview clear" id="pro_overview">
		<div class="over-view-img clear" style="background: <?php echo $pro_dark_color; ?> url('<?php echo $pro_bt_image; ?>');">
			<?php
				$overview_img = get_field('overview_image');
				if ($overview_img) {
					$overview_img_url = $overview_img['url'];
					echo '<img src="'.$overview_img_url.'" alt="" data-aos="fade-left" data-aos-duration="1000">';
				}
			?>
		</div>
		<div class="over-view-content">
			<div class="clear">
				<div class="cols col_1" data-aos="fade-right" data-aos-duration="1500" data-aos-delay="200">
					<?php
						$overview_title = get_field('overview_title');
						if ($overview_title) : 
							echo '<h4>'.$overview_title.'</h4>';
						endif;
					?>
				</div>
				<div class="cols col_2" data-aos="fade-right" data-aos-duration="1500" data-aos-delay="400">
					<?php
						$overview_detail = get_field('overview_detail');
						if ($overview_detail) : 
							echo '<p>'.$overview_detail.'</p>';
						endif;
					?>
				</div>
				<div class="cols col_3" data-aos="fade-right" data-aos-duration="1500" data-aos-delay="600">
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
				<div class="cols col_4" data-aos="fade-right" data-aos-duration="1500" data-aos-delay="800">
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
                		echo '<h2 class="section-heading"><span data-aos="fade-up" data-aos-delay="200" data-aos-duratioin="1000">'. $the_challenge_title .'</span></h2>';
                	endif;
                	$the_challenge_desc = get_field('the_challenge_desc'); 
                	if($the_challenge_desc):
                		echo '<p class="lg" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="500">'. $the_challenge_desc .'</p>';
                	endif;
                ?>        
            </div>

            <div class="more-info clear">
            	<?php 
	            	$the_challenge_image = get_field('the_challenge_image');
					if ($the_challenge_image) :
						$the_challenge_image_url = $the_challenge_image['url'];
						echo '<div class="img-wrapper reveal-wrapper" data-aos="fade-up">
							<div class="reveal-img">
								<img src="'.$the_challenge_image_url.'" alt="">
							</div>
						</div>';
					endif;

					$the_challenge_more_detail = get_field('the_challenge_more_detail');
					if ($the_challenge_more_detail) :
						echo '<div class="brief-desc" style="background: '.$pro_light_color .' url('. $pro_bt_image .'); " >
						      	<p data-aos="fade-up" data-aos-duration="1000"  data-aos-delay="500">'.$the_challenge_more_detail.'</p>
						      </div>';
					endif;
            	?>
            </div>
		</div>
	</section><!-- The Challenge end -->

	<section class="technology-wrapper">
		
		<?php
			$about_tech_title = get_field('about_tech_title'); 
			$about_tech_desc = get_field('about_tech_desc'); 
			$about_tech_tag = get_field('about_tech_tag');
			$about_tech_pdf_img = get_field('about_tech_pdf_img');
			$about_tech_sub_title = get_field('about_tech_sub_title');
			$about_tech_sud_details = get_field('about_tech_sud_details');
			$about_tech_download_pdf_lbl = get_field('about_tech_download_pdf_lbl');
			$about_tech_pdf_download_link = get_field('about_tech_pdf_download_link');
				$about_tech_pdf_link = $about_tech_pdf_download_link['url'];
				$about_tech_pdf_title = $about_tech_pdf_download_link['title'];
				$about_tech_pdf_target = $about_tech_pdf_download_link['target'];


			if($about_tech_title):
				echo '<div class="used-term">
						<div class="container sm">
							<div class="section-header">
								<h2 class="section-heading"><span data-aos="fade-up" data-aos-delay="200" data-aos-duratioin="1500">'. $about_tech_title .'</span></h2>
								<p class="lg"  data-aos="fade-left" data-aos-delay="500" data-aos-duratioin="1500">'. $about_tech_desc .'</p>
							</div>

							<div class="more-desc">
								<div class="left">
									<div class="img-wrapper reveal-wrapper" data-aos="fade-up">
										<div class="reveal-img">
											<img src="'. $about_tech_pdf_img['url'] .'"/>
										</div>
									</div>
									<div class="pdf-download">('. $about_tech_download_pdf_lbl . ' 
										<a href="'.$about_tech_pdf_link.'" target="'. $about_tech_pdf_target .'">'. $about_tech_pdf_title .'</a>)
									</div>
								</div>
								<div class="right" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="500">
									<h4>'. $about_tech_sub_title .'</h4>
									<p>'. $about_tech_sud_details .'</p>
								</div>
							</div>
						</div>
					  </div>';
			endif;
		?> <!-- technology terms end -->
	</section>
		<!-- technology terms start -->
		<?php
			$wireframing_title = get_field('wireframing_title');
			$wirefram_label = get_field('wirefram_label');
			$wirefram_image = get_field('wirefram_image');
				$wirefram_img_url = $wirefram_image['url'];
			$wireframe_download_label = get_field('wireframe_download_label');
			$wireframe_download_link = get_field('wireframe_download_link');
				$wireframe_download_url = $wireframe_download_link['url'];
				$wireframe_download_title = $wireframe_download_link['title'];
				$wireframe_download_target = $wireframe_download_link['target'];

				echo '<div class="wireframe"><div class="container sm">';
					if($wireframing_title):
						echo '<h4><span data-aos="fade-up" data-aos-delay="200" data-aos-duratioin="1000">'.$wireframing_title.'</span></h4>';
					endif;

					if($wirefram_image):
						echo '<div class="wireframe-img">
								<img src="'.$wirefram_img_url.'" />
							</div>';		
					endif;

					if($wirefram_label):
						echo '<div class="wireframe-lbl">'. $wirefram_label .'</div>';
					endif;

					if($wireframe_download_link):
						echo '<div class="wireframe-download">
								('. $wireframe_download_label .' 
									<a href="'. $wireframe_download_url .'" target="'.$wireframe_download_target.'">'. $wireframe_download_title .'</a>
								)
							</div>';
					endif;


				echo '</div></div>';

		?><!-- technology terms end -->

		<!-- design and development start -->
		<?php
			$Design_dev_title = get_field('Design_dev_title');
			$Design_dev_desc = get_field('Design_dev_desc');
			$Design_dev_img = get_field('Design_dev_img');
				$Design_dev_img_url = $Design_dev_img['url'];
			

			if($Design_dev_title):
				echo '<section class="design-dev">
						<div class="container sm">
							<div class="section-header" data-aos="fade-right" data-aos-duration="500">
								<h2 class="section-heading"><span data-aos="fade-up" data-aos-delay="200" data-aos-duratioin="1500">'.$Design_dev_title.'</span></h2>
								<p class="lg" data-aos="fade-left" data-aos-delay="500" data-aos-duratioin="1500">'.$Design_dev_desc.'</p>
							</div>
							<div class="image-wrapper">
								<img src="'.$Design_dev_img_url.'" data-aos="zoom-in" data-aos-duration="1000" />
							</div>
						</div>
					</section>';	
			endif;

		?>
		<!-- design and development end -->

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
						<div class="tag">'.$Design_dev_tag.'</div>
						<div class="container sm">
							<div class="inner-wrapper" style="background: '.$pro_light_color.'">
								<div class="left-gutter" style="background: '.$pro_light_color.'"></div>
								<div class="right-gutter" style="background: '.$pro_light_color.'"></div>

								<div class="section-header">
									<h2 class="section-heading"><span data-aos="fade-up" data-aos-delay="200" data-aos-duratioin="1500">'.$the_sol_title.'</span></h2>
									<p class="lg" data-aos="fade-left" data-aos-delay="500" data-aos-duratioin="1500">'.$the_sol_sub_title .'</p>
									<p data-aos="fade-left" data-aos-delay="800" data-aos-duratioin="1500">'.$the_sol_description.'</p>
								</div>
								<div class="img-wrapper reveal-wrapper" data-aos="fade-up">
									<div class="reveal-img">
										<img src="'.$the_sol_img_url.'" data-aos="fade-left" data-aos-duration="1000" />
									</div>
								</div>

								<div class="more-inner-wrapper clear" style="background: '.$pro_dark_color.'" data-aos="fade-up" data-aos-duration="1000">
									<div class="right-gutter" style="background: '.$pro_dark_color.'"></div>
									<div class="left-gutter" style="background: '.$pro_dark_color.'"></div>
									<h4><span data-aos="fade-up" data-aos-delay="200" data-aos-duratioin="1500">'.$the_sol_feature_title.'</span></h4>
									<div class="detail">
										<h3 data-aos="fade-left" data-aos-delay="500" data-aos-duratioin="1500">'.$the_sol_more_sub_title.'</h3>
										<p data-aos="fade-left" data-aos-delay="800" data-aos-duratioin="1500">'.$the_sol_more_description.'</p>
									</div>
								</div>
							</div>
						</div>
					</section>';
			endif;
		?>
		<!-- the solution end -->

		<!-- End product start -->		
		<?php
			$end_product_title = get_field('end_product_title');
			$end_product_description = get_field('end_product_description');
			$end_product_product_image = get_field('end_product_product_image');
				$end_product_img_url = $end_product_product_image['url'];

			if( $end_product_title ):
				echo '<div class="container sm">
						<section class="end-product">
							<div class="section-header sm">
								<h2 class="section-heading"><span data-aos="fade-up" data-aos-delay="200" data-aos-duratioin="1500">'. $end_product_title .'</span></h2>
								<p data-aos="fade-left" data-aos-delay="800" data-aos-duratioin="1500">'. $end_product_description .'</p>
							</div>
							<div class="image-wrapper reveal-wrapper" data-aos="fade-up">
								<div class="reveal-img">
									<img src="'. $end_product_img_url .'"/>
								</div>
							</div>
						</section>
					</div>';
			endif;
		?>
		<!-- End product end -->	

		<!-- our result start -->
		<?php
			$our_result_title = get_field('our_result_title');
			$our_result_sub_title = get_field('our_result_sub_title');
			$our_result_description = get_field('our_result_description');
			$our_result_project_link = get_field('our_result_project_link');
				$our_result_pro_url = $our_result_project_link['url'];
				$our_result_pro_title = $our_result_project_link['title'];
				$our_result_pro_target = $our_result_project_link['target'];

			echo '<div class="our-result">';
				if( $our_result_title ):
					echo '<h2><span data-aos="fade-up" data-aos-delay="100" data-aos-duratioin="1500">'.$our_result_title.'</span></h2>';
				endif;

				echo '<div class="result-detail" style="background: '.$pro_dark_color.'"><div class="wrapper">';
						if( $our_result_sub_title ):
							echo '<h3 data-aos="fade-left" data-aos-delay="500" data-aos-duratioin="1500">'. $our_result_sub_title .'</h3>';
						endif;

						if( $our_result_description ):
							echo '<p data-aos="fade-right" data-aos-delay="900" data-aos-duratioin="1500">'.$our_result_description.'</p>';
						endif;

						if($our_result_project_link):
							echo '<a href="'.$our_result_pro_url.'" target="'.$our_result_pro_target.'" class="button button-green">'.$our_result_pro_title.'</a>';
						endif;
				echo '</div></div>';
			echo '</div>';
		?>
		<!-- our result end -->		

		<!-- other projects start -->
		<?php
			$showProjects = get_field('show_other_projects');
			$show_other_pro_title = get_field('show_other_pro_title');
			$all_work_link = get_field('all_work_link');
				$all_work_url = $all_work_link['url'];
				$all_work_title = $all_work_link['title'];
				$all_work_target = $all_work_link['target'];

			if($showProjects) : ?>

				<section class="related-work show">
					<div class="container">		
						<div class="section-header">
							<h2 class="section-heading"><span data-aos="fade-up" data-aos-delay="100" data-aos-duratioin="1000"><?php echo $show_other_pro_title; ?></span></h2>
						</div>
						<div class="row">
								<!-- Project loop start -->
					            <?php
					                $portfolio = new WP_Query(array('post_type' => 'portfolio', 'post_status' => 'publish', 'posts_per_page' => 3 ));
					                if( $portfolio -> have_posts() ):
					                	$counter = 1;
					                    while($portfolio -> have_posts()) : $portfolio->the_post(); ?>
											<?php 
			                                    $proj_category = get_the_terms(get_the_ID(), 'project-category');
			                                ?>
					                        <div class="col-md-4 col-sm-4 col-xs-12 project-content element-item <?php echo $proj_category[0]->slug ?>" data-category="<?php echo $proj_category[0]->slug ?>" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="<?php echo $counter;?>00">
					                        <?php
					                            $pro_background = get_field('project_background'); 
					                            if($pro_background):
					                                $bg_url =  $pro_background['url'];
					                            endif;
					                            $thumbnail_bg = get_field('project_thumbnail_background');
                            					$text_color_theme = get_field('project_text_color_theme');
					                        ?>
					                            <div class="project-block <?php echo $text_color_theme; ?>" style="background: <?php echo $thumbnail_bg; ?> url('<?php echo $bg_url; ?>'); background-size: cover;">
					                                <a href="<?php the_permalink(); ?>" class="right-arrow"></a>
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
					                            </div>
					                        </div>
					                <?php 
					                $counter+=2;
					            	endwhile; 
					                endif;
					                wp_reset_postdata();
					            ?>
					            
					            <!-- Project loop end-->
							</div>

							<div class="view-all-work">
								<?php
									echo '<a href="'.$all_work_url.'" target="'.$all_work_target.'" class="button button-green">'.$all_work_title.'</a>';
								?>
								
							</div>	
					</div>
				</section>
			<?php endif ?>
		<!-- other projects end -->

		

		


	

	
	



</article><!-- #post-## -->
