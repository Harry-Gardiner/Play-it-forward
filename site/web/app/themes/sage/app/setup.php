<?php

/**
 * Theme setup.
 */

namespace App;

use function Roots\bundle;
use function Roots\view;

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
        'footer_navigation' => __('Footer Navigation', 'sage'),
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
 * Register editor colour palette
 */
add_action('after_setup_theme', function () {
    add_theme_support('editor-color-palette', [
        [
            'name' => __('Off White', 'PIF'),
            'slug' => 'off-white',
            'color' => '#f8faf8',
        ],
        [
            'name' => __('White', 'PIF'),
            'slug' => 'white',
            'color' => '#fffff',
        ],
        [
            'name' => __('Charcoal', 'PIF'),
            'slug' => 'charcoal',
            'color' => '#262626',
        ],
        [
            'name' => __('Yellow', 'PIF'),
            'slug' => 'yellow',
            'color' => '#fab200',
        ],
        [
            'name' => __('Dark Green', 'PIF'),
            'slug' => 'dark-green',
            'color' => '#2d6e51',
        ],
        [
            'name' => __('Raspberry', 'PIF'),
            'slug' => 'raspberry',
            'color' => '#993050',
        ],
        [
            'name' => __('Dark Raspberry', 'PIF'),
            'slug' => 'dark-raspberry',
            'color' => '#77203A',
        ]
    ]);
});

/**
 * Add ACF options page
 */
if (function_exists('acf_add_options_page')) {
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
class AWP_Menu_Walker extends \Walker_Nav_Menu
{
    function start_el(&$output, $item, $depth = 0, $args = [], $id = 0)
    {
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
 * ACF Radio Color Palette
 * @link https://www.advancedcustomfields.com/resources/acf-load_field/
 * @link https://www.advancedcustomfields.com/resources/dynamically-populate-a-select-fields-choices/
 * @link https://whiteleydesigns.com/create-a-gutenberg-like-color-picker-with-advanced-custom-fields
 *
 * Dynamically populates any ACF field with colour_picker Field Name with custom color palette
 *
 */
add_filter('acf/load_field/name=colour_picker', function ($field) {
    if (!empty($field['choices'])) {
        return $field;
    }

    // get array of colors created using editor-color-palette
    $colors = get_theme_support('editor-color-palette');

    if (!empty($colors)) {
        // loop over each color and create option
        foreach ($colors[0] as $color) {
            $field['choices'][$color['slug']] = $color['name'];
        }
    }

    return $field;
});

add_filter('acf/load_field/name=text_background_colour', function ($field) {
    if (!empty($field['choices'])) {
        return $field;
    }

    // get array of colors created using editor-color-palette
    $colors = get_theme_support('editor-color-palette');

    if (!empty($colors)) {
        // loop over each color and create option
        foreach ($colors[0] as $color) {
            $field['choices'][$color['slug']] = $color['name'];
        }
    }

    return $field;
});

/**
 * ACF WP User Select
 * 
 * Dynamically populates any ACF field with selected_user Field Name with wp users
 * Default value is the current user
 *
 */
add_filter('acf/load_field/name=selected_user', function ($field) {
    $users = get_users(['fields' => ['ID', 'display_name']]);
    $choices = [];
    
    foreach ($users as $user) {
        $choices[$user->ID] = $user->display_name;
    }

    $blog_user = get_user_by('ID', get_current_user_id()); 
    $default_user_id = $blog_user ? $blog_user->ID : ''; 

    $field['choices'] = $choices;
    $field['default_value'] = $default_user_id; 

    return $field;
});

/**
 * Add the SVG mime type to the allowed media types in WordPress
 */
add_filter('upload_mimes', function ($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
});

/**
 * REST API to register a new route that fetches posts for a "load more" functionality.
 */
add_action('rest_api_init', function () {
    register_rest_route('v1', 'posts/load_more', [
        'methods' => 'GET', // or POST
        'callback' => function ($request) {
            $page = $request->get_param('page');
            $per_page = $request->get_param('per_page');

            $args = [
                'post_type' => 'post',
                'posts_per_page' => $per_page,
                'paged' => $page,
                'orderby' => 'date',
                'order' => 'DESC',
            ];

            $query = get_posts($args);

            $posts = collect($query)->map(function ($post) {
                $cardHtml = view('partials.card', [
                    'post' => $post,
                ])->render();
                return $cardHtml;
            });

            return $posts;
        },
        'permission_callback' => '__return_true'
    ]);
});


/**
 * Register custom post types
 */
// register a custom post type called 'Football Teams'
add_action('init', function () {
    register_post_type('football_teams', [
        'labels' => [
            'name' => __('Football Teams'),
            'singular_name' => __('Football Team'),
        ],
        'public' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-groups',
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt', 'revisions'],
        'show_in_rest' => true,
        'taxonomies' => ['category', 'post_tag'],
        'rewrite' => [
            'slug' => 'football-teams',
            'with_front' => false,
        ],
    ]);
});