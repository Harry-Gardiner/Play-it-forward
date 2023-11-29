<?php

namespace App\Blocks;

use App\Fields\Partials\GeneralTab;
use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Results extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Results';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'Block displaying information about football teams.';

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
    public $icon = 'performance';

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = ['results', 'football', 'teams', 'scores'];

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
  
              // Teams
                'team_one' => get_field('team_one'),
                'team_one_title' => get_field('team_one_title'),
                'team_one_body' => get_field('team_one_body'),
                'team_two' => get_field('team_two'),
                'team_two_title' => get_field('team_two_title'),
                'team_two_body' => get_field('team_two_body'),
                
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $results = new FieldsBuilder('results');

        $results
            ->addMessage('block_title', '', [
                'label' => 'Results block',
                'message' => 'Results block, select two teams to display their information.',
            ])
            ->addFields($this->get(GeneralTab::class))
            ->addTab('Team One')
            ->addPostObject('team_one', [
                'label' => 'Team One',
                'post_type' => ['football_teams'],
                'return_format' => 'object',
                'ui' => 1,
            ])
            ->addText('team_one_title', [
                'label' => 'Title',
            ])
            ->addWYSIWYG('team_one_body', [
                'label' => 'Sub Text',
                'media_upload' => 0,
                'tabs' => 'visual',
                'toolbar' => 'basic',
                'delay' => 1,
            ])
            ->addTab('Team Two')
            ->addPostObject('team_two', [
                'label' => 'Team Two',
                'post_type' => ['football_teams'],
                'return_format' => 'object',
                'ui' => 1,
            ])
            ->addText('team_two_title', [
                'label' => 'Title',
            ])
            ->addWYSIWYG('team_two_body', [
                'label' => 'Sub Text',
                'media_upload' => 0,
                'tabs' => 'visual',
                'toolbar' => 'basic',
                'delay' => 1,
            ]);

        return $results->build();
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
