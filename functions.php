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
	set_post_thumbnail_size( 640, 360, true );
	add_image_size( 'thumbLarge', 675, 330, true );
	add_image_size( 'thumbSquare', 330, 330, true );
	add_editor_style( 'editor-style.css' );
	$markup = array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', );
	add_theme_support( 'html5', $markup );
	$defaults = array(
		'default-image'          => get_template_directory_uri() . '/images/main/logo.svg',
		'width'                  => 221,
		'height'                 => 24,
		'flex-height'            => false,
		'flex-width'             => false,
		'uploads'                => true,
		'random-default'         => false,
		'header-text'            => false,
		'default-text-color'     => '',
		'wp-head-callback'       => '',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
	);
	add_theme_support( 'custom-header', $defaults );
    load_theme_textdomain('wl', get_template_directory() . '/languages');
}
add_action( 'after_setup_theme', 'wonderland_init' );

function wl_scripts() {
	wp_deregister_script( 'jquery' );
	wp_deregister_script( 'swfobject' );
	wp_register_script( 'scripts', get_template_directory_uri() . '/js/scripts.min.js', false, '1.10.1', false );
	wp_register_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.js', false, '2.8.1', false );
	wp_register_script( 'video', 'http://vjs.zencdn.net/4.10/video.js', false, '4.10', false );
	wp_register_script( 'custom', get_template_directory_uri() . '/js/custom.js', false, '1.0', true );
	wp_enqueue_script( 'scripts' );
	wp_enqueue_script( 'modernizr' );
	wp_enqueue_script( 'video' );
	wp_enqueue_script( 'custom' );
}
add_action( 'wp_enqueue_scripts', 'wl_scripts' );

function wl_styles() {
	wp_register_style( 'base', get_template_directory_uri() . '/css/base.css', false, '1.2' );
	wp_register_style( 'video', 'http://vjs.zencdn.net/4.10/video-js.css', false, '4.10' );
	wp_enqueue_style( 'base' );
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
		'supports'            => array( 'title', 'thumbnail' ),
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
		'rewrite'			  => false
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

// Fix 'portfolio' slug
function remove_portfolio_slug( $post_link, $post, $leavename ) {
    if ( 'portfolio' != $post->post_type || 'publish' != $post->post_status ) {
        return $post_link;
    }
    $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );
    return $post_link;
}
add_filter( 'post_type_link', 'remove_portfolio_slug', 10, 3 );

function custom_parse_request_portfolio( $query ) {
    if ( ! $query->is_main_query() )
        return;
    if ( 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {
        return;
    }
    if ( ! empty( $query->query['name'] ) ) {
        $query->set( 'post_type', array( 'post', 'portfolio', 'page' ) );
    }
}
add_action( 'pre_get_posts', 'custom_parse_request_portfolio' );

// Init Metaboxes
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

// Portfolio Image Size
add_action( 'cmb2_init', 'wl_featured' );

function wl_featured() {
	$prefix = '_wl_fi_';
	$cmb_about_page = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => __( 'Important Info', 'wl' ),
		'object_types' => array( 'portfolio', ),
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true,
		'show_on'      => array( 'post_type' => array( 'portfolio', ) ),
	) );
	$cmb_about_page->add_field( array(
		'desc'	  => __( 'Featured Images should be 675x330 for retina devices<br /><br />The \'Archive\' type hides the post from the home page and shows it on the Archive page instead<br /><br />If you have multiple types of the same section (eg: 2 or more Digital Images), you can reorder them by using the up and down arrows in that section', 'wl' ),
		'id'      => $prefix . 'findus',
		'type'    => 'title',
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
			'dsdipa' 	=> __( 'Digital SWF / Digital Image / Print / AV', 'wl' ),
		)
	) );
}

