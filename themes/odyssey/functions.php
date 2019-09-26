<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
 function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'theme-default', get_stylesheet_directory_uri() . '/assets/dist/css/default.min.css', false, '1.4.0', 'all');
    wp_enqueue_style( 'aos-css', 'https://unpkg.com/aos@2.3.1/dist/aos.css');
 }
 function mycustomscript_enqueue() {
 	wp_enqueue_script( 'jquery', get_stylesheet_directory_uri() . '/assets/dist/js/jquery-2.2.4.min.js', array( 'jquery' ));
	wp_enqueue_script( 'bootstrapJS', 'https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js' , array( 'jquery' ));
	wp_enqueue_script( 'owl-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', array( 'jquery' ));
	wp_enqueue_script( 'isotops', 'https://unpkg.com/isotope-layout@3.0.6/dist/isotope.pkgd.min.js', array( 'jquery' ));
	wp_enqueue_script( 'aos-js', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array( 'jquery' ));
	wp_enqueue_script( 'wow-js', 'https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js', array( 'jquery' ));
	wp_enqueue_script( 'rellax', get_stylesheet_directory_uri() . '/assets/dist/js/rellax.min.js', array( 'jquery' ), true);
	wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/assets/dist/js/custom.js', array( 'jquery' ), '0.4.4', true);
	wp_enqueue_script( 'ajax-call', get_stylesheet_directory_uri() . '/assets/dist/js/ajaxCall.js', array( 'jquery' ), '0.0.2', true);

	wp_localize_script( 'ajax-call', 'ajaxUrlObj', array(
		'ajax_url' => admin_url( 'admin-ajax.php' )
	));	
 }
 add_action( 'wp_enqueue_scripts', 'mycustomscript_enqueue' );
 add_filter( 'wpcf7_autop_or_not', '__return_false' );

 register_nav_menus(array(
	'footer' => __('Footer Menu', 'odyssey-footer-menu'),
	'terms_condition' => __('Footer Terms and Conditions Menu', 'odyssey-termsAndCodition-menu'),
 ));

/*custom image size*/
if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'custom-featured-thumbnail', 237, 237, true );
	add_image_size( 'custom-slider-thumbnail', 478, 500, true );
}

//filters
remove_filter('the_content','wpautop'); 
remove_filter( 'the_excerpt', 'wpautop' );

 //* Add support for custom flexible header
 function logo_size_change(){
     remove_theme_support( 'custom-logo' );
     add_theme_support( 'custom-logo', array(
         'height'      => 100,
         'width'       => 400,
         'flex-height' => true,
         'flex-width'  => true,
     ) );
 }
 add_action( 'after_setup_theme', 'logo_size_change', 11 );

 //SVG support
 function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
  }
  add_filter('upload_mimes', 'cc_mime_types');

