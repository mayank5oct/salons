<?php 

/**
 * Functions for Hairpress WP Theme
 * 
 * textdomain for translations: proteusthemes
 */

/**
 * Define the version variable to assign it to all the assets (css and js)
 */
define( "HAIRPRESS_WP_VERSION", wp_get_theme()->get( 'Version' ) );


//  ========== 
//  = Set the content width = 
//  ========== 
/*
 * @see http://developer.wordpress.com/themes/content-width/
 */
if ( ! isset( $content_width ) ) {
    $content_width = 700;
}
    

if( ! function_exists( 'hairpress_adjust_content_width' ) ) {
    function hairpress_adjust_content_width() { // adjust if necessary
        global $content_width;
    
        if ( is_page_template( 'page-no-sidebar.php' ) ) {
            $content_width = 940;
        }
    }
    add_action( 'template_redirect', 'hairpress_adjust_content_width' );
}



//  ========== 
//  = Option Tree Plugin = 
//  ========== 
/**
 * Optional: set 'ot_show_pages' filter to false.
 * This will hide the settings & documentation pages.
 */
add_filter( 'ot_show_pages', '__return_false' );

/**
 * Optional: set 'ot_show_new_layout' filter to false.
 * This will hide the "New Layout" section on the Theme Options page.
 */
add_filter( 'ot_show_new_layout', '__return_false' );

/**
 * Required: set 'ot_theme_mode' filter to true.
 */
add_filter( 'ot_theme_mode', '__return_true' );

/**
 * Required: include OptionTree.
 */
include_once( get_template_directory() . '/option-tree/ot-loader.php' );
/**
 * Theme Options
 */
include_once( get_template_directory() . '/inc/theme-options.php' );


  
//  ========== 
//  = Theme support and thumbnail sizes = 
//  ==========  
if( ! function_exists( 'hairpress_setup' ) ) {
    function hairpress_setup() {
        add_theme_support( 'menus' );
        add_theme_support( 'post-thumbnails' );
        
        // thumbnails
        add_image_size( 'services-front', 270, 172, true );
        add_image_size( 'slider', 1500, 530, true );
        add_image_size( 'team-large', 270, 370, true );
        add_image_size( 'team-small', 170, 233, true );
        
        // featured image size
        set_post_thumbnail_size( 200, 167, true );
    }
    add_action( 'after_setup_theme', 'hairpress_setup' );
}
 

 
//  ========== 
//  = ADD CSS = 
//  ==========
if( ! function_exists( 'register_my_css' ) ) {
    function register_my_css() {
    	// main style
    	wp_register_style( 'main-css', get_template_directory_uri() . "/assets/stylesheets/main.css", array( 'bootstrap', 'bootstrap-responsive' ), HAIRPRESS_WP_VERSION );
    	// bootstrap css
    	wp_register_style( 'bootstrap', get_template_directory_uri() . "/assets/stylesheets/bootstrap.css", false, '2.2.1' );
    	// bootstrap responsive css
    	wp_register_style( 'bootstrap-responsive', get_template_directory_uri() . "/assets/stylesheets/responsive.css", array( 'bootstrap' ), '2.2.1' );
    	// jquery UI theme
    	wp_register_style( 'jquery-ui-hairpress', get_template_directory_uri() . "/assets/jquery-ui/css/smoothness/jquery-ui-1.10.2.custom.min.css", false, array( '1.10.2' ) );
    }
    add_action( "init", "register_my_css" );
}

if( ! function_exists( 'add_my_css' ) ) {
        function add_my_css() {
        // add to the header
        if ( ! is_admin() && ! is_login_page() ) {
            wp_enqueue_style( 'main-css' );
            wp_enqueue_style( 'jquery-ui-hairpress' );
        }
    }
    add_action( "wp_enqueue_scripts", "add_my_css" );
}



//  ========== 
//  = ADD JS = 
//  ==========
if( ! function_exists( 'add_hairpress_js' ) ) {
    function add_hairpress_js() {
        // add to the header
        if ( ! is_admin() && ! is_login_page() ) {
            wp_enqueue_script( 'jquery' );
            wp_enqueue_script( 'jquery-ui-datepicker' );
            wp_enqueue_script( 'jquery-ui-slider' );
            wp_enqueue_script( 'jquery-ui-datetimepicker', get_template_directory_uri() . "/assets/js/jquery-ui-timepicker.js", array( 'jquery-ui-datepicker', 'jquery-ui-slider' ), FALSE, TRUE );
            wp_enqueue_script( 'jquery-ui-touch-fix', get_template_directory_uri() . "/assets/jquery-ui/touch-fix.min.js", array( 'jquery-ui-datetimepicker' ), FALSE, TRUE );
            wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . "/assets/js/bootstrap.min.js", array( 'jquery' ), FALSE, TRUE );
            wp_enqueue_script( 'carousel-js', get_template_directory_uri() . "/assets/js/jquery.carouFredSel-6.1.0-packed.js", array( 'jquery' ), FALSE, TRUE );
            
            
            
            wp_enqueue_script( 'custom-js', get_template_directory_uri() . "/assets/js/custom.js", array(
                    'jquery', 
                    'carousel-js', 
                    'bootstrap-js', 
                    'jquery-ui-datepicker' 
                ), HAIRPRESS_WP_VERSION, TRUE );
            
            wp_localize_script( 'custom-js', 'HairpressJS', array(
                'theme_slider_delay' => intval( (double)ot_get_option( 'theme_slider_delay', 8 ) * 1000 ),
                'datetimepicker_date_format' => ot_get_option( 'js_date_format', 'mm/dd/yy' )
            ) );
        }
    }
    add_action( "wp_enqueue_scripts", "add_hairpress_js" );
}





//  ========== 
//  = Translations = 
//  ==========
if( ! function_exists( 'load_proteusthemes_translations' ) ) {
    function load_proteusthemes_translations(){
        load_theme_textdomain( 'proteusthemes', get_template_directory() . '/languages' );
    }
    add_action('after_setup_theme', 'load_proteusthemes_translations');
}




//  ========== 
//  = Load OT variables = 
//  ========== 
if( ! function_exists( 'load_ot_settings' ) ) {
    function load_ot_settings() {
        global $content_divider;
        if ( function_exists( 'ot_get_option' ) ) {
            $content_divider = ot_get_option( 'content_divider', 'scissors' );
        }
    }
    add_action( 'init', 'load_ot_settings' );
}




//  ========== 
//  = Add menus = 
//  ==========
if( ! function_exists( 'add_theme_menus' ) ) {
    function add_theme_menus() {
        register_nav_menu( "main-menu", "Main Menu" );
    }
    add_action( "init", "add_theme_menus" );    
} 



//  ========== 
//  = Remove the gallery inline styling = 
//  ==========
add_filter( 'use_default_gallery_style', '__return_false' );



//  ========== 
//  = Require the files in the folder /inc/ = 
//  ========== 
$files_to_require = array(
    'helpers',
    'post-types',
    'ot-meta-boxes',
    'shortcodes',
    'twitter-bootstrap-nav-walker',
    'theme-widgets',
    'register-sidebars',
    'filters',
    'theme-customizer',
    'custom-comments',
);
/**
 * Conditionally require the includes files, based if they exist in the child theme or not
 */
foreach( $files_to_require as $file ) {
    if( file_exists( get_stylesheet_directory() . "/inc/{$file}.php" ) ) {
        require_once( get_stylesheet_directory() . "/inc/{$file}.php" );
    } else {
        require_once( get_template_directory() . "/inc/{$file}.php" );
    }
}

