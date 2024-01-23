<?php

/**
 * Theme filters.
 */

namespace App;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return sprintf(' &hellip; <a href="%s">%s</a>', get_permalink(), __('Continued', 'sage'));
});

add_filter('acf/load_field/name=latest_posts_type', function ($field) {
    $post_types = get_post_types(array('public' => true), 'names');
    unset($post_types['attachment']);
    foreach ($post_types as $post_type) {
        $field['choices'][$post_type] = $post_type;
    }

    // return the field
    return $field;
});

add_filter('allowed_block_types_all', function ($block_editor_context, $editor_context) {
    // Core Gutenberg blocks.
    $core_blocks = array(
        // 'core/paragraph',
        // 'core/heading',
        'core/table',
        'core/image',
        'core/video',
        'core/search',
        'core/spacer',
    );


    // Fetch all ACF blocks.
    $block_files = glob(__DIR__ . '/Blocks/*.php');
    // remove Carousel.php from the array
    $block_files = array_diff($block_files, array(__DIR__ . '/Blocks/Carousel.php'));
 
    $acf_blocks = array();
    foreach ($block_files as $block_file) {
        $block_name = basename($block_file, '.php');
        $block_name = strtolower(preg_replace('/([a-z])([A-Z])/', '$1-$2', $block_name));
        $acf_blocks[] = 'acf/' . $block_name;
    }

    // Merge allowed blocks.
    $allowed_blocks = array_merge($core_blocks, $acf_blocks);

    if (!empty($editor_context->post)) {
        return $allowed_blocks;
    }

    return $block_editor_context;
}, 10, 2);

add_filter( 'block_categories_all' , function( $categories ) {

    // Adding a new category.
    $new_category = array(
        'slug'  => 'custom_blocks',
        'title' => 'Custom blocks'
    );

    // Insert the new category at the beginning of the array.
    array_unshift($categories, $new_category);

    return $categories;
} );
