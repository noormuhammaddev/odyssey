<?php
/**
 * Displays content for front page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
?>
<?php $bannerImage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
?>
<!-- Home page banner start -->
<!-- <div class="pre-loader-bar" id="pre_loader_bar">
    <div class="layer">
        <div class="bar">
            <div class="progres" id="progres"></div>
        </div>
        <input type="hidden" id="progress_width" value="0">
    </div>
</div> -->

<section class="home-banner">
    <div class="container sm clear">
        <div class="right movement">
            <span class="red-line rellax"></span>
            <span class="blue-circle rellax" data-rellax-speed="1"></span>
            <span class="white-circle rellax" data-rellax-speed="2"></span>
            <div class="img-holder">
                <img src="<?php echo  $bannerImage[0]; ?>" alt="" class="animated wow zoomIn">
            </div>
        </div>
        <div class="left">
            <div class="inner">
                <?php if( get_field('sub_title_home_banner') ): ?>
                <h2><span data-aos="fade-up" data-aos-duration="800"><?php the_field('sub_title_home_banner'); ?></span></h2>
                <?php endif; ?>

                <?php if( get_field('title_home_banner') ): ?>
                <h1><span data-aos="fade-up" data-aos-delay="300" data-aos-duration="800"><?php the_field('title_home_banner'); ?></span></h1>
                <?php endif; ?>

                <?php if( get_field('banner_description') ): ?>
                <p><span data-aos="fade-up" data-aos-delay="500" data-aos-duration="800"><?php the_field('banner_description'); ?></span></p>
                <?php endif; ?>

                <?php $banner_button = get_field('banner_button'); 
                    if( $banner_button ):
                        $btn_url = $banner_button['url'];
                        $btn_title = $banner_button['title'];
                        $btn_target = $banner_button['target'];

                        echo '<a href="'.$btn_url.'" target="'.$btn_target.'" class="button button-green reveal-effact">'.$btn_title.'</a>';
                    endif;
                ?>
            </div>
        </div>
    </div>
</section>
<!-- home page banner end -->

<!-- Project start -->
<section class="projects">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12 project-content" data-aos="fade-up" data-aos-duration="800">
				<div class="project-block static-content">
                    <?php if( get_field('company_name') ): ?>
                        <h2><?php the_field('company_name'); ?></h2>
                    <?php endif; ?>

                    
                    <div class="detail">
                        <?php if( get_field('company_detail') ): ?>
                            <?php the_field('company_detail'); ?>
                        <?php endif; ?>
                    </div>

                    <div class="learn-more">
                        <?php $company_link = get_field('about_company_link'); 
                            if( $company_link ):
                                $com_url = $company_link['url'];
                                $com_title = $company_link['title'];
                                $com_target = $company_link['target'];

                                echo '<a href="'.$com_url.'" target="'.$com_target.'" class="reveal-effact">'.$com_title.'</a>';
                            endif;
                        ?>
                    </div>

                </div>
			</div>
          
            <!-- Project loop start -->
            <?php
                $portfolio = new WP_Query(array('post_type' => 'portfolio', 'post_status' => 'publish'));
                if( $portfolio -> have_posts() ):
                    
                    while($portfolio -> have_posts()) : $portfolio->the_post(); ?>
                        <?php 
                            
                        ?>
                        <div class="col-md-6 col-sm-6 col-xs-12 project-content"  data-aos="fade-up" data-aos-duration="800">
                        <?php
                            $pro_background = get_field('project_background'); 
                            if($pro_background):
                                $bg_url =  $pro_background['url'];
                            endif;
                            $thumbnail_bg = get_field('project_thumbnail_background');
                            $text_color_theme = get_field('project_text_color_theme');
                        ?>
                            <a href="<?php the_permalink(); ?>" class="project-block reveal-effact <?php echo $text_color_theme; ?>" style="background: <?php echo $thumbnail_bg; ?> url('<?php echo $bg_url; ?>'); ">
                                <span class="right-arrow"></span>
                                <?php 
                                    $args = array('orderby' => 'name', 'order' => 'DESC', 'fields' => 'all');
                                    $proj_category = wp_get_post_terms( get_the_ID(), 'project-category', $args );
                                ?>
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
                        </div>
                <?php 
                endwhile; 
                endif;
                wp_reset_postdata();
            ?>
            
            <!-- Project loop end-->

            <!-- View All Work start -->
            <div class="col-md-6 col-sm-6 col-xs-12 project-content animated wow slideInUp" data-aos="fade-up" data-aos-duration="1000">
				<div class="project-block static-content">
					<div class="view-all-work">
                        <?php
                            $more_icon = get_field('view_all_icon'); 
                            $url = $more_icon['url'];
                            $view_all_works = get_field('view_all_text');
                            if( $view_all_works ):
                                $view_all_url = $view_all_works['url'] ;
                                $view_all_title = $view_all_works['title'] ;

                                echo '<a href="'.$view_all_url.'" class="reveal-effact"><span class="grid-img"><img src="'.$url.'" alt="" /></span>'.$view_all_title.'</a>';
                            endif;
                        ?>
					</div>
                </div>
			</div>
            <!-- View All Work end -->
		</div>
	</div>
</section>
<!-- Projects end -->



<!-- Our services start -->
<section class="services-wrapper">
    <span class="curve-obj shapes one rellax" data-rellax-speed="2" ></span>
    <div class="container sm">
        <div class="section-header">
            <?php if( get_field('services_sub_title') ): ?>
                <h3 data-aos="fade-up" data-aos-delay="100" data-aos-duration="800"><?php the_field('services_sub_title'); ?></h3>
            <?php endif; ?>
            
            <?php if( get_field('services_title') ): ?>
            <h2 class="section-heading" data-aos="fade-up" data-aos-delay="300" data-aos-duration="800"><?php the_field('services_title'); ?></h2>
            <?php endif; ?>

            <?php if( get_field('services_description') ): ?>
                <p data-aos="fade-up" data-aos-delay="500" data-aos-duration="800"><?php the_field('services_description'); ?></p>
            <?php endif; ?>
        </div>

        <?php $view_all_services = get_field('all_services_link'); 
            if($view_all_services):
                $view_all_ser_link = $view_all_services['url'];
                $view_all_ser_title = $view_all_services['title'];
                echo '<a href="'.$view_all_ser_link.'" class="view-all-services link-with-arrow reveal-effact">'.$view_all_ser_title.'</a>';
            endif;    
        ?>
        
        <div class="content-wrapper">
            <div class="row">
                <!-- Services start -->
                <?php
                    $services = new WP_Query(array('post_type' => 'services'));
                    if( $services -> have_posts() ):
                        while($services -> have_posts()) : $services->the_post(); ?>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
                                <div class="service-block">
                                    <div class="ser-icon">
                                        <?php
                                            $service_small_icon = get_field('service_small_icon');
                                            echo '<img src="'.$service_small_icon['url'].'" alt="" class="sm-icon" />';
                                        ?>
                                        <?php echo the_post_thumbnail(); ?>
                                    </div>
                                    <h4><a href="<?php the_permalink(); ?>" class="reveal-effact"><?php echo the_title(); ?></a></h4>
                                    <p class="ser-content"><?php echo the_excerpt(); ?></p>
                                    <a href="<?php the_permalink(); ?>" class="read-more reveal-effact">
                                        <span></span>
                                        <?php if( get_field('read_more_text') ): ?>
                                            <?php the_field('read_more_text'); ?>
                                        <?php endif; ?>
                                    </a>
                                </div>
                            </div>
                    <?php 
                    endwhile; 
                    endif;
                    wp_reset_postdata();
                ?>
                <!-- Services end-->    
            </div>
        </div>
    </div>
    <span class="blured-circle rellax" data-rellax-speed="6"></span>
</section>                                        
<!-- Our services end -->

<!-- Processes start -->
<section class="processes-wrapper">
    <div class="container sm">
        <div class="section-header">
            <?php
                $pro_sub_title = get_field('processes_sub_title');
                if($pro_sub_title): 
                    echo '<h3 data-aos="fade-up" data-aos-delay="100" data-aos-duration="800">'.$pro_sub_title.'</h3>';
                endif;
            
                $pro_title = get_field('processes_title');
                if($pro_title): 
                    echo '<h2 class="section-heading" data-aos="fade-up" data-aos-delay="300" data-aos-duration="800">'.$pro_title.'</h2>';
                endif;
            
                $pro_description = get_field('processes_description');
                if($pro_description): 
                    echo '<p data-aos="fade-up" data-aos-delay="500" data-aos-duration="800">'.$pro_description.'</p>';
                endif;
            ?>
        </div>

        <!-- Steps start -->
        <div class="steps-wrapper">
            <div class="circle-wrapper">
                <span class="left-c" ></span>
                <span class="right-c"></span>
            </div>
            <ul>
                <?php 
                    if( have_rows('step_sections') ):
                        $counter = 1;
                        while( have_rows('step_sections') ) : the_row();
                ?>
                    <li class="c<?php the_sub_field('circle_no'); ?>" data-aos="fade-up" data-aos-delay="<?php echo $counter.'00'; ?>" data-aos-duration="800">
                        <span class="circle c<?php the_sub_field('circle_no'); ?>"></span>
                        <span class="step"><?php the_sub_field('step_title'); ?></span>
                    </li>
                <?php $counter++; endwhile; endif; ?>     
            </ul>   
            
            <div class="steps-description-container">
                <?php 
                    if( have_rows('step_sections') ):
                        while( have_rows('step_sections') ) : the_row();
                ?>
                    <div class="steps-description" id="c<?php the_sub_field('circle_no'); ?>_content">
                        <h4><?php the_sub_field('step_title'); ?></h4>
                        <?php the_sub_field('step_description'); ?>
                    </div>
                <?php endwhile; endif; ?>             
            </div>

            <div>
                <?php $steps_more_link = get_field('steps_learn_more'); 
                    if( $steps_more_link ):
                        $steps_url = $steps_more_link['url'];
                        $steps_title = $steps_more_link['title'];
                        $steps_target = $steps_more_link['target'];

                        echo '<a href="'.$steps_url.'" target="'.$steps_target.'" class="button green-outline reveal-effact">'.$steps_title.'</a>';
                    endif;
                ?>
            </div>
        </div><!-- end -->
    </div>
</section><!-- end -->

<!-- Why Odyssey start -->
<section class="why-ODC">
    <div class="container sm">
        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <div class="left rellax" data-rellax-speed="8">
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
                            echo "<h2 class='section-heading'  data-aos='fade-up' data-aos-delay='100' data-aos-duration='800'>" . $why_odc_title . "</h2>";
                        endif;

                        $why_odc_desc = get_field('why_odc_description', 'option');
                        if($why_odc_desc): 
                            echo "<p data-aos='fade-up' data-aos-delay='300' data-aos-duration='800'>" . $why_odc_desc . "</p>";
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
                    <span class="circles rellax" data-rellax-speed="5"></span>
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
                                echo "<a href='".$link_url."' class='button green-outline'>" . $link_title . "</a>";
                            endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section><!-- end -->

<!-- Clients start -->
<section class="client-wrapper">
    <div class="container sm">
        <div class="section-header">
            <?php
                $our_client_subTitle = get_field('client_sub_title', 'option');
                if($our_client_subTitle): 
                    echo '<h3 data-aos="fade-up" data-aos-delay="100" data-aos-duration="800">'. $our_client_subTitle .'</h3>';
                endif;

                $our_client_title = get_field('client_title', 'option');
                if($our_client_title): 
                    echo '<h2 class="section-heading" data-aos="fade-up" data-aos-delay="300" data-aos-duration="800">'. $our_client_title .'</h2>';
                endif;
            ?>
        </div>
    
    <div class="client-brands-container">
        <ul class="owl-carousel owl-theme custom-carousel-nav without-carousel" id="client-brands">
        <?php 
            if( have_rows('client_brands', 'option') ):
                while( have_rows('client_brands', 'option') ) : the_row();
        ?>
            <li data-aos="fade-left" data-aos-duration="1500">
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
<section class="reviews-conainer">
    <span class="layred-circle rellax" data-rellax-speed="2"></span>
    <div class="container sm">
        <div class="section-header">
        <?php
            $review_subTitle = get_field('review_sub_title', 'option');
            if($review_subTitle): 
                echo '<h3 data-aos="fade-up" data-aos-delay="100" data-aos-duration="800">'. $review_subTitle .'</h3>';
            endif;

            $review_title = get_field('review_title', 'option');
            if($review_title): 
                echo '<h2 class="section-heading" data-aos="fade-up" data-aos-delay="300" data-aos-duration="800">'. $review_title .'</h2>';
            endif;
        ?>
        </div>
        <a href="<?php echo get_site_url(); ?>/about/" class="button green-outline reveal-effact">More About Us</a>
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
                                    echo '<a href="'.$c_pro_link.'" target="_blank" class="reveal-effact">'.$c_pro_title.'</a>';
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