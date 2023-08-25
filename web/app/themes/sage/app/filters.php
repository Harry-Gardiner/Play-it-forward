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

add_filter('acf/load_field/name=latest_posts_type', function($field) {
    $post_types = get_post_types(array('public' => true), 'names');
    unset($post_types['attachment']);
    foreach ( $post_types as $post_type ) {
        $field['choices'][$post_type] = $post_type;
     }
 
     // return the field
     return $field;
});