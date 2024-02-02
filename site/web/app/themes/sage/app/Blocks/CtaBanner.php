<?php

namespace App\Blocks;

use App\Fields\Partials\Button;
use App\Fields\Partials\GeneralTab;
use App\Fields\Partials\Title;
use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;


class CtaBanner extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Cta Banner';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A simple Cta Banner block.';

    /**
     * The block category.
     *
     * @var string
     */
    public $category = 'custom_blocks';

    /**
     * The block icon.
     *
     * @var string|array
     */
    public $icon = 'editor-contract';

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = ['cta', 'banner', 'call to action'];

    /**
     * The block post type allow list.
     *
     * @var array
     */
    public $post_types = [];

    /**
     * The parent block type allow list.
     *
     * @var array
     */
    public $parent = [];

    /**
     * The default block mode.
     *
     * @var string
     */
    public $mode = 'auto';

    /**
     * The default block alignment.
     *
     * @var string
     */
    public $align = '';

    /**
     * The default block text alignment.
     *
     * @var string
     */
    public $align_text = '';

    /**
     * The default block content alignment.
     *
     * @var string
     */
    public $align_content = '';

    /**
     * The supported block features.
     *
     * @var array
     */
    public $supports = [
        'align' => true,
        'align_text' => false,
        'align_content' => false,
        'full_height' => false,
        'anchor' => false,
        'mode' => false,
        'multiple' => true,
        'jsx' => true,
    ];

    /**
     * The block styles.
     *
     * @var array
     */
    public $styles = [
        [
            'name' => 'light',
            'label' => 'Light',
            'isDefault' => true,
        ],
        [
            'name' => 'dark',
            'label' => 'Dark',
        ]
    ];

    /**
     * The block preview example data.
     *
     * @var array
     */
    public $example = [
        'layout' => 'full', 
        'background_colour' => 'raspberry', 
        'wrapper' => '', 
        'spacing_size' => '', 
        'title_style' => ['title' => 'CTA - variation full', 'heading_level' => 'h2', 'heading_style' => 'h2'],
        'body' => 'Body text - Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolor eius in explicabo!', 
        'image' => ['url' => 'https://placehold.co/800x800', 'alt' => 'alt text'], 'image_position' => 'left','show_button' => 'yes',
        'cta_button' => ['link' => '#', 'text' => 'Button text', 'type' => 'primary', 'btn_colour' => '']
    ];

    /**
     * Data to be passed to the block before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'wrapper' => get_field('block_spacing'),
            'spacing_size' => get_field('spacing_size'),
            'body' => get_field('body'),
            'image' => get_field('image'),
            'image_position' => get_field('image_position'),
            'show_button' => get_field('show_button'),
            'cta_button' => get_field('cta_button'),
            'layout' => get_field('layout'),
            'background_colour' => get_field('colour_picker'),
            'title_style' => get_field('title_style'),
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $ctaBanner = new FieldsBuilder('cta_banner');

        $ctaBanner
            ->addMessage('block_title', '', [
                'label' => 'CTA Banner',
            ])
            ->addFields($this->get(GeneralTab::class))
            ->addRadio('colour_picker', [
                'label' => 'Select Colour',
                // Choices are generated in setup.php see ACF Radio Color Palette filter approx line 244.
                'default_value' => 'off-white',
            ])
            ->addTab('Content')
            ->addFields($this->get(Title::class))
            ->addWysiwyg('body', [
                'media_upload' => 0,
                'toolbar'      => 'basic',
            ])

            ->addTab('Image')
            ->addRadio('add_image', [
                'label' => 'Add Image?',
                'required' => 1,
                'choices' => [
                    'yes' => 'Yes',
                    'no' => 'No',
                ],
                'default_value' => 'no',
                'layout' => 'horizontal',
            ])
            ->addImage('image')->conditional('add_image', '==', 'yes')
            ->addSelect('image_position', [
                'label' => 'Image Position',
                'required' => 0,
                'choices' => [
                    'left' => 'Left',
                    'right' => 'Right',
                ],
                'default_value' => 'left',
                'layout' => 'horizontal',
            ])->conditional('add_image', '==', 'yes')

            ->addTab('Layout')->conditional('add_image', '==', 'no')
            ->addSelect('layout', [
                'label' => 'Layout',
                'instructions' => 'Choose the layout for the CTA Banner.<br><br>Full Width will span the full width of the screen. Contained will be approx 70% page width. Default will be the default width of the content.',
                'required' => 0,
                'choices' => [
                    'default' => 'Default',
                    'full' => 'Full Width',
                    'contained' => 'Contained'
                ],
                'default_value' => 'default',
                'layout' => 'horizontal',
            ])

            ->addTab('Button')
            ->addRadio('show_button', [
                'label' => 'Show Button?',
                'required' => 1,
                'choices' => [
                    'yes' => 'Yes',
                    'no' => 'No',
                ],
                'default_value' => 'no',
                'layout' => 'horizontal',
            ])
            ->addGroup('cta_button', ['label' => 'CTA Button'])
            ->addFields($this->get(Button::class))->conditional('show_button', '==', 'yes')
            ->addSelect('btn_colour', [
                'label' => 'Colour',
                'instructions' => 'Choose the background colour for the button.',
                'choices' => [
                    'raspberry' => 'Raspberry',
                    'black' => 'Black',
                    'dark-green' => 'Dark Green',
                ],
            ])->conditional('colour_picker', '==', 'white')->or('colour_picker', '==', 'off-white')
            ->endGroup();
        return $ctaBanner->build();
    }

    /**
     * Assets to be enqueued when rendering the block.
     *
     * @return void
     */
    public function enqueue()
    {
        //
    }
}
