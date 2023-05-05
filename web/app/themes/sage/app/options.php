<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$theme_options = new FieldsBuilder('theme_options');

$theme_options
    ->setLocation('options_page', '==', 'theme_options');

$theme_options
    ->addLink('donation_link', [
        'label' => 'Donation Link',
        'instructions' => 'Add url and button text for donation link. This will be used throughout the site.',
        'required' => 1,
    ]);

acf_add_local_field_group($theme_options->build());