<?php

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

show_admin_bar( false );
add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );
add_post_type_support( 'page', 'excerpt' );
add_post_type_support( 'projekte', 'excerpt' );

function ue_styles_scripts() {
  wp_enqueue_style( 'makeup', get_template_directory_uri().'/app/makeup/makeup.css' );
  wp_enqueue_script( 'uikit-js', get_template_directory_uri().'/app/src/libs/uikit/dist/js/uikit.min.js', array(), _S_VERSION, true );
  wp_enqueue_script( 'uikit-icons', get_template_directory_uri().'/app/src/libs/uikit/dist/js/uikit-icons.min.js', array(), _S_VERSION, true );
  wp_enqueue_script( 'magic', get_template_directory_uri().'/app/src/magic/app.js', array('flickty-js', 'uikit-icons'), _S_VERSION, true );    
}
add_action( 'wp_enqueue_scripts', 'ue_styles_scripts' );


function wpdocs_theme_setup() {
  if ( ! function_exists( 'fly_add_image_size' ) ) {
    fly_add_image_size( 'square', 600, 600, true );
    fly_add_image_size( 'square2x', 1200, 1200, true );
    fly_add_image_size( 'fourthree', 800, 600, false );
    fly_add_image_size( 'fourthree2x', 1600, 1200, false );
    fly_add_image_size( 'hero', 2800, 1000, array( 'center', 'center' ) );
    fly_add_image_size( 'portrait', 600, 800, false );
    fly_add_image_size( 'portrait-small', 400, 800, false );
    fly_add_image_size( 'portrait-xsmall', 300, 600, false );
    fly_add_image_size( 'cropped-16x9', 1600, 900, array( 'center', 'center' ) );
    fly_add_image_size( 'cropped-4x3', 1200, 900, array( 'center', 'center' ) );
  }
}
add_action( 'after_setup_theme', 'wpdocs_theme_setup' );


add_filter('xmlrpc_enabled', '__return_true');


function cc_mime_types($mimes) {
 $mimes['svg'] = 'image/svg+xml';
 return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


function pre_dump($value){
  echo "<pre>";
  var_dump($value);
  echo "</pre>";
}


function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Hauptmenu Top' ),
			'cart-menu' => __( 'Cart Top' ),
      'mobile-menu' => __( 'Sidebar Mobile' ),
      'footer-menu' => __( 'Fusszeile Menu' ),
      'footer-menu-col-4' => __( 'Fusszeile Menu Spalte 4' ),
      'footer-menu-col-3' => __( 'Fusszeile Menu Spalte 3' ),
      'footer-menu-col-2' => __( 'Fusszeile Menu Spalte 2' ),
			'footer-menu-col-1' => __( 'Fusszeile Menu Spalte 1' )
    )
  );
}
add_action( 'init', 'register_my_menus' );


function wp_img($id, $size="fourthree2x", $featured=0){
  $source = fly_get_attachment_image_src( $id, $size);
  $output['src'] = $source['src'];
  $output['id'] = $id;
  $output['alt'] = get_post_meta($output['id'], '_wp_attachment_image_alt', TRUE);
  $output['description'] = get_post_field('post_content', $output['id']);
  $output['caption'] = get_post_field('post_excerpt', $output['id']);
  $output['title'] = get_the_title($output['id']);
  $img = fly_get_attachment_image_src($id, array(1200, 1200), true);
  //$output['src'] = $img['src'];
  $output['width'] = $source['width'];
  $output['height'] = $source['height'];
  return $output;
}


if( ! function_exists('ue_get_nav_by_location') ) {
	function ue_get_nav_by_location( $location, $args = [] ) {
	    $locations = get_nav_menu_locations();
	    $object = wp_get_nav_menu_object( $locations[$location] );
	    $menu_items = wp_get_nav_menu_items( $object->name, $args );
	    return $menu_items;
	}
}

// ADD Filter to add "Current" 
function prefix_nav_menu_classes($items, $menu, $args) {
    _wp_menu_item_classes_by_context($items);
    return $items;
}
add_filter( 'wp_get_nav_menu_items', 'prefix_nav_menu_classes', 10, 3 );


if( ! function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'UE Einstellungen',
		'menu_title'	=> 'UE Einstellungen',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}


function my_acf_init() {
    acf_update_setting('google_api_key', 'AIzaSyBdpfl39JLEyavc9CKG67cWE56MPrrDwwE');
}
add_action('acf/init', 'my_acf_init');


function customtheme_add_woocommerce_support(){
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'customtheme_add_woocommerce_support' );

//add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

