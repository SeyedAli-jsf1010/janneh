<?php
/**
 * Theme functions and definitions
 *
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly

/*
 * Works with PHP 5.3 or Later
 */
if ( version_compare( phpversion(), '5.3', '<' ) ) {
	require get_template_directory() . '/framework/functions/php-disable.php';
	return;
}

/*
 * Define Constants
 */
define( 'TIELABS_DB_VERSION',            '4.7.0' );
define( 'TIELABS_THEME_SLUG',            'jannah' );
define( 'TIELABS_TEXTDOMAIN',            'jannah' );
define( 'TIELABS_THEME_ID',              '19659555' );
define( 'TIELABS_TEMPLATE_PATH',         get_template_directory() );
define( 'TIELABS_TEMPLATE_URL',          get_template_directory_uri() );
define( 'TIELABS_AMP_IS_ACTIVE',         function_exists( 'amp_init' ));
define( 'TIELABS_WPUC_IS_ACTIVE',        function_exists( 'run_MABEL_WPUC' ));
define( 'TIELABS_ARQAM_IS_ACTIVE',       function_exists( 'arqam_init' ));
define( 'TIELABS_SENSEI_IS_ACTIVE',      function_exists( 'Sensei' ));
define( 'TIELABS_TAQYEEM_IS_ACTIVE',     function_exists( 'taqyeem_get_option' ));
define( 'TIELABS_EXTENSIONS_IS_ACTIVE',  function_exists( 'jannah_extensions_shortcodes_scripts' ));
define( 'TIELABS_BBPRESS_IS_ACTIVE',     class_exists( 'bbPress' ));
define( 'TIELABS_JETPACK_IS_ACTIVE',     class_exists( 'Jetpack' ));
define( 'TIELABS_BWPMINIFY_IS_ACTIVE',   class_exists( 'BWP_MINIFY' ));
define( 'TIELABS_REVSLIDER_IS_ACTIVE',   class_exists( 'RevSlider' ));
define( 'TIELABS_CRYPTOALL_IS_ACTIVE',   class_exists( 'CPCommon' ));
define( 'TIELABS_BUDDYPRESS_IS_ACTIVE',  class_exists( 'BuddyPress' ));
define( 'TIELABS_LS_Sliders_IS_ACTIVE',  class_exists( 'LS_Sliders' ));
define( 'TIELABS_FB_INSTANT_IS_ACTIVE',  class_exists( 'Instant_Articles_Wizard' ));
define( 'TIELABS_WOOCOMMERCE_IS_ACTIVE', class_exists( 'WooCommerce' ));
define( 'TIELABS_MPTIMETABLE_IS_ACTIVE', class_exists( 'Mp_Time_Table' ));

/*
 * Theme Settings Option Field
 */
add_filter( 'TieLabs/theme_options', 'jannah_theme_options_name' );
function jannah_theme_options_name( $option ){
	return 'tie_jannah_options';
}

/*
 * Translatable Theme Name
 */
add_filter( 'TieLabs/theme_name', 'jannah_theme_name' );
function jannah_theme_name( $option ){
	return esc_html__( 'Jannah', TIELABS_TEXTDOMAIN );
}

/**
 * Default Theme Color
 */
add_filter( 'TieLabs/default_theme_color', 'jannah_theme_color' );
function jannah_theme_color(){
	return '#0088ff';
}

/*
 * Import Files
 */
require TIELABS_TEMPLATE_PATH . '/framework/framework-load.php';
require TIELABS_TEMPLATE_PATH . '/inc/theme-setup.php';
require TIELABS_TEMPLATE_PATH . '/inc/style.php';
require TIELABS_TEMPLATE_PATH . '/inc/deprecated.php';
require TIELABS_TEMPLATE_PATH . '/inc/widgets.php';
require TIELABS_TEMPLATE_PATH . '/inc/updates.php';

if( is_admin() ){
	require TIELABS_TEMPLATE_PATH . '/inc/help-links.php';
}

/**
 * Load the Sliders.js file in the Post Slideshow shortcode
 */
if( ! function_exists( 'jannah_enqueue_js_slideshow_sc' ) ){

	add_action( 'tie_extensions_sc_before_post_slideshow', 'jannah_enqueue_js_slideshow_sc' );
	function jannah_enqueue_js_slideshow_sc(){
		wp_enqueue_script( 'tie-js-sliders' );
	}
}

/*
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
add_action( 'wp_body_open',      'jannah_content_width' );
add_action( 'template_redirect', 'jannah_content_width' );
function jannah_content_width() {

	$content_width = ( TIELABS_HELPER::has_sidebar() ) ? 708 : 1220;

	/**
	 * Filter content width of the theme.
	 */
	$GLOBALS['content_width'] = apply_filters( 'TieLabs/content_width', $content_width );
}

//

//register new post_type

//
function modernpost()
{
    $labels = array(
        'name' => 'مقالات',
        'singular_name' => 'article',
        'all_items' => 'همه ی مقالات',
        'edit_item' => 'ویرایش مقاله',
        'add_new' => 'مقاله جدید',
        'new_item' => 'مقاله جدید'
    );
    register_post_type('modernpost', array(
        'public' => true,
        'taxonomies' => array('mpost_cat', 'mpost_tag'),
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'comments'),
        'has_archive' => true,
        'menu_icon' => 'dashicons-text-page',
        'show_in_nav_menus' => true,
        'labels' => $labels


    ));
}

add_action('init', 'modernpost');

function custom_tax()
{
    $labels_cat = array(
        'name' => 'دسته بندی ها',
        'singular_name' => 'دسته',
        'search_items' => 'جستجوی دسته',
        'all_items' => 'همه ی دسته ها',
        'parent_item' => 'دسته پدر',
        'edit_item' => 'ویرایش دسته',
        'update_item' => 'بروزرسانی دسته',
        'add_new_item' => 'اضافه کردن دسته جدید',
        'new_item_name' => 'نام دسته جدسد',
        'menu_name' => 'دسته ها',
    );
    $labels_tag = array(
        'name' => 'برچسب ها',
        'singular_name' => 'tag',
        'search_items' => 'جستجوی برچسب',
        'all_items' => 'همه ی برچسب ها',
        'popular_items' => 'برچسب های محبوب',
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => 'ویرایش برچسب',
        'update_item' => 'بروزرسانی برچسب',
        'add_new_item' => 'اضافه کردن برچسب جدید',
        'new_item_name' => 'نام برچسب جدسد',
        'menu_name' => 'برچسب ها',
        'separate_items_with_commas' => 'جداکردن برچسب ها با کاما',
        'add_or_remove_items' => 'اضافه کردن یا حذف برچسب ها',
        'choose_from_most_used' => 'انتخاب از میان برچسبهای محبوب'
    );

// Now register the taxonomy

    register_taxonomy('mpost_cat', 'modernpost', array(
        'hierarchical' => true,
        'labels' => $labels_cat,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'query_var' => true
    ));
    register_taxonomy('mpost_tag', array('modernpost'), array(
        'labels' => $labels_tag,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,

        'query_var' => true
    ));


}

add_action('init', 'custom_tax');