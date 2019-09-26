<?php
	//Template Name: About Us
	get_header();
?>

<div class="about-us">
	<section>
		<div class="container sm about-top-section clear">	
			<div class="about-circle">
	        	<span class="red-line rellax" data-rellax-speed="1"></span>
				<span class="white-circle rellax" data-rellax-speed="9"></span>
<!--                 <span class="dotted-circle"></span>         -->
			</div>

			<div class="section-header vertical">
				<?php
					$about_header_sub_title = get_field('about_header_sub_title');
					if( $about_header_sub_title ):
						echo '<h3 data-aos="fade-up">'. $about_header_sub_title .'</h3>';	
					endif;

					$about_header_title = get_field('about_header_title');
					if( $about_header_title ):
						echo '<h2 class="section-heading" data-aos="fade-up">'. $about_header_title .'</h2>';	
					endif;
				?>
				<?php 
                    if( have_rows('about_header_detail') ):
                        while( have_rows('about_header_detail') ) : the_row();
                ?>
                	<p data-aos="fade-up"><?php echo get_sub_field('header_detail_section'); ?></p>
                    <?php endwhile; endif; ?>
	        </div>
		</div>
	</section>

	<div class="about-lg-img reveal-wrapper" data-aos="fade-up">
        <div class="reveal-img">
    		<?php
    			$about_lg_img = get_field('about_large_image');
    			if( $about_lg_img ) :
    				$lg_img_url = $about_lg_img['url']; 
    				echo '<img src="'.$lg_img_url.'" />';
    			endif;
    		?>
        </div>
	</div>
</div>

<div class="container">
	<div class="combo-section our-values-features">
		<section class="associated">
			<div class="inner-section">
				<?php
					$value_feature_tag = get_field('our_val_tag_line', 'option');
					if( $value_feature_tag ) : 
						echo '<div class="tag">'. $value_feature_tag .'</div>';
					endif;
				?>
				<div class="section-header with-short-detail">
					<?php
						$about_val_sub_title = get_field('about_val_sub_title', 'option');
						if( $about_val_sub_title ):
							echo '<h3><span data-aos="fade-up" data-aos-duration="1000">'. $about_val_sub_title .'</span></h3>';	
						endif;

						$about_val_title = get_field('about_val_title', 'option');
						if( $about_val_title ):
							echo '<h2 class="section-heading"><span data-aos="fade-up" data-aos-duration="1000">'. $about_val_title .'</span></h2>';	
						endif;

						$about_val_detail = get_field('about_val_detail', 'option');
						if( $about_val_detail ):
							echo '<p data-aos="fade-up" data-aos-duration="1000">'. $about_val_detail .'</p>';	
						endif;
					?>			                	
	            </div>
				
				<div class="our-value-features-container">
					<div class="row">
						<?php 
			                if( have_rows('value_feature_blocks', 'option') ):
                                $post_counter = 1;
			                    while( have_rows('value_feature_blocks', 'option') ) : the_row();
			            ?>
				            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12" data-aos="fade-right" data-aos-duration="1500" >
				            	<div class="feature-wrap">
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
			</div>	
		</section>

		<section class="who-we-are-wrapper">
			<div class="section-header">
				<?php
					$who_v_are_sub_title = get_field('who_we_are_sub_title');
					if( $who_v_are_sub_title ):
						echo '<h3><span data-aos="fade-up"  data-aos-duratioin="1000">'. $who_v_are_sub_title .'</span></h3>';	
					endif;

					$who_v_are_title = get_field('who_we_are_title');
					if( $who_v_are_title ):
						echo '<h2 class="section-heading"><span data-aos="fade-up"  data-aos-duratioin="1000">'. $who_v_are_title .'</span></h2>';	
					endif;
				?>
	        </div>
	        <div class="row who-we-are">
				<?php 
	                if( have_rows('who_we_are_features') ):
	                    while( have_rows('who_we_are_features') ) : the_row();
	            ?>
		            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12" data-aos="fade-right" data-aos-duration="1500">
		            	<div class="feature-wrap">
							<?php
								$who_v_are_icon = get_sub_field('who_we_are_icon');
								if( $who_v_are_icon ) : 
									$who_v_are_icon_url = $who_v_are_icon['url'];
									echo '<div class="icon-wrapper"><img src="'. $who_v_are_icon_url .'" alt="" /></div>';
								endif;

								$who_v_are_feature_title = get_sub_field('who_we_are_feature_title');
								if( $who_v_are_feature_title ) : 
									echo '<h4>'. $who_v_are_feature_title .'</h4>';
								endif;

								$who_v_are_desc = get_sub_field('who_we_are_desc');
								if( $who_v_are_desc ) : 
									echo '<p>'. $who_v_are_desc .'</p>';
								endif;

								$who_v_are_link = get_sub_field('who_we_are_link');
								if( $who_v_are_link ) : 
									$who_v_are_link_url = $who_v_are_link['url'];
									$who_v_are_link_title = $who_v_are_link['title'];

									echo '<a href="'.$who_v_are_link_url.'" class="link-with-arrow reveal-effact">'.$who_v_are_link_title.'</a>';
								endif;
							?>			
						</div>
					</div>
                <?php endwhile; endif; ?>
	        </div>
		</section>
	</div>
