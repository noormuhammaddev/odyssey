<?php
	//Template Name: Projects Landing Page
	get_header();
?>

<div class="all-projects">
	<div class="container">
		<section class="career-header">
			<div class="section-header sm">
				<?php
					while ( have_posts() ) : the_post();
						echo '<h2 class="section-heading"><span data-aos="fade-up" data-aos-delay="100" data-aos-duratioin="1000">'. get_the_title() .'</span></h2>';
						echo '<div data-aos="fade-up" data-aos-delay="300" data-aos-duratioin="1000">'.get_the_content().'</div>';
						 
					endwhile;
				?>
			</div>
		</section>
		<!-- careers header end -->
		<div class="all-projects-wrapper">
			<div class="project-filters">
				
				<div>Show me</div>
				<div class="custom-dropdown" id="all_cats"> 
					<span class="selected-item">All Categories</span>
					<div class="dropdown">
						<ul id="filters" class="filters">
							<li data-filter="*" class="active button" data-category="all_categories">All Categories</li>
							<?php
								$pro_cats_list = get_terms( array(
								    'taxonomy' => 'project-category',
								    'hide_empty' => false,
								    'parent' => 0
								) );


			                	//$pro_cats_list = get_categories();
			                	$cat_array = array();
								if( $pro_cats_list ):
			                	foreach ($pro_cats_list as $cat) {
			                		$cat_name = $cat->name;
			                    	$cate_slug = $cat->slug;
			                    	$cat_array[] = $cat->term_id;
			                 ?>
			                    <li data-filter=".<?php echo $cate_slug; ?>" post-id="<?php echo $cat->term_id; ?>" class="button" data-category="<?php echo "parent_".$cat->term_id; ?>">
			                    	<?php echo $cat_name; ?>
			                     </li>
			            		<?php } 
			            		endif;
			            	?>
						</ul>
					</div>
				</div>
				<span class="divider"></span>
				<div class="inner">in</div>
				<div class="custom-dropdown" id="all_indus_wrapper">
					<span class="selected-item" id="all_indus">All industries</span>
					<div class="dropdown">
						<?php 
						 if( $_REQUEST["project_cate_id"] )
						  {
							$php_var = $_REQUEST['project_cate_id'];
							echo $php_var;
						  }
						?> 
						<ul class="filters">
						<?php 		
						$pro_cats = get_terms( array(
						    'taxonomy' => 'project-category',
						    'hide_empty' => false,
						) );
						?>
							<li class="active button" data-filter="*" data-category="all_categories">All industries</li>
							<?php

							$cat_id = $_POST['postID'];
							echo $cat_id;
			                	foreach ($cat_array as $cat_arr) {
			                		$term_id = $cat_arr;
									$taxonomy_name = 'project-category';
									$termchildren = get_term_children( $term_id, $taxonomy_name );
									foreach ($termchildren as $cats) {
										$term = get_term_by( 'id', $cats, $taxonomy_name ); ?>
											<li data-filter=".<?php echo $term->slug; ?>" post-id="<?php echo $term->term_id; ?>" class="button" data-category="<?php echo "parent_".$term_id; ?>">
						                    	<?php echo $term->name; ?>
						                     </li>
										<?php
						    		}
			                	}
			            	?>
						</ul>
					</div>
				</div>
			</div>
			<div class="projects-wrapper">
				<div class="row grid">
					<!-- Project loop start -->
		            <?php
		                $portfolio = new WP_Query(array('post_type' => 'portfolio', 'post_status' => 'publish'));
		                if( $portfolio -> have_posts() ):
		                    while($portfolio -> have_posts()) : $portfolio->the_post(); ?>
								<?php 
								 	$args = array('orderby' => 'name', 'order' => 'DESC', 'fields' => 'all', 'parent' => 0 );
								 	$args1 = array('orderby' => 'name', 'order' => 'DESC', 'fields' => 'all');
                                    $parent_categories = wp_get_post_terms( get_the_ID(), 'project-category', $args );
                                    $proj_category = wp_get_post_terms( get_the_ID(), 'project-category', $args1 );
                                ?>
                                
		                        <div class="col-md-6 col-sm-6 col-xs-12 project-content element-item <?php foreach ($proj_category as $proj_cat) {echo $proj_slugs = $proj_cat->slug." ";} ?>" data-category="<?php echo $parent_categories[0]->slug; ?>">
		                        	 <!-- data-aos="fade-up" data-aos-duration="1000" -->
		                        <?php
		                            $pro_background = get_field('project_background'); 
		                            if($pro_background):
		                                $bg_url =  $pro_background['url'];
		                            endif;

		                            $thumbnail_bg = get_field('project_thumbnail_background');
                            		$text_color_theme = get_field('project_text_color_theme');
		                        ?>
		                            <a href="<?php the_permalink(); ?>" class="project-block reveal-effact <?php echo $text_color_theme; ?>" style="background: <?php echo $thumbnail_bg; ?> url('<?php echo $bg_url; ?>'); ">
		                                <span  class="right-arrow"></span>
		                                <h3><?php echo $parent_categories[0]->name; ?></h3>
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
		                <?php 
		            		endwhile; 
		                endif;
		                wp_reset_postdata();
		            ?>
		            
		            <!-- Project loop end-->
				</div>
			</div>
		</div>

	</div>
</div>

<?php
	get_footer();
?>