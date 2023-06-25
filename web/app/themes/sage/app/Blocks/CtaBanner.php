<?php

namespace App\Blocks;

use App\Fields\Partials\Button;
use App\Fields\Partials\Wrapper;
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
    public $category = 'formatting';

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
        'items' => [
            ['item' => 'Item one'],
            ['item' => 'Item two'],
            ['item' => 'Item three'],
        ],
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
            'title' => get_field('title'),
            'body' => get_field('body'),
            'image' => get_field('image'),
            'image_position' => get_field('image_position'),
            'show_button' => get_field('show_button'),
            'cta_button' => get_field('cta_button'),
            'background_colour' => get_field('background_colour'),
            'layout' => get_field('layout'),
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
            ->addTab('General')
            ->addFields($this->get(Wrapper::class))
            ->addTab('Content')
            ->addColorPicker('background_colour', [
                'label' => 'Background Colour',
                'required' => 0,
                'default_value' => '#ffffff',
            ])
            ->addText('title')
            ->addWysiwyg('body')

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