</div>

<section class="team-members hide">
    <span class="blur-light rellax" data-rellax-speed="5"></span>
	<div class="container sm">
		<div class="section-header">
			<?php
				$team_member_title = get_field('team_member_sec_title');
				if( $team_member_title ):
					echo '<h2 class="section-heading"><span data-aos="fade-up"  data-aos-duratioin="1000">'. $team_member_title .'</span></h2>';	
				endif;

				$team_member_description = get_field('team_member_sec_description');
				if( $team_member_description ):
					echo '<p><span data-aos="fade-up"  data-aos-duratioin="1000">'. $team_member_description .'</span></p>';	
				endif;
			?>
			
        </div>
	</div>
	<div class="team-member-photos-galary clear">
		<div class="row">
			<?php 
			    if( have_rows('team_member_images') ):
                    $counter = 1;
			        while( have_rows('team_member_images') ) : the_row();
			?>
			    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12" data-aos="fade-in" data-aos-duration="1500">
			    	<div class="feature-wrap">
						<?php
							$team_mem_photo = get_sub_field('team_member_photo');
							if( $team_mem_photo ) : 
								$team_mem_photo_url = $team_mem_photo['url'];
								echo '<div class="img-wrap"><img src="'. $team_mem_photo_url .'" alt="" /></div>';
							endif;
						?>			
						<div class="member-info">
							<?php
								$team_mem_name = get_sub_field('team_member_name');
									if( $team_mem_name ) : 
										echo '<h4>'. $team_mem_name .'</h4>';
									endif;

									$team_mem_designation = get_sub_field('team_member_designation');
									if( $team_mem_designation ) : 
										echo '<p>'. $team_mem_designation .'</p>';
									endif;
							?>
						</div>
					</div>
				</div>
			<?php $counter++; endwhile; endif; ?>


		</div>
	</div>
</section>

