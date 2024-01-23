<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Partials\GeneralTab;

class quote extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Quote';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'Add a quote to your blog posts.';

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
    public $icon = 'format-quote';

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = ['quote', 'attribution', 'citation', 'source'];

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
        'style' => 'short',
        'text' => 'Quote text - Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor eius in explicabo!',
        'author' => 'Quote author, author job title etc'
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

            // Quote
            'text' => get_field('text'),
            'style' => get_field('style'),
            'author' => get_field('author'),
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $quote = new FieldsBuilder('quote');

        $quote
            ->addFields($this->get(GeneralTab::class))
            ->addTab('Quote')
            ->addRadio('style', [
                'label' => 'Quote style',
                'instructions' => 'Choose the style of quote you would like to use. \'Short\' should be reserved for very short, punchy quotes, ideally of less than 100 characters. Longer quotes should use the \'Long\' style.',
                'choices' => [
                    'short' => 'Short',
                    'long' => 'Long'
                ],
                'default_value' => 'default',
            ])
            ->addTextarea('text', [
                'label' => 'Quote text',
            ])
            ->addText('author', [
                'label' => 'Quote author (optional)',
                'instructions' => 'Add the name of the person being quoted. You may also like to add their job title etc here',
            ]);

        return $quote->build();
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
