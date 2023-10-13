<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Partials\GeneralTab;

class contentPicker extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Content Picker';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'Add standfirsts, text, images, quotes and more to your blog posts.';

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
    public $icon = 'edit-large';

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = ['text', 'media', 'image', 'video', 'list', 'quote'];

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
    public $mode = 'edit';

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
            'content' => get_field('content_type'),
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $contentPicker = new FieldsBuilder('content_picker');

        $contentPicker
            ->addRepeater('blog_content')
                ->addSelect('content_type', [
                    'label' => 'Content Type',
                    'instructions' => 'Choose a content type to add to the post.',
                    'choices' => [
                        'heading' => 'Heading',
                        'text' => 'Body text',
                        'standfirst' => 'Standfirst',
                        'image' => 'Image',
                        'text_img' => 'Text & image (2 column layout)',
                        'text_quote' => 'Text & quote (2 column layout)',
                    ],
                    'default_value' => 'latest',
                ])
                ->addGroup('heading_options', [
                    'label' => 'Heading Options',
                    'instructions' => 'Add a heading. The largest size available is H2 for accessibility reasons.'
                ])->conditional('content_type', '==', 'heading')
                    ->addText('heading', [
                        'label' => 'Heading text',
                    ])
                    ->addRadio('heading_size', [
                        'label' => 'Heading size',
                        'choices' => [
                            'h2' => 'H2',
                            'h3' => 'H3',
                            'h4' => 'H4',
                            'h5' => 'H5',
                            'h6' => 'H6',
                        ],
                        'default_value' => 'h2',
                    ])
                ->endGroup()
                ->addGroup('text_options', [
                    'label' => 'Text Options',
                    'instructions' => 'Add body text.'
                ])->conditional('content_type', '==', 'text')
                    ->addWysiwyg('text', [
                        'label' => 'Body text',
                        'media_upload' => 0,
                        'toolbar' => 'basic',
                        'delay' => 1,
                    ])
                ->endGroup()
                ->addGroup('standfirst_options', [
                    'label' => 'Standfirst Options',
                    'instructions' => 'Add a standfirst (slightly larger text to appear as the first standout paragraph in a blog post).'
                ])->conditional('content_type', '==', 'standfirst')
                    ->addWysiwyg('standfirst', [
                        'label' => 'Standfirst',
                        'media_upload' => 0,
                        'toolbar' => 'basic',
                        'delay' => 1,
                    ])
                ->endGroup()
                ->addImage('image', [
                    'instructions' => 'Add an image.',
                    'label' => 'Image',
                ])->conditional('content_type', '==', 'image')
                
            ->endRepeater();

        return $contentPicker->build();
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
