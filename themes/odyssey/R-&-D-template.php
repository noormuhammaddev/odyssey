<?php
	//Template Name: R&D
	get_header();
?>

<div class="reach-and-development">
	<div class="detail-header">
		<div class="container sm">
			<div class="layers-wrap right">
				<span class="layer-1"></span>
				<span class="layer-2"></span>
				<span class="layer-3"></span>
				<div class="inner-img-wrap">
					<?php  
						$rnd_img = get_field('rnd_landing_icon'); 

						if( $rnd_img ): 
							$rnd_img_url = $rnd_img['url'];
							echo '<img src="'.$rnd_img_url.'" alt="" />';
						endif;
					?>
				</div>
			</div>
			
			<div class="left rellax" data-rellax-speed="4">
				<?php
				    $rnd_sub_title = get_field('rnd_landing_sub_title');
				    if($rnd_sub_title): 
				        echo '<h3><span data-aos="fade-up" data-aos-delay="100" data-aos-duratioin="1000">' . $rnd_sub_title . '</span></h3>';
				    endif;

				    $rnd_title = get_field('rnd_landing_title');
				    if($rnd_title): 
				        echo '<h1 data-aos="fade-up" data-aos-delay="300" data-aos-duratioin="1000">' . $rnd_title . '</h1>';
				    endif;

					$rnd_desription = get_field('rnd_landing_desription');
				    if($rnd_desription): 
				        echo '<p  data-aos="fade-up" data-aos-delay="500" data-aos-duratioin="1000">' . $rnd_desription . '</p>';
				    endif;
				?>
					<!-- all services content start -->
					<div class="all-services">
						<ul>
							<?php
			                    $services = new WP_Query(array('post_type' => 'services'));
			                    if( $services -> have_posts() ):
			                        while($services -> have_posts()) : $services->the_post(); ?>
			                            <li>
			                            	<div class="container">
				                            	<div class="ser-icon">
				                            		<?php echo the_post_thumbnail(); ?>
				                            	</div>
				                            	<a href="<?php the_permalink(); ?>" class="reveal-effact">
			                                        <?php echo the_title(); ?>
			                                    </a>
			                                </div>
			                            </li>
			                    <?php endwhile; 
			                    endif;
			                    wp_reset_postdata();
			                ?>
						</ul>
					</div>
					<!-- all services content end -->

			</div>
		</div>
	</div>

	<div class="container">
		<div class="research-block-wrapper">
			<?php 
			    if( have_rows('rnd_detail_block') ):
			        while( have_rows('rnd_detail_block') ) : the_row();
			?>
			<div class="research-block">
				<div class="reserach-header" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
					<div class="icon-wrapper">
						<?php
				            $rnd_detail_ico = get_sub_field('rnd_detail_icon');
				            if ($rnd_detail_ico) :
				            	$rnd_detail_ico_url = $rnd_detail_ico['url'];
				            	echo '<img src="'. $rnd_detail_ico_url .'" alt="">';
				            endif;
				        ?>
					</div>
					<?php
			            $rnd_detail_title = get_sub_field('rnd_detail_title');
			            if ($rnd_detail_title) :
			            	echo '<h3>'. $rnd_detail_title .'</h3>';
			            endif;
			        ?>
				</div>
				<div class="reserach-body">
					<div class="lg-img reveal-wrapper" data-aos="fade-up">
						<?php
							
				            $rnd_detail_lg_img = get_sub_field('rnd_detail_lg_img');
				            if ($rnd_detail_lg_img) :
				            	$rnd_detail_lg_img_path = $rnd_detail_lg_img['url'];
				            	echo '<div class="reveal-img"><img src="'. $rnd_detail_lg_img_path .'" alt=""></div>';
				            endif;
				        ?>
					</div>
					
					<?php
			            $rnd_detail_sub_title = get_sub_field('rnd_detail_sub_title');
			            if ($rnd_detail_sub_title) :
			            	echo '<h4 data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">'. $rnd_detail_sub_title .'</h3>';
			            endif;

						$rnd_detail_description = get_sub_field('rnd_detail_description');
			            if ($rnd_detail_description) :
			            	echo '<p data-aos="fade-up" data-aos-delay="600"  data-aos-duration="1000">'. $rnd_detail_description .'</p>';
			            endif;

			            $rnd_detail_link = get_sub_field('rnd_detail_link');
			            if ($rnd_detail_link) :
			            	$rnd_detail_link_url = $rnd_detail_link['url'];
			            	$rnd_detail_link_title = $rnd_detail_link['title'];
			            	echo '<a href="'. $rnd_detail_link_url .'" class="button button-green reveal-effact" data-aos="fade-up" data-aos-delay="800"  data-aos-duration="1000">'. $rnd_detail_link_title .'</a>';
			            endif;
			        ?>
					
				</div>
			</div>

			<?php 

			endwhile; endif; ?>
		</div>
	</div>


	<!-- Our services start -->
	<section class="services-wrapper">
	    <div class="container">
	        <div class="section-header">
				<?php
					$rnd_ser_sub_title = get_field('rnd_ser_sub_title');
				    if($rnd_ser_sub_title): 
				        echo '<h3><span data-aos="fade-up" data-aos-delay="200" data-aos-duratioin="1000">' . $rnd_ser_sub_title . '</span></h3>';
				    endif;

				    $rnd_ser_sub_title = get_field('rnd_ser_sub_title');
				    if($rnd_ser_sub_title): 
				        echo '<h2 class="section-heading"><span data-aos="fade-up" data-aos-delay="500" data-aos-duratioin="1000">' . $rnd_ser_sub_title . '</span></h2>';
				    endif;
				?>


	        </div>

	        <?php $rnd_ser_all_link = get_field('rnd_ser_all_link'); 
	            if($rnd_ser_all_link):
	                $rnd_ser_all_link_url = $rnd_ser_all_link['url'];
	                $rnd_ser_all_link_title = $rnd_ser_all_link['title'];
	                echo '<a href="'.$rnd_ser_all_link_url.'" class="view-all-services link-with-arrow reveal-effact">'.$rnd_ser_all_link_title.'</a>';
	            endif;    
	        ?>
	        
	        <div class="content-wrapper">
	            <div class="row">
	                <!-- Services start -->
	                <?php
	                    $services = new WP_Query(array('post_type' => 'services', 'posts_per_page' => 3));
	                    if( $services -> have_posts() ):
	                        while($services -> have_posts()) : $services->the_post(); ?>
	                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12" data-aos="fade-up" data-aos-duration="1000">
	                                <div class="service-block ">
	                                    <div class="ser-icon">
											<?php
	                                            $service_small_icon = get_field('service_small_icon');
	                                            echo '<img src="'.$service_small_icon['url'].'" alt="" class="sm-icon" />';
	                                        ?>
	                                    	<?php echo the_post_thumbnail(); ?>
	                                    </div>
	                                    <h4><?php echo the_title(); ?></h4>
	                                    <p class="ser-content"><?php echo the_excerpt(); ?></p>
	                                    <a href="<?php the_permalink(); ?>" class="read-more reveal-effact light">
	                                        <span></span>
	                                        <?php if( get_field('read_more_text') ): ?>
	                                            <?php the_field('read_more_text'); ?>
	                                        <?php endif; ?>
	                                    </a>
	                                </div>
	                            </div>
	                    <?php endwhile; 
	                    endif;
	                    wp_reset_postdata();
	                ?>
	                <!-- Services end-->    
	            </div>
	        </div>
	    </div>
	</section>                                        
	<!-- Our services end -->
</div>






<?php
	get_footer();
?>