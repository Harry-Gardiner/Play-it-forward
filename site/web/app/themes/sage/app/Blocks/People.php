<?php

namespace App\Blocks;
use App\Fields\Partials\GeneralTab;
use App\Fields\Partials\Title;
use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class People extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'People';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'Block for displaying a list of people.';

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
    public $keywords = ['people', 'people list', 'person list', 'staff', 'team'];

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
        'title_style' => ['title' => 'People Title', 'heading_level' => 'h2', 'heading_style' => 'h2'],
        'people' => [
          [
            'name' => 'Person 1',
            'bio' => 'Bio text - Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor eius in explicabo!',
            'image' => ['sizes' => ['medium_large' => 'https://placehold.co/800x800'], 'alt' => 'alt text']
          ],
          [
            'name' => 'Person 2',
            'bio' => 'Bio text - Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor eius. Lorem ipsum dolor sit. Lorem ipsum dolor sit amet amet in explicabo!',
            'image' => ['sizes' => ['medium_large' => 'https://placehold.co/800x800'], 'alt' => 'alt text']
          ],
          [
            'name' => 'Person 3',
            'bio' => 'Bio text - Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor eius in explicabo!',
            'image' => ['sizes' => ['medium_large' => 'https://placehold.co/800x800'], 'alt' => 'alt text']
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
            
            // People
            'title_style' => get_field('title_style'),
            'people' => get_field('people')
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $people = new FieldsBuilder('people');

        $people
        ->addMessage('block_title', '', [
            'label' => 'People block',
            'message' => 'This block is for displaying a list of people.',
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
        ->addTab('People')
        ->addFields($this->get(Title::class))
        ->addRepeater('people', [
            'label' => 'People',
            'layout' => 'block',
        ])
            ->addText('name', [
                'label' => 'Name',
            ])
            ->addWYSIWYG('bio', [
                'label' => 'Bio',
                'media_upload' => 0,
                'toolbar' => 'basic',
                'delay' => 1,
            ])
            ->addImage('image', [
                'label' => 'Image',
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
                'mime_types' => 'jpg, jpeg, png, svg',
            ])
            ->addText('linkedin', [
                'label' => 'LinkedIn',
                'instructions' => 'Enter the LinkedIn URL',
                'placeholder' => 'https://www.linkedin.com/in/username',
            ])
        ;

        return $people->build();
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
