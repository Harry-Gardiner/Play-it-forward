<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Partials\GeneralTab;
use App\Fields\Partials\Title;
use App\Fields\Partials\ImpactWord;

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
          'wrapper' => '',
          'spacing_size' => '',
          'background_colour' => 'off-white',
          'impact_word_enable' => 'yes',
          'impact_word' => 'Impact word',
          'impact_word_position' => 'left',
          'title_style' => ['title' => 'Featured Posts Title - 4 example', 'heading_level' => 'h2', 'heading_style' => 'h2'],
          'featured_post_type' => 'latest',
          'latest_posts_type' => 'posts',
          'number_of_posts' => '4',
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

            // Featured Posts
            'title_style' => get_field('title_style'),
            'featured_post_type' => get_field('featured_post_type'),
            'featured_posts' => get_field('featured_posts'),
            'latest_posts_type' => get_field('latest_posts_type'),
            'number_of_posts' => get_field('number_of_posts'),
            'load_more_text' => get_field('load_more_text'),
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
                'message' => 'Display a list of featured posts. Posts shown can be chosen(featured) or set to display the latest posts. If an impact word is added it will show a 2x column layout, else it will show a 3x column layout.',
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
                    '3' => '3',
                    '4' => '4',
                    '8' => '8',
                    '9' => '9',
                    '10' => 'All',
                ],
                'return_format' => 'value',
            ])->conditional('featured_post_type', '==', 'latest')
            ->addText('load_more_text', [
                'label' => 'Load More Text',
                'instructions' => 'Enter the text to display on the load more button.',
                'default_value' => 'Load More',
            ])->conditional('number_of_posts', '==', 'All');
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
