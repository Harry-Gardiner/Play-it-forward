<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Partials\GeneralTab;
use App\Fields\Partials\Title;

class Faq extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'FAQ';

    /**
     * The block slug.
     *
     * @var string
     */
    public $slug = 'faq';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A list of frequently asked questions (collapsible).';

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
    public $icon = 'editor-help';

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = ['faq', 'questions', 'answers', 'accordion'];

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
     * The block preview example data.
     *
     * @var array
     */
    public $example = [
        'wrapper' => '',
        'spacing_size' => '',
        'title_style' => ['title' => 'Frequently asked questions', 'heading_level' => 'h2', 'heading_style' => 'h2'],
        'body' => 'Here are some of the most common questions we hear from visitors. Click a question to reveal the answer.',
        'faqs' => [
            [
                'question' => 'How do I sign up?',
                'answer' => '<p>To sign up, go to the registration page and fill in the required details.</p>',
            ],
            [
                'question' => 'What is the turnaround time?',
                'answer' => '<p>Most orders are processed within 2–3 business days.</p>',
            ],
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

            // Content
            'title_style' => get_field('title_style'),
            'body' => get_field('body'),
            'faqs' => get_field('faqs'),
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $faq = new FieldsBuilder('faq');

        $faq
            ->addMessage('block_title', '', [
                'label' => 'FAQ',
                'message' => 'Display a list of frequently asked questions with a collapsible answer.',
            ])
            ->addFields($this->get(GeneralTab::class))
            ->addFields($this->get(Title::class))
            ->addWysiwyg('body', [
                'label' => 'Intro text',
                'media_upload' => 0,
                'tabs' => 'visual',
                'toolbar' => 'basic',
                'delay' => 1,
            ])
            ->addTab('FAQs', [
                'label' => 'FAQs',
            ])
            ->addRepeater('faqs', [
                'label' => 'FAQ items',
                'layout' => 'block',
                'button_label' => 'Add FAQ',
            ])
            ->addText('question', [
                'label' => 'Question',
                'required' => 1,
            ])
            ->addWysiwyg('answer', [
                'label' => 'Answer',
                'media_upload' => 0,
                'tabs' => 'visual',
                'toolbar' => 'basic',
                'delay' => 1,
            ]);

        return $faq->build();
    }

    /**
     * Assets to be enqueued when rendering the block.
     *
     * @return void
     */
    public function enqueue()
    {
        // No additional assets
    }
}
