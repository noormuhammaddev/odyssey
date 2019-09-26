<?php
	//Template Name: Services Landing page
	get_header();
?>

<div class="services-landing-wrapper">
	<div class="container">
		<div class="services-nav">
			<ul class="all-services-list">
				<?php
		            $services = new WP_Query(array('post_type' => 'services'));
		            if( $services -> have_posts() ):
		            	$counter = 1;
		                while($services -> have_posts()) : $services->the_post(); $half = $counter/5; ?>
						
						<li><a href="#post_<?php echo the_ID(); ?>" data-list="list-item" class="list-item animated wow slideInUp" data-wow-delay="<?php echo $half.'s' ?>"><?php echo the_title(); ?></a></li>
					<?php $counter++; endwhile; 
		            endif;
		            wp_reset_postdata();
		        ?>
		        <li><a href="#rnd_list" data-list="list-item" class="list-item animated wow slideInUp" data-wow-delay="1.4s">Research & Development</a></li>
			</ul>
		</div>
		
		<div class="service-wrapper">
			<?php
	            $services = new WP_Query(array('post_type' => 'services'));
	            if( $services -> have_posts() ):
	                while($services -> have_posts()) : $services->the_post(); ?>
	                    <div class="service-block"  data-aos="fade-down" id="post_<?php echo the_ID(); ?>">
	                    	<div class="text-layer-wrapper">
	                    		<!-- <div class="text-layer" data-aos="fade-" data-wow-delay=".5s"></div> -->
	                        	<div class="ser-icon" data-aos="fade-left" data-aos-duration="500" data-aos-delay="300">
		                        	<?php echo the_post_thumbnail(); ?>
	                        	</div>

		                        <h4  data-aos="fade-left" data-aos-duration="500"  data-aos-delay="400"><?php echo the_title(); ?></h4>
		                    </div>
	                        <p><?php echo the_content(); ?></p>

							<div class="img-lg reveal-wrapper" data-aos="fade-up">
								<div class="reveal-img">
									<?php 
										$lg_img = get_field('service_large_image'); 
										if( $lg_img ): 
											$lg_img_url = $lg_img['url'];
											echo '<img src="'.$lg_img_url.'" />';
										endif;
									?>
								</div>
							</div>

							<!-- Technologies start -->	
								<?php 
									$tech = get_field('service_technologies');


								// check
								if( $tech ): ?>
								<ul class="technologies">
									<?php $counter = 1; ?>
									<?php foreach( $tech as $technology ):?>

									<li data-aos="fade-up" data-aos-delay="<?php echo $counter.'00'; ?>"><?php echo $technology['label']; ?></li>
									
									
									<?php $counter++; endforeach; ?>
								</ul>
								<?php endif; ?>
							<!-- Technologies end -->	
								
	                        <a href="<?php the_permalink(); ?>" class="button button-green reveal-effact">
	                            <?php if( get_field('read_more_text') ): ?>
	                                <?php the_field('read_more_text'); ?>
	                            <?php endif; ?>
	                        </a>
	                    </div>
	            <?php endwhile; 
	            endif;
	            wp_reset_postdata();
	        ?>

	        <!-- Reasch & Development -->
	        <div class="service-block rnd animated wow fadeInUp" id="rnd_list">
                <div class="ser-icon">
                	<?php 
						$rnd_img = get_field('rnd_upload_image');
						if( $rnd_img ): 
							$rnd_img_url = $rnd_img['url'];
							echo '<img src="'.$rnd_img_url.'" alt="" data-aos="fade-left" data-aos-delay="100" />';
						endif;
					?>
                </div>
				
				<?php
                    $rnd_title = get_field('rnd_title');
	                if($rnd_title): 
	                    echo '<h4 data-aos="fade-left" data-aos-delay="300">' . $rnd_title . '</h4>';
	                endif;

	                $rnd_desription = get_field('rnd_desription');
	                if($rnd_desription): 
	                    echo "<p>" . $rnd_desription . "</p>";
	                endif;
                ?>
				<div class="img-lg reveal-wrapper" data-aos="fade-up">
					<div class="reveal-img">
						<?php 
							$rnd_large_image = get_field('rnd_upload_large_image'); 
							if( $rnd_large_image ): 
								$rnd_large_image_url = $rnd_large_image['url'];
								echo '<img src="'.$rnd_large_image_url.'" />';
							endif;
						?>
					</div>
				</div>

				<!-- Technologies start -->	
				<ul class="technologies">
					<?php 
					    if( have_rows('rnd_research_list') ):
					    	$counter = 1;
					        while( have_rows('rnd_research_list') ) : the_row();
					?>
					    <li data-aos="fade-up" data-aos-delay="<?php echo $counter.'00' ?>">
					        <?php
					            $rnd_add_list = get_sub_field('rnd_add_list');
					            echo $rnd_add_list;
					        ?>
					    </li>

					<?php $counter++; endwhile; endif; ?>
				</ul>
				<!-- Technologies end -->	
					
				<?php 
					$rnd_button = get_field('rnd_button');
	                if($rnd_button): 
	                	$rnd_button_url = $rnd_button['url'];
	                	$rnd_button_title = $rnd_button['title'];
	                    echo "<a href='".$rnd_button_url."'class='button button-green reveal-effact'>" . $rnd_button_title . "</a>";
	                endif;
				?>	
            </div>
		</div>
	</div>
</div>

<?php
	get_footer();
?>