<?php
/**
 * Blush functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Blush
 */

if ( ! function_exists( 'blush_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function blush_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Blush, use a find and replace
	 * to change 'blush' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'blush', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size('small-tumbnail', 250, 250, true);
	add_image_size( 'featured-image', 2000, 1200, true );
	add_image_size('banner-image', 1200, 250, true);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'blush' ),
		'footer-1' => esc_html__('Footer Section 1', 'blush'),
		'footer-2' => esc_html__('Footer Section 2', 'blush'),
		'footer-3' => esc_html__('Footer Section 3', 'blush')
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 250,
		'width'       => 250,
		'flex-width'  => true,
		'flex-height' => true,
	) );


	/**
	 * Theme default setup
	 */

	$starter_content = array(
		'nav_menus' => array(
			'footer-1' => array(
				'name' => __('Footer T&amp;C', 'blush'),
				'items' => array(
					'link_home',
					'page_blog',
					'page_about'

				)
			)
		)
	);

	$starter_content = apply_filters( 'blush_starter_content', $starter_content );

	add_theme_support( 'starter-content', $starter_content );


}
endif;
add_action( 'after_setup_theme', 'blush_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function blush_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'blush_content_width', 640 );
}
add_action( 'after_setup_theme', 'blush_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function blush_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar on Left', 'blush' ),
		'id'            => 'sidebar-left',
		'description'   => esc_html__( 'Add widgets to left sidebar.', 'blush' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar on Right', 'blush' ),
		'id'            => 'sidebar-right',
		'description'   => esc_html__( 'Add widgets to right sidebar.', 'blush' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Shop', 'blush' ),
		'id'            => 'shop',
		'description'   => esc_html__( 'Will only display on shop pages.', 'blush' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="filter-title">',
		'after_title'   => '</h3>',
	) );



}
add_action( 'widgets_init', 'blush_widgets_init' );



/**
 * Enqueue scripts and styles.
 */
function blush_scripts() {

	$skin = get_theme_mod('blush_theme_skin_name');

	switch ($skin) {
		// case 'default':
		// 	wp_enqueue_style( 'blush-style', get_stylesheet_uri() );
		// 	break;

		case 'steam':
			wp_enqueue_style( 'blush-style-stream', get_template_directory_uri() . '/style-steam.css');
			break;

		case 'razzmic-gunmetal':
			wp_enqueue_style( 'blush-style-stream', get_template_directory_uri() . '/style-razzmic-gunmetal.css');
			break;

		case 'custom':
			wp_enqueue_style( 'blush-style-stream', get_template_directory_uri() . '/style-custom.css');
			break;

		case 'baby-girl':
			wp_enqueue_style( 'blush-style-stream', get_template_directory_uri() . '/style-baby-girl.css');
			break;

		case 'fly-fishing':
			wp_enqueue_style( 'blush-style-stream', get_template_directory_uri() . '/style-fly-fishing.css');
			break;

		default:
			wp_enqueue_style( 'blush-style', get_stylesheet_uri() );
			break;
	}

	// wp_enqueue_style( 'blush-style', get_stylesheet_uri() );


	// wp_deregister_script( 'jquery' );

	wp_enqueue_script( 'blush-navigation', get_template_directory_uri() . '/js/app.js', array('jquery'), '20151915', true );

	wp_enqueue_script( 'blush-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'blush_scripts' );


/**************************
* Add menu to the admin bar
**************************/

function dbc_add_link_to_admin_bar(){
	global $wp_admin_bar;
	$wp_admin_bar->add_menu(array(
		'id' => 'designbycode_website',
		'title' => __('DESIGN BY CODE', 'blush'),
		'href' => 'http://designbycode.co.za'
	));
	$wp_admin_bar->add_menu(array(
		'id' => 'everhost_website',
		'title' => __('EVERHOST', 'blush'),
		'href' => 'https://everhost.co.za'
	));
}

add_action('wp_before_admin_bar_render', 'dbc_add_link_to_admin_bar');


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
// require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load in Custom Walker function
 */
require get_template_directory(). '/inc/LunaWalkerMenu.php';

/**
 * Load custom single woocommerce page layout
 */
require get_template_directory(). '/woocommerce-functions/woocommerce-single-products-page.php';


/**
 * Load Customizer settings
 */
require get_template_directory(). '/inc/blush-customizer.php';




function vnmFunctionality_embedWrapper2($html, $url, $attr, $post_id) {
    return '<div class="embedwrapper">' . $html . '</div>';
}

/**
 * Responsive Youtube embed
 * @param  [type] $html    [description]
 * @param  [type] $url     [description]
 * @param  [type] $attr    [description]
 * @param  [type] $post_id [description]
 * @return [type]          [description]
 */
function blush_embed_youtub_videos($html, $url, $attr, $post_id) {

    if (strpos($html, 'youtube') !== false) {
        return '<div class="__wide-screen">' . $html . '</div>';
    }

    return $html;
}

add_filter('embed_oembed_html', 'blush_embed_youtub_videos', 10, 4);


$defaults = array(
	'default-color'          => '',
	'default-image'          => '',
	'default-repeat'         => 'no-repeat',
	'default-position-x'     => 'center',
	'default-attachment'     => '',
	'wp-head-callback'       => '_custom_background_cb',
	'admin-head-callback'    => '',
	'admin-preview-callback' => ''
);
add_theme_support( 'custom-background', $defaults );


function blush_page_title(){
	$title = '';
	if( is_shop() ){
		$title =  __('Shop', 'blush');
	}elseif ( is_product_category() ){
		$title = single_term_title();
	}else{
		$title = single_post_title();
	}

	return $title;
}
