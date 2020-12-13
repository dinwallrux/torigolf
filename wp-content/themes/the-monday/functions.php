<?php
/**
 * The Monday functions and definitions
 *
 * @package The Monday
 */

if ( ! function_exists( 'the_monday_setup' ) ) :

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function the_monday_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on The Monday, use a find and replace
	 * to change 'the-monday' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'the-monday', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
    
    /**
     * define custom image size
     */
    add_image_size( 'the-monday-about-left', 1130, 990, true ); // size for left side in About us section
    add_image_size( 'the-monday-about-right', 787, 451, true ); // size for right side in About us section
    add_image_size( 'the-monday-project-thumb', 500, 500 ); // size for project post thumb
    add_image_size( 'the-monday-classic-blog-thumb', 869, 451, true ); // size for post thumb in classic layout
    

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'the-monday' ),
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

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'the_monday_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // the_monday_setup
add_action( 'after_setup_theme', 'the_monday_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function the_monday_content_width() {
    if ( ! isset( $content_width ) ) {
    	$content_width = 640; /* pixels */
    }
	$GLOBALS['content_width'] = apply_filters( 'the_monday_content_width', 640 );
}
add_action( 'after_setup_theme', 'the_monday_content_width', 0 );



/**
 * Define Theme version
 */
    $my_theme = wp_get_theme();
    $theme_version = $my_theme->get( 'Version' );
    define( 'THE_MONDAY_THEME_VERSION', esc_attr( $theme_version ) );

/**
 * Define directory loction constants in The Monday theme
 * 
 */
define( 'THE_MONDAY_PARENT_DIR', get_template_directory() );
define( 'THE_MONDAY_CHILD_DIR', get_stylesheet_directory() );
 
define( 'THE_MONDAY_INCLUDES_DIR', THE_MONDAY_PARENT_DIR. '/inc' );
define( 'THE_MONDAY_CSS_DIR', THE_MONDAY_PARENT_DIR. '/css' );
define( 'THE_MONDAY_JS_DIR', THE_MONDAY_PARENT_DIR. '/js' );
define( 'THE_MONDAY_LANGUAGE_DIR', THE_MONDAY_PARENT_DIR. '/languages' );
define( 'THE_MONDAY_IMAGES_DIR', THE_MONDAY_PARENT_DIR. '/images' );

define( 'THE_MONDAY_ADMIN_DIR', THE_MONDAY_INCLUDES_DIR. '/admin' );
define( 'THE_MONDAY_ADMIN_JS_DIR', THE_MONDAY_ADMIN_DIR. '/js' );
define( 'THE_MONDAY_ASSETS_DIR', THE_MONDAY_INCLUDES_DIR. '/assets' ); 
define( 'THE_MONDAY_WIDGETS_DIR', THE_MONDAY_INCLUDES_DIR. '/widgets' );
define( 'THE_MONDAY_ADMIN_IMAGES_DIR', THE_MONDAY_ADMIN_DIR. '/images' );
define( 'THE_MONDAY_ADMIN_CSS_DIR', THE_MONDAY_ADMIN_DIR. '/css' );
define( 'THE_MONDAY_ADMIN_METABOX_DIR', THE_MONDAY_ADMIN_DIR. '/metabox' );
 
 define( 'THE_MONDAY_PANEL_DIR', THE_MONDAY_ASSETS_DIR. '/panels' );
 
 
 /**
 * Define url loction constants in The Monday theme
 * 
 */
define( 'THE_MONDAY_PARENT_URL', get_template_directory_uri() );
define( 'THE_MONDAY_CHILD_URL', get_stylesheet_directory_uri() );
 
define( 'THE_MONDAY_INCLUDES_URL',THE_MONDAY_PARENT_URL .'/inc' );
define( 'THE_MONDAY_CSS_URL', THE_MONDAY_PARENT_URL. '/css' );
define( 'THE_MONDAY_JS_URL', THE_MONDAY_PARENT_URL. '/js' );
define( 'THE_MONDAY_LANGUAGE_URL', THE_MONDAY_PARENT_URL. '/languages' );
define( 'THE_MONDAY_IMAGES_URL', THE_MONDAY_PARENT_URL. '/images' );
 
define( 'THE_MONDAY_ADMIN_URL', THE_MONDAY_INCLUDES_URL. '/admin' );
define( 'THE_MONDAY_ADMIN_CSS_URL', THE_MONDAY_ADMIN_URL. '/css' );
define( 'THE_MONDAY_ADMIN_JS_URL', THE_MONDAY_ADMIN_URL. '/js' );
define( 'THE_MONDAY_ADMIN_IMAGES_URL', THE_MONDAY_ADMIN_URL. '/images' );
define( 'THE_MONDAY_ADMIN_METABOX_URL', THE_MONDAY_ADMIN_URL. '/metabox' );
   
define( 'THE_MONDAY_ASSETS_URL', THE_MONDAY_INCLUDES_URL. '/assets' );
define( 'THE_MONDAY_WIDGETS_URL', THE_MONDAY_INCLUDES_URL. '/widgets' );

/**
 * Implement the Custom Header feature.
 */
require THE_MONDAY_INCLUDES_DIR . '/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require THE_MONDAY_INCLUDES_DIR . '/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require THE_MONDAY_INCLUDES_DIR . '/extras.php';

/**
 * Customizer additions.
 */
require THE_MONDAY_INCLUDES_DIR . '/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require THE_MONDAY_INCLUDES_DIR . '/jetpack.php';

/**
 * Load custom function file.
 */
require THE_MONDAY_INCLUDES_DIR . '/the-monday-functions.php';

/**
 * Load widget area.
 */
require THE_MONDAY_INCLUDES_DIR . '/the-monday-widgets-area.php';

/**
 * Load Different Widgets.
 */
require THE_MONDAY_INCLUDES_DIR . '/the-monday-widgets.php';

/**
 * Load template file for header slider.
 */
require THE_MONDAY_ASSETS_DIR . '/the-monday-slider.php';

/**
 * Load Custom classes file.
 */
require THE_MONDAY_ASSETS_DIR . '/the-monday-custom-class.php';

/**
 * Load Sanitization file.
 */
require THE_MONDAY_ASSETS_DIR . '/the-monday-sanitize.php';

/**
 * Implement the custom metabox
 */
require THE_MONDAY_ADMIN_METABOX_DIR . '/the-monday-sidebar.php';

/**
 * load breadcrumbs function
 */
require THE_MONDAY_INCLUDES_DIR . '/the-monday-breadcrumbs.php';

/**
 * Load TGMPA function
 */
require THE_MONDAY_INCLUDES_DIR . '/tgm/the-monday-tgmpa.php';

/**
 * More Themes by AccessPress
 */
require THE_MONDAY_INCLUDES_DIR . '/the-monday-more-themes.php';

/**
 * Load panel files.
 */
require THE_MONDAY_PANEL_DIR . '/the-monday-general.php'; //Load General settings panel
require THE_MONDAY_PANEL_DIR . '/the-monday-header.php'; //Load Header settings panel
require THE_MONDAY_PANEL_DIR . '/the-monday-homepage.php'; //Load Homepage settings panel
require THE_MONDAY_PANEL_DIR . '/the-monday-design.php'; //Load Design Layout settings panel
require THE_MONDAY_PANEL_DIR . '/the-monday-typography.php'; //Load Footer settings panel
require THE_MONDAY_PANEL_DIR . '/the-monday-footer.php'; //Load Footer settings panel