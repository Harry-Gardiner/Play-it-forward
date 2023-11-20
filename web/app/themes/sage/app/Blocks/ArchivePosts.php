<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Partials\GeneralTab;
use App\Fields\Partials\Title;

class ArchivePosts extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Archive Posts';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'Block that can be used to show all of a specific post type.';

    /**
     * The block category.
     *
     * @var string
     */
    public $category = 'archive';

    /**
     * The block icon.
     *
     * @var string|array
     */
    public $icon = 'excerpt-view';

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = ['posts', 'latest', 'featured', 'list', 'blog', 'news', 'archive'];

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

            // Post type
            'title_style' => get_field('title_style'),
            'latest_posts_type' => get_field('latest_posts_type'),
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $archivePosts = new FieldsBuilder('archive_posts');

        $archivePosts
            ->addMessage('block_title', 'Displays the latest 10 posts, with the ability to load more.', [
                'label' => 'Posts Archive',
            ])
            ->addFields($this->get(GeneralTab::class))
            ->addTab('Archive posts')
            ->addFields($this->get(Title::class))
            ->addSelect('latest_posts_type', [
                'label' => 'Post Type',
                'instructions' => 'Choose the post type to display.',
                'default_value' => 'post',
            ]);
        return $archivePosts->build();
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
