<?php
/**
 * My Portfolio theme's functions and definitions
 *
 * @package My Portfolio theme
 * @since My Portfolio theme 1.0.0
 */

const IS_DEVELOPER = true;
define("THEME_DIR", get_template_directory());
const THEME_INC = 'inc/';

if (IS_DEVELOPER) {
    define('THEME_VERSION', time());
} else {
    define('THEME_VERSION', '1.0.0');
}

if (!function_exists('myp_theme_setup')) :
    function myp_theme_setup()
    {
        load_theme_textdomain('pas_mph', get_template_directory() . '/languages');
        add_theme_support('automatic-feed-links');
        add_theme_support('post-thumbnails');
        add_theme_support('title-tag');
    }
endif;
add_action('after_setup_theme', 'myp_theme_setup');

//Load Elementor and WordPress widgets
require 'widgets/widgets.php';
require 'inc/post-types.php';
require 'inc/taxonomies.php';
require 'inc/option-panel.php';
require 'inc/acf.php';
require 'inc/tgm/myportfolio.php';

//Styles and Scripts
function myp_add_theme_styles()
{
    wp_enqueue_style('bs', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css', array(), '5.0.2');
    wp_enqueue_style('iconscout', 'https://unicons.iconscout.com/release/v3.0.6/css/line.css', array('bs'), '3.0.6');
    wp_enqueue_style('highlight', 'https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.1/styles/dark.min.css', '11.5.1');
    wp_enqueue_style('styles', get_theme_file_uri('/assets/css/style.css'), ['bs', 'iconscout' ,'highlight'], THEME_VERSION);
    wp_enqueue_style('custom-styles', get_theme_file_uri('/assets/css/custom.css'), ['styles'], THEME_VERSION);
}
add_action('wp_enqueue_scripts', 'myp_add_theme_styles');

function myp_add_theme_scripts()
{
    wp_enqueue_script('main-script', get_theme_file_uri('/assets/js/main.js'), array( 'bs', 'tc','hg'), THEME_VERSION, true);
    wp_enqueue_script('bs', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js', '5.0.2', true);
    wp_enqueue_script('tc', 'https://cdn.jsdelivr.net/npm/TagCloud@2.2.0/dist/TagCloud.min.js', '2.2.0', true);
    wp_enqueue_script('hg', 'https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.1/highlight.min.js', '11.5.1', true);

}
add_action('wp_enqueue_scripts', 'myp_add_theme_scripts');

// Nav Menu
function myp_register_nav_menus()
{
    register_nav_menus(array(
        'primary_menu' => __('Header Primary Menu', 'pas_mph'),
    ));
}
add_action('after_setup_theme', 'myp_register_nav_menus', 0);

// Sidebars register
function myp_register_sidebars()
{
    // Archive Sidebar
    register_sidebar(
        array(
            'name' => __('Posts Archive Sidebar', 'pas_mph'),
            'id' => 'posts-archive-sidebar',
            'description' => __('Widgets in this area will be shown on archive page.', 'pas_mph'),
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '<h5 class="widgettitle">',
            'after_title' => '</h5>',
            'before_sidebar' => '<aside class="col-12 col-lg-4 mt-m60 order-0 order-lg-2 mb-4">',
            'after_sidebar' => '</aside>'
        )
    );
    register_sidebar(
        array(
            'name' => __('Projects Archive Sidebar', 'pas_mph'),
            'id' => 'projects-archive-sidebar',
            'description' => __('Widgets in this area will be shown on archive page.', 'pas_mph'),
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '<h5 class="widgettitle">',
            'after_title' => '</h5>',
            'before_sidebar' => '<aside class="col-12 col-lg-4 mt-m60 order-0 order-lg-2 mb-4">',
            'after_sidebar' => '</aside>'
        )
    );

    // Sinle Sidebar
    register_sidebar(
        array(
            'name' => __('Post Single Sidebar', 'pas_mph'),
            'id' => 'post-single-sidebar',
            'description' => __('Widgets in this area will be shown on archive page.', 'pas_mph'),
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '<h5 class="widgettitle">',
            'after_title' => '</h5>',
            'before_sidebar' => '<aside class="col-12 col-lg-4 mt-m60 order-0 order-lg-2 mb-4">',
            'after_sidebar' => '</aside>'
        )
    );

}
add_action('widgets_init', 'myp_register_sidebars');

// Get AFC
function myp_get_acf_field($name, $option = null)
{
    if (function_exists('get_field')) {
        return get_field($name, $option);
    } else {
        return __('Install and Activate ACF Plugin', 'pas_mph');
    }
}

// Link of Custom Post Type Archive on Menu
function myp_additional_active_item_classes($classes = array(), $menu_item = false){
    global $wp_query;


    if(in_array('current-menu-item', $menu_item->classes)){
        $classes[] = 'current-menu-item';
    }

    if ( $menu_item->title == 'PAGE TITLE' && is_post_type_archive('cpt-slug') ) {
        $classes[] = 'current-menu-item';
    }

    if ( $menu_item->title == 'PAGE TITLE' && is_singular('cpt-slug') ) {
        $classes[] = 'current-menu-item';
    }

    return $classes;
}
add_filter( 'nav_menu_css_class', 'myp_additional_active_item_classes', 10, 2 );

// Post thumbnail
function myp_get_post_thumbnail_url($post_id = null): string
{
    if (has_post_thumbnail($post_id)) {
        return get_the_post_thumbnail_url($post_id, 'post-thumbnail', ['class' => 'img-fluid']);
    } else {
        //#option-panel : change theme placeholder image for posts
        return 'url';
    }
}

// Get Option
function myp_get_option( $name, $default = null ) {
	$option = get_option( 'pas_mph_' . get_locale() );

	return ( isset( $option[ $name ] ) && ! empty( $option[ $name ] ) ) ? $option[ $name ] : $default;
}

// Breadcrumbs
function custom_breadcrumbs() {
       
    // Settings
    $separator          = '&gt;';
    $breadcrums_id      = 'breadcrumbs';
    $breadcrums_class   = 'breadcrumb';
    $home_title         = 'Home';
      
    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    $custom_taxonomy    = 'product_cat';
       
    // Get the query & post information
    global $post,$wp_query;
       
    // Do not display on the homepage
    if ( !is_front_page() ) {
       
        // Build the breadcrums
        echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';
           
        // Home page
        echo '<li class="breadcrumb-item"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
        // echo '<li class="separator separator-home"> ' . $separator . ' </li>';
           
        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
              
            echo '<li class="breadcrumb-item item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title($prefix, false) . '</strong></li>';
              
        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                echo '<li class="breadcrumb-itemitem-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                // echo '<li class="separator"> ' . $separator . ' </li>';
              
            }
              
            $custom_tax_name = get_queried_object()->name;
            echo '<li class="breadcrumb-item item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';
              
        } else if ( is_single() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                echo '<li class="breadcrumb-item item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                // echo '<li class="separator"> ' . $separator . ' </li>';
              
            }
              
            // Get post category info
            $category = get_the_category();
             
            if(!empty($category)) {
              
                // Get last category post is in
                $last_category = end(array_values($category));
                  
                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);
                  
                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {
                    $cat_display .= '<li class="breadcrumb-item item-cat">'.$parents.'</li>';
                    // $cat_display .= '<li class="separator"> ' . $separator . ' </li>';
                }
             
            }
              
            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
                   
                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;
               
            }
              
            // Check if the post is in a category
            if(!empty($last_category)) {
                echo $cat_display;
                echo '<li class="breadcrumb-item item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                  
            // Else if post is in a custom taxonomy
            } else if(!empty($cat_id)) {
                  
                echo '<li class="breadcrumb-item item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                // echo '<li class="separator"> ' . $separator . ' </li>';
                echo '<li class="breadcrumb-item item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
              
            } else {
                  
                echo '<li class="breadcrumb-item item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                  
            }
              
        } else if ( is_category() ) {
               
            // Category page
            echo '<li class="breadcrumb-item item-cat"><strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></li>';
               
        } else if ( is_page() ) {
               
            // Standard page
            if( $post->post_parent ){
                   
                // If child page, get parents 
                $anc = get_post_ancestors( $post->ID );
                   
                // Get parents in the right order
                $anc = array_reverse($anc);
                   
                // Parent page loop
                if ( !isset( $parents ) ) $parents = null;
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="breadcrumb-item item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                    // $parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
                }
                   
                // Display parent pages
                echo $parents;
                   
                // Current page
                echo '<li class="breadcrumb-item item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';
                   
            } else {
                   
                // Just display current page if not parents
                echo '<li class="breadcrumb-item item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';
                   
            }
               
        } else if ( is_tag() ) {
               
            // Tag page
               
            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;
               
            // Display the tag name
            echo '<li class="breadcrumb-item item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';
           
        } elseif ( is_day() ) {
               
            // Day archive
               
            // Year link
            echo '<li class="breadcrumb-item item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            // echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
               
            // Month link
            echo '<li class="breadcrumb-item item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
            // echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';
               
            // Day display
            echo '<li class="breadcrumb-item item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';
               
        } else if ( is_month() ) {
               
            // Month Archive
               
            // Year link
            echo '<li class="breadcrumb-item item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            // echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
               
            // Month display
            echo '<li class="breadcrumb-item item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';
               
        } else if ( is_year() ) {
               
            // Display year archive
            echo '<li class="breadcrumb-item breadcrumb-item-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';
               
        } else if ( is_author() ) {
               
            // Auhor archive
               
            // Get the author information
            global $author;
            $userdata = get_userdata( $author );
               
            // Display author name
            echo '<li class="breadcrumb-item breadcrumb-item-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';
           
        } else if ( get_query_var('paged') ) {
               
            // Paginated archives
            echo '<li class="breadcrumb-item breadcrumb-item-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</strong></li>';
               
        } else if ( is_search() ) {
           
            // Search results page
            echo '<li class="breadcrumb-item breadcrumb-item-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';
           
        } elseif ( is_404() ) {
               
            // 404 page
            echo '<li>' . 'Error 404' . '</li>';
        }
       
        echo '</ul>';
           
    }
       
}
