<?php

namespace App\Blocks;

use App\Fields\Partials\Button;
use App\Fields\Partials\Wrapper;
use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class ButtonBlock extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Button Block';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A simple Button Block block.';

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
    public $icon = 'button';

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = ['button', 'cta', 'link'];

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
        'items' => [
            "position" => "center",
            "type" => "primary",
            "colour" => "red",
            "text" => "Get involved",
            "link" => "/"
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
            //deconstruct button
            'btn_link' => get_field('link'),
            'btn_text' => get_field('text'),
            'btn_type' => get_field('type'),
            'btn_colour' => get_field('btn_colour'),
            'btn_position' => get_field('position'),

            'wrapper' => get_field('block_spacing'),
        ];
    }

    /**
     * The block field group.
     *
     * @return array
     */
    public function fields()
    {
        $buttonBlock = new FieldsBuilder('button_block');

        $buttonBlock
            ->addMessage('block_title', '', [
                'label' => 'Button Block',
            ])
            ->addTab('General')
            ->addFields($this->get(Wrapper::class))
            ->addTab('Button')
            ->addSelect('position', [
                'label' => 'Position',
                'choices' => [
                    'left' => 'Left',
                    'center' => 'Center',
                    'right' => 'Right',
                ],
                'default_value' => 'center',
            ])
            ->addFields($this->get(Button::class))
            ->addSelect('btn_colour', [
                'label' => 'Colour',
                'instructions' => 'Choose the background colour for the button.',
                'choices' => [
                    'raspberry' => 'Raspberry',
                    'black' => 'Black',
                    'white' => 'White',
                ],
                'default_value' => 'raspberry',
            ]);
        return $buttonBlock->build();
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
