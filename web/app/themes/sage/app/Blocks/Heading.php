<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Partials\GeneralTab;

class heading extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Heading';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'Add SEO-friendly headings to your blog posts.';

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
    public $icon = 'heading';

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = ['text', 'heading', 'title'];

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

            // Content
            'text' => get_field('text'),
            'heading_style' => get_field('heading_style'),
            'heading_semantics' => get_field('heading_semantics'),
            'text_alignment' => get_field('text_alignment'),
            'text_colour' => get_field('colour_picker'),
            'text_background_colour' => get_field('text_background_colour'),
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $heading = new FieldsBuilder('heading');

        $heading
            ->addFields($this->get(GeneralTab::class))
            ->addTab('Heading')
            ->addTextarea('text', [
                'label' => 'Heading text',
            ])
            ->addRadio('heading_style', [
                'label' => 'Heading style',
                'instructions' => 'Choose the heading style. This will only affect the appearance of the heading, not its semantic level.',
                'choices' => [
                    'h1' => 'H1',
                    'h2' => 'H2',
                    'h3' => 'H3',
                    'h4' => 'H4',
                    'h5' => 'H5',
                    'h6' => 'H6',
                ],
                'default_value' => 'h2',
            ])
            ->addRadio('heading_semantics', [
                'label' => 'Heading level',
                'instructions' => 'Choose the heading level. You should aim to use progressively smaller headings across blocks as you go down the page, e.g. the hero should always contain an H1, so start at H2 in the next block and decrease the heading level by 1 for every subsequent heading from there. This will not affect the appearance of the heading, only its semantic level, and is for both SEO and accessibility purposes.',
                'choices' => [
                    'h1' => 'H1',
                    'h2' => 'H2',
                    'h3' => 'H3',
                    'h4' => 'H4',
                    'h5' => 'H5',
                    'h6' => 'H6',
                ],
                'default_value' => 'h2',
            ])
            ->addRadio('text_alignment', [
                'label' => 'Text alignment',
                'choices' => [
                    'left' => 'Left',
                    'center' => 'Center',
                    'right' => 'Right',
                ],
                'default_value' => 'left',
            ])
            ->addRadio('colour_picker', [
                'label' => 'Text colour',
                // Choices are generated in setup.php see ACF Radio Color Palette filter approx line 244.
                'default_value' => 'charcoal',
            ])
            ->addRadio('text_background_colour', [
                'label' => 'Heading background colour',
                // Choices are generated in setup.php see ACF Radio Color Palette filter approx line 244.
                'default_value' => 'white',
            ])
            ;

        return $heading->build();
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