function cmb2_render_callback_for_number( $field, $escaped_value, $object_id, $object_type, $field_type_object ) {
    echo $field_type_object->input( array( 'type' => 'number' ) );
}
add_action( 'cmb2_render_number', 'cmb2_render_callback_for_number', 10, 5 );

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
		'description' => __( 'Write a short description for this entry (optional, but recommended for search engines)', 'wl' ),
		'id'          => 'description',
		'type'        => 'textarea_small',
	) );
	$cmb_group->add_group_field( $group_field_id, array(
		'name' => __( 'Poster Image', 'wl' ),
		'description' => __( 'The poster specifies an image to be shown while the video is downloading, or until the user hits the play button. If this is not included, the first frame of the video will be used instead. Image dimensions should be 640x360 (required)', 'wl' ),
		'id'   => 'image',
		'type' => 'file',
	) );
	$cmb_group->add_group_field( $group_field_id, array(
		'name' => __( 'MP4', 'wl' ),
		'description' => __( 'Video dimensions should be 640x360 (required)', 'wl' ),
		'id'   => 'mp4',
		'type' => 'file',
	) );
	$cmb_group->add_group_field( $group_field_id, array(
		'name' => __( 'WEBM', 'wl' ),
		'description' => __( 'Video dimensions should be 640x360 (required)', 'wl' ),
		'id'   => 'webm',
		'type' => 'file',
	) );
	$cmb_group->add_group_field( $group_field_id, array(
		'name' => __( 'OGG/OGV', 'wl' ),
		'description' => __( 'Video dimensions should be 640x360 (required)', 'wl' ),
		'id'   => 'ogg',
		'type' => 'file',
	) );
	$cmb_group->add_group_field( $group_field_id, array(
		'name' => __( 'Video play duration', 'wl' ),
		'description' => __( 'Video duration in minutes (required - if under 1 minute, leave blank)', 'wl' ),
		'id'   => 'min',
		'type' => 'number',
	) );
	$cmb_group->add_group_field( $group_field_id, array(
		'name' => __( 'Video play duration', 'wl' ),
		'description' => __( 'Video duration in seconds (required)', 'wl' ),
		'id'   => 'sec',
		'type' => 'number',
		'after' => '<p>Video duration is formatted as T(minutes)M(seconds)S, so both the minutes and seconds are required for each video.</p>',
	) );
}

add_action( 'cmb2_init', 'wl_print_repeatable' );
function wl_print_repeatable() {
	$prefix = '_cmbprint_';
	$cmb_group = new_cmb2_box( array(
		'id'           => $prefix . 'print',
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
		'description' => __( 'Used for the alt text of the image (optional, but recommended for search engines)', 'wl' ),
		'id'         => 'title',
		'type'       => 'text',
	) );
	$cmb_group->add_group_field( $group_field_id, array(
		'name' => __( 'Print Image', 'wl' ),
		'description' => __( 'Max width of 1000 pixels (required)', 'wl' ),
		'id'   => 'image',
		'type' => 'file',
	) );
	$cmb_group->add_group_field( $group_field_id, array(
		'name'        => __( 'Description', 'wl' ),
		'description' => __( 'Write a short description for this image (optional, but recommended for search engines)', 'wl' ),
		'id'          => 'description',
		'type'        => 'textarea_small',
	) );
}

