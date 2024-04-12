<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Partials\GeneralTab;
use App\Fields\Partials\Title;

class Timeline extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Timeline';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A block for displaying a timeline of events or items in a carousel format.';

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
    public $icon = 'backup';

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = ['timeline', 'carousel', 'order', 'events', 'progression', 'steps', 'stages', 'milestones', 'process', 'flow', 'sequence', 'chronology', 'schedule', 'agenda', 'itinerary', 'record'];

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
        'title_style' => ['title' => 'Timeline Title', 'heading_level' => 'h2', 'heading_style' => 'h2'],
        'cards' => [
          [
            'card_year' => '2020',
            'card_title' => 'Card title 1',
            'card_text' => 'Card description 1'
          ],
          [
            'card_year' => '2021',
            'card_title' => 'Card title 2',
            'card_text' => 'Card description 2'
          ],
          [
            'card_year' => '2022',
            'card_title' => 'Card title 3',
            'card_text' => 'Card description 3'
          ],
          [
            'card_year' => '2023',
            'card_title' => 'Card title 4',
            'card_text' => 'Card description 4'
          ]
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
             'background_colour' => get_field('colour_picker'),
 
             // Content
             'title_style' => get_field('title_style'),
             'cards' => get_field('cards') ?: [],
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $timeline = new FieldsBuilder('timeline');

        $timeline
        ->addMessage('block_title', '', [
            'label' => 'Timeline',
            'message' => 'A block for displaying a timeline of events or items in a carousel format.',
        ])
        ->addFields($this->get(GeneralTab::class))
        ->addTab('Content')
        ->addFields($this->get(Title::class))
        ->addRepeater('cards', [
            'label' => 'Cards',
            'button_label' => 'Add Card',
            'layout' => 'block'
        ])
            ->addNumber('card_year', [
                'label' => 'Year',
            ])
            ->addText('card_title', [
                'label' => 'Card title',
            ])
            ->addImage('card_image', [
                'label' => 'Card image',
                'return_format' => 'array',
                'preview_size' => 'thumbnail',
            ])
            ->addTextarea('card_text', [
                'label' => 'Card text',
            ])
        ->endRepeater();

        return $timeline->build();
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
