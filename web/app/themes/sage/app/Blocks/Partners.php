<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Partials\GeneralTab;
use App\Fields\Partials\Title;
use App\Fields\Partials\ImpactWord;

class Partners extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Partners';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'List partners.';

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
    public $icon = 'groups';

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = ['partners', 'corporate', 'logos'];

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
        'impact_word_enable' => 'yes',
        'impact_word' => 'partners.',
        'impact_word_position' => 'right',
        'title_style' => ['title' => 'Partners Title', 'heading_level' => 'h2', 'heading_style' => 'h2'],
        'body' => 'Body text - Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor eius in explicabo!',
        'partners' => [
          [
            'logo' => ['sizes' => ['thumbnail' => 'https://placehold.co/150x150'], 'alt' => 'alt text'],
            'name' => 'Partner 1',
            'description' => 'Partner description with an external link',
            'url' => '#'
          ],
          [
            'logo' => ['sizes' => ['thumbnail' => 'https://placehold.co/150x150'], 'alt' => 'alt text'],
            'name' => 'Partner 2',
            'description' => 'Partner description with an external link',
            'url' => '#'
          ],
          [
            'logo' => ['sizes' => ['thumbnail' => 'https://placehold.co/150x150'], 'alt' => 'alt text'],
            'name' => 'Partner 3',
            'description' => 'Partner description with no link',
            'url' => ''
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

            // Impact Word
            'impact_word_enable' => get_field('impact_word_enable'),
            'impact_word' => get_field('impact_word'),
            'impact_word_position' => get_field('impact_word_position'),

            // Partners
            'title_style' => get_field('title_style'),
            'body' => get_field('body'),
            'partners' => get_field('partners'),
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $partners = new FieldsBuilder('partners');

        $partners
            ->addMessage('block_title', '', [
                'label' => 'Partners block',
                'message' => 'Display a list of partners in a staggered column layout.',
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
            ->addTab('partners', [
                'label' => 'Partners',
            ])
            ->addFields($this->get(Title::class))
            ->addWYSIWYG('body', [
                'label' => 'Content',
                'media_upload' => 0,
                'tabs' => 'visual',
                'toolbar' => 'basic',
                'delay' => 1,
            ])
            ->addRepeater('partners', [
                'label' => 'Partners',
                'layout' => 'row',
                'button_label' => 'Add Partner',
            ])
            ->addImage('logo', [
                'label' => 'Logo',
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
            ])
            ->addText('name', [
                'label' => 'Name',
            ])
            ->addTextarea('description', [
                'label' => 'Description',
                'rows' => 2,
            ])
            ->addUrl('url', [
                'label' => 'URL',
            ])
            ->endRepeater();
        return $partners->build();
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
