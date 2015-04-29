<?php

//add_filter( 'jetpack_development_mode', '__return_true' );

if ( ! isset( $content_width ) )
	$content_width = 700;

function wonderland_init()	{
	remove_action( 'wp_head', 'wp_generator' );
	show_admin_bar( false );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'jetpack-responsive-videos' );
	add_theme_support( 'title-tag' );
	set_post_thumbnail_size( 700, 394, true );
	add_image_size( 'featured', 700, 394, true );
	add_image_size( 'full', 1000, 563, true );
	add_image_size( 'article', 350, 197, false );
	add_image_size( 'lecture', 220, 353, false );
	add_image_size( 'lecture', 220, 353, false );
	add_image_size( 'shop', 200, 350, true );
	add_image_size( 'calendar', 90, 90, true );
	add_editor_style( 'editor-style.css' );
	$markup = array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', );
	add_theme_support( 'html5', $markup );
    load_theme_textdomain('wl', get_template_directory() . '/languages');
}
add_action( 'after_setup_theme', 'wonderland_init' );

function wl_scripts() {
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery-1.10.1.min.js', false, '1.10.1', true );
	wp_register_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.js', false, '2.8.1', false );
	wp_register_script( 'video', 'http://vjs.zencdn.net/4.10/video.js', false, '4.10', true );
	wp_register_script( 'swfobject', get_template_directory_uri() . '/js/jquery.swfobject.1-1-1.min.js', false, '1.1.1', true );
	wp_register_script( 'isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', false, '2.1.1', true );
	wp_register_script( 'custom', get_template_directory_uri() . '/js/custom.js', false, '1.0', true );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'modernizr' );
	wp_enqueue_script( 'video' );
	wp_enqueue_script( 'swfobject' );
	wp_enqueue_script( 'isotope' );
	wp_enqueue_script( 'custom' );
}
add_action( 'wp_enqueue_scripts', 'wl_scripts' );

function wl_styles() {
	wp_register_style( 'grid', get_template_directory_uri() . '/css/grid.css', false, '1.2' );
	wp_register_style( 'reset', get_template_directory_uri() . '/css/reset.css', false, '2.0' );
	wp_register_style( 'main', get_template_directory_uri() . '/css/main.css', false, '2.0' );
	wp_register_style( 'main', get_template_directory_uri() . '/css/screens.css', false, '2.0' );
	wp_register_style( 'video', 'http://vjs.zencdn.net/4.10/video-js.css', false, '4.10' );
	wp_enqueue_style( 'grid' );
	wp_enqueue_style( 'reset' );
	wp_enqueue_style( 'main' );
	wp_enqueue_style( 'screens' );
	wp_enqueue_style( 'video' );
}
add_action( 'wp_enqueue_scripts', 'wl_styles' );

