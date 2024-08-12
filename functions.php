<?php
/* =================================================================
Functions and definitions
================================================================= */

/* =================================================================
Table of Contents
 - Document title
 - Post Thumbnails
 - Defaul core markup
 - Navigation
	- Primary navigation
	- Secondary Navigation
 - Register widget area
 - Scripts and styles
 - Custom post types
 - ACF support
 - ACF options page
 - ACF options page styles
 - Disable Gutenberg
 - Disable widget block editor
 - SVG support
 - Multiple Excerpt Lengths
 - Featured Post meta box
================================================================= */

/* =================================================================
Let WordPress manage the document title.
================================================================= */
add_theme_support( 'title-tag' );

/* =================================================================
Enable support for Post Thumbnails on posts and pages.
================================================================= */
add_theme_support( 'post-thumbnails' );

/* =================================================================
Switch default core markup for search form, comment form, and comments to output valid HTML5.
================================================================= */
add_theme_support( 'html5', array(
	'search-form',
	'comment-form',
	'comment-list',
	'gallery',
	'caption',
) );

/* =================================================================
Include primary / secondary navigation menu
================================================================= */
function listandfound_nav_init() {
	register_nav_menus( array(
		'menu-1' => 'Primary Menu',
		'menu-2' => 'Secondary Menu',
	) );
}
add_action( 'init', 'listandfound_nav_init' );

/* =================================================================
Register widget area.
================================================================= 
function listandfound_widgets_init() {
	register_sidebar( array(
		'name'          => 'Sidebar',
		'id'            => 'sidebar-1',
		'description'   => 'Add widgets',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'listandfound_widgets_init' );*/

/* =================================================================
Enqueue scripts and styles.
================================================================= */
function listandfound_scripts() {
	wp_enqueue_style( 'listandfound-reset-style', get_template_directory_uri() . '/assets/css/reset.css' );
	wp_enqueue_style( 'listandfound-custom-style', get_template_directory_uri() . '/assets/css/style.css' );
	wp_enqueue_style( 'listandfound-options-style', get_template_directory_uri() . '/assets/css/options-styles.css' );
	wp_enqueue_style( 'listandfound-font', 'https://use.typekit.net/jru6sly.css' );
    wp_enqueue_style( 'load-fa', 'https://use.fontawesome.com/releases/v5.6.3/css/all.css' );
    wp_enqueue_script("jquery");
    wp_enqueue_script( 'lottie-js', 'https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.8.1/lottie.min.js' );
}
add_action( 'wp_enqueue_scripts', 'listandfound_scripts' );

function listandfound_scripts_footer() {
	wp_enqueue_style( 'listandfound-style', get_stylesheet_uri() );
	wp_enqueue_style( 'listandfound-aos-style', get_template_directory_uri() . '/assets/css/aos.css' );

    wp_enqueue_style( 'slick-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css' );
    wp_enqueue_script( 'slick-js', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js' );

    wp_enqueue_script( 'counterup2-js', 'https://unpkg.com/counterup2@2.0.2/dist/index.js' );
    wp_enqueue_script( 'waypoints-js', 'https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js' );

    

    wp_enqueue_script( 'listandfound-scripts', get_template_directory_uri() . '/assets/js/scripts.js' );
}
add_action( 'get_footer', 'listandfound_scripts_footer' );

function my_acf_admin_enqueue_scripts() {
    wp_enqueue_style( 'my-acf-input-css', get_stylesheet_directory_uri() . '/assets/css/acf-options-styles.css', false, '1.0.0' );
	wp_enqueue_style( 'load-fa', 'https://use.fontawesome.com/releases/v5.6.3/css/all.css' );
}
add_action('acf/input/admin_enqueue_scripts', 'my_acf_admin_enqueue_scripts');

/* =================================================================
Custom post types
================================================================= */



/* =================================================================
ACF Support
================================================================= */

// Define path and URL to the ACF plugin.
// define( 'MY_ACF_PATH', get_stylesheet_directory() . '/includes/acf/' );
// define( 'MY_ACF_URL', get_stylesheet_directory_uri() . '/includes/acf/' );

// Include the ACF plugin.
//include_once( MY_ACF_PATH . 'acf.php' );

// Customize the url setting to fix incorrect asset URLs.
// add_filter('acf/settings/url', 'my_acf_settings_url');

// function my_acf_settings_url( $url ) {
//     return MY_ACF_URL;
// }

// (Optional) Hide the ACF admin menu item. Enable / Disable to edit fields
 //add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');
 function my_acf_settings_show_admin( $show_admin ) {
   return false;
 }

add_filter( 'acf/admin/prevent_escaped_html_notice', '__return_true' );

/* =================================================================
ACF options page
================================================================= */
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
		'position' => 2.1,
		'icon_url' => 'dashicons-admin-site-alt3',
        'update_button' => 'Save options',
        'updated_message' => 'Options saved',
	));	
}

/* =================================================================
ACF options page styles
================================================================= */

