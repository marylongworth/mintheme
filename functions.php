<?php
/**
 * Min Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mintheme
 */

// Include the Redux theme options Framework
if ( !class_exists( 'ReduxFramework' ) ) {
	require_once( get_template_directory() . '/redux/framework.php' );
}
 
// Register all the theme options
require_once( get_template_directory() . '/inc/redux-config.php' );

// Theme options functions
require_once( get_template_directory() . '/inc/mintheme-options.php' );

/**
 * Theme Options - Custom CSS.
 */
require get_template_directory() . '/inc/custom-css.php';

if ( ! function_exists( 'mintheme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function mintheme_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Min Theme, use a find and replace
	 * to change 'mintheme' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'mintheme', get_template_directory() . '/languages' );

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
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'mintheme' ),
        'footer-menu' => __( 'Footer Menu', 'mintheme' ),
	) );	/*
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

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'mintheme_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'mintheme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mintheme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'mintheme_content_width', 640 );
}
add_action( 'after_setup_theme', 'mintheme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mintheme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Right', 'mintheme' ),
		'id'            => 'sidebar-right',
		'description'   => esc_html__( 'Add widgets here.', 'mintheme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Left', 'mintheme' ),
		'id'            => 'sidebar-left',
		'description'   => esc_html__( 'Add widgets here.', 'mintheme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'mintheme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mintheme_scripts() {
	wp_enqueue_style( 'bootstrap-styles', get_template_directory_uri() . '/css/'. mint_option('css_style', 'bootstrap.min.css'), array(), '3.3.6', 'all' );
 
 	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.6.3', 'all' );
 
	wp_enqueue_style( 'mintheme-style', get_stylesheet_uri() );

	wp_enqueue_script( 'mintheme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.6', true );
	
	wp_enqueue_script( 'mintheme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'isotope-js', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array('jquery'), '2.0.1', true );

	wp_enqueue_script( 'imagesloaded-js', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array('jquery'), '3.1.8', true );
 
	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/main.js', array('jquery'), '3.2.0', true );
 
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mintheme_scripts' );

/**
 * Add Respond.js for IE
 */
if( !function_exists('ie_scripts')) {
	function ie_scripts() {
	 	echo '<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->';
	   	echo ' <!-- WARNING: Respond.js doesn\'t work if you view the page via file:// -->';
	   	echo ' <!--[if lt IE 9]>';
	    echo ' <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>';
	    echo ' <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>';
	   	echo ' <![endif]-->';
   	}
   	add_action('wp_head', 'ie_scripts');
} // end if

// Load the featured boxes
		function mintheme_not_found() { ?>
				<h1 class="arc-post-title"><?php echo __('Sorry, we could not find anything that matched...', 'mintheme'); ?></h1>
				<h3 class="arc-src"><span><?php echo __('You Can Try the Search...', 'mintheme'); ?></span></h3>
				<?php get_search_form(); ?>
				<p><a href="<?php echo home_url(); ?>" title="<?php __('Browse the Home Page', 'mintheme') ?>"><?php echo __('&laquo; Or Return to the Home Page', 'mintheme'); ?></a></p><br />
				<h2 class="post-title-color"><?php echo __('You can also Visit the Following. These are the Featured Contents', 'mintheme'); ?></h2>
				<div class="content-ver-sep"></div><br />
				<?php get_template_part( 'featured-box' ); 
			
			}

/**
 * Load Bootstrap Menu.
 */
require get_template_directory() . '/inc/bootstrap-walker.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
/**
 * Comments Callback.
 */
require get_template_directory() . '/inc/comments-callback.php';
/**
 * Comments Callback.
 */
require get_template_directory() . '/inc/post-types/CPT.php';
/**
 * Portfolio
 */
require get_template_directory() . '/inc/post-types/register-portfolio.php';
/**
 * Slider
 */
require get_template_directory() . '/inc/post-types/register-slider.php';
/**
 * Featured items on the homepage
 */
require get_template_directory() . '/inc/post-types/register-featured.php';
