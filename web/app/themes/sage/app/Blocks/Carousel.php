<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Partials\GeneralTab;
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
    public $category = 'formatting';

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
            'slides' => get_field('slides'),
            'full' => get_field('full'),
            'slider_autoplay' => get_field('slider_autoplay'),
            'add_text' => get_field('add_text'),
            'slider_ratio' => get_field('slider_ratio'),
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
            ->addRadio('full', [
                'label' => 'Full Width',
                'instructions' => 'Full width will ignore the container width and stretch the slider to the full width of the screen.',
                'choices' => [
                    'true' => 'Yes',
                    'false' => 'No',
                ],
                'default_value' => 'false',
                'layout' => 'horizontal',
            ])
            ->addRadio('slider_autoplay', [
                'label' => 'Autoplay',
                'choices' => [
                    'true' => 'Yes',
                    'false' => 'No',
                ],
                'default_value' => 'false',
                'layout' => 'horizontal',
            ])
            // add slider ratios select
            ->addSelect('slider_ratio', [
                'label' => 'Slider Ratio',
                'instructions' => 'Select the ratio of the slider. 21:9 is the default.',
                'choices' => [
                    'slider-item-ratio-21x9' => '21x9',
                    'slider-item-ratio-2x1' => '2x1',
                    'slider-item-ratio-16x9' => '16x9',
                    'slider-item-ratio-4x3' => '4x3',
                    'slider-item-ratio-1x1' => '1x1',
                    'slider-item-ratio-3x4' => '3x4',
                    'slider-item-ratio-32x9' => '32x9',
                ],
                'default_value' => 'slider-item-ratio-21x9',
                'multiple' => 0,
                'return_format' => 'value',
            ])
            ->addTab('Slides')
            ->addRepeater('slides', [
                'label' => 'Slides',
                'layout' => 'row',
                'button_label' => 'Add Slide',
            ])
                ->addImage('image', [
                    'label' => 'Image',
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                    'library' => 'all',
                ])
                ->addRadio('add_text', [
                    'label' => 'Add Text',
                    'instructions' => 'Add a title and subtitle to the slide. Will be positioned centrally.',
                    'choices' => [
                        'true' => 'Yes',
                        'false' => 'No',
                    ],
                    'default_value' => 'false',
                    'layout' => 'horizontal',
                ])
                ->addText('title', [
                    'label' => 'Title',
                ])->conditional('add_text', '==', 'true')
                ->addText('subtitle', [
                    'label' => 'Subtitle',
                ])->conditional('add_text', '==', 'true')
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
