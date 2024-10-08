<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Partials\GeneralTab;
use App\Fields\Partials\Title;

class TwoColumnContent extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Two Column Content';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A two column block with various content options.';

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
    public $icon = 'columns';

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = ['quote', 'attribution', 'citation', 'source', 'body', 'text', 'copy', 'two column', 'image', 'picture', 'video', 'media'];

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
        'wrapper' => '',
        'spacing_size' => '',
        'background_colour' => 'off-white',
        'align_layout' => 'align-to-top',
        'title_style' => ['title' => 'Partners Title', 'heading_level' => 'h2', 'heading_style' => 'h2'],
        'content_1' => 'image',
        'image_1' => ['url' => 'https://placehold.co/800x800', 'alt' => 'alt text'],
        'content_2' => 'text',
        'title_2' => 'Title',
        'text_2' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.</p>',
    ];

    /**
     * Data to be passed to the block before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'align_layout' => get_field('align_layout'),
            'title_style' => get_field('title_style'),

            'content_1' => get_field('content_1'),
            'content_2' => get_field('content_2'),
            'title_1' => get_field('title_1'),
            'text_1' => get_field('text_1'),
            'title_2' => get_field('title_2'),
            'text_2' => get_field('text_2'),
            'quote_1' => get_field('quote_1'),
            'quote_2' => get_field('quote_2'),
            'style_1' => get_field('style_1'),
            'style_2' => get_field('style_2'),
            'author_1' => get_field('author_1'),
            'author_2' => get_field('author_2'),
            'image_1' => get_field('image_1'),
            'image_2' => get_field('image_2'),
            'video_url_1' => get_field('video_url_1'),
            'video_url_2' => get_field('video_url_2'),

            // General
            'wrapper' => get_field('block_spacing'),
            'spacing_size' => get_field('spacing_size'),
            'background_colour' => get_field('colour_picker'),
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $twoColumnContent = new FieldsBuilder('twoColumnContent');

        $twoColumnContent
            ->addFields($this->get(GeneralTab::class))
            ->addRadio('colour_picker', [
                'label' => 'Select Colour',
                // Choices are generated in setup.php see ACF Radio Color Palette filter approx line 244.
                'default_value' => 'off-white',
            ])
            ->addTab('Layout', [
                'label' => 'Block layout'
            ])
            ->addRadio('align_layout', [
                'label' => 'How should the content be aligned vertically when one column is taller than the other?',
                'choices' => [
                    'top' => 'Align to top',
                    'middle' => 'Align to centre',
                    'bottom' => 'Align to bottom',
                ],
                'default_value' => 'middle',

            ])
            ->addFields($this->get(Title::class))
            ->addTab('Column 1', [
                'label' => 'Column 1'
            ])
            ->addSelect('content_1', [
                'label' => 'Column 1 content',
                'instructions' => 'Choose the type of content you would like to add to this column',
                'choices' => [
                    'text' => 'Text',
                    'image' => 'Image',
                    'video' => 'Video',
                    'quote' => 'Quote',
                ],
                'default_value' => 'text',
            ])
            ->addRadio('style_1', [
                'label' => 'Quote style',
                'instructions' => 'Choose the style of quote you would like to use. \'Short\' should be reserved for very short, punchy quotes, ideally of less than 100 characters. Longer quotes should use the \'Long\' style.',
                'choices' => [
                    'short' => 'Short',
                    'long' => 'Long'
                ],
                'default_value' => 'default',
            ])->conditional('content_1', '==', 'quote')
            ->addTextarea('quote_1', [
                'label' => 'Quote text',
            ])->conditional('content_1', '==', 'quote')
            ->addText('author_1', [
                'label' => 'Quote author (optional)',
                'instructions' => 'Add the name of the person being quoted. You may also like to add their job title etc here',
            ])->conditional('content_1', '==', 'quote')
            ->addText('title_1', [
                'label' => 'Title',
                'instructions' => 'Add a title for this block. This will be displayed in a larger font size than the main text.',
            ])->conditional('content_1', '==', 'text')
            ->addWysiwyg('text_1', [
                'label' => 'Text',
                'media_upload' => 0,
                'tabs' => 'visual',
                'toolbar' => 'basic',
                'instructions' => 'Add the text for this block. You can also add bullet lists, numbered lists, bold text, italic text, links and more.',
            ])->conditional('content_1', '==', 'text')
            ->addImage('image_1', [
                'label' => 'Image',
                'instructions' => 'Don\'t forget to add alt text for accessibility and SEO. You can add this in the media library when uploading/selecting an image file.'
            ])->conditional('content_1', '==', 'image')
            ->addText('video_url_1', [
                'label' => 'Video URL',
                'instructions' => 'Add the URL of the video you would like to embed. This should be a YouTube or Vimeo URL.',
            ])->conditional('content_1', '==', 'video')


            ->addTab('Column 2', [
                'label' => 'Column 2'
            ])
            ->addSelect('content_2', [
                'label' => 'Column 2 content',
                'instructions' => 'Choose the type of content you would like to add to this column',
                'choices' => [
                    'text' => 'Text',
                    'image' => 'Image',
                    'video' => 'Video',
                    'quote' => 'Quote',
                ],
                'default_value' => 'text',
            ])

            ->addRadio('style_2', [
                'label' => 'Quote style',
                'instructions' => 'Choose the style of quote you would like to use. \'Short\' should be reserved for very short, punchy quotes, ideally of less than 100 characters. Longer quotes should use the \'Long\' style.',
                'choices' => [
                    'short' => 'Short',
                    'long' => 'Long'
                ],
                'default_value' => 'default',
            ])->conditional('content_2', '==', 'quote')
            ->addTextarea('quote_2', [
                'label' => 'Quote text',
            ])->conditional('content_2', '==', 'quote')
            ->addText('author_2', [
                'label' => 'Quote author (optional)',
                'instructions' => 'Add the name of the person being quoted. You may also like to add their job title etc here',
            ])->conditional('content_2', '==', 'quote')
            ->addText('title_2', [
                'label' => 'Title',
                'instructions' => 'Add a title for this block. This will be displayed in a larger font size than the main text.',
            ])->conditional('content_2', '==', 'text')
            ->addWysiwyg('text_2', [
                'label' => 'Text',
                'media_upload' => 0,
                'tabs' => 'visual',
                'toolbar' => 'basic',
                'instructions' => 'Add the text for this block. You can also add bullet lists, numbered lists, bold text, italic text, links and more.',
            ])->conditional('content_2', '==', 'text')
            ->addImage('image_2', [
                'label' => 'Image',
                'instructions' => 'Don\'t forget to add alt text for accessibility and SEO. You can add this in the media library when uploading/selecting an image file.'
            ])->conditional('content_2', '==', 'image')
            ->addText('video_url_2', [
                'label' => 'Video URL',
                'instructions' => 'Add the URL of the video you would like to embed. This should be a YouTube or Vimeo URL.',
            ])->conditional('content_2', '==', 'video')

            ;

        return $twoColumnContent->build();
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
