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
            ->addRadio('colour_picker', [
                'label' => 'Select Colour',
                // Choices are generated in setup.php see ACF Radio Color Palette filter approx line 223.
            ]);
        return $colourPicker;
    }
}