// Register Custom Post Type
function portfolio() {
	$labels = array(
		'name'                => _x( 'Portfolio Items', 'Post Type General Name', 'wl' ),
		'singular_name'       => _x( 'Portfolio', 'Post Type Singular Name', 'wl' ),
		'menu_name'           => __( 'Portfolio', 'wl' ),
		'name_admin_bar'      => __( 'Portfolio Item', 'wl' ),
		'parent_item_colon'   => __( 'Parent Portfolio Item:', 'wl' ),
		'all_items'           => __( 'All Portfolio Items', 'wl' ),
		'add_new_item'        => __( 'Add New Portfolio Item', 'wl' ),
		'add_new'             => __( 'Add New', 'wl' ),
		'new_item'            => __( 'New Portfolio Item', 'wl' ),
		'edit_item'           => __( 'Edit Portfolio Item', 'wl' ),
		'update_item'         => __( 'Update Portfolio Item', 'wl' ),
		'view_item'           => __( 'View Portfolio Item', 'wl' ),
		'search_items'        => __( 'Search Portfolio Items', 'wl' ),
		'not_found'           => __( 'Not found', 'wl' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'wl' ),
	);
	$args = array(
		'label'               => __( 'portfolio', 'wl' ),
		'description'         => __( 'Post Type Description', 'wl' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail', 'page-attributes' ),
		'taxonomies'          => array( 'type' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'portfolio', $args );
}
add_action( 'init', 'portfolio', 0 );

// Register Custom Taxonomy
function tax_type() {
	$labels = array(
		'name'                       => _x( 'Types', 'Taxonomy General Name', 'wl' ),
		'singular_name'              => _x( 'Type', 'Taxonomy Singular Name', 'wl' ),
		'menu_name'                  => __( 'Type', 'wl' ),
		'all_items'                  => __( 'All Types', 'wl' ),
		'parent_item'                => __( 'Parent Type', 'wl' ),
		'parent_item_colon'          => __( 'Parent Type:', 'wl' ),
		'new_item_name'              => __( 'New Type', 'wl' ),
		'add_new_item'               => __( 'Add New Type', 'wl' ),
		'edit_item'                  => __( 'Edit Type', 'wl' ),
		'update_item'                => __( 'Update Type', 'wl' ),
		'view_item'                  => __( 'View Type', 'wl' ),
		'separate_items_with_commas' => __( 'Separate Types with commas', 'wl' ),
		'add_or_remove_items'        => __( 'Add or remove Types', 'wl' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'wl' ),
		'popular_items'              => __( 'Popular Types', 'wl' ),
		'search_items'               => __( 'Search Types', 'wl' ),
		'not_found'                  => __( 'Not Found', 'wl' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'type', array( 'portfolio' ), $args );
}
add_action( 'init', 'tax_type', 0 );

if ( file_exists( dirname( __FILE__ ) . '/meta/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/meta/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/meta/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/meta/init.php';
}

// About Page Meta
add_action( 'cmb2_init', 'wl_about' );

function wl_about() {
	$prefix = '_wl_about_';
	$cmb_about_page = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => __( 'About Wonderland', 'wl' ),
		'object_types' => array( 'page', ),
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true,
		'show_on'      => array( 'pagename' => array( 'About Wonderland', ) ),
	) );
	$cmb_about_page->add_field( array(
		'name'    => __( 'Find Us', 'wl' ),
		'id'      => $prefix . 'findus',
		'type'    => 'wysiwyg',
		'options' => array( 'textarea_rows' => 5, ),
	) );
	$cmb_about_page->add_field( array(
		'name'    => __( 'Contact Us', 'wl' ),
		'id'      => $prefix . 'contactus',
		'type'    => 'wysiwyg',
		'options' => array( 'textarea_rows' => 5, ),
	) );

}

// Portfolio Meta
add_action( 'cmb2_init', 'wl_portfolio' );

function wl_portfolio() {
	$prefix = '_wl_portfolio_';
	$cmb_portfolio = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => __( 'Client Details', 'wl' ),
		'object_types' => array( 'portfolio', ),
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true,
		'show_on'      => array( 'post_type' => array( 'portfolio', ) ),
	) );
	$cmb_portfolio->add_field( array(
	    'name' => 'Double Width on homepage',
	    'desc' => 'Show this post as a wide post on the homepage.',
	    'id'   => $prefix . 'double',
	    'type' => 'checkbox'
	) );
	$cmb_portfolio->add_field( array(
		'name'    => __( 'Client Name', 'wl' ),
		'id'      => $prefix . 'client',
		'type'    => 'text',
	) );
	$cmb_portfolio->add_field( array(
		'name'    		=> __( 'Media Order', 'wl' ),
		'desc'    		=> __( 'What order are the categories in? (only shown in that order on the front-end).', 'wl' ),
		'default' 		=> '0',
		'id'      		=> $prefix . 'media_order',
		'type'    	=> 'select',
		'options' 		=> array(
//			'a' 		=> __( 'AV Only', 'wl' ),
//			'p' 		=> __( 'Print Only', 'wl' ),
//			'di' 		=> __( 'Digital Image Only', 'wl' ),
//			'ds' 		=> __( 'Digital SWF Only', 'wl' ),
//			'dids' 		=> __( 'Digital Image/Digital SWF', 'wl' ),
//			'dsdi' 		=> __( 'Digital SWF/Digital Image', 'wl' ),
//			'ap' 		=> __( 'AV/Print', 'wl' ),
//			'pa' 		=> __( 'Print/AV', 'wl' ),
//			'adi' 		=> __( 'AV/Digital Image', 'wl' ),
//			'ads' 		=> __( 'AV/Digital SWF', 'wl' ),
			'apdids' 	=> __( 'AV / Print / Digital Image / Digital SWF', 'wl' ),
			'apdsdi' 	=> __( 'AV / Print / Digital SWF / Digital Image', 'wl' ),
			'adidsp' 	=> __( 'AV / Digital Image / Digital SWF / Print', 'wl' ),
			'adsdip' 	=> __( 'AV / Digital SWF / Digital Image / Print', 'wl' ),
			'pdidsa' 	=> __( 'Print / Digital Image / Digital SWF / AV', 'wl' ),
			'pdsdia' 	=> __( 'Print / Digital SWF / Digital Image / AV', 'wl' ),
			'padids' 	=> __( 'Print / AV / Digital Image / Digital SWF', 'wl' ),
			'padsdi' 	=> __( 'Print / AV / Digital SWF / Digital Image', 'wl' ),
			'didsap' 	=> __( 'Digital Image / Digital SWF / AV / Print', 'wl' ),
			'dsdiap' 	=> __( 'Digital SWF / Digital Image / AV / Print', 'wl' ),
			'didspa' 	=> __( 'Digital Image / Digital SWF / Print / AV', 'wl' ),
			'didspa' 	=> __( 'Digital SWF / Digital Image / Print / AV', 'wl' ),
		)
	) );
}
add_action( 'cmb2_init', 'wl_home' );

