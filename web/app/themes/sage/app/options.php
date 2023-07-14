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
    ->addLink('facebook_link', [
        'label' => 'Facebook Link',
        'instructions' => 'Add a link to the Facebook page.',
    ])
    ->addLink('twitter_link', [
        'label' => 'Twitter Link',
        'instructions' => 'Add a link to the Twitter page.',
    ])
    ->addLink('instagram_link', [
        'label' => 'Instagram Link',
        'instructions' => 'Add a link to the Instagram page.',
    ])
    ->addLink('youtube_link', [
        'label' => 'YouTube Link',
        'instructions' => 'Add a link to the YouTube page.',
    ])
    ->addLink('linkedin_link', [
        'label' => 'LinkedIn Link',
        'instructions' => 'Add a link to the LinkedIn page.',
    ])

    ->addTab('Footer')
    ->addRepeater('pf_footer', [
        'label' => 'Footer',
        'instructions' => 'Add footer logos.',
        'layout' => 'block',
        'button_label' => 'Add Footer Logo',
        'max' => 3
    ])
        ->addImage('footer_logo', [
            'label' => 'Footer Logo',
            'instructions' => 'Add a logo for the footer.',
        ])
    ->endRepeater()
    ->addText('footer_form', [
        'label' => 'Footer Form Shortcode',
        'instructions' => 'Add the shortcode from WPForms Builder, e.g. [wpforms id="319" title="true"]',
    ]);


acf_add_local_field_group($theme_options->build());
