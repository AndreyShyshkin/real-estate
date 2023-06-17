<?php
/**
 * RealEstate functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package RealEstate
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

function realestate_enqueue_scripts() {
	wp_enqueue_script( 'realestate-modernizr', get_template_directory_uri() . '/assets/js/modernizr-2.6.2.min.js' );
	wp_enqueue_script( 'realestate-jquery', get_template_directory_uri() . '/assets/js/jquery-1.10.2.min.js' );
	wp_enqueue_script( 'realestate-bootstrap', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js' );
	wp_enqueue_script( 'realestate-bootstrap-select', get_template_directory_uri() . '/assets/js/bootstrap-select.min.js' );
	wp_enqueue_script( 'realestate-bootstrap-hover-dropdown', get_template_directory_uri() . '/assets/js/bootstrap-hover-dropdown.js' );
	wp_enqueue_script( 'realestate-easypiechart', get_template_directory_uri() . '/assets/js/jquery.easypiechart.min.js' );
	wp_enqueue_script( 'realestate-owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js' );
	wp_enqueue_script( 'realestate-wow', get_template_directory_uri() . '/assets/js/wow.js' );
	wp_enqueue_script( 'realestate-icheck', get_template_directory_uri() . '/assets/js/icheck.min.js' );
	wp_enqueue_script( 'realestate-price-range', get_template_directory_uri() . '/assets/js/price-range.js' );
	wp_enqueue_script( 'realestate-main', get_template_directory_uri() . '/assets/js/main.js' );
	wp_enqueue_script( 'realestate-icon', 'https://kit.fontawesome.com/e76443ab3a.js');
}

function realestate_enqueue_styles() {
	wp_enqueue_style( 'realestate-fonts', 'http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800' );
	wp_enqueue_style( 'realestate-normalize', get_template_directory_uri() . '/assets/css/font-awesome.min.css' );
	wp_enqueue_style( 'realestate-font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css' );
	wp_enqueue_style( 'realestate-fontello', get_template_directory_uri() . '/assets/css/fontello.css' );
	wp_enqueue_style( 'realestate-icon-7-stroke', get_template_directory_uri() . '/assets/fonts/icon-7-stroke/css/pe-icon-7-stroke.css' );
	wp_enqueue_style( 'realestate-helper', get_template_directory_uri() . '/assets/fonts/icon-7-stroke/css/helper.css' );
	wp_enqueue_style( 'realestate-animate', get_template_directory_uri() . '/assets/css/animate.css' );
	wp_enqueue_style( 'realestate-bootstrap-select', get_template_directory_uri() . '/assets/css/bootstrap-select.min.css' );
	wp_enqueue_style( 'realestate-bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css' );
	wp_enqueue_style( 'realestate-icheck', get_template_directory_uri() . '/assets/css/icheck.min_all.css' );
	wp_enqueue_style( 'realestate-price-range', get_template_directory_uri() . '/assets/css/price-range.css' );
	wp_enqueue_style( 'realestate-owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.css' );
	wp_enqueue_style( 'realestate-owl-theme', get_template_directory_uri() . '/assets/css/owl.theme.css' );
	wp_enqueue_style( 'realestate-owl-transitions', get_template_directory_uri() . '/assets/css/owl.transitions.css' );
	wp_enqueue_style( 'realestate-style', get_template_directory_uri() . '/assets/css/style.css' );
	wp_enqueue_style( 'realestate-responsive', get_template_directory_uri() . '/assets/css/responsive.css' );
	wp_enqueue_style( 'realestate-newproperty', get_template_directory_uri() . '/assets/css/newproperty.css' );
	wp_enqueue_style( 'realestate-login', get_template_directory_uri() . '/assets/css/login.css' );
}

add_action( 'wp_enqueue_scripts', 'realestate_enqueue_scripts');
add_action( 'wp_enqueue_scripts', 'realestate_enqueue_styles' );

function realestate_theme_init() {
	register_nav_menus(array(
	'header-menu' => "Header Menu",
	'footer-menu' => "Footer Menu",
	'social-footer-menu' => "Social Footer Menu"
	));
	load_theme_textdomain( 'realestate', get_template_directory() . '/languages' );
}

add_action('after_setup_theme', 'realestate_theme_init');

function realestate_register_post_type_property() {

	$labels = array(
		'name'              => esc_html_x( 'Cities', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => esc_html_x( 'City', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => esc_html__( 'Search Cities', 'textdomain' ),
		'all_items'         => esc_html__( 'All Cities', 'textdomain' ),
		'parent_item'       => esc_html__( 'Parent City', 'textdomain' ),
		'parent_item_colon' => esc_html__( 'Parent City:', 'textdomain' ),
		'edit_item'         => esc_html__( 'Edit City', 'textdomain' ),
		'update_item'       => esc_html__( 'Update City', 'textdomain' ),
		'add_new_item'      => esc_html__( 'Add New City', 'textdomain' ),
		'new_item_name'     => esc_html__( 'New City Name', 'textdomain' ),
		'menu_name'         => esc_html__( 'City', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'City' ),
	);

	register_taxonomy('cities', array('property'), $args);

	unset ($args);

	$labels = array(
		'name'              => esc_html_x( 'Features', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => esc_html_x( 'Feature', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => esc_html__( 'Search Features', 'textdomain' ),
		'all_items'         => esc_html__( 'All Features', 'textdomain' ),
		'parent_item'       => esc_html__( 'Parent Feature', 'textdomain' ),
		'parent_item_colon' => esc_html__( 'Parent Feature:', 'textdomain' ),
		'edit_item'         => esc_html__( 'Edit Feature', 'textdomain' ),
		'update_item'       => esc_html__( 'Update Feature', 'textdomain' ),
		'add_new_item'      => esc_html__( 'Add New Feature', 'textdomain' ),
		'new_item_name'     => esc_html__( 'New Feature Name', 'textdomain' ),
		'menu_name'         => esc_html__( 'Feature', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => false,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'features' ),
	);

	register_taxonomy('features', array('property'), $args);

	unset ($args);

	$args = [
		'label' => esc_html__("Properties", 'realestate'), 
		'public' => true,
		'has_archive' => true,
		'supports' => [
			'title',
			'editor',
			'thumbnail',
			'excerpt',
			'custom-fields'
		],
		'rewrite' => array( 'slug' => 'properties')
	];
	register_post_type( 'Property', $args);
}

add_action( 'init', 'realestate_register_post_type_property' );

function hide_admin_bar_for_members() {
    if (current_user_can('subscriber')) {
        show_admin_bar(false);
    }
}
add_action('after_setup_theme', 'hide_admin_bar_for_members');


function realestate_create_post_handler() {
	$post_title = $_POST['post_title'];
	$post_content = $_POST['post_content'];
	$custom_field_status = $_POST['custom_field_status'];
	$custom_field_price = $_POST['custom_field_price'];
	$custom_field_area = $_POST['custom_field_area'];
	$custom_field_bed_room = $_POST['custom_field_bed_room'];
	$custom_field_bath_room = $_POST['custom_field_bath_room'];
	$custom_field_garage = $_POST['custom_field_garage'];
	$custom_field_waterfront = $_POST['custom_field_waterfront'];
	$custom_field_built_in = $_POST['custom_field_built_in'];
	$custom_field_parking = $_POST['custom_field_parking'];
	$custom_field_view = $_POST['custom_field_view'];

	$taxonomy1_terms = $_POST['cities'];
	$categories_terms = isset( $_POST['categories'] ) ? $_POST['categories'] : array();

	$new_post = array(
	  'post_title'   => $post_title,
	  'post_content' => $post_content,
	  'post_status'  => 'publish',
	  'post_author'  => get_current_user_id(),
	  'post_type'    => 'property' 
	);
  
	$post_id = wp_insert_post( $new_post );
  
	if ( $post_id ) {
		update_post_meta( $post_id, 'status', $custom_field_status );
		update_post_meta( $post_id, 'price', $custom_field_price );
		update_post_meta( $post_id, 'area', $custom_field_area );
		update_post_meta( $post_id, 'bed_room', $custom_field_bed_room );
		update_post_meta( $post_id, 'bath_room', $custom_field_bath_room );
		update_post_meta( $post_id, 'garage', $custom_field_garage );
		update_post_meta( $post_id, 'waterfront', $custom_field_waterfront );
		update_post_meta( $post_id, 'built_in', $custom_field_built_in );
		update_post_meta( $post_id, 'parking', $custom_field_parking );
		update_post_meta( $post_id, 'view', $custom_field_view );
		
		wp_set_object_terms( $post_id, intval( $taxonomy1_terms ), 'cities' );
		wp_set_post_terms( $post_id, $categories_terms, 'features' );

		if ( ! empty( $_FILES['post_image'] ) ) {
			$image_file = $_FILES['post_image'];
			$upload_overrides = array( 'test_form' => false );
			$attachment_id = media_handle_upload( 'post_image', $post_id, $upload_overrides );
	  
			if ( is_wp_error( $attachment_id ) ) {
			  echo 'Произошла ошибка при загрузке изображения.';
			} else {
			  set_post_thumbnail( $post_id, $attachment_id );
			}
		  }

    if ( ! empty( $_FILES['image1'] ) ) {
		$image1_file = $_FILES['image1'];
		$image1_attachment_id = media_handle_upload( 'image1', $post_id );
		if ( ! is_wp_error( $image1_attachment_id ) ) {
		  update_post_meta( $post_id, 'image1', $image1_attachment_id );
		}
	  }
  
	  if ( ! empty( $_FILES['image2'] ) ) {
		$image2_file = $_FILES['image2'];
		$image2_attachment_id = media_handle_upload( 'image2', $post_id );
		if ( ! is_wp_error( $image2_attachment_id ) ) {
		  update_post_meta( $post_id, 'image2', $image2_attachment_id );
		}
	  }
  
	  if ( ! empty( $_FILES['image3'] ) ) {
		$image3_file = $_FILES['image3'];
		$image3_attachment_id = media_handle_upload( 'image3', $post_id );
		if ( ! is_wp_error( $image3_attachment_id ) ) {
		  update_post_meta( $post_id, 'image3', $image3_attachment_id );
		}
	  }		

	  wp_redirect( get_permalink( $post_id ) );
	  exit;
	} else {
	  echo 'Произошла ошибка при создании поста.';
	}
  }
  add_action( 'admin_post_nopriv_create_post', 'realestate_create_post_handler' );
  add_action( 'admin_post_create_post', 'realestate_create_post_handler' );


  

function realestate_create_post_shortcode() {
    if (is_user_logged_in()) {
        $button = '<a href="/new-property"><button class="navbar-btn nav-button wow bounceInRight login" data-wow-delay="0.45s">Submit your property</button></a><a href="/logout"><button class="navbar-btn nav-button wow bounceInRight login" data-wow-delay="0.45s">Logout</button></a>';
    } else {
        $button = '<a href="/login"><button class="navbar-btn nav-button wow bounceInRight login" data-wow-delay="0.45s">Login</button></a>';
    }

    return $button;
}
add_shortcode('create_post', 'realestate_create_post_shortcode');


function realestate_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on RealEstate, use a find and replace
		* to change 'realestate' to the name of your theme in all the template files.
		*/
	

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'realestate' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'realestate_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'realestate_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function realestate_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'realestate_content_width', 640 );
}
add_action( 'after_setup_theme', 'realestate_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function realestate_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'realestate' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'realestate' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'realestate_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function realestate_scripts() {
	wp_enqueue_style( 'realestate-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'realestate-style', 'rtl', 'replace' );

	wp_enqueue_script( 'realestate-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'realestate_scripts' );

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
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