function wl_home() {
	$prefix = '_wl_home_';
	$cmb_portfolio = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => __( 'Archive?', 'wl' ),
		'object_types' => array( 'portfolio', ),
		'context'      => 'side',
		'priority'     => 'high',
		'show_names'   => true,
		'show_on'      => array( 'post_type' => array( 'portfolio', ) ),
	) );
	$cmb_portfolio->add_field( array(
	    'name' => '',
	    'desc' => 'Check box to hide from homepage',
	    'id'   => $prefix . 'archive',
	    'type' => 'checkbox'
	) );
}

add_action( 'cmb2_init', 'wl_av_repeatable' );
function wl_av_repeatable() {
	$prefix = '_cmbav_';
	$cmb_group = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => __( 'AV', 'wl' ),
		'object_types' => array( 'portfolio', ),
	) );
	$group_field_id = $cmb_group->add_field( array(
		'id'          => $prefix . 'av',
		'type'        => 'group',
		'options'     => array(
			'group_title'   => __( 'AV #{#}', 'wl' ),
			'add_button'    => __( 'Add Another AV Item', 'wl' ),
			'remove_button' => __( 'Remove AV', 'wl' ),
			'sortable'      => true,
		),
	) );
	$cmb_group->add_group_field( $group_field_id, array(
		'name'       => __( 'Title', 'wl' ),
		'description' => __( 'Used for the "Additional formats" video switcher', 'wl' ),
		'id'         => 'title',
		'type'       => 'text',
	) );
	$cmb_group->add_group_field( $group_field_id, array(
		'name'        => __( 'Description', 'wl' ),
		'description' => __( 'Write a short description for this entry (optional)', 'wl' ),
		'id'          => 'description',
		'type'        => 'textarea_small',
	) );
	$cmb_group->add_group_field( $group_field_id, array(
		'name' => __( 'Poster Image', 'wl' ),
		'description' => __( 'The poster specifies an image to be shown while the video is downloading, or until the user hits the play button. If this is not included, the first frame of the video will be used instead.', 'wl' ),
		'id'   => 'image',
		'type' => 'file',
	) );
	$cmb_group->add_group_field( $group_field_id, array(
		'name' => __( 'MP4', 'wl' ),
		'id'   => 'mp4',
		'type' => 'file',
	) );
	$cmb_group->add_group_field( $group_field_id, array(
		'name' => __( 'WEBM', 'wl' ),
		'id'   => 'webm',
		'type' => 'file',
	) );
	$cmb_group->add_group_field( $group_field_id, array(
		'name' => __( 'OGG/OGV', 'wl' ),
		'id'   => 'ogg',
		'type' => 'file',
	) );
}

