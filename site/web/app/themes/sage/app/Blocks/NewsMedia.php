<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Partials\GeneralTab;
use App\Fields\Partials\Title;

class NewsMedia extends Block
{
    public $name = 'News & Media';
    public $description = 'Unified news and media hub with tabs for Blog, News, and Publications.';
    public $category = 'custom_blocks';
    public $icon = 'admin-post';
    public $keywords = ['news', 'media', 'blog', 'publications', 'hub', 'archive'];
    public $post_types = [];
    public $parent = [];
    public $mode = 'auto';
    public $align = '';
    public $align_text = '';
    public $align_content = '';

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

    public $styles = [
        ['name' => 'light', 'label' => 'Light', 'isDefault' => true],
        ['name' => 'dark', 'label' => 'Dark'],
    ];

    public $example = [
        'wrapper' => '',
        'spacing_size' => '',
        'background_colour' => 'off-white',
        'title_style' => ['title' => 'News & Media', 'heading_level' => 'h2', 'heading_style' => 'h2'],
        'posts_per_type' => 9,
        'publications' => [],
        'combined_posts' => [],
        'has_blog' => false,
        'has_news' => false,
        'has_more_blog' => false,
        'has_more_news' => false,
    ];

    public function with()
    {
        $postsPerType = intval(get_field('posts_per_type') ?: 9);

        $blogQuery = new \WP_Query([
            'post_type'      => 'post',
            'posts_per_page' => $postsPerType,
            'orderby'        => 'date',
            'order'          => 'DESC',
        ]);

        $newsQuery = new \WP_Query([
            'post_type'      => 'news',
            'posts_per_page' => $postsPerType,
            'orderby'        => 'date',
            'order'          => 'DESC',
        ]);

        // Combine and sort by date DESC for the "All" tab
        $combinedPosts = [];
        foreach ($blogQuery->posts as $post) {
            $combinedPosts[] = ['post' => $post, 'type' => 'blog'];
        }
        foreach ($newsQuery->posts as $post) {
            $combinedPosts[] = ['post' => $post, 'type' => 'news'];
        }
        usort($combinedPosts, function ($a, $b) {
            return strtotime($b['post']->post_date) - strtotime($a['post']->post_date);
        });

        return [
            'wrapper'          => get_field('block_spacing'),
            'spacing_size'     => get_field('spacing_size'),
            'background_colour'=> get_field('colour_picker') ?: 'off-white',
            'title_style'      => get_field('title_style'),
            'has_blog'         => $blogQuery->have_posts(),
            'has_news'         => $newsQuery->have_posts(),
            'has_more_blog'    => $blogQuery->found_posts > $postsPerType,
            'has_more_news'    => $newsQuery->found_posts > $postsPerType,
            'posts_per_type'   => $postsPerType,
            'combined_posts'   => $combinedPosts,
            'publications'     => get_field('publications') ?: [],
        ];
    }

    public function fields()
    {
        $newsMedia = new FieldsBuilder('news_media');

        $newsMedia
            ->addMessage('block_title', '', ['label' => 'News & Media Hub'])
            ->addFields($this->get(GeneralTab::class))
            ->addRadio('colour_picker', [
                'label' => 'Background Colour',
                'choices' => [
                    'white'     => 'White',
                    'off-white' => 'Off White',
                ],
                'default_value' => 'off-white',
            ])

            ->addTab('Content')
            ->addMessage('title_optional_info', '', ['label' => 'Title is optional'])
            ->addFields($this->get(Title::class))
            ->addNumber('posts_per_type', [
                'label'        => 'Posts per section',
                'instructions' => 'Initial number of posts loaded per tab (Blog, News). More can be loaded via the Load More button.',
                'default_value'=> 9,
                'min'          => 3,
                'max'          => 30,
            ])
            ->addTab('Publications')
            ->addRepeater('publications', [
                'label'        => 'Publications',
                'layout'       => 'block',
                'button_label' => 'Add publication',
            ])
            ->addFile('publication_file', [
                'label'         => 'File',
                'return_format' => 'array',
                'library'       => 'all',
            ])
            ->addImage('publication_image', [
                'label'         => 'Cover Image',
                'return_format' => 'array',
                'preview_size'  => 'medium',
                'library'       => 'all',
            ])
            ->addText('publication_title', [
                'label' => 'Title',
            ])
            ->addText('publication_date', [
                'label'        => 'Date',
                'instructions' => 'e.g. 15 January 2025',
            ])
            ->addTextarea('publication_description', [
                'label' => 'Description',
                'rows'  => 3,
            ])
            ->endRepeater();

        return $newsMedia->build();
    }

    public function enqueue()
    {
        //
    }
}
