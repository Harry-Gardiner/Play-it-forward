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
            ->addSelect('type', [
                'label' => 'Type',
                'instructions' => 'Choose button type. <br><br> Primary is the default button style that can be customised. <br><br> Secondary is a secondary button style that can be customised. <br><br> Donate is a button style that links to the donate page.',
                'choices' => [
                    'primary' => 'Primary',
                    'secondary' => 'Secondary',
                    'donate' => 'Donate',
                ],
                'default_value' => 'primary',
            ])
            ->addSelect('colour', [
                'label' => 'Colour',
                'instructions' => 'Choose the background colour for the button.',
                'choices' => [
                    'red' => 'Red',
                    'black' => 'Black',
                    'white' => 'White',
                ],
                'default_value' => 'red',
            ])->conditional('type', '!=', 'donate')
            ->addText('text', [
                'label' => 'Text',
                'instructions' => 'Enter the text for the button.',
                'default_value' => 'Get involved',
                'required' => 1,
            ])->conditional('type', '!=', 'donate')
            ->addUrl('link', [
                'label' => 'Link',
                'instructions' => 'Enter the link for the button.',
                'required' => 1,
            ])->conditional('type', '!=', 'donate');

        return $button;
    }
}
