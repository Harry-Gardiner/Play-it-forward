<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Partials\GeneralTab;

class Text extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Text';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'Add text to your blog posts.';

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
    public $icon = 'editor-alignleft';

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = ['text', 'standfirst', 'feature', 'copy', 'body'];

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
        'text' => '<p>EXAMPLE Default style - Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.</p>',
        'wrapper' => '',
        'spacing_size' => '',
        'style' => 'body',
        'text_alignment' => 'left',
    ];

    /**
     * Data to be passed to the block before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'text' => get_field('text'),
            'style' => get_field('style'),

            // General
            'wrapper' => get_field('block_spacing'),
            'spacing_size' => get_field('spacing_size'),
            'background_colour' => get_field('colour_picker'),
             'text_alignment' => get_field('text_alignment'),
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $text = new FieldsBuilder('text');

        $text
            ->addFields($this->get(GeneralTab::class))
            ->addTab('Content', [
                'label' => 'Text content'
            ])
            ->addRadio('style', [
                'label' => 'Text style',
                'instructions' => 'Choose the style of the text. Default is regular text, while Standfirst is a larger, bolder style for introductory text, e.g. for the first paragraph of a blog post.',
                'choices' => [
                    'body' => 'Default',
                    'standfirst' => 'Standfirst'
                ],
                'default_value' => 'default',
            ])
            ->addWysiwyg('text', [
                'label' => 'Text',
                'media_upload' => 0,
                'tabs' => 'visual',
                'toolbar' => 'basic',
                'instructions' => 'Add the text for this block. You can also add bullet lists, numbered lists, bold text, italic text, links and more.',
            ])
            ->addRadio('text_alignment', [
                'label' => 'Text alignment',
                'choices' => [
                    'left' => 'Left',
                    'center' => 'Center',
                    'right' => 'Right',
                ],
                'default_value' => 'left',
            ]);


        return $text->build();
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
