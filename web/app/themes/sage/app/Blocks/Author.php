<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Partials\GeneralTab;

class Author extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Author';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A simple Author block.';

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
    public $icon = 'admin-users';

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = ['author'];

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

            // Author
            'selected_user' => get_field('selected_user'),
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $author = new FieldsBuilder('author');

        $author
        ->addMessage('block_title', '', [
            'label' => 'Hero',
        ])
        ->addFields($this->get(GeneralTab::class))
        ->addTab('Author')
        ->addSelect('selected_user', 'Select User')
        ->addChoices(get_users(['fields' => ['ID', 'display_name']]));

        return $author->build();
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
