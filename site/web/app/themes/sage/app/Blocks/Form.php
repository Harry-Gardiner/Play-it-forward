<?php

namespace App\Blocks;

use App\Fields\Partials\Button;
use App\Fields\Partials\GeneralTab;
use App\Fields\Partials\Title;
use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Form extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Form';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'Block used to add form shortcode from wpforms';

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
    public $icon = 'clipboard';

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = ['form', 'embed', 'wpform'];

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
            'wrapper' => get_field('block_spacing'),
            'spacing_size' => get_field('spacing_size'),
            'background_colour' => get_field('colour_picker'),
            'title_style' => get_field('title_style'),
            'body' => get_field('body'),
            'form_type' => get_field('form_type'),
            'image' => get_field('image'),
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $form = new FieldsBuilder('form');

        $form
            ->addMessage('block_title', '', [
                'label' => 'Form block',
            ])
            ->addFields($this->get(GeneralTab::class))
            ->addRadio('colour_picker', [
                'label' => 'Select Colour',
                // Choices are generated in setup.php see ACF Radio Color Palette filter approx line 244.
                'default_value' => 'off-white',
            ])
            ->addTab('Content')
            ->addFields($this->get(Title::class))
            ->addWysiwyg('body', [
                'media_upload' => 0,
                'toolbar'      => 'basic',
            ])
            ->addSelect('form_type', [
                'label' => 'Form type',
                'instructions' => 'Choose form option.',
                'choices' => [
                    'newsletter' => 'Newsletter',
                    'other' => 'Other'
                ]
            ])
            ->addText('form_shortcode', [
                'label' => 'Form shortcode',
                'instructions' => 'Add shortcode snippet from wpforms'
            ])->conditional('form_type', '==', 'other')
            ->addImage('image');

        return $form->build();
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
