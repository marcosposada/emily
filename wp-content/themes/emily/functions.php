<?php
/**
 * Twenty Twelve functions and definitions.
 *
 * Sets up the theme and provides some helper functions, which are used
 * in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

 
 // Declaration of scripts goes here
 
function colouralia_scripts()
{
	// De-register jQuery for good.
	wp_deregister_script('jquery');
	
	// Add our version of jQuery for total control and conflict avoidance.
	wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js", false, null);
	
	// Add Bootstrap for our overall effects
	wp_register_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ) );
	
	// Add Flexslider for cool image sliders
	wp_register_script( 'flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array( 'jquery' ) );
	
	// Add jQuery easing
	wp_register_script( 'jqueryEasing', get_template_directory_uri() . '/js/jquery.easing.js', array( 'jquery' ) );
	
	// Add supersized for big background images
	//wp_register_script( 'supersized', get_template_directory_uri() . '/js/supersized.core.3.2.1.js', array( 'jquery' ) );
	
	// Add Less
	
	wp_register_script( 'less', get_template_directory_uri() . '/js/less.js', array( 'jquery' ) );
			
	// Add our scripts in case we want to do custom stuff
	wp_register_script( 'scripts', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ) );
	
	// Main Queue - jQuery first, Bootstrap second
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'bootstrap' );
	wp_enqueue_script( 'jqueryEasing' );
	wp_enqueue_script( 'flexslider' );
	wp_enqueue_script( 'less' );
	wp_enqueue_script( 'scripts' );
	
}
add_action( 'wp_enqueue_scripts', 'colouralia_scripts' );

function colouralia_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'colouralia' ),
		'id' => 'sidebar-1',
		'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'colouralia' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'First Front Page Widget Area', 'colouralia' ),
		'id' => 'sidebar-2',
		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'colouralia' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Second Front Page Widget Area', 'colouralia' ),
		'id' => 'sidebar-3',
		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'colouralia' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'colouralia_widgets_init' );



function colouralia_page_menu_args( $args ) {
	if ( ! isset( $args['show_home'] ) )
		$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'colouralia_page_menu_args' );

function register_my_menu() {
  register_nav_menu('main-menu',__( 'Main Menu' ));
}
add_action( 'init', 'register_my_menu' );

function colouralia_menu_sorter($items) {

    $items[1]->classes[] = 'first-li';

    $items[count($items)]->classes[] = 'last-li';

    return $items;

}

add_filter('wp_nav_menu_objects', 'colouralia_menu_sorter');
/*
function my_custom_post_product() {
	$labels = array(
		'name'               => _x( 'Products', 'post type general name' ),
		'singular_name'      => _x( 'Product', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'book' ),
		'add_new_item'       => __( 'Add New Product' ),
		'edit_item'          => __( 'Edit Product' ),
		'new_item'           => __( 'New Product' ),
		'all_items'          => __( 'All Products' ),
		'view_item'          => __( 'View Product' ),
		'search_items'       => __( 'Search Products' ),
		'not_found'          => __( 'No products found' ),
		'not_found_in_trash' => __( 'No products found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Products'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds our products and product specific data',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt','custom-fields' ),
		'has_archive'   => true,
	);
	register_post_type( 'oven', $args );	
}
add_action( 'init', 'my_custom_post_product' );

function my_taxonomies_product() {
	$labels = array(
		'name'              => _x( 'Ovens', 'taxonomy general name' ),
		'singular_name'     => _x( 'Oven', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Ovens' ),
		'all_items'         => __( 'All Ovens' ),
		'parent_item'       => __( 'Parent Oven' ),
		'parent_item_colon' => __( 'Parent Oven:' ),
		'edit_item'         => __( 'Edit Oven' ), 
		'update_item'       => __( 'Update Oven' ),
		'add_new_item'      => __( 'Add New Oven' ),
		'new_item_name'     => __( 'New Oven' ),
		'menu_name'         => __( 'Ovens' ),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
	);
	register_taxonomy( 'ovens', 'oven', $args );
}
add_action( 'init', 'my_taxonomies_product', 0 );
 * 
 */
add_theme_support( 'post-thumbnails' ); 

function child_force_category_template($template) {
    $cat = get_query_var('cat');
    $category = get_category($cat);

    if ( file_exists(TEMPLATEPATH . '/category-' . $category->cat_ID . '.php') ) {
        $cat_template = TEMPLATEPATH . '/category-' . $category ->cat_ID . '.php';
    } elseif ( file_exists(TEMPLATEPATH . '/category-' . $category->slug . '.php') ) {
        $cat_template = TEMPLATEPATH . '/category-' . $category ->slug . '.php';
    } elseif ( file_exists(TEMPLATEPATH . '/category-' . $category->category_parent . '.php') ) {
        $cat_template = TEMPLATEPATH . '/category-' . $category->category_parent . '.php';
    } else {
        // Get Parent Slug
        $cat_parent = get_category($category->category_parent);

        if ( file_exists(TEMPLATEPATH . '/category-' . $cat_parent->slug . '.php') ) {
            $cat_template = TEMPLATEPATH . '/category-' . $cat_parent->slug . '.php';
        } else {
            $cat_template = $template;
        }

    }

    return $cat_template;
}
add_action('category_template', 'child_force_category_template');

add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3 );

function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}

