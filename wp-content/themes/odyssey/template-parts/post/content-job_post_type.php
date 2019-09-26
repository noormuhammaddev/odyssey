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

<article id="post-<?php the_ID(); ?>" <?php post_class('careers'); ?>>
	<?php
	if ( is_sticky() && is_home() ) :
		echo twentyseventeen_get_svg( array( 'icon' => 'thumb-tack' ) );
	endif;
	?>
	
	<div class="career-wrapper">
		<section class="career-header">
			<a href="#apply_for_position" class="button button-green" data-list="list-item">Apply Now</a>
			<div class="section-header">
				<a href="<?php echo get_site_url();?>/careers" class="see-all-jobs">See all jobs</a>
				<h2 class="section-heading"><?php echo the_title(); ?></h2>
				<p><?php echo the_content(); ?></p>

			</div>
		</section>
		<!-- career header end -->

		<div class="career-carousel">
	        <ul class="owl-carousel owl-theme custom-carousel-nav" id="client-brands">
	        <?php 
	            if( have_rows('career_gallary_images', 'option') ):
	                while( have_rows('career_gallary_images', 'option') ) : the_row();
	        ?>
	            <li data-aos="fade-in" data-aos-duration="1000" data-aos-delay="500" data-aos-offset="200">
	                <?php
	                    $_career_image = get_sub_field('upload_career_image');
	                    echo '<img src="'.$_career_image['url'].'">';
	                ?>
	            </li>

	        <?php endwhile; endif; ?>
	        </ul>
	    </div>
		<!-- Image gallary end -->

		<?php
			$responsibilities_title = get_field('responsibilities_title');
			if($responsibilities_title){
		?>
			<section class="col-widget blue-2">
				<span class="dotted-circle-light"></span>
				<h4><?php echo $responsibilities_title; ?></h4>	
				<div class="description">
					<ul class="dotted-list green">
						<?php 
						    if( have_rows('add_responsibilities') ):
						        while( have_rows('add_responsibilities') ) : the_row();
						?>
						    <li>
						        <?php
						            $responsibility_list = get_sub_field('responsibility_list');
						            echo $responsibility_list;
						        ?>
						    </li>
						<?php endwhile; endif; ?>
					</ul>
				</div>
			</section>
		<?php
			}
		?>
		<!-- responsibilities end -->

		<?php
			$requirements_title = get_field('requirements_title');
			if($requirements_title){
		?>
			<section class="col-widget dark-blue">
				<h4><?php echo $requirements_title; ?></h4>	
				<div class="description">
					<ul class="dotted-list green">
						<?php 
						    if( have_rows('add_requirement') ):
						        while( have_rows('add_requirement') ) : the_row();
						?>
						    <li>
						        <?php
						            $requirement_list = get_sub_field('requirement_list');
						            echo $requirement_list;
						        ?>
						    </li>
						<?php endwhile; endif; ?>
					</ul>
				</div>
			</section>
		<?php
			}
		?>
		<!-- requirements end -->

		<?php
			$bonus_point_title = get_field('bonus_point_title');
			if($bonus_point_title){
		?>
			<section class="col-widget blue">
				<h4><?php echo $bonus_point_title; ?></h4>	
				<div class="description">
					<ul class="dotted-list green">
						<?php 
						    if( have_rows('add_bonus_points') ):
						        while( have_rows('add_bonus_points') ) : the_row();
						?>
						    <li>
						        <?php
						            $bonus_list = get_sub_field('bonus_list');
						            echo $bonus_list;
						        ?>
						    </li>
						<?php endwhile; endif; ?>
					</ul>
				</div>
			</section>
		<?php
			}
		?>
		<!-- bonus end -->

		<div class="ODC-life">
			<?php
				$odc_life_lg_image = get_field('odc_life_lg_img', 'option');
				$odc_life_title = get_field('odc_life_tit', 'option');
				$odc_life_desc = get_field('odc_life_description', 'option');

				if($odc_life_lg_image) :
					$odc_life_lg_img_url = $odc_life_lg_image['url'];
					echo '<div class="life-image"><img src="'.$odc_life_lg_img_url.'" /></div>';
				endif;


				echo '<div class="inner clear">';

					if($odc_life_title) :
						echo '<div class="title-section"><h4>'.$odc_life_title.'</h4></div>';
					endif;

					if($odc_life_desc) :
						echo '<div class="description-section"><p>'.$odc_life_desc.'</p></div>';
					endif;
				echo '</div>';
			?>
		</div>
		<!-- Life@ODC -->

		<section id="apply_for_position">
			<div class="apply-job-form clear">
				<div id="before_apply">
					<div class="section-header">
						<?php
							$apply_sub_title = get_field('apply_job_sub_title_before', 'option');
							if( $apply_sub_title ):
								echo '<h3>'.$apply_sub_title.'</h3>';	
							endif;

							$apply_position_title = get_field('apply_job_title_before', 'option');
							if( $apply_position_title ):
								echo '<h2 class="section-heading">'.$apply_position_title.'</h2>';	
							endif;
						?>
					</div>

				</div>
				<div class="form-section">
					<?php 
						echo aol_form(get_the_ID());
					?>
				</div>
				<div class="right-obj dotted-circle"></div>
			</div>
		</section>

		

	</div>
</article><!-- #post-## -->