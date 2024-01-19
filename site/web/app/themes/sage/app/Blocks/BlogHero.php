<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Partials\GeneralTab;


class BlogHero extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Blog Hero';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'Hero block, displayed at the top of blog pages.';

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
    public $icon = 'cover-image';

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = ['hero', 'header', 'title', 'image', 'blog'];

    /**
     * The block post type allow list.
     *
     * @var array
     */
    public $post_types = ['post'];

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

            // Hero Image
            'show_hero_image' => get_field('show_hero_image'),
            'hero_image_position' => get_field('hero_image_position'),
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $blogHero = new FieldsBuilder('blog_hero');

        $blogHero
            ->addMessage('block_title', '', [
                'label' => 'Hero',
            ])
            ->addFields($this->get(GeneralTab::class))
            ->addRadio('colour_picker', [
                'label' => 'Select Colour',
                'choices' => [
                    'white' => 'White',
                    'off-white' => 'Off White',
                    'raspberry' => 'Raspberry',
                ],
                'default_value' => 'white',
            ])
            ->addTab('Hero Image')
            ->addMessage('hero_image', '', [
                'label' => 'Hero Image',
                'message' => 'If you choose to show the hero image, it will be displayed 50/50 with the hero content. The image used is the featured image of the blog post.',
            ])
            ->addSelect('show_hero_image', [
                'label' => 'Show Hero Image',
                'instructions' => 'If you would like to add a hero image, select "Yes". Else a default image will be used.',
                'choices' => [
                    'yes' => 'Yes',
                    'no' => 'No',
                ],
                'default_value' => 'no',
            ])
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
            ->addMessage('hero_title', '', [
                'label' => 'Hero Title',
                'message' => 'The title of the blog post will be used as the hero title.',
            ]);

        return $blogHero->build();
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
