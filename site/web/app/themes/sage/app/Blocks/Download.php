<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Partials\GeneralTab;
use App\Fields\Partials\Title;

class Download extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Download';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A single Download block.';

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
    public $icon = 'download';

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = ['download', 'document', 'pdf', 'file', 'attachment', 'newsletter', 'magazine', 'publication', 'report', 'downloadable'];

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

            // Download
            'download_file' => get_field('download_file'),
            'download_image' => get_field('download_image'),
            // 'title' => get_field('title'),
            'title_style' => get_field('title_style'),
            'description' => get_field('description'),
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $download = new FieldsBuilder('download');

        $download
        ->addMessage('block_title', '', [
            'label' => 'Downloads',
        ])
        ->addFields($this->get(GeneralTab::class))
        ->addRadio('colour_picker', [
            'label' => 'Select Colour',
            // Choices are generated in setup.php see ACF Radio Color Palette filter approx line 244.
            'default_value' => 'off-white',
        ])
        ->addTab('download', [
            'label' => 'Download',
        ])
        ->addFile('download_file', [
            'label' => 'File',
            'instructions' => 'Upload a File.',
            'return_format' => 'array',
            'library' => 'all',
        ])
        ->addImage('download_image', [
            'label' => 'Cover Image',
            'instructions' => 'Upload Image.',
            'return_format' => 'array',
            'preview_size' => 'medium',
            'library' => 'all',
        ])
        // ->addText('title', [
        //     'label' => 'Title',
        //     'instructions' => 'Enter the title of the PDF.',
        // ])
        ->addFields($this->get(Title::class))
        ->addTextarea('description', [
            'label' => 'Description',
            'instructions' => 'Enter the description of the PDF.',
        ])
        ;

        return $download->build();
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
