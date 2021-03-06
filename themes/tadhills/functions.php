<?php
/**
 * TadHills functions and definitions
 *
 * Much of what I do is take out stuff, especially the Twenty Ten header crap.
 *
 * The first function, twentyten_setup(), sets up the theme by registering support
 * for various features in WordPress, such as post thumbnails, navigation menus, and the like.
 *
 *
 * @package WordPress
 * @subpackage Tad_Hills
 * @since Tad Hills 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * Used to set the width of images and content. Should be equal to the width the theme
 * is designed for, generally via the style.css stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640;

/** Tell WordPress to run twentyten_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'twentyten_setup' );

if ( ! function_exists( 'twentyten_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override twentyten_setup() in a child theme, add your own twentyten_setup to your child theme's
 * functions.php file.
 *
 * @uses add_theme_support() To add support for post thumbnails and automatic feed links.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses add_custom_background() To add support for a custom background.
 * @uses add_editor_style() To style the visual editor.
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_custom_image_header() To add support for a custom header.
 * @uses register_default_headers() To register the default custom header images provided with the theme.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Twenty Ten 1.0
 */
function twentyten_setup() {

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Post Format support. You can also use the legacy "gallery" or "asides" (note the plural) categories.
	add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Make theme available for translation
	// Translations can be filed in the /languages/ directory
	load_theme_textdomain( 'twentyten', get_template_directory() . '/languages' );

	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'twentyten' ),
	) );

	// This theme allows users to set a custom background
	add_custom_background();

	// DW deleted - Your changeable header business starts here
	// DW deleted - No CSS, just IMG call. The %s is a placeholder for the theme template directory URI.
	// DW deleted - The height and width of your custom header. You can hook into the theme's own filters to change these values.
	// DW deleted - Add a filter to twentyten_header_image_width and twentyten_header_image_height to change these values.
	// DW deleted - Don't support text inside the header image.
	// DW deleted - Add a way for the custom header to be styled in the admin panel that controls
	// custom headers. See twentyten_admin_header_style(), below.
	// DW deleted -  Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.

	// Using post thumbnails for thumbnail grids of book covers 200 pixels wide and @220 high, cropped 
	set_post_thumbnail_size( 200, 220, true );
	add_image_size('book_cover', 406, 450, true  );     
	add_image_size('front', 360, 400, true  );
    /*
    	TODO May need to change thumbnail. AND will need to include more sizes.
    */


}
endif;

if ( ! function_exists( 'twentyten_admin_header_style' ) ) :
/**
 * DW deleted - Styles the header image displayed on the Appearance > Header admin panel.
 */
function twentyten_admin_header_style() {
// do nothing 
}
endif;

// smart jquery inclusion 
//http://digwp.com/2010/03/wordpress-functions-php-template-custom-functions/ 
function dw_add_js_scripts() {
	if (!is_admin()) {
   
		wp_enqueue_script('jquery'); 
		
		   wp_register_script('jquery_tools',
		       // get_bloginfo('stylesheet_directory') . '/js/jquery.tools.min.js', 
				'http://cdn.jquerytools.org/1.2.6/full/jquery.tools.min.js',
		       array('jquery'),
		       '1.0' );
		   // enqueue the script
		   wp_enqueue_script('jquery_tools');

	  }       
} 
//also need to figure out how do this with less repitition, more elegantly
add_action('init', 'dw_add_js_scripts');

if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Front Teaser Text',
'id' => 'front_teaser_text',
'description' => __( 'Widgets in this area will be shown on the right-hand side.' ),
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h2>',
'after_title' => '</h2>',
));

/**
 * Adds theme/plugin custom images sizes added with add_image_size() to the image uploader/editor.  This 
 * allows users to insert these images within their post content editor.
 *
 * @since Hybrid 1.3.0 - taken from Hybrid
 * @access private
 * @param array $sizes Selectable image sizes.
 * @return array $sizes
 */
function dw_image_size_names_choose( $sizes ) {

	/* Get all intermediate image sizes. */
	$intermediate_sizes = get_intermediate_image_sizes();
	$add_sizes = array();

	/* Loop through each of the intermediate sizes, adding them to the $add_sizes array. */
	foreach ( $intermediate_sizes as $size )
		$add_sizes[$size] = $size;

	/* Merge the original array, keeping it intact, with the new array of image sizes. */
	$sizes = array_merge( $add_sizes, $sizes );

	/* Return the new sizes plus the old sizes back. */
	return $sizes;
}
/* Add all image sizes to the image editor to insert into post. */
add_filter( 'image_size_names_choose', 'dw_image_size_names_choose' );