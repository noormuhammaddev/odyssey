<?php
	//Template Name: Contact
	get_header();
?>

<div class="contact-wrapper">
	<section class="contact">
		<div class="container sm clear">
			<div class="dotted-circle" data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine"></div>
			<div class="contact-form">
				<div class="section-header">
					<?php
					    $contact_sub_title = get_field('contact_sub_title');
					    if($contact_sub_title): 
					        echo '<h3><span data-aos="fade-up"  data-aos-duratioin="1000">' . $contact_sub_title . '</span></h3>';
					    endif;

					    $contact_title = get_field('contact_title');
					    if($contact_title): 
					        echo '<h2 class="section-heading"><span data-aos="fade-up"  data-aos-duratioin="1000">' . $contact_title . '</span></h2>';
					    endif;

					    $contact_description = get_field('contact_description');
					    if($contact_description): 
					        echo '<p data-aos="fade-up"  data-aos-duratioin="1000">' . $contact_description . '</p>';
					    endif;
					?>
				</div>

				<div class="contact-form" data-aos="fade"  data-aos-duration="1000">
					<?php echo do_shortcode( '[contact-form-7 id="485" title="Contact form 1"]' ); ?>

				</div>
			</div>
			
		</div>
	</section>

	<div class="contact-info-wrapper">
		<div class="container">
			<div class="left">
				<div class="inner">
					<?php
						$contact_info_title = get_field('contact_info_title');
						if($contact_info_title):
							echo '<h3><span data-aos="fade-up"  data-aos-duratioin="1000">'.$contact_info_title.'</span></h3>';	
						endif;
					?>
					
					<?php
						$contact_info_address = get_field('contact_info_address');
						$address_line_2 = get_field('address_line_2');
			            if( $contact_info_address ) :	
				            echo '<div class="address"><span><span data-aos="fade-up">'. $contact_info_address .'</span></span><br /><span><span data-aos="fade-up">'.$address_line_2.'</span></span></div>';
				        endif;
					?>
					
					<ul class="more-contact-info clear">
						<?php 
						    if( have_rows('more_contact_information') ):
						    	$counter = 1;
						        while( have_rows('more_contact_information') ) : the_row();
						?>
						    <li data-aos-easing="ease-in-sine">
						        <?php
						            $contact_info_lbl = get_sub_field('contact_info_label');
						            if( $contact_info_lbl ) :	
							            echo '<label><div data-aos="fade-up" >'. $contact_info_lbl .'</div></label>';
							        endif;

							        $contact_link_info_internal_link = get_sub_field('contact_link_info_internal_link');

							        if($contact_link_info_internal_link){
							        	$interl_link = $contact_link_info_internal_link;	
							        }else{
							        	$interl_link = 'javascript:void(0)';
							        }

							        $contact_info_info = get_sub_field('contact_info_information');

						            if( $contact_info_info ) :	
							            echo '<span><a href="'. $interl_link .'" data-aos="fade-up" >'. $contact_info_info .'</a></span>';
							        endif;
						        ?>
						    </li>
						<?php $counter=$counter+3; endwhile; endif; ?>
					</ul>
				</div>
			</div>
		</div>
		<div class="right" data-aos="fade-up" data-aos-offset="300" data-aos-duration="500" data-aos-easing="ease-in-sine">
			<div class="map-img"></div>
			<span class="layred-circle rellax" data-rellax-speed="2">
		</div>
	</div>
</div>

<?php
	get_footer();
?>