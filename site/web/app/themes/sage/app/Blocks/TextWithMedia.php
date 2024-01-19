<?php

namespace App\Blocks;

use App\Fields\Partials\ImpactWord;
use App\Fields\Partials\GeneralTab;
use App\Fields\Partials\Title;
use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class TextWithMedia extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Text with Media';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A block for highlighting media with associated text, such as a title, body copy, and impact word';

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
    public $icon = 'admin-media';

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = ['video', 'images', 'text', 'copy', 'body', 'heading', 'title', 'media', 'image'];

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
        'background_colour' => 'off-white',
        'impact_word_enable' => 'yes',
        'impact_word' => 'Impact word',
        'impact_word_position' => 'left',
        'title_style' => ['title' => 'Text with media - image', 'heading_level' => 'h2', 'heading_style' => 'h2'],
        'title_align' => 'left',
        'body' => 'Body text - Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor eius in explicabo!',
        'media_type' => 'image',
        'image' => ['url' => 'https://placehold.co/1000x1000', 'alt' => 'alt text'],
        'video' => ''
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

            // Text with Media
            'title_style' => get_field('title_style'),
            'title_align' => get_field('title_align'),
            'body' => get_field('body'),
            'media_type' => get_field('media_type'),
            'image' => get_field('image'),
            'video' => get_field('video'),
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $textWithMedia = new FieldsBuilder('text-with-media');

        $textWithMedia
            ->addMessage('block_title', '', [
                'label' => 'Text with Media',
                'message' => 'A block for adding additional text and an impact word to images or videos.',
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
            ->addRadio('title_align', [
                'label' => 'Title Alignment',
                'choices' => [
                    'left' => 'Left',
                    'centre' => 'Centre',
                    'right' => 'Right',
                ],
                'default_value' => 'left',
            ])
            ->addWysiwyg('body', [
                'label' => 'Body',
                'media_upload' => 0,
                'toolbar' => 'basic',
            ])
            ->addRadio('media_type', [
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
            ])->conditional('media_type', '==', 'image')
            ->addOembed('video', [
                'label' => 'Video',
                'return_format' => 'url',
            ])->conditional('media_type', '==', 'video');

        return $textWithMedia->build();
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