add_action( 'cmb2_init', 'wl_digital_image_repeatable' );
function wl_digital_image_repeatable() {
	$prefix = '_cmbdigitalimg_';
	$cmb_group = new_cmb2_box( array(
		'id'           => $prefix . 'dimage',
		'title'        => __( 'Digital Image', 'wl' ),
		'object_types' => array( 'portfolio', ),
	) );
	$group_field_id = $cmb_group->add_field( array(
		'id'          => $prefix . 'digitalimage',
		'type'        => 'group',
		'options'     => array(
			'group_title'   => __( 'Digital Image #{#}', 'wl' ),
			'add_button'    => __( 'Add Another Digital Image', 'wl' ),
			'remove_button' => __( 'Remove Digital Image', 'wl' ),
			'sortable'      => true,
		),
	) );
	$cmb_group->add_group_field( $group_field_id, array(
		'name'       => __( 'Image Title', 'wl' ),
		'description' => __( 'Used for the alt text of the image (optional, but recommended for search engines)', 'wl' ),
		'id'         => 'imgtitle',
		'type'       => 'text',
	) );
	$cmb_group->add_group_field( $group_field_id, array(
		'name'       => __( 'Digital Image', 'wl' ),
		'description' => __( 'Max width of 1000 pixels (required)', 'wl' ),
		'id'         => 'image',
		'type'       => 'file',
	) );
	$cmb_group->add_group_field( $group_field_id, array(
		'name'        => __( 'Image Description', 'wl' ),
		'description' => __( 'Write a short description for this entry (optional, but recommended for search engines)', 'wl' ),
		'id'          => 'imgdescription',
		'type'        => 'textarea_small',
	) );
}
add_action( 'cmb2_init', 'wl_digital_swf_repeatable' );
function wl_digital_swf_repeatable() {
	$prefix = '_cmbdigitalswf_';
	$cmb_group = new_cmb2_box( array(
		'id'           => $prefix . 'dswf',
		'title'        => __( 'SWF', 'wl' ),
		'object_types' => array( 'portfolio', ),
	) );
	$group_field_id = $cmb_group->add_field( array(
		'id'          => $prefix . 'digitalswf',
		'type'        => 'group',
		'options'     => array(
			'group_title'   => __( 'SWF #{#}', 'wl' ),
			'add_button'    => __( 'Add Another SWF', 'wl' ),
			'remove_button' => __( 'Remove SWF', 'wl' ),
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
		'description' => __( '(required)', 'wl' ),
		'id'   => 'swf',
		'type' => 'file',
	) );
	$cmb_group->add_group_field( $group_field_id, array(
		'name'        => __( 'SWF Description', 'wl' ),
		'description' => __( 'Write a short description for this entry (optional,, but recommended for search engines)', 'wl' ),
		'id'          => 'swfdescription',
		'type'        => 'textarea_small',
	) );
	$cmb_group->add_group_field( $group_field_id, array(
		'name'        => __( 'SWF Width', 'wl' ),
		'description' => __( 'Used to display the SWF file properly (required)', 'wl' ),
		'id'          => 'swfwidth',
		'type'        => 'text_small',
	) );
	$cmb_group->add_group_field( $group_field_id, array(
		'name'        => __( 'SWF Height', 'wl' ),
		'description' => __( 'Used to display the SWF file properly (required)', 'wl' ),
		'id'          => 'swfheight',
		'type'        => 'text_small',
	) );
}

function wl_SEO() {
	$prefix = '_wl_seo_';
	$cmb_portfolio = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => __( 'SEO', 'wl' ),
		'object_types' => array( 'portfolio', ),
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true,
		'show_on'      => array( 'post_type' => array( 'portfolio', ) ),
	) );
	$cmb_portfolio->add_field( array(
	    'name' => 'SEO Description',
	    'desc' => 'Add some text in here to describe this piece of work (optional, but recommended for search engines)',
	    'id'   => $prefix . 'desc',
	    'type' => 'textarea_small'
	) );
	$cmb_portfolio->add_field( array(
	    'name' => 'SEO Keywords',
	    'desc' => 'Add some comma separated keywords in here to describe this piece of work (optional, but recommended for search engines)',
	    'id'   => $prefix . 'keywords',
	    'type' => 'text'
	) );
}
add_action( 'cmb2_init', 'wl_SEO' );