<!-- Why Odyssey start  -->
<section class="why-ODC light-blue">
    <div class="container sm">
        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <div class="left rellax" data-rellax-speed="4">
                    <?php
                        $why_ODC_img = get_field('why_odc_title_img', 'option'); 
                        if( !empty($why_ODC_img) ): 
                            $url = $why_ODC_img['url'];
                        endif;
                    ?>
                    <img src="<?php echo $url; ?>" alt="">

                    <?php
                        $why_odc_title = get_field('why_odc_title', 'option');
                        if($why_odc_title): 
                            echo '<h2 class="section-heading"><span data-aos="fade-up" data-aos-duratioin="1000">' . $why_odc_title . '</span></h2>';
                        endif;

                        $why_odc_desc = get_field('why_odc_description', 'option');
                        if($why_odc_desc): 
                            echo '<p data-aos="fade-up" data-aos-duratioin="1000">' . $why_odc_desc . '</p>';
                        endif;

                        $Why_odc_more = get_field('more_about_us_button', 'option');
                        if($Why_odc_more): 
                            $link_url = $Why_odc_more['url'];
                            $link_title = $Why_odc_more['title'];
                            echo "<a href='".$link_url."' class='button green-outline reveal-effact'>" . $link_title . "</a>";
                        endif;
                    ?>
                </div>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">    
                <div class="right">
                    <span class="circles rellax" data-rellax-speed="4"></span>
                    <div class="feature-wrap-container clear">
                        <?php 
                            if( have_rows('odyssey_why_us_features', 'option') ):
                                while( have_rows('odyssey_why_us_features', 'option') ) : the_row();
                        ?>
                            <div class="feature-wrapper" data-aos="fade-up" data-aos-duration="1000">
                                <div class="icon-wrapper">
                                    <?php $why_icon = get_sub_field('feature_icon'); 
                                        echo '<img src="'.$why_icon['url'].'" class="lg" />';
                                    ?>

                                    <?php $small_featured_icon_whyODC = get_sub_field('small_featured_icon_whyODC'); 
                                        echo '<img src="'.$small_featured_icon_whyODC['url'].'" class="sm" />';
                                    ?>
                                </div>
                                <h3><?php the_sub_field('feature_title'); ?></h3>
                                <p><?php the_sub_field('feature_description', 'option'); ?><p>
                            </div>
                        <?php endwhile; endif; ?>
                    </div>
                    
                    <div class="btn-wrap">
                        <?php
                            $Why_odc_more = get_field('more_about_us_button', 'option');
                            if($Why_odc_more): 
                                $link_url = $Why_odc_more['url'];
                                $link_title = $Why_odc_more['title'];
                                echo "<a href='".$link_url."' class='button green-outline reveal-effact'>" . $link_title . "</a>";
                            endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section><!-- end -->

<!-- Clients start -->
<section class="client-wrapper all-brands">
    <div class="container sm">
    <div class="section-header">
    <?php
        $our_client_subTitle = get_field('client_sub_title', 'option');
        if($our_client_subTitle): 
            echo '<h3><span data-aos="fade-up" data-aos-duratioin="1000">'. $our_client_subTitle .'</span></h3>';
        endif;

        $our_client_title = get_field('client_title', 'option');
        if($our_client_title): 
            echo '<h2 class="section-heading"><span data-aos="fade-up" data-aos-duratioin="1000">'. $our_client_title .'</span></h2>';
        endif;
    ?>
    </div>
    
    <div class="client-brands-container">
        <ul class="client-brands row">
        <?php 
            if( have_rows('client_brands', 'option') ):
                while( have_rows('client_brands', 'option') ) : the_row();
        ?>
            <li class="col-md-3 col-sm-4 col-xs-6 wow animated fadeInUp">
                <?php
                    $client_logo = get_sub_field('client_brand_img');
                    echo '<img src="'.$client_logo['url'].'">';
                ?>
            </li>

        <?php endwhile; endif; ?>
        </ul>
    </div>

</section>
<!-- Clients end -->

