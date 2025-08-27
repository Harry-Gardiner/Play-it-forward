<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class HeroSlider extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Hero Slider';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'Full-screen hero slider with images, titles, and CTAs';

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
    public $icon = 'slides';

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = ['hero', 'slider', 'banner', 'full-screen', 'carousel'];

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
    public $align = 'full';

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
        'align' => ['full'],
        'align_text' => false,
        'align_content' => false,
        'full_height' => true,
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
    public $styles = [];

    /**
     * The block preview example data.
     *
     * @var array
     */
    public $example = [
        'slides' => [
            [
                'image' => 'https://via.placeholder.com/1920x1080',
                'title' => 'Hero Title 1',
                'subtitle' => 'Hero Subtitle 1',
                'type' => 'primary',
                'text' => 'Learn More',
                'link' => '#',
                'new_tab' => false,
            ],
            [
                'image' => 'https://via.placeholder.com/1920x1080',
                'title' => 'Hero Title 2',
                'subtitle' => 'Hero Subtitle 2',
                'type' => 'primary',
                'text' => 'Get Started',
                'link' => '#',
                'new_tab' => false,
            ],
        ],
        'autoplay' => true,
        'autoplay_speed' => 5000,
        'show_arrows' => true,
        'show_dots' => true,
        'overlay_opacity' => 30,
    ];

    /**
     * Data to be passed to the block before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'slides' => get_field('slides'),
            'autoplay' => get_field('autoplay'),
            'autoplay_speed' => get_field('autoplay_speed'),
            'show_arrows' => get_field('show_arrows'),
            'show_dots' => get_field('show_dots'),
            'overlay_opacity' => get_field('overlay_opacity'),
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $heroSlider = new FieldsBuilder('hero_slider');

        $heroSlider
            ->addMessage('block_title', '', [
                'label' => 'Hero Slider',
                'message' => 'Create a full-screen hero slider with background images, titles, and call-to-action buttons.',
            ])

            ->addTab('Slides')
            ->addRepeater('slides', [
                'label' => 'Hero Slides',
                'layout' => 'block',
                'button_label' => 'Add Hero Slide',
                'min' => 1,
            ])
                ->addImage('image', [
                    'label' => 'Background Image',
                    'instructions' => 'Upload a high-resolution image (recommended: 1920x1080 or larger).',
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                    'library' => 'all',
                    'mime_types' => 'jpg, jpeg, png, webp',
                    'required' => 1,
                ])
                ->addText('title', [
                    'label' => 'Title',
                    'instructions' => 'Main heading for this slide.',
                    'maxlength' => 100,
                ])
                ->addTextarea('subtitle', [
                    'label' => 'Subtitle/Content',
                    'instructions' => 'Supporting text or subtitle for this slide.',
                    'rows' => 3,
                    'maxlength' => 300,
                ])
                ->addText('cta_text', [
                    'label' => 'CTA Button Text',
                    'instructions' => 'Text for the call-to-action button (leave empty to hide button).',
                    'maxlength' => 30,
                ])
                ->addLink('cta_link', [
                    'label' => 'CTA Button Link',
                    'instructions' => 'Where the CTA button should link to.',
                    'return_format' => 'array',
                ])
                ->addSelect('text_position', [
                    'label' => 'Text Position',
                    'instructions' => 'Where to position the text overlay on the image.',
                    'choices' => [
                        'center' => 'Center',
                        'left' => 'Left',
                        'right' => 'Right',
                        'bottom-left' => 'Bottom Left',
                        'bottom-center' => 'Bottom Center',
                        'bottom-right' => 'Bottom Right',
                    ],
                    'default_value' => 'center',
                ])
                ->addSelect('text_color', [
                    'label' => 'Text Color',
                    'instructions' => 'Color scheme for the text overlay.',
                    'choices' => [
                        'white' => 'White',
                        'black' => 'Black',
                        'primary' => 'Primary Color',
                    ],
                    'default_value' => 'white',
                ])
            ->endRepeater()

            ->addTab('Settings')
            ->addTrueFalse('autoplay', [
                'label' => 'Autoplay',
                'instructions' => 'Automatically advance slides.',
                'default_value' => 1,
                'ui' => 1,
            ])
            ->addNumber('autoplay_speed', [
                'label' => 'Autoplay Speed (milliseconds)',
                'instructions' => 'How long each slide should be displayed (in milliseconds).',
                'default_value' => 5000,
                'min' => 1000,
                'max' => 10000,
                'step' => 500,
            ])
                ->conditional('autoplay', '==', 1)
            ->addTrueFalse('show_arrows', [
                'label' => 'Show Navigation Arrows',
                'instructions' => 'Display previous/next arrows.',
                'default_value' => 1,
                'ui' => 1,
            ])
            ->addTrueFalse('show_dots', [
                'label' => 'Show Dots Navigation',
                'instructions' => 'Display dot indicators for each slide.',
                'default_value' => 1,
                'ui' => 1,
            ])
            ->addRange('overlay_opacity', [
                'label' => 'Dark Overlay Opacity',
                'instructions' => 'Add a dark overlay to improve text readability (0 = no overlay, 100 = solid black).',
                'default_value' => 30,
                'min' => 0,
                'max' => 80,
                'step' => 10,
                'append' => '%',
            ])
        ;

        return $heroSlider->build();
    }

    /**
     * Assets to be enqueued when rendering the block.
     *
     * @return void
     */
    public function enqueue()
    {
        // Enqueue any specific JS/CSS for the hero slider if needed
    }
}
