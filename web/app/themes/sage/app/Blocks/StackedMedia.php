<?php

namespace App\Blocks;

use App\Fields\Partials\ImpactWord;
use App\Fields\Partials\Button;
use App\Fields\Partials\GeneralTab;
use App\Fields\Partials\Title;
use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class StackedMedia extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Stacked Media';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'Stacked media items. Either images or videos.';

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
    public $icon = 'images-alt2';

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = ['video', 'images', 'stacked', 'media', 'image'];

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
            // General
            'wrapper' => get_field('block_spacing'),
            'spacing_size' => get_field('spacing_size'),
            'background_colour' => get_field('colour_picker'),

            // Impact Word
            'impact_word_enable' => get_field('impact_word_enable'),
            'impact_word' => get_field('impact_word'),
            'impact_word_position' => get_field('impact_word_position'),

            // Stacked Media
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
        $stackedMedia = new FieldsBuilder('stacked_media');

        $stackedMedia
            ->addMessage('block_title', '', [
                'label' => 'Stacked Media',
                'message' => 'Column of stacked media items. Either images or videos.',
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
            ->addFields($this->get(Title::class))
            ->addRepeater('items', [
                'label' => 'Media Items',
                'layout' => 'block',
                'button_label' => 'Add Media Item',
            ])
            ->addSelect('media_type', [
                'label' => 'Media Type',
                'choices' => [
                    'image' => 'Image',
                    'video' => 'Video',
                ],
                'default_value' => 'image',
            ])
            ->addImage('image', [
                'label' => 'Image',
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
                'mime_types' => 'jpg, jpeg, png',
                'instructions' => 'Minimum image width of 1000px is recommended. Also landscape images work best.',
            ])->conditional('media_type', '==', 'image')
            ->addOembed('video', [
                'label' => 'Video',
                'return_format' => 'url',
            ])->conditional('media_type', '==', 'video');

        return $stackedMedia->build();
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
