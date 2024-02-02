<?php

namespace App\Blocks;

use App\Fields\Partials\GeneralTab;
use App\Fields\Partials\Title;
use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Donate extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Donate';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'Donation block - adds the Beacon CRM donation form to the flow of the page.';

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
    public $icon = 'money-alt';

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = ['donation', 'donate', 'help'];

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
        'title_style' => 'Donate',
        'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam euismod, nisl eget ultricies aliquam, nunc sapien aliquet nunc, quis aliquam nisl nunc vitae nisl. Sed vitae nisl euismod, aliquam nisl quis, aliquam nisl. Sed vitae nisl euismod, aliquam nisl quis, aliquam nisl.',
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

            // Content
            'title_style' => get_field('title_style'),
            'body' => get_field('body'),
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $donate = new FieldsBuilder('donate');

        $donate
            ->addMessage('block_title', '', [
                'label' => 'Donate Block',
                'message' => 'Embed the Beacon CRM donation form.',
            ])
            ->addFields($this->get(GeneralTab::class))
            ->addTab('Content')
            ->addFields($this->get(Title::class))
            ->addWYSIWYG('body', [
                'media_upload' => 0,
                'toolbar'      => 'basic',
            ])
            ->addMessage('donate_message', '', [
                'label' => 'Info',
                'message' => 'The Beacon CRM donation form will be automatically embedded.',
            ]);

        return $donate->build();
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
