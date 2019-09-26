<?php
	//Template Name: Processe
	get_header();
?>

<div class="our-processes">
	<section class="process-header">
		<div class="container sm clear">	
			<div class="object"></div><!--  data-aos="fade-left" data-aos-duration="1000" -->

			<div class="section-header" data-aos="fade-right" data-aos-duration="1000">
				<?php
					$process_sub_title = get_field('process_sub_title');
					if( $process_sub_title ):
						echo '<h3>'. $process_sub_title .'</h3>';	
					endif;

					$process_title = get_field('process_title');
					if( $process_title ):
						echo '<h2 class="section-heading">'. $process_title .'</h2>';	
					endif;

                    $process_description = get_field('process_description');
                    if( $process_description ):
                        echo '<p class="sm">'. $process_description .'</p>';   
                    endif;

				?>
				
	        </div>

		</div>
	</section>
</div>

<div class="container">

    <?php 
        if( have_rows('steps_repeater') ):
            while( have_rows('steps_repeater') ) : the_row();
    ?>
        
    <div class="combo-section processes-contain wow animated fadeInUp">
        <section class="associated">
            <div class="section-header">
                <?php
                    $process_step_no = get_sub_field('process_step_no');
                    if( $process_step_no ) : 
                        echo '<div class="step-number"><span class="circle"></span><span class="lbl">Step 0'.$process_step_no.'</span></div>';
                    endif;

                    $process_step_title = get_sub_field('process_step_title');
                    if( $process_step_title ) : 
                        echo '<h2 class="section-heading">'.$process_step_title.'</h2>';
                    endif;

                    $process_step_sub_title = get_sub_field('process_step_sub_title');
                    if( $process_step_sub_title ) : 
                        echo '<p class="lg" data-aos="fade-up" data-aos-duration="1000">'.$process_step_sub_title.'</p>';
                    endif;

                    $process_step_description = get_sub_field('process_step_description');
                    if( $process_step_description ) : 
                        echo '<p data-aos="fade-up" data-aos-duration="1000">'.$process_step_description.'</p>';
                    endif;

                    $process_step_tag = get_sub_field('process_step_tag');
                    if( $process_step_tag ) : 
                        echo '<div class="tag">'.$process_step_tag.'</div>';
                    endif;
                ?>
            </div>
            <?php
                 $process_step_upload_image = get_sub_field('process_step_upload_image');
                    if( $process_step_upload_image ) : 
                        $process_step_upload_image_url = $process_step_upload_image['url'];
                        echo '<div class="img-lg"><img src="'.$process_step_upload_image_url.'" /></div>';
                    endif;
            ?>
            <div class="inner-section clear">
                <?php
                    $process_step_more_details_title = get_sub_field('process_step_more_details_title');
                    if( $process_step_more_details_title ) : 
                        echo '<h3>'.$process_step_more_details_title.'</h3>';
                    endif;
                ?>

                <div class="more-desc">
                    <?php
                        $process_step_more_details_sub_title = get_sub_field('process_step_more_details_sub_title');
                        if( $process_step_more_details_sub_title ) : 
                            echo '<h4>'.$process_step_more_details_sub_title.'</h4>';
                        endif;

                        $process_step_more_description = get_sub_field('process_step_more_description');
                        if( $process_step_more_description ) : 
                            echo '<p>'.$process_step_more_description.'</p>';
                        endif;
                    ?>
                </div>
            </div>  
        </section>

        
    </div>
    <?php endwhile; endif; ?>

</div>



<?php
	get_footer();
?>