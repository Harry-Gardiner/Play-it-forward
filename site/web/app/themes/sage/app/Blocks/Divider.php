<?php

namespace App\Blocks;

use App\Fields\Partials\GeneralTab;
use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Divider extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Divider';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A narrow patterned divider block with a choice of colours.';

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
    public $icon = 'minus';

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = ['divider', 'spacer', 'border', 'pattern', 'line', 'horizontal'];

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
        // [
        //     'name' => 'light',
        //     'label' => 'Light',
        //     'isDefault' => true,
        // ],
        // [
        //     'name' => 'dark',
        //     'label' => 'Dark',
        // ]
    ];

    /**
     * The block preview example data.
     *
     * @var array
     */
    public $example = [
        'wrapper' => '',
        'spacing_size' => '',
        'colour' => 'green',
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

            // Divider
            'colour' => get_field('colour'),
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $divider = new FieldsBuilder('divider');

        $divider
            
            ->addFields($this->get(GeneralTab::class))
            ->addRadio('colour', [
                'label' => 'Select Pattern',
                'choices' => [
                    'green' => 'All the Greens',
                    'everything' => 'Bit of Everything',
                    'yellow' => 'Mellow Yellow',
                ],
            ])
        ;
        return $divider->build();
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
