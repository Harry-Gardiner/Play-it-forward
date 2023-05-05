<?php

namespace App\Fields\Partials;

use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Button extends Partial
{
    /**
     * The partial field group.
     *
     * @return \StoutLogic\AcfBuilder\FieldsBuilder
     */
    public function fields()
    {
        $button = new FieldsBuilder('button');

        $button
            ->addSelect('colour', [
                'label' => 'Colour',
                'instructions' => 'Choose a colour for the button.',
                'choices' => [
                    'red' => 'Red',
                    'black' => 'Black',
                    'white' => 'White',
                ],
                'default_value' => 'red',
            ])
            ->addSelect('type', [
                'label' => 'Type',
                'instructions' => 'Choose a type for the button.',
                'choices' => [
                    'primary' => 'Primary',
                    'secondary' => 'Secondary',
                ],
                'default_value' => 'primary',
            ])
            ->addText('text', [
                'label' => 'Text',
                'instructions' => 'Enter the text for the button.',
                'default_value' => 'Get involved',
            ]);

        return $button;
    }
}