add_action( 'cmb2_init', 'wl_print_repeatable' );
function wl_print_repeatable() {
	$prefix = '_cmbprint_';
	$cmb_group = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => __( 'Print', 'wl' ),
		'object_types' => array( 'portfolio', ),
	) );
	$group_field_id = $cmb_group->add_field( array(
		'id'          => $prefix . 'print',
		'type'        => 'group',
		'options'     => array(
			'group_title'   => __( 'Print #{#}', 'wl' ),
			'add_button'    => __( 'Add Another Print Image', 'wl' ),
			'remove_button' => __( 'Remove Print', 'wl' ),
			'sortable'      => true,
		),
	) );
	$cmb_group->add_group_field( $group_field_id, array(
		'name'       => __( 'Title', 'wl' ),
		'id'         => 'title',
		'type'       => 'text',
	) );
	$cmb_group->add_group_field( $group_field_id, array(
		'name'        => __( 'Description', 'wl' ),
		'description' => __( 'Write a short description for this entry (optional)', 'wl' ),
		'id'          => 'description',
		'type'        => 'textarea_small',
	) );
	$cmb_group->add_group_field( $group_field_id, array(
		'name' => __( 'Image', 'wl' ),
		'id'   => 'image',
		'type' => 'file',
	) );
}

add_action( 'cmb2_init', 'wl_digital_image_repeatable' );
function wl_digital_image_repeatable() {
	$prefix = '_cmbdigitalimg_';
	$cmb_group = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => __( 'Digital Image', 'wl' ),
		'object_types' => array( 'portfolio', ),
	) );
	$group_field_id = $cmb_group->add_field( array(
		'id'          => $prefix . 'digital',
		'type'        => 'group',
		'options'     => array(
			'group_title'   => __( 'Digital #{#}', 'wl' ),
			'add_button'    => __( 'Add Another Digital Image', 'wl' ),
			'remove_button' => __( 'Remove Digital', 'wl' ),
			'sortable'      => true,
		),
	) );
	$cmb_group->add_group_field( $group_field_id, array(
		'name'       => __( 'Image Title', 'wl' ),
		'id'         => 'imgtitle',
		'type'       => 'text',
	) );
	$cmb_group->add_group_field( $group_field_id, array(
		'name'       => __( 'Image', 'wl' ),
		'id'         => 'image',
		'type'       => 'file',
	) );
	$cmb_group->add_group_field( $group_field_id, array(
		'name'        => __( 'Image Description', 'wl' ),
		'description' => __( 'Write a short description for this entry (optional)', 'wl' ),
		'id'          => 'imgdescription',
		'type'        => 'textarea_small',
	) );
}
add_action( 'cmb2_init', 'wl_digital_swf_repeatable' );
function wl_digital_swf_repeatable() {
	$prefix = '_cmbdigitalswf_';
	$cmb_group = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => __( 'Digital SWF', 'wl' ),
		'object_types' => array( 'portfolio', ),
	) );
	$group_field_id = $cmb_group->add_field( array(
		'id'          => $prefix . 'digital',
		'type'        => 'group',
		'options'     => array(
			'group_title'   => __( 'Digital #{#}', 'wl' ),
			'add_button'    => __( 'Add Another SWF', 'wl' ),
			'remove_button' => __( 'Remove Digital', 'wl' ),
			'sortable'      => true,
		),
	) );
	$cmb_group->add_group_field( $group_field_id, array(
		'name'       => __( 'SWF Title', 'wl' ),
		'description' => __( 'Used for the "Additional formats" SWF switcher', 'wl' ),
		'id'         => 'swftitle',
		'type'       => 'text',
	) );
	$cmb_group->add_group_field( $group_field_id, array(
		'name' => __( 'SWF File', 'wl' ),
		'id'   => 'swf',
		'type' => 'file',
	) );
	$cmb_group->add_group_field( $group_field_id, array(
		'name'        => __( 'SWF Description', 'wl' ),
		'description' => __( 'Write a short description for this entry (optional)', 'wl' ),
		'id'          => 'swfdescription',
		'type'        => 'textarea_small',
	) );
	$cmb_group->add_group_field( $group_field_id, array(
		'name'        => __( 'SWF Width', 'wl' ),
		'description' => __( 'Used to display the SWF file properly', 'wl' ),
		'id'          => 'swfwidth',
		'type'        => 'text_small',
	) );
	$cmb_group->add_group_field( $group_field_id, array(
		'name'        => __( 'SWF Height', 'wl' ),
		'description' => __( 'Used to display the SWF file properly', 'wl' ),
		'id'          => 'swfheight',
		'type'        => 'text_small',
	) );
}

