<?php

namespace App\Fields\Partials;

use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;
use App\Fields\Partials\ColourPicker;

class Title extends Partial
{
    /**
     * The partial field group.
     *
     * @return \StoutLogic\AcfBuilder\FieldsBuilder
     */
    public function fields()
    {
        $title = new FieldsBuilder('title');

        $title
            ->addGroup('title_style', [
                'label' => 'Block Title',
            ])
            ->addText('title', [
                'label' => 'Title',
                'required' => 1,
                'default_value' => 'Title',
            ])
            ->addSelect('heading_level', [
                'label' => 'Heading Level',
                'required' => 1,
                'choices' => [
                    'h2' => 'H2',
                    'h3' => 'H3',
                    'h4' => 'H4',
                    'h5' => 'H5',
                    'h6' => 'H6',
                ],
                'default_value' => 'h2',
            ])
            ->addSelect('heading_style', [
                'label' => 'Heading Style',
                'instructions' => 'Select the heading style. This will change the font size and weight of the heading. The heading level does not have to match the heading style. E.g. you can have an H2 with a heading style of H4.',
                'required' => 1,
                'choices' => [
                    'h2' => 'H2',
                    'h3' => 'H3',
                    'h4' => 'H4',
                    'h5' => 'H5',
                    'h6' => 'H6',
                ],
                'default_value' => 'h2',
            ])
            ->endGroup();
        return $title;
    }
}
