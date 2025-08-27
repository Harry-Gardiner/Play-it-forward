<?php

/**
 * Newsletter Popup Functionality
 * Provides PHP functions to manage newsletter popup content and settings
 */

/**
 * Get newsletter popup settings from ACF Options
 * This can be added to the theme options page
 */
function get_newsletter_popup_settings() {
    return [
        'enabled' => get_field('newsletter_popup_enabled', 'option') ?? true,
        'title' => get_field('newsletter_popup_title', 'option') ?? 'Stay Connected!',
        'content' => get_field('newsletter_popup_content', 'option') ?? 'Subscribe to our newsletter for the latest updates and news.',
        'delay' => get_field('newsletter_popup_delay', 'option') ?? 2000, // milliseconds
        'dismissal_days' => get_field('newsletter_popup_dismissal_days', 'option') ?? 7,
    ];
}

/**
 * Output newsletter popup data as JavaScript object
 * This makes the data available to the frontend JS
 */
function output_newsletter_popup_data() {
    $settings = get_newsletter_popup_settings();

    // Only output if popup is enabled
    if (!$settings['enabled']) {
        return;
    }

    $newsletter_shortcode = get_field('newsletter_shortcode', 'option');

    // Check if newsletter shortcode exists and is not empty
    if (empty($newsletter_shortcode)) {
        error_log('Newsletter popup: No newsletter shortcode found in ACF options');
        return;
    }

    // Process the shortcode and check if it produces content
    $newsletter_form = do_shortcode($newsletter_shortcode);

    // Validate that the shortcode actually produced content
    if (empty($newsletter_form) || trim($newsletter_form) === trim($newsletter_shortcode)) {
        error_log('Newsletter popup: Newsletter shortcode did not produce valid content. Shortcode: ' . $newsletter_shortcode);
        return;
    }

    // Additional check: ensure the form contains typical form elements
    if (!preg_match('/<form|<input|<button/i', $newsletter_form)) {
        error_log('Newsletter popup: Newsletter shortcode did not produce a valid form. Output: ' . substr($newsletter_form, 0, 200));
        return;
    }

    $popup_data = [
        'title' => $settings['title'],
        'content' => $settings['content'],
        'form' => $newsletter_form,
        'delay' => $settings['delay'],
        'dismissalDays' => $settings['dismissal_days'],
    ];

    // Escape data for safe JavaScript output
    $escaped_data = [
        'title' => esc_js($popup_data['title']),
        'content' => wp_kses_post($popup_data['content']),
        'form' => $popup_data['form'], // Form HTML is already processed by do_shortcode
        'delay' => intval($popup_data['delay']),
        'dismissalDays' => intval($popup_data['dismissalDays']),
    ];

    echo '<script type="text/javascript">';
    echo 'window.newsletterPopupData = ' . json_encode($escaped_data) . ';';
    echo '</script>';
}

/**
 * Hook to add popup data to wp_head
 * This ensures the data is available when the JS loads
 */
add_action('wp_head', 'output_newsletter_popup_data');

/**
 * Add newsletter popup fields to ACF Options page
 * This function can be called to add the fields programmatically
 */
function add_newsletter_popup_options_fields() {
    if (function_exists('acf_add_options_page')) {
        // Ensure newsletter popup fields exist in options
        if (function_exists('acf_add_local_field_group')) {
            acf_add_local_field_group([
                'key' => 'group_newsletter_popup',
                'title' => 'Newsletter Popup Settings',
                'fields' => [
                    [
                        'key' => 'field_newsletter_popup_enabled',
                        'label' => 'Enable Newsletter Popup',
                        'name' => 'newsletter_popup_enabled',
                        'type' => 'true_false',
                        'instructions' => 'Enable or disable the newsletter signup popup.',
                        'default_value' => 1,
                        'ui' => 1,
                    ],
                    [
                        'key' => 'field_newsletter_popup_title',
                        'label' => 'Popup Title',
                        'name' => 'newsletter_popup_title',
                        'type' => 'text',
                        'instructions' => 'Title to display in the newsletter popup.',
                        'default_value' => 'Stay Connected!',
                        'conditional_logic' => [
                            [
                                [
                                    'field' => 'field_newsletter_popup_enabled',
                                    'operator' => '==',
                                    'value' => '1',
                                ],
                            ],
                        ],
                    ],
                    [
                        'key' => 'field_newsletter_popup_content',
                        'label' => 'Popup Content',
                        'name' => 'newsletter_popup_content',
                        'type' => 'textarea',
                        'instructions' => 'Content/description to display in the newsletter popup.',
                        'default_value' => 'Subscribe to our newsletter for the latest updates and news.',
                        'rows' => 3,
                        'conditional_logic' => [
                            [
                                [
                                    'field' => 'field_newsletter_popup_enabled',
                                    'operator' => '==',
                                    'value' => '1',
                                ],
                            ],
                        ],
                    ],
                    [
                        'key' => 'field_newsletter_popup_delay',
                        'label' => 'Popup Delay (milliseconds)',
                        'name' => 'newsletter_popup_delay',
                        'type' => 'number',
                        'instructions' => 'How long to wait before showing the popup (in milliseconds). Default: 2000 (2 seconds).',
                        'default_value' => 2000,
                        'min' => 500,
                        'max' => 30000,
                        'step' => 500,
                        'conditional_logic' => [
                            [
                                [
                                    'field' => 'field_newsletter_popup_enabled',
                                    'operator' => '==',
                                    'value' => '1',
                                ],
                            ],
                        ],
                    ],
                    [
                        'key' => 'field_newsletter_popup_dismissal_days',
                        'label' => 'Days Before Showing Again',
                        'name' => 'newsletter_popup_dismissal_days',
                        'type' => 'number',
                        'instructions' => 'Number of days to wait before showing the popup again after dismissal. Default: 7 days.',
                        'default_value' => 7,
                        'min' => 1,
                        'max' => 365,
                        'step' => 1,
                        'conditional_logic' => [
                            [
                                [
                                    'field' => 'field_newsletter_popup_enabled',
                                    'operator' => '==',
                                    'value' => '1',
                                ],
                            ],
                        ],
                    ],
                ],
                'location' => [
                    [
                        [
                            'param' => 'options_page',
                            'operator' => '==',
                            'value' => 'acf-options',
                        ],
                    ],
                ],
                'menu_order' => 10,
            ]);
        }
    }
}

// Hook to add fields after theme setup
add_action('acf/init', 'add_newsletter_popup_options_fields');
