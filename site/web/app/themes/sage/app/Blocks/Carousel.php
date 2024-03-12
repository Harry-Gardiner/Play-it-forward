<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Partials\GeneralTab;
use App\Fields\Partials\Title;
class Carousel extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Carousel';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'Carousel of images';

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
    public $icon = 'images-alt';

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = ['carousel', 'slider', 'images'];

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

            // Carousel
            'title_style' => get_field('title_style'),
            'slides' => get_field('slides'),
            'slider_type' => get_field('slider_type'), 
            'content' => get_field('content'),
                      
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $carousel = new FieldsBuilder('carousel');

        $carousel
            ->addMessage('block_title', '', [
                'label' => 'Carousel',
            ])
            ->addFields($this->get(GeneralTab::class))  
            ->addTab('Slider Options')
            ->addFields($this->get(Title::class))
            ->addSelect('slider_type', [
                'label' => 'Slider Type',
                'instructions' => 'Select the type of slider and add slides. Images can be used to create a carousel of images with title and subtext. Icons can be used to create a carousel of just icons for example logos (min requirement 7).',
                'choices' => [
                    'slider-icons' => 'Icons',
                    'slider-images' => 'Images',
                ],
                'default_value' => 'slider-images',
                'multiple' => 0,
                'return_format' => 'value',
            ])
            ->addTab('Slides')
            ->addRepeater('slides', [
                'label' => 'Slides',
                'layout' => 'block',
                'button_label' => 'Add Slide',
            ])
            ->addImage('image', [
                'label' => 'Image',
                'instructions' => 'Upload an image for the slide.',
                'return_format' => 'array',
                'preview_size' => 'thumbnail',
                'library' => 'all',
                'mime_types' => 'jpg, jpeg, png, gif',
            ])->conditional('slider_type', '==', 'slider-images')->or('slider_type', '==', 'slider-icons')
            ->addText('title', [
                'label' => 'Title',
                'instructions' => 'Add a title for the slide.',
            ])->conditional('slider_type', '==', 'slider-images')
            ->addText('subtitle', [
                'label' => 'Subtitle',
                'instructions' => 'Add a subtitle for the slide.',
            ])->conditional('slider_type', '==', 'slider-images')
            ->addTextarea('content', [
                'label' => 'Content',
                'instructions' => 'Add content for the slide.',
                'rows' => 4,
            ])->conditional('slider_type', '==', 'slider-images')
            ->endRepeater()
        ;
        return $carousel->build();
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
