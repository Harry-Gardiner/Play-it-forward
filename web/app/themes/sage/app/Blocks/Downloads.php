<?php

namespace App\Blocks;

use App\Fields\Partials\GeneralTab;
use App\Fields\Partials\ImpactWord;
use App\Fields\Partials\Title;
use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Downloads extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Downloads';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A block for displaying a list of downloads.';

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
    public $icon = 'download';

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = ['pdf', 'grid', 'download', 'newsletter', 'magazine', 'publication', 'report'];

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
        'impact_word_enable' => 'yes',
        'impact_word' => 'Impact word',
        'impact_word_position' => 'left',
        'title_style' => ['title' => 'Downloads Title', 'heading_level' => 'h2', 'heading_style' => 'h2'],
        'download_grid' => [
          [
            'download_image' => ['sizes' => ['medium_large' => 'https://placehold.co/800x800'], 'alt' => 'alt text'],
            'download_image_orientation' => 'portrait',
            'title' => 'Download portrait title',
            'description' => 'Download description',
            'download_file' => ['url' => 'https://placehold.co/800x800']
          ],
          [
            'download_image' => ['sizes' => ['medium_large' => 'https://placehold.co/800x800'], 'alt' => 'alt text'],
            'download_image_orientation' => 'portrait',
            'title' => 'Download portrait title',
            'description' => 'Download description',
            'download_file' => ['url' => 'https://placehold.co/800x800']
          ],
          [
            'download_image' => ['sizes' => ['medium_large' => 'https://placehold.co/800x800'], 'alt' => 'alt text'],
            'download_image_orientation' => 'portrait',
            'title' => 'Download portrait title',
            'description' => 'Download description',
                'download_file' => ['url' => 'https://placehold.co/800x800']
          ],
          [
            'download_image' => ['sizes' => ['medium_large' => 'https://placehold.co/400x400'], 'alt' => 'alt text'],
            'download_image_orientation' => 'landscape',
            'title' => 'Download landscape title',
            'description' => 'Download description',
            'download_file' => ['url' => 'https://placehold.co/400x400']
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

            // Impact Word
            'impact_word_enable' => get_field('impact_word_enable'),
            'impact_word' => get_field('impact_word'),
            'impact_word_position' => get_field('impact_word_position'),

            // Download Grid
            'title_style' => get_field('title_style'),
            'download_grid' => get_field('download_grid'),
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $downloads = new FieldsBuilder('downloads');

        $downloads
            ->addMessage('block_title', '', [
                'label' => 'Downloads',
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
            ->addFields($this->get(ImpactWord::class))
            ->addTab('downloads', [
                'label' => 'Document Grid',
            ])
            ->addFields($this->get(Title::class))
            ->addRepeater('download_grid', [
                'label' => 'Documents',
                'layout' => 'block',
                'button_label' => 'Add item',
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
            ->addSelect('download_image_orientation', [
                'label' => 'Image Orientation',
                'instructions' => 'Select the orientation of the image.',
                'choices' => [
                    'landscape' => 'Landscape',
                    'portrait' => 'Portrait',
                ],
                'default_value' => 'portrait',
            ])
            ->addText('title', [
                'label' => 'Title',
                'instructions' => 'Enter the title of the PDF.',
            ])
            ->addTextarea('description', [
                'label' => 'Description',
                'instructions' => 'Enter the description of the PDF.',
            ])
            ->endRepeater();

        return $downloads->build();
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
