<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Partials\GeneralTab;
use App\Fields\Partials\Title;
use App\Fields\Partials\Button;

class CardRow extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Card Row';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A row of images with titles and links.';

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
    public $icon = 'table-row-before';

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = ['cards', 'row', 'images', 'links', 'three', 'columns'];

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
        'title_style' => ['title' => 'Card row', 'heading_level' => 'h2', 'heading_style' => 'h2'],
        'items' => [
            [
              'image' => ['sizes' => ['medium_large' => 'https://placehold.co/500x300'], 'alt' => 'alt text'],
              'title' => 'Card title',
              'link' => '#', 
              'text' => 'Button text', 
              'type' => 'primary', 
              'btn_colour' => 'dark-green'
            ],
            [
              'image' => ['sizes' => ['medium_large' => 'https://placehold.co/500x300'], 'alt' => 'alt text'],
              'title' => 'Card title 2',
              'link' => '#', 
              'text' => 'Button text', 
              'type' => 'primary', 
              'btn_colour' => 'black'
            ],
            [
              'image' => ['sizes' => ['medium_large' => 'https://placehold.co/500x300'], 'alt' => 'alt text'],
              'title' => 'Card title 3',
              'link' => '#', 
              'text' => 'Button text', 
              'type' => 'primary', 
              'btn_colour' => 'raspberry'
            ],
          ]
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

            // Card Row
            'title_style' => get_field('title_style'),
            'items' => get_field('items'),
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $cardRow = new FieldsBuilder('card_row');

        $cardRow
        ->addMessage('block_title', '', [
            'label' => 'Card Row',
        ])
        ->addFields($this->get(GeneralTab::class))  
        ->addFields($this->get(Title::class))
        ->addTab('Cards')
        // add repeater called cards with image, title and button
        ->addRepeater('items', [
            'label' => 'Cards',
            'layout' => 'block',
            'button_label' => 'Add Card',
            'max' => 4,
        ])
        ->addImage('image', [
            'label' => 'Image',
        ])
        ->addText('title', [
            'label' => 'Title',
        ])
        ->addFields($this->get(Button::class))
        ->addSelect('btn_colour', [
            'label' => 'Colour',
            'instructions' => 'Choose the background colour for the button.',
            'choices' => [
                'raspberry' => 'Raspberry',
                'black' => 'Black',
                'white' => 'White',
                'dark-green' => 'Dark Green',
            ],
            'default_value' => 'raspberry',
        ]);
        return $cardRow->build();
    }

    /**
     * Return the items field.
     *
     * @return array
     */
    public function items()
    {
        return get_field('items') ?: $this->example['items'];
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