// Register Custom Post Type
function odyssey_projects_posts() {
	$labels = array(
		'name'                  => _x( 'Projects', 'Post Type General Name', 'portfolio' ),
		'singular_name'         => _x( 'Projects', 'Post Type Singular Name', 'portfolio' ),
		'menu_name'             => __( 'Projects', 'portfolio' ),
		'name_admin_bar'        => __( 'Projects', 'portfolio' ),
		'archives'              => __( 'Projects Archives', 'portfolio' ),
		'attributes'            => __( 'Projects Attributes', 'portfolio' ),
		'parent_item_colon'     => __( 'Parent Item:', 'portfolio' ),
		'all_items'             => __( 'All Items', 'portfolio' ),
		'add_new_item'          => __( 'Add New Project', 'portfolio' ),
		'add_new'               => __( 'Add New Project', 'portfolio' ),
		'new_item'              => __( 'New Item Project', 'portfolio' ),
		'edit_item'             => __( 'Edit Item Project', 'portfolio' ),
		'update_item'           => __( 'Update Project', 'portfolio' ),
		'view_item'             => __( 'View Project', 'portfolio' ),
		'view_items'            => __( 'View Projects', 'portfolio' ),
		'search_items'          => __( 'Search Item', 'portfolio' ),
		'not_found'             => __( 'Not found', 'portfolio' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'portfolio' ),
		'featured_image'        => __( 'Featured Image', 'portfolio' ),
		'set_featured_image'    => __( 'Set featured image', 'portfolio' ),
		'remove_featured_image' => __( 'Remove featured image', 'portfolio' ),
		'use_featured_image'    => __( 'Use as featured image', 'portfolio' ),
		'insert_into_item'      => __( 'Insert into item', 'portfolio' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'portfolio' ),
		'items_list'            => __( 'Items list', 'portfolio' ),
		'items_list_navigation' => __( 'Items list navigation', 'portfolio' ),
		'filter_items_list'     => __( 'Filter items list', 'portfolio' ),
	);
	$args = array(
		'label'                 => __( 'Projects', 'portfolio' ),
		'description'           => __( 'Odyssey Projects', 'portfolio' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'portfolio', $args );
}

/* Register projects taxonomy/catergory */
add_action( 'init', 'create_project_tax' );
function create_project_tax() {
	register_taxonomy(
		'project-category',
		'portfolio',
		array(
			'label' => __( 'Project Catergory' ),
			'rewrite' => array( 'slug' => 'project-cat' ),
			'hierarchical' => true,
		)
	);
}
add_action( 'init', 'odyssey_projects_posts', 0 );
 /* custom post type end */

/* Services custom post type start */
	function services() {
	
		$labels = array(
			'name'                  => _x( 'services_posts', 'Post Type General Name', 'odysseyComputingServices' ),
			'singular_name'         => _x( 'Services Post Type', 'Post Type Singular Name', 'odysseyComputingServices' ),
			'menu_name'             => __( 'Services', 'odysseyComputingServices' ),
			'name_admin_bar'        => __( 'Services Post Type', 'odysseyComputingServices' ),
			'archives'              => __( 'Services Item Archives', 'odysseyComputingServices' ),
			'attributes'            => __( 'Services Item Attributes', 'odysseyComputingServices' ),
			'parent_item_colon'     => __( 'Services Parent Item:', 'odysseyComputingServices' ),
			'all_items'             => __( 'Services All Items', 'odysseyComputingServices' ),
			'add_new_item'          => __( 'Add New Service', 'odysseyComputingServices' ),
			'add_new'               => __( 'Add New Service', 'odysseyComputingServices' ),
			'new_item'              => __( 'New Service', 'odysseyComputingServices' ),
			'edit_item'             => __( 'Edit Service', 'odysseyComputingServices' ),
			'update_item'           => __( 'Update Service', 'odysseyComputingServices' ),
			'view_item'             => __( 'View Service', 'odysseyComputingServices' ),
			'view_items'            => __( 'View Services', 'odysseyComputingServices' ),
			'search_items'          => __( 'Search Service', 'odysseyComputingServices' ),
			'not_found'             => __( 'Service Not found', 'odysseyComputingServices' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'odysseyComputingServices' ),
			'featured_image'        => __( 'Service Featured Image', 'odysseyComputingServices' ),
			'set_featured_image'    => __( 'Set featured image', 'odysseyComputingServices' ),
			'remove_featured_image' => __( 'Remove featured image', 'odysseyComputingServices' ),
			'use_featured_image'    => __( 'Use as featured image', 'odysseyComputingServices' ),
			'insert_into_item'      => __( 'Insert into item', 'odysseyComputingServices' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'odysseyComputingServices' ),
			'items_list'            => __( 'Items list', 'odysseyComputingServices' ),
			'items_list_navigation' => __( 'Items list navigation', 'odysseyComputingServices' ),
			'filter_items_list'     => __( 'Filter items list', 'odysseyComputingServices' ),
		);
		$args = array(
			'label'                 => __( 'Services', 'odysseyComputingServices' ),
			'description'           => __( 'Services post type', 'odysseyComputingServices' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'services', $args );
	
	}
	add_action( 'init', 'services', 0 );

	//Services Category
	add_action( 'init', 'create_services_tax' );
	function create_services_tax() {
		register_taxonomy(
			'services-category',
			'services',
			array(
				'label' => __( 'Service Catergories' ),
				'rewrite' => array( 'slug' => 'service-category' ),
				'hierarchical' => true,
			)
		);
	}
 /* Services custom post type end */

// Register Job Custom Post Type
function job_post_type() {
	$labels = array(
		'name'                  => _x( 'Job Post Types', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Job Post Type', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Job Post Types', 'text_domain' ),
		'name_admin_bar'        => __( 'Job Post Type', 'text_domain' ),
		'archives'              => __( 'Job Item Archives', 'text_domain' ),
		'attributes'            => __( 'Job Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Job Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Jobs', 'text_domain' ),
		'add_new_item'          => __( 'Add New Job', 'text_domain' ),
		'add_new'               => __( 'Add New Job', 'text_domain' ),
		'new_item'              => __( 'New Job', 'text_domain' ),
		'edit_item'             => __( 'Edit Job', 'text_domain' ),
		'update_item'           => __( 'Update Job', 'text_domain' ),
		'view_item'             => __( 'View Job', 'text_domain' ),
		'view_items'            => __( 'View Jobs', 'text_domain' ),
		'search_items'          => __( 'Search Job', 'text_domain' ),
		'not_found'             => __( 'Job Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Job Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Jobs list', 'text_domain' ),
		'items_list_navigation' => __( 'Jobs list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Jobs list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Job Post Type', 'text_domain' ),
		'description'           => __( 'Job Post Type Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'custom-fields' ),
		'taxonomies'            => array( 'Job category', 'job_post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'job_post_type', $args );

}
add_action( 'init', 'job_post_type', 0 );
/*job custom post type end*/


 /* widgets */
 function odyssey_widget_init(){
    register_sidebar(array(
        'name' => __('Footer Contact no', 'odyssey footer'),
        'id' => 'footer_contact_no',
        'description' => __('Footer contact Number', 'odyssey'),
        'before_widget' => '<artical class="">',
        'after_widget' => '</artical>',
        'before_title' => '<h3 class="">',
        'after_title' => '</h3>',
	));
	    
}
add_action('widgets_init', 'odyssey_widget_init');

/*add options page for ACF*/
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
} //end

function wpartisan_excerpt_label( $translation, $original ) {
    if ( 'Excerpt' == $original ) {
        return __( 'Brief Description' );
    } elseif ( false !== strpos( $original, 'Short Desc' ) ) {
        return __( 'Brief Description' );
    }
    return $translation;
}
add_filter( 'gettext', 'wpartisan_excerpt_label', 10, 2 );

//
add_action( 'wp_footer', 'ajax_fetch' );
function ajax_fetch() {
?>
<script type="text/javascript">

function fetch(){
    jQuery.ajax({
        url: '<?php echo admin_url('admin-ajax.php'); ?>',
        type: 'post',
        data: { action: 'data_fetch', keyword: jQuery('#keyword').val() },
        success: function(data) {
            jQuery('#datafetch').html( data );
            //console.log('data ', data);
            var totalSearchCount = jQuery('#datafetch').find('.post-grid').length;
            jQuery('#searchCount').text(totalSearchCount);
        }

    });

}
</script>

<?php
}

////
add_action('wp_ajax_data_fetch' , 'data_fetch');
add_action('wp_ajax_nopriv_data_fetch','data_fetch');
function data_fetch(){
    $the_query = new WP_Query( array( 'posts_per_page' => -1, 's' => esc_attr( $_POST['keyword'] ), 'post_type' => 'post' ) );
    if( $the_query->have_posts() ) :
        while( $the_query->have_posts() ): $the_query->the_post(); ?>
            <div class="post-grid clear">
                <a href="<?php echo the_permalink(); ?>" class="thumbnail-wrapper"><?php echo the_post_thumbnail('custom-featured-thumbnail'); ?></a>
                <div class="post-content">
                	<div class="category-name"><?php echo the_category(); ?></div>
                    <h3><?php echo the_title(); ?></h3>
                    <div class="reading-time">
                    	<?php echo  do_shortcode('[rt_reading_time]') ?> min read
                    </div>
                    <!-- <div class="author"><?php //echo get_author_name(); ?></div> -->
                    <div class="date"><?php echo get_the_date(); ?></div>

                </div>
            </div>

        <?php endwhile; 
        wp_reset_postdata();  
    endif;

    die();
}

/*active page menu class*/
function my_special_nav_class( $classes, $item ) {
    if ( (is_singular('services') && $item->ID == 331) || (is_singular('portfolio') && $item->ID == 569) || (is_singular('post') && $item->ID == 491) ) {
        $classes[] = 'current-menu-item';
    }
    return $classes;

}
add_filter( 'nav_menu_css_class', 'my_special_nav_class', 10, 2 );

/*select industries accordingly*/
add_action( 'wp_ajax_nopriv_getProIndustries', 'getProIndustries' );
add_action( 'wp_ajax_getProIndustries', 'getProIndustries' );

function getProIndustries() {
	$term_id = $_POST['post_id'];
	$taxonomy_name = 'project-category';
	$termchildren = get_term_children( $term_id, $taxonomy_name );
	if( $termchildren ):
		$child_cat_html = '';
    	foreach ($termchildren as $child_cat) {
    		$child_cats = get_term_by( 'id', $child_cat, 'project-category' );
    		$cat_name = $child_cats->name;
        	$cate_slug = $child_cats->slug;
        	$child_cat_html .= '<li data-filter=".'.$cate_slug.'" post-id="'.$child_cats->term_id.'">'.$cat_name.'</li>';
		}
		endif;
	echo  $child_cat_html;	
	die();
}
?>