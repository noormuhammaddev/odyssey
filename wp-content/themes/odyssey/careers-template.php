<?php
	//Template Name: Career
	get_header();
?>
<div class="careers">
	<div class="career-wrapper">
		<section class="career-header">
			<div class="section-header sm">
				<?php
					while ( have_posts() ) : the_post();
						echo '<h2 class="section-heading"><span data-aos="fade-up" data-aos-delay="200" data-aos-duratioin="1000">'. get_the_title() .'</span></h2>';
						echo '<div data-aos="fade-up" data-aos-delay="500" data-aos-duratioin="1000">'.get_the_content().'</div>'; 
					endwhile;
				?>
			</div>
		</section>
		<!-- careers header end -->

		<div class="career-carousel">
	        <ul class="owl-carousel owl-theme custom-carousel-nav" id="client-brands">
	        <?php 
	            if( have_rows('career_gallary_images', 'option') ):
	            	$counter = 1;
	                while( have_rows('career_gallary_images', 'option') ) : the_row();
	        ?>
	            <li class="reveal-wrapper" data-aos="fade" data-aos-delay="<?php echo $counter.'00' ?>" data-aos-duration="1500">
	                <?php
	                    $_career_image = get_sub_field('upload_career_image');
	                    echo '<div class="reveal-img"><img src="'.$_career_image['url'].'"></div>';
	                ?>
	            </li>

	        <?php $counter=$counter+2; endwhile; endif; ?>
	        </ul>
	    </div>

		<?php
			$view_all_positions_button = get_field('view_all_positions_button');
			if($view_all_positions_button):
				$view_all_positions_url = $view_all_positions_button['url'];
				$view_all_positions_title = $view_all_positions_button['title'];
				echo '<div class="view-all-positions">
					<a href="'.$view_all_positions_url.'" class="button button-green">'.$view_all_positions_title.'</a>
				</div>';
			endif;
		?>
	    
		<!-- career carousel end -->

		<div class="inner-wrapper" id="all_positions">
			<section>
				<section class="our-value">
					<div class="section-header with-short-detail">
						<?php
							$about_val_sub_title = get_field('about_val_sub_title', 'option');
							if( $about_val_sub_title ):
								echo '<h3><span data-aos="fade-up" data-aos-delay="200" data-aos-duratioin="1000">'. $about_val_sub_title .'</span></h3>';	
							endif;

							$about_val_title = get_field('about_val_title', 'option');
							if( $about_val_title ):
								echo '<h2 class="section-heading"><span data-aos="fade-up" data-aos-delay="500" data-aos-duratioin="1000">'. $about_val_title .'</span></h2>';	
							endif;

							$about_val_detail = get_field('about_val_detail', 'option');
							if( $about_val_detail ):
								echo '<p data-aos="fade-up" data-aos-delay="700" data-aos-duratioin="1000">'. $about_val_detail .'</p>';	
							endif;
						?>			                	
		            </div>
		            <div class="features">
			            <div class="row">
							<?php 
				                if( have_rows('value_feature_blocks', 'option') ):
	                                $post_counter = 1;
				                    while( have_rows('value_feature_blocks', 'option') ) : the_row();
				            ?>
					            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12" >
					            	<div class="feature-wrap" data-aos="fade-right" data-aos-duration="1500">
										<?php
											$value_feature_ico = get_sub_field('value_feature_image');
											if( $value_feature_ico ) : 
												$value_feature_ico_url = $value_feature_ico['url'];
												echo '<div class="icon-wrapper"><img src="'. $value_feature_ico_url .'" alt="" /></div>';
											endif;

											$val_feature_title = get_sub_field('value_feature_title');
											if( $val_feature_title ) : 
												echo '<h4>'. $val_feature_title .'</h4>';
											endif;

											$val_feature_detail = get_sub_field('value_feature_detail');
											if( $val_feature_detail ) : 
												echo '<p>'. $val_feature_detail .'</p>';
											endif;
										?>			
									</div>
								</div>
			                <?php 
	                        $post_counter++;
	                        endwhile; endif; ?>
						</div>
					</div>
				</section>	
			</section>

			<section>
				<div class="section-header sm smaller">
					<?php 
						$open_pos_title = get_field('open_position_title');
						if ($open_pos_title) :
							echo '<h2 class="section-heading"><span data-aos="fade-up" data-aos-delay="200" data-aos-duratioin="1000">'.$open_pos_title.'</span></h2>';
						endif;

						$open_pos_desc = get_field('open_position_desc');
						if ($open_pos_desc) :
							echo '<p data-aos="fade-up" data-aos-delay="500" data-aos-duratioin="1000">'.$open_pos_desc.'</p>';
						endif;

					?>
				</div>

				<div class="open-positions">
					<?php echo do_shortcode('[aol]'); ?>
					
				</div>
			</section>
			<!-- Open positions end -->
		</div>
		
		<div class="ODC-life">
			<?php
				$odc_life_lg_image = get_field('odc_life_lg_img', 'option');
				$odc_life_title = get_field('odc_life_tit', 'option');
				$odc_life_desc = get_field('odc_life_description', 'option');

				if($odc_life_lg_image) :
					$odc_life_lg_img_url = $odc_life_lg_image['url'];
					echo '<div class="life-image reveal-wrapper" data-aos="fade-up"><div class="reveal-img"><img src="'.$odc_life_lg_img_url.'" /></div></div>';
				endif;


				echo '<div class="inner clear">';

					if($odc_life_title) :
						echo '<div class="title-section"><h4 data-aos="fade-up" data-aos-delay="200">'.$odc_life_title.'</h4></div>';
					endif;

					if($odc_life_desc) :
						echo '<div class="description-section"><p data-aos="fade-up" data-aos-delay="500">'.$odc_life_desc.'</p></div>';
					endif;
				echo '</div>';
			?>
		</div>

	</div>
</div>




<?php
	get_footer();
?>