<!-- Reviews start -->
<section class="reviews-conainer movement" id="testimonials">
    <span class="layred-circle rellax" data-rellax-speed="3"></span>
    <div class="container sm">
        <div class="section-header">
        <?php
            $review_subTitle = get_field('review_sub_title', 'option');
            if($review_subTitle): 
                echo '<h3><span data-aos="fade-up" data-aos-duratioin="1000">'. $review_subTitle .'</span></h3>';
            endif;

            $review_title = get_field('review_title', 'option');
            if($review_title): 
                echo '<h2 class="section-heading"><span data-aos="fade-up" data-aos-duratioin="1000">'. $review_title .'</span></h2>';
            endif;
        ?>
        </div>
        <div class="reviews">
            <ul class="owl-carousel owl-theme custom-carousel-nav fxSoftScale" id="reviews-slider">
            <?php 
                if( have_rows('reviews_comments', 'option') ):
                    while( have_rows('reviews_comments', 'option') ) : the_row();
            ?>
            <li>
                <div class="review-wrapper">
                    <span class="commas"></span>
                    <div class="review-detail">
                        <?php
                            $review_comment = the_sub_field('customer_comments');
                            if($review_comment): 
                                echo $review_comment;
                            endif;
                        ?>
                    </div>
                    <div class="cutomer-info">
                        <div class="cutomer-img">
                           <?php
                                $customer_img_type = get_sub_field('customer_image_type');
                                if($customer_img_type):
                                    echo '<img src="'. get_stylesheet_directory_uri() .'/assets/images/'.$customer_img_type.'-customer.svg" />';
                                endif;
                           ?>
                        </div>
                    
                        <div class="cutomer-detail">
                            <?php 
                                $c_name = get_sub_field('customer_name');
                                if($c_name):
                                    echo '<span class="name">'.$c_name.'</span>';
                                endif;

                                $c_desig = get_sub_field('customer_designation');
                                if($c_desig):
                                    echo '<span class="designation">'.$c_desig.'</span>';
                                endif;

                                $c_project_link = get_sub_field('related_project_link');
                                if($c_project_link):
                                    $c_pro_link = $c_project_link['url'];
                                    $c_pro_title = $c_project_link['title'];
                                    echo '<a href="'.$c_pro_link.'" target="_blank" data-list="list-item">'.$c_pro_title.'</a>';
                                endif;
                            ?>        
                        </div>
                    </div>
                </div>
            </li>
            <?php endwhile; endif;?>
                <!-- Services end-->  
            </ul>
        <div>
    </div>
</section>
<!-- Reviews end -->

<!-- grid-section section -->
<section class="right-grid-section be-a-part-wrapper">
    <div class="left rellax" data-rellax-speed="1">
    	<div class="section-header">
    		<?php
                $be_part_sub_title = get_field('be_a_part_sub_title', 'option');
                if($be_part_sub_title): 
                    echo '<h3><span data-aos="fade-up"  data-aos-duratioin="1000">' . $be_part_sub_title . '</span></h3>';
                endif;

                $be_part_title = get_field('be_a_part_title', 'option');
                if($be_part_title): 
                    echo '<h2 class="section-heading"><span data-aos="fade-up"  data-aos-duratioin="1000">' . $be_part_title . '</span></h2>';
                endif;

                $be_part_sub_desc = get_field('be_a_part_description', 'option');
                    if($be_part_sub_desc): 
                        echo "<p>" . $be_part_sub_desc . "</p>";
                endif;
            ?>
		</div>
    </div>
    <div class="right">
        <div class="img-wrap-1 reveal-wrapper" data-aos="fade-up">
            <div class="reveal-img">
    			<?php
                    $be_a_part_img_1 = get_field('be_a_part_image_1', 'option'); 
                    if( !empty($be_a_part_img_1) ): 
                        $url = $be_a_part_img_1['url'];
                        echo '<img src="'.$url.'" alt="" />';
                    endif;
                ?>
            </div>
        </div>
		<div class="images-wrap-row clear">
            <div class="img-12-3 reveal-wrapper" data-aos="fade-up">
                <div class="reveal-img">
    				<?php
                        $be_a_part_img_2 = get_field('be_a_part_image_2', 'option'); 
                        if( !empty($be_a_part_img_2) ): 
                            $url = $be_a_part_img_2['url'];
                            echo '<img src="'.$url.'" alt="" />';
                        endif;
                    ?>
                </div>
            </div>

            <div class="img-12-8 reveal-wrapper" data-aos="fade-up">
				<?php
                    $be_a_part_img_3 = get_field('be_a_part_image_3', 'option'); 
                    if( !empty($be_a_part_img_3) ): 
                        $url = $be_a_part_img_3['url'];
                        echo '<div class="reveal-img"><img src="'.$url.'" alt="" /></div>';
                    endif;

                    ?>
					<div class="more-be-a-part">
	                    <?php
			                $be_part_btn = get_field('be_a_part_button', 'option');
			                if($be_part_btn): 
			                	$link_url = $be_part_btn['url'];
			                	$link_title = $be_part_btn['title'];
			                    echo "<a href='".$link_url."'class='button green-outline reveal-effact'>" . $link_title . "</a>";
			                endif;
		                ?>
	            </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- part of Us end -->

<?php
	get_footer();
?>