add_filter( 'pre_get_posts', 'wl_homepage' );
function wl_homepage( $query ) {
	if ( is_admin() || ! $query->is_main_query() )
        return;
	if ( is_home() && $query->is_main_query() )
		$query->set( 'post_type', array( 'portfolio' ) );
		$query->set( 'tax_query',
            array(
                array(
                    'taxonomy' => 'type',
                    'field' => 'slug',
                    'terms' => 'archive',
                    'operator' => 'NOT IN'
                )
            )
        );
	return $query;
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

// Dashboard - Wonderland
function wl_dashboard(){
	if ( $GLOBALS['title'] != 'Dashboard' ){
		return;
	}
	$GLOBALS['title'] =  __( 'Wonderland' );
}
add_action( 'admin_head', 'wl_dashboard' );

// Dashboard Icons
function wl_icons(){

	echo '<style>
	#adminmenu #menu-posts-portfolio div.wp-menu-image:before, #dashboard_right_now .portfolio-count a:before {
		content: "\f115";
	}
	#adminmenu #menu-posts-taxonomy div.wp-menu-image:before, #dashboard_right_now .taxonomy-count a:before {
		content: "\f323";
	}
	.post-title .post-state {
		color: transparent;
		font-size: 0rem;
	}
	.post-title .post-state:after {
		content: "Archived";
		color: #555;
		font-size: 14px;
	}
	</style>';
}
add_action( 'admin_head', 'wl_icons' );

// Login Logo
function wl_login() { ?>
<style type="text/css">
body.login	{
	background: #fff;
}
body.login div#login h1 a {
	background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/main/logo.svg);
	padding-bottom: 30px;
	background-position: center top;
	background-repeat: no-repeat;
	background-size: 221px auto;
	height: 24px;
	line-height: 1;
	margin: 0 auto 25px;
	outline: 0 none;
	overflow: hidden;
	padding: 0;
	text-decoration: none;
	text-indent: -9999px;
	width: 221px;
}
</style>
<?php }
add_action( 'login_enqueue_scripts', 'wl_login' );

// Footer Copyrights
function remove_footer_admin () {
	echo '&copy; '. date('Y') . ' Wonderland. Site built by <a href="https://www.prydonian.digital">Prydonian Digital</a>.';
	echo '<style>#wp-admin-bar-updates,.update-plugins{display:none !important;}.category-adder {display: none !important;}</style>';
}
add_filter('admin_footer_text', 'remove_footer_admin');

// Sitemap
add_action( "save_post", "eg_create_sitemap" );
function eg_create_sitemap() {
    if ( str_replace( '-', '', get_option( 'gmt_offset' ) ) < 10 ) {
        $tempo = '-0' . str_replace( '-', '', get_option( 'gmt_offset' ) );
    } else {
        $tempo = get_option( 'gmt_offset' );
    }
    if( strlen( $tempo ) == 3 ) { $tempo = $tempo . ':00'; }
    $postsForSitemap = get_posts( array(
        'numberposts' => -1,
        'orderby'     => 'modified',
        'post_type'   => array( 'post', 'page', 'portfolio' ),
        'order'       => 'DESC'
    ) );
    $sitemap .= '<?xml version="1.0" encoding="UTF-8"?>';
    $sitemap .= "\n" . '<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
    $sitemap .= "\t" . '<url>' . "\n" .
        "\t\t" . '<loc>' . esc_url( home_url( '/' ) ) . '</loc>' .
        "\n\t\t" . '<lastmod>' . date( "Y-m-d\TH:i:s", current_time( 'timestamp', 0 ) ) . $tempo . '</lastmod>' .
        "\n\t\t" . '<changefreq>daily</changefreq>' .
        "\n\t\t" . '<priority>1.0</priority>' .
        "\n\t" . '</url>' . "\n";
    foreach( $postsForSitemap as $post ) {
        setup_postdata( $post);
        $postdate = explode( " ", $post->post_modified );
        $sitemap .= "\t" . '<url>' . "\n" .
            "\t\t" . '<loc>' . get_permalink( $post->ID ) . '</loc>' .
            "\n\t\t" . '<lastmod>' . $postdate[0] . 'T' . $postdate[1] . $tempo . '</lastmod>' .
            "\n\t\t" . '<changefreq>Weekly</changefreq>' .
            "\n\t\t" . '<priority>0.5</priority>' .
            "\n\t" . '</url>' . "\n";
    }
    $sitemap .= '</urlset>';
    $fp = fopen( ABSPATH . "sitemap.xml", 'w' );
    fwrite( $fp, $sitemap );
    fclose( $fp );
}

// SEO
function basic_wp_seo() {
  global $page, $paged, $post;
	$default_keywords = 'Wonderland, movie advertising, London, agency, London agency, trailers, TV spots, Blu-Ray campaigns, DVD campaigns';
	$default_desc = 'Wonderland is a movie advertising agency based in the heart of central London. Our range of work includes movie trailers, TV spots and post‑theatrical Blu‑Ray & DVD campaigns.';
	$output = '';

	// description
	$seo_desc = get_post_meta( $post->ID, '_wl_seo_desc', true );
	$description = get_bloginfo('description', 'display');
	$pagedata = get_post($post->ID);
	if (is_singular()) {
		if (!empty($seo_desc)) {
			$content = $seo_desc;
		} else if (!empty($pagedata)) {
			$content = apply_filters('the_excerpt_rss', $pagedata->post_content);
			$content = substr(trim(strip_tags($content)), 0, 155);
			$content = preg_replace('#\n#', ' ', $content);
			$content = preg_replace('#\s{2,}#', ' ', $content);
			$content = trim($content);
		}
	} else {
		$content = $default_desc;
	}
	$output .= '<meta name="description" content="' . esc_attr($content) . '">' . "\n";

	// keywords
	$keys = get_post_meta( $post->ID, '_wl_seo_keywords', true );
	$cats = get_the_category();
	$tags = get_the_tags();
	if (empty($keys)) {
		if (!empty($cats)) foreach($cats as $cat) $keys .= $cat->name . ', ';
		if (!empty($tags)) foreach($tags as $tag) $keys .= $tag->name . ', ';
		$keys .= $default_keywords;
	}
	$output .= '<meta name="keywords" content="' . esc_attr($keys) . '">' . "\n";

	// robots
	if (is_category() || is_tag()) {
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		if ($paged > 1) {
			$output .=  '<meta name="robots" content="noindex,follow">' . "\n";
		} else {
			$output .=  '<meta name="robots" content="index,follow">' . "\n";
		}
	} else if (is_home() || is_singular()) {
		$output .=  '<meta name="robots" content="index,follow">' . "\n";
	} else {
		$output .= '<meta name="robots" content="noindex,follow">' . "\n";
	}

	// title
	$title_custom = get_post_meta($post->ID, 'wl_seo_title', true);
	$url = ltrim(esc_url($_SERVER['REQUEST_URI']), '/');
	$name = get_bloginfo('name', 'display');
	$title = trim(wp_title('', false));
	$cat = single_cat_title('', false);
	$tag = single_tag_title('', false);
	$search = get_search_query();

	if (!empty($title_custom)) $title = $title_custom;
	if ($paged >= 2 || $page >= 2) $page_number = ' | ' . sprintf('Page %s', max($paged, $page));
	else $page_number = '';

	if (is_home() || is_front_page()) $seo_title = $name;
	elseif (is_singular())            $seo_title = $title . ' &raquo; ' . $name;
	elseif (is_tag())                 $seo_title = 'Tag Archive: ' . $tag . ' &raquo; ' . $name;
	elseif (is_category())            $seo_title = 'Category Archive: ' . $cat . ' &raquo; ' . $name;
	elseif (is_archive())             $seo_title = 'Archive: ' . $title . ' &raquo; ' . $name;
	elseif (is_search())              $seo_title = 'Search: ' . $search . ' &raquo; ' . $name;
	elseif (is_404())                 $seo_title = '404 - Not Found: ' . $url . ' &raquo; ' . $name;
	else                              $seo_title = $name . ' &raquo; ' . $description;

	$output .= '<title>' . esc_attr($seo_title . $page_number) . '</title>' . "\n";

	return $output;
}

@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );