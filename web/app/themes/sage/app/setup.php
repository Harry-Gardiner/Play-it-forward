<?php

/**
 * Theme setup.
 */

namespace App;

use function Roots\bundle;
require_once('helper.php');

/**
 * Register the theme assets.
 *
 * @return void
 */
add_action('wp_enqueue_scripts', function () {
    bundle('app')->enqueue();
}, 100);

/**
 * Register the theme assets with the block editor.
 *
 * @return void
 */
add_action('enqueue_block_editor_assets', function () {
    bundle('editor')->enqueue();
}, 100);

/**
 * Register the initial theme setup.
 *
 * @return void
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from the Soil plugin if activated.
     *
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil', [
        'clean-up',
        'nav-walker',
        'nice-search',
        'relative-urls',
    ]);

    /**
     * Disable full-site editing support.
     *
     * @link https://wptavern.com/gutenberg-10-5-embeds-pdfs-adds-verse-block-color-options-and-introduces-new-patterns
     */
    remove_theme_support('block-templates');

    /**
     * Register the navigation menus.
     *
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage'),
    ]);

    /**
     * Disable the default block patterns.
     *
     * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-the-default-block-patterns
     */
    remove_theme_support('core-block-patterns');

    /**
     * Enable plugins to manage the document title.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Enable post thumbnail support.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable responsive embed support.
     *
     * @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/#responsive-embedded-content
     */
    add_theme_support('responsive-embeds');

    /**
     * Enable HTML5 markup support.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', [
        'caption',
        'comment-form',
        'comment-list',
        'gallery',
        'search-form',
        'script',
        'style',
    ]);

    /**
     * Enable selective refresh for widgets in customizer.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#customize-selective-refresh-widgets
     */
    add_theme_support('customize-selective-refresh-widgets');
}, 20);

/**
 * Add ACF options page
 */
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page([
		'page_title' => 'Theme Options',
		'menu_title' => 'Theme options',
		'menu_slug'  => 'theme_options',
		'capability' => 'edit_theme_options',
		'position'   => '99',
		'autoload'   => true
	]);
}

/**
 * Register the theme sidebars.
 *
 * @return void
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ];

    register_sidebar([
        'name' => __('Primary', 'sage'),
        'id' => 'sidebar-primary',
    ] + $config);

    register_sidebar([
        'name' => __('Footer', 'sage'),
        'id' => 'sidebar-footer',
    ] + $config);
});

/**
 * Nav walker 
 * 
 * If nav item is a # swap it to a span.
 * Add carets to nav items with child elements 
 */
class AWP_Menu_Walker extends \Walker_Nav_Menu {
	function start_el(&$output, $item, $depth=0, $args=[], $id=0) {
		$output .= "<li class='" .  implode(" ", $item->classes) . "'>";
 
		if ($item->url && $item->url != '#') {
			$output .= '<a href="' . $item->url . '">';
		} else {
			$output .= '<span>';
		}
 
		$output .= $item->title;
 
		if ($item->url && $item->url != '#') {
			$output .= '</a>';
		} else {
			$output .= '</span>';
		}
 
		if ($args->walker->has_children) {
			$output .= '<button class="caret"><span class="visually-hidden">Click to access dropdown menu</span></button>';
		}
	}
}

/**
 * ACF Radio Colour Palette
 * @link https://www.advancedcustomfields.com/resources/acf-load_field/
 * @link https://www.advancedcustomfields.com/resources/dynamically-populate-a-select-fields-choices/
 * @link https://whiteleydesigns.com/create-a-gutenberg-like-color-picker-with-advanced-custom-fields
 *
 * Dynamically populates any ACF field with 'colour' Field Name with custom color palette
 * 
 * 'colour' is the field name of the ACF field within the ColourPalette partial
 *
*/
add_filter('acf/load_field/name=colour', function ($field) {
    $colours = getColoursFromJson(get_stylesheet_directory() . '/json/colours.json');

    if( ! empty( $colours ) ) {
        foreach( $colours as $colour_name => $colour_hex ) {
            $field['choices'][ $colour_name ] = $colour_name;
        }
    }
    return $field;
});

/**
* ACF Options colour palette to JSON file
*/
add_action('acf/save_post', function ($post_id) {
    if (current_user_can('administrator')) {
        // Check if the updated post is the options page
        if ($post_id == 'options') {
            $colours = get_field('pf_colour_palette', 'option');
            
            $formattedArray = [];

            foreach ($colours as $colour) {
                $formattedArray[strtolower(str_replace(" ", "-", $colour['colour_name']))] = $colour['colour'];
            }
            // Convert the colours data to JSON format
            $json_data = json_encode($formattedArray);
            
            // JSON colour file
            $file_path = get_stylesheet_directory() . '/json/colours.json';

            // Save the JSON data to the file
            file_put_contents($file_path, $json_data);
        }
    }
}, 20);



add_filter( 'render_block_core/button/className', function( $classes ) {
    $classes = array_diff( $classes, array( 'wp-core-ui' ) );
    return $classes;
});

