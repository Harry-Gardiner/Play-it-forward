<?php

namespace App\Fields\Partials;

use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;

class ColourPicker extends Partial
{
    /**
     * The partial field group.
     *
     * @return \StoutLogic\AcfBuilder\FieldsBuilder
     */
    public function fields()
    {
        $colourPicker = new FieldsBuilder('colour_picker');

        $colourPicker
            ->addGroup('colour_picker')
                ->addRadio('colour', [
                    'label' => 'Select Colour',
                    'instructions' => 'Choose section background colour.',
                ]);
        return $colourPicker;
    }
}
