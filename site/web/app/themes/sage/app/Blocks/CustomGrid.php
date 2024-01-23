<?php

namespace App\Blocks;

use App\Fields\Partials\ImpactWord;
use App\Fields\Partials\Button;
use App\Fields\Partials\GeneralTab;
use App\Fields\Partials\Title;
use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class CustomGrid extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Custom Grid';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A simple Custom Grid block. Can be used to display a grid of items. There are 2 grid options: icons or text.';

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
    public $icon = 'editor-kitchensink';

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = [];

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
        'wrapper' => '',
        'spacing_size' => '',
        'background_colour' => 'off-white',
        'impact_word_enable' => 'no',
        'impact_word' => '',
        'impact_word_position' => '',
        'title_style' => ['title' => 'Custom Grid - standard', 'heading_level' => 'h2', 'heading_style' => 'h2'],
        'body' => 'Body text - Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor eius in explicabo!',
        'grid_type' => 'default',
        'items' => [
          [
            'item' => '156',
            'description' => 'Description 1'
          ],
          [
            'item' => '24',
            'description' => 'Description 2'
          ],
          [
            'item' => '3101',
            'description' => 'Description 3'
          ],
          [
            'item' => '455',
            'description' => 'Description 4'
          ]
        ],
        'show_button' => 'no',
        'btn_type' => '',
        'btn_link' => '',
        'btn_text' => '',
        'btn_colour' => ''
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

            // Impact Word
            'impact_word_enable' => get_field('impact_word_enable'),
            'impact_word' => get_field('impact_word'),
            'impact_word_position' => get_field('impact_word_position'),

            // Custom Grid
            'title_style' => get_field('title_style'),
            'body' => get_field('body'),
            'grid_type' => get_field('grid_type'),
            'grid_sub_type' => get_field('grid_sub_type'),
            'items' => get_field('items'),
            'show_button' => get_field('show_button'),
            'cta_button' => get_field('cta_button'),
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $customGrid = new FieldsBuilder('custom_grid');

        $customGrid
            ->addMessage('block_title', '', [
                'label' => 'Custom Grid',
                'message' => 'A simple Custom Grid block. Can be used to display a grid of items. There are 2 grid options: icons or standard.<br><br>Standard allows you to add a title, description and a grid of statistic items.<br><br>Icons allows you to add a title, description and a grid of icons.<br><br>Icons and Standard are mutually exclusive, you can only select one or the other.',
            ])
            ->addFields($this->get(GeneralTab::class))
            ->addRadio('colour_picker', [
                'label' => 'Select Colour',
                'choices' => [
                    'white' => 'White',
                    'off-white' => 'Off White',
                ],
                'default_value' => 'white',
            ])
            ->addFields($this->get(ImpactWord::class))
            ->addTab('Content')
            ->addSelect('grid_type', [
                'label' => 'Grid Type',
                'choices' => [
                    'icons' => 'Icons',
                    'default' => 'Standard',
                ],
                'default_value' => 'default',
            ])
            ->addFields($this->get(Title::class))
            ->addTextarea('body', [
                'label' => 'Sub Title/Body',
                'rows' => 3,
            ])
            ->addRepeater('items', [
                'label' => 'Grid Items',
                'layout' => 'block',
                'button_label' => 'Add Item',
            ])
            ->addNumber('item', [
                'label' => 'Number',
                'instructions' => 'Enter the statistic number',
            ])->conditional('grid_type', '==', 'default')
            ->addImage('icon', [
                'label' => 'Icon',
                'return_format' => 'array',
                'preview_size' => 'thumbnail',
            ])->conditional('grid_type', '==', 'icons')
            ->addTextarea('description', [
                'label' => 'Description',
                'rows' => 3,
            ])->conditional('grid_type', '==', 'default')
            ->endRepeater()
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

        return $customGrid->build();
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
