<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Partials\GeneralTab;
use App\Fields\Partials\Title;

class FeaturedPosts extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Featured Posts';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'Display a list of featured posts. Blocks displayed can be chosen or set to display the latest posts.';

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
    public $icon = 'excerpt-view';

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = ['posts', 'latest', 'featured', 'list', 'blog', 'news'];

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
            // Featured Posts
            'title_style' => get_field('title_style'),
            'featured_post_type' => get_field('featured_post_type'),
            'featured_posts' => get_field('featured_posts'),
            'latest_posts_type' => get_field('latest_posts_type'),
            'number_of_posts' => get_field('number_of_posts'),
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $featuredPosts = new FieldsBuilder('featured_posts');

        $featuredPosts
            ->addMessage('block_title', '', [
                'label' => 'Featured Posts',
            ])
            ->addFields($this->get(GeneralTab::class))
            ->addTab('featured_posts', [
                'label' => 'Featured Posts',
            ])
            ->addFields($this->get(Title::class))
            ->addSelect('featured_post_type', [
                'label' => 'Featured Post Type',
                'instructions' => 'Choose whether to display the latest posts or specific featured posts.',
                'choices' => [
                    'latest' => 'Latest Posts',
                    'featured' => 'Featured Posts',
                ],
                'default_value' => 'latest',
            ])
            ->addRepeater('featured_posts', [
                'label' => 'Featured Posts',
                'layout' => 'block',
                'button_label' => 'Add Post',
            ])->conditional('featured_post_type', '==', 'featured')
                ->addPostObject('post', [
                    'label' => 'Post',
                    'post_type' => ['post'],
                    'return_format' => 'object',
                    'ui' => 1,
                ])
            ->endRepeater()
            ->addSelect('latest_posts_type', [
                'label' => 'Post Type',
                'instructions' => 'Choose the post type to display.',
                'default_value' => 'post',
            ])->conditional('featured_post_type', '==', 'latest')
            ->addSelect('number_of_posts', [
                'label' => 'Number of Posts',
                'instructions' => 'Choose the number of posts to display. If set to "All" posts will be displayed with a load more button.',
                'default_value' => '4',
                'choices' => [
                    '4' => '4',
                    '8' => '8',
                    '10' => 'All',
                ],
                'return_format' => 'key',
            ])->conditional('featured_post_type', '==', 'latest')
            ;
        return $featuredPosts->build();
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
