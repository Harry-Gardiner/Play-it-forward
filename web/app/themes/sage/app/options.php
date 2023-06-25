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
    ])
    ->addRepeater('pf_colour_palette', [
        'label' => 'Colour Palette',
        'instructions' => 'Add colours to be used throughout the site.',
        'required' => 1,
        'layout' => 'block',
        'button_label' => 'Add Colour',
    ])
        ->addText('colour_name', [
            'label' => 'Colour Name',
            'instructions' => 'Add a name for this colour.',
            'required' => 1,
        ])
        ->addColorPicker('colour', [
            'label' => 'Colour',
            'instructions' => 'Add a hex value for this colour. E.g. #ffffff',
            'required' => 1,
        ]);

acf_add_local_field_group($theme_options->build());
