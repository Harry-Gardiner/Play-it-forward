<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Partials\GeneralTab;

class FullImage extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Full Image';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'Add full width images to your blog posts.';

    /**
     * The block category.
     *
     * @var string
     */
    public $category = 'media';

    /**
     * The block icon.
     *
     * @var string|array
     */
    public $icon = 'format-image';

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = ['image', 'img', 'picture', 'media'];

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
        'image' => ['url' => 'https://picsum.photos/2000/800', 'alt' => 'alt text']
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

            // Image
            'image' => get_field('image'),
            'full_image_position' => get_field('full_image_position'),
            'image_height' => get_field('image_height'),
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $fullImage = new FieldsBuilder('full_image');

        $fullImage
            ->addFields($this->get(GeneralTab::class))
            ->addTab('Full Width Image')
            ->addImage('image', [
                'label' => 'Full Width Image',
                'instructions' => 'This image will be the entire width of the screen, ignoring the container that houses most of the other content.<br><br>Don\'t forget to add alt text for better accessibility and SEO. You can add this in the media library.',
            ])
            ->addSelect('full_image_position', [
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
            ->addRange('image_height', [
                'label' => 'Image Height',
                'instructions' => 'Set the height of the image in pixels. The width will always be 100% of the screen. This will only apply to the image on larger screens.',
                'default_value' => 400,
                'min' => 100,
                'max' => 1000,
                'step' => 100,
            ]);

        return $fullImage->build();
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
