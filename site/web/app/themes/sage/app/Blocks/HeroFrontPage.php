<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Partials\Button;

class HeroFrontPage extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Hero Front Page';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'Front page hero block';

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
    public $icon = 'cover-image';

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = ['hero', 'header', 'title'];

    /**
     * The block post type allow list.
     *
     * @var array
     */
    public $post_types = [
        'page'
    ];

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
            // Hero Content
            'hero_image' => get_field('hero_image'),
            'hero_image_position' => get_field('hero_image_position'),
            'hero_title' => get_field('hero_title'),
            'highlighted_text' => get_field('highlighted_text'),
            'impact_text' => get_field('impact_text'),
            'hero_content' => get_field('hero_content'),
            'show_button' => get_field('show_button'),
            'cta_button' => get_field('cta_button'),
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $hero_front_page = new FieldsBuilder('hero_front_page');

        $hero_front_page
            ->addMessage('block_title', '', [
                'label' => 'Hero Front Page',
            ])
            ->addTab('Hero Image')
            ->addImage('hero_image', [
                'label' => 'Hero Image',
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
                'mime_types' => 'jpg, jpeg, png, svg',
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
            ])
            ->addTab('Hero Content')
            ->addText('hero_title', [
                'label' => 'Hero Title',
            ])
            ->addRepeater('highlighted_text', [
                'label' => 'Highlighted Title Text',
                'instructions' => 'Highlighted text will be displayed in red. <br><br> Each word you wish to highlight needs to be added individually. The text string must be an exact match of the text string in the hero title above, inc any punctuation if that should also be highlighted.',
                'layout' => 'table',
                'button_label' => 'Add Highlighted Text',
            ])
            ->addText('text_string', [
                'label' => 'Highlighted Text',
            ])
            ->endRepeater()
            ->addRepeater('impact_text', [
                'label' => 'Impact Text',
                'instructions' => 'Impact text will be displayed in a sliding carousel',
                'layout' => 'table',
                'button_label' => 'Add Impact Text',
            ])
            ->addText('text_string', [
                'label' => 'Impact Text',
            ])
            ->endRepeater()
            ->addWYSIWYG('hero_content', [
                'label' => 'Hero Subtitle',
                'media_upload' => 0,
                'toolbar' => 'full',
                'delay' => 1,
            ])
            ->addRadio('show_button', [
                'label' => 'Show Button?',
                'required' => 1,
                'choices' => [
                    'yes' => 'Yes',
                    'no' => 'No',
                ],
                'default_value' => 'no',
                'layout' => 'horizontal',
            ])
            ->addGroup('cta_button', ['label' => 'CTA Button'])
            ->addFields($this->get(Button::class))->conditional('show_button', '==', 'yes')
            ->endGroup();;

        return $hero_front_page->build();
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