function generate_options_css() {
    $ss_dir = get_stylesheet_directory();
    ob_start(); // Capture all output into buffer
    require($ss_dir . '/assets/css/options-styles.php'); // Grab the custom-style.php file
    $css = ob_get_clean(); // Store output in a variable, then flush the buffer
    file_put_contents($ss_dir . '/assets/css/options-styles.css', $css, LOCK_EX); // Save it as a css file
}
add_action( 'acf/save_post', 'generate_options_css', 20 ); //Parse the output and write the CSS file on post save (thanks Esmail Ebrahimi)

/* =================================================================
Disable Gutenberg
================================================================= */
add_filter("use_block_editor_for_post_type", "disable_gutenberg_editor");
function disable_gutenberg_editor()
{
return false;
}

/* =================================================================
Disable widget block editor
================================================================= */
function example_theme_support() {
    remove_theme_support( 'widgets-block-editor' );
}
add_action( 'after_setup_theme', 'example_theme_support' );

/* =================================================================
SVG support
================================================================= */
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {
	$filetype = wp_check_filetype( $filename, $mimes );
	return [
		'ext'             => $filetype['ext'],
		'type'            => $filetype['type'],
		'proper_filename' => $data['proper_filename']
	];
  
  }, 10, 4 );
  
  function cc_mime_types( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
  }
  add_filter( 'upload_mimes', 'cc_mime_types' );
  
  function fix_svg() {
	echo '<style type="text/css">
		  .attachment-266x266, .thumbnail img {
			   width: 100% !important;
			   height: auto !important;
		  }
		  </style>';
  }
  add_action( 'admin_head', 'fix_svg' );

/* =================================================================
Multiple Excerpt Lengths
================================================================= */
function wpe_excerptlength_teaser( $length ) {
    
    return 15;
}
function wpe_excerptlength_index( $length ) {
    
    return 45;
}
function wpe_excerptmore( $more ) {
    
    return '...';
}

function wpe_excerpt( $length_callback = '', $more_callback = '' ) {
    
    if ( function_exists( $length_callback ) )
        add_filter( 'excerpt_length', $length_callback );
    
    if ( function_exists( $more_callback ) )
        add_filter( 'excerpt_more', $more_callback );
    
    $output = get_the_excerpt();
    $output = apply_filters( 'wptexturize', $output );
    $output = apply_filters( 'convert_chars', $output );
    
    echo $output;
}

/*===============================================================================================
=================================================================================================
       ____________                ___________              _________               _________
      /            \              /           \            /         \             /         \ 
     /              \            /             \          /           \           /           \
    |        |       \          /      ___      \        /             \___   ___/             \ 
    |        |        \        /      /   \      \      |                  \ /                 |
    |        |        |       /      /     \      \     |                                      |
    |        |        |      |      |       |     |     |                                      |
    |        \        /      |      |       |     |     |                                      |
     \        \      /       |      |       |     |     |         |\               /|          |
      \        \____/        |       \_____/      |     |         | \             / |          |
       \        \            |                    |     |         |  \           /  |          |
        \        \           |        _____       |     |         |   \         /   |          |
     ____\        \          |       /     \      |     |         |    \       /    |          |
    /     \        \         |      |       |     |     |         |     \_____/     |          |
   /       \       |         |      |       |     |     |         |                 |          |
  |        |       |         |      |       |     |     |         |                 |          |
  |        |       |         |      |       |     |     |         |                 |          |
   \       |       |         |      |       |     |     |         |                 |          |
    \      |       |         |      |       |     |     |         |                 |          |
     \             /          \     |       |     /     \         |                 |         /
      \___________/            \____|       |____/       \________/                  \_______/
=================================================================================================
===============================================================================================*/

//Remove Query Strings From Static Resources 
function smartwp_remove_query_strings_from_static_resources( $src ) {
 if( strpos( $src, '?v=' ) ){
 $src = remove_query_arg( 'v', $src );
 }
 if( strpos( $src, '?ver=' ) ){
 $src = remove_query_arg( 'ver', $src );
 }
 return $src;
}
add_filter( 'script_loader_src', 'smartwp_remove_query_strings_from_static_resources', 999 );
add_filter( 'style_loader_src', 'smartwp_remove_query_strings_from_static_resources', 999 );

//Enabled HTML5 Support For Scripts & Styles
add_action(
    'after_setup_theme',
    function() {
        add_theme_support( 'html5', [ 'script', 'style' ] );
    }
);

//Register Glossary
add_action( 'init', 'create_glossary' );
function create_glossary() {
  register_post_type( 'glossary',
    array(
      'labels' => array(
        'name' => __( 'Glossary' ),
        'singular_name' => __( 'Glossary' )
      ),
      'public' => true,
      'has_archive' => false,
      'rewrite' => array('slug' => 'explained', 'with_front' => false),
      'supports' => array( 'title', 'editor', 'custom-fields', 'thumbnail', 'excerpt', 'wpcom-markdown')
    )
  );
}

//Remove Emoji Junk
function disable_wp_emojicons() {

  // all actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

  // filter to remove TinyMCE emojis
  add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
add_action( 'init', 'disable_wp_emojicons' );

