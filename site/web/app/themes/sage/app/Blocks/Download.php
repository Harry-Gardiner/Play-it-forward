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
        'wrapper' => '',
        'spacing_size' => '',
        'background_colour' => 'yellow',
        'layout' => 'default',
        'download_file' => ['url' => 'https://example.com/wp-content/uploads/2021/01/example.pdf', 'filename' => 'example.pdf'],
        'download_image' => ['url' => 'https://placehold.co/800x800', 'alt' => 'Example Image'],
        'title_style' => ['title' => 'Downloads Title', 'heading_level' => 'h2', 'heading_style' => 'h2'],

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
            'layout' => get_field('layout'),

            // Download
            'download_file' => get_field('download_file'),
            'download_image' => get_field('download_image'),
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
        ->addSelect('layout', [
            'label' => 'Layout',
            'instructions' => 'Choose the layout for the CTA Banner.<br><br>Full Width will span the full width of the screen. Default will be the default width of the content.',
            'required' => 0,
            'choices' => [
                'default' => 'Default',
                'full' => 'Full Width',
            ],
            'default_value' => 'default',
            'layout' => 'horizontal',
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