// Upload SWF
add_filter('upload_mimes', 'upload_swf');
function upload_swf($existing_mimes){
	$existing_mimes['swf'] = 'text/swf';
	return $existing_mimes;
}

// Add Custom Post Types / Taxonomies to Dashboard
add_action( 'dashboard_glance_items', 'my_add_cpt_to_dashboard' );

function my_add_cpt_to_dashboard() {
	$showTaxonomies = 1;
	if ($showTaxonomies) {
		$taxonomies = get_taxonomies( array( '_builtin' => false ), 'objects' );
		foreach ( $taxonomies as $taxonomy ) {
			$num_terms	= wp_count_terms( $taxonomy->name );
			$num = number_format_i18n( $num_terms );
			$text = _n( $taxonomy->labels->singular_name, $taxonomy->labels->name, $num_terms );
			$associated_post_type = $taxonomy->object_type;
			if ( current_user_can( 'manage_categories' ) ) {
				$output = '<a href="edit-tags.php?taxonomy=' . $taxonomy->name . '&post_type=' . $associated_post_type[0] . '">' . $num . ' ' . $text .'</a>';
			}
			echo '<li class="taxonomy-count">' . $output . ' </li>';
		}
	}
	$post_types = get_post_types( array( '_builtin' => false ), 'objects' );
	foreach ( $post_types as $post_type ) {
		if($post_type->show_in_menu==false) {
			continue;
		}
		$num_posts = wp_count_posts( $post_type->name );
		$num = number_format_i18n( $num_posts->publish );
		$text = _n( $post_type->labels->singular_name, $post_type->labels->name, $num_posts->publish );
		if ( current_user_can( 'edit_posts' ) ) {
			$output = '<a href="edit.php?post_type=' . $post_type->name . '">' . $num . ' ' . $text . '</a>';
		}
		echo '<li class="page-count ' . $post_type->name . '-count">' . $output . '</td>';
	}
}

// Dashboard Icons
function add_menu_icons_styles(){

	echo '<style>
	#adminmenu #menu-posts-portfolio div.wp-menu-image:before, #dashboard_right_now .portfolio-count a:before {
		content: "\f115";
	}
	#adminmenu #menu-posts-taxonomy div.wp-menu-image:before, #dashboard_right_now .taxonomy-count a:before {
		content: "\f323";
	}
	</style>';

}
add_action( 'admin_head', 'add_menu_icons_styles' );

// Footer Copyrights
function remove_footer_admin () {
	echo '&copy; '. date('Y') . ' Wonderland. Site built by <a href="https://www.prydonian.digital">Prydonian Digital</a>.';
	echo '<style>#wp-admin-bar-updates,.update-plugins{display:none !important;}.category-adder {display: none !important;}</style>';
}
add_filter('admin_footer_text', 'remove_footer_admin');