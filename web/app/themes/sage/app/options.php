<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$theme_options = new FieldsBuilder('theme_options');

$theme_options
    ->setLocation('options_page', '==', 'theme_options');

$theme_options
    ->addTab('Donation Link')
    ->addLink('donation_link', [
        'label' => 'Donation Link',
        'instructions' => 'Add url and button text for donation link. This will be used throughout the site.',
        'required' => 1,
    ])
    ->addTab('Social Media')
    ->addUrl('facebook_link', [
        'label' => 'Facebook Link',
        'instructions' => 'Add a link to the Facebook page.',
    ])
    ->addUrl('twitter_link', [
        'label' => 'Twitter Link',
        'instructions' => 'Add a link to the Twitter page.',
    ])
    ->addUrl('instagram_link', [
        'label' => 'Instagram Link',
        'instructions' => 'Add a link to the Instagram page.',
    ])
    ->addUrl('youtube_link', [
        'label' => 'YouTube Link',
        'instructions' => 'Add a link to the YouTube page.',
    ])
    ->addUrl('linkedin_link', [
        'label' => 'LinkedIn Link',
        'instructions' => 'Add a link to the LinkedIn page.',
    ])

    ->addTab('Newsletter Signup')
    ->addText('newsletter_shortcode', [
        'label' => 'Newsletter signup shortcode',
        'instructions' => 'Add the shortcode for the WPF newsletter signup form.',
    ])

    ->addTab('Footer')
    ->addTrueFalse('show_newsletter_signup', [
        'label' => 'Show newsletter signup',
        'instructions' => 'Shows the newsletter signup form in the final column',
        'default_value' => 0,
    ])
    ->addRepeater('footer_columns', [
        'label' => 'Footer columns',
        'layout' => 'block',
        'button_label' => 'Add new column',
    ])
    ->addText('footer_column_title', [
        'label' => 'Column title',
        'instructions' => 'Add a title for the column.',
    ])
    ->addRepeater('column_links', [
        'label' => 'Column links',
        'layout' => 'block',
        'button_label' => 'Add new link',
    ])
    ->addLink('column_link', [
        'label' => 'Link',
        'instructions' => 'Add a link for the column.',
    ])
    ->endRepeater()
    ->endRepeater();


acf_add_local_field_group($theme_options->build());
