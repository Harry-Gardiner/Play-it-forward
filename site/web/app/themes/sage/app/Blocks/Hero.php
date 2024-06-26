<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Partials\GeneralTab;
use App\Fields\Partials\Button;

class Hero extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Hero';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'Hero block, displayed at the top of pages.';

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
    public $icon = 'cover-image';

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = ['hero', 'header', 'title', 'image'];

    /**
     * The block post type allow list.
     *
     * @var array
     */
    public $post_types = ['page'];

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
    // public $styles = [
    //     [
    //         'name' => 'light',
    //         'label' => 'Light',
    //         'isDefault' => true,
    //     ],
    //     [
    //         'name' => 'dark',
    //         'label' => 'Dark',
    //     ]
    // ];

    /**
     * The block preview example data.
     *
     * @var array
     */
    public $example = [
        'wrapper' => '',
        'spacing_size' => '',
        'background_colour' => 'yellow',
        'show_hero_image' => 'yes',
        'hero_image' => ['url' => 'https://placehold.co/800x800', 'alt' => 'alt text'],
        'hero_image_position' => 'center center',
        'hero_title' => 'Hero title',
        'hero_content' => 'Hero subtitle - Lorem ipsum dolor sit amet: consectetur sadipscing.',
        'hero_button' => ['link' => '#', 'text' => 'Button text', 'type' => 'primary', 'btn_colour' => '']
    ];

    /**
     * Data to be passed to the block before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            // General
            'wrapper' => get_field('block_spacing'),
            'spacing_size' => get_field('spacing_size'),
            'background_colour' => get_field('colour_picker'),
            // Hero Content
            'show_hero_image' => get_field('show_hero_image'),
            'hero_image' => get_field('hero_image'),
            'hero_image_position' => get_field('hero_image_position'),
            'hero_title' => get_field('hero_title'),
            'highlighted_text' => get_field('highlighted_text'),
            'hero_content' => get_field('hero_content'),
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $hero = new FieldsBuilder('hero');

        $hero
            ->addMessage('block_title', '', [
                'label' => 'Hero',
            ])
            ->addFields($this->get(GeneralTab::class))
            ->addRadio('colour_picker', [
                'label' => 'Select Colour',
                'choices' => [
                    'white' => 'White',
                    'off-white' => 'Off White',
                    'yellow' => 'Yellow',
                    'dark-raspberry' => 'Dark Raspberry',
                    'dark-green' => 'Green',
                ],
                'default_value' => 'white',
            ])
            ->addTab('Hero Image')
            ->addRadio('hero_type', [
                'label' => 'Hero Type',
                'choices' => [
                    'image' => 'Image background',
                    'colour' => 'Plain colour background',
                ],
                'instructions' => 'You can select the colour in the General tab',
                'default_value' => 'image',
            ])
            ->addSelect('show_hero_image', [
                'label' => 'Show Hero Image',
                'instructions' => 'If you would like to add a custom hero image, select "Yes". Else a default image will be used.',
                'choices' => [
                    'yes' => 'Yes',
                    'no' => 'No',
                ],
                'default_value' => 'no',
            ])->conditional('hero_type', '==', 'image')
            ->addImage('hero_image', [
                'label' => 'Hero Image',
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
                'mime_types' => 'jpg, jpeg, png, svg',
            ])->conditional('show_hero_image', '==', 'yes')
            ->addSelect('hero_image_position', [
                'label' => 'Image Position',
                'instructions' => 'If required, use this to position the image.',
                'choices' => [
                    'center' => 'Center',
                    'top' => 'Top',
                    'bottom' => 'Bottom',
                    'left' => 'Left',
                    'right' => 'Right',
                ],
                'default_value' => 'center',
            ])->conditional('show_hero_image', '==', 'yes')
            ->addTab('Hero Content')
            ->addText('hero_title', [
                'label' => 'Hero Title',
            ])
            ->addWYSIWYG('hero_content', [
                'label' => 'Hero Subtitle',
                'media_upload' => 0,
                'toolbar' => 'full',
                'delay' => 1,
            ]);

        return $hero->build();
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
