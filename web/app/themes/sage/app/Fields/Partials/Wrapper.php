<?php

namespace App\Fields\Partials;

use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Wrapper extends Partial
{
    /**
     * The partial field group.
     *
     * @return \StoutLogic\AcfBuilder\FieldsBuilder
     */
    public function fields()
    {
        $wrapper = new FieldsBuilder('wrapper');

        $wrapper
        ->addSelect('block_spacing', [
            'label' => 'White space above/below this block',
            'choices' => [
                'block-spacing--top' => 'Above',
                'block-spacing--bottom' => 'Below',
                'block-spacing--both' => 'Both',
                'block-spacing--none' => 'None',
            ],
            'default' => 'block-spacing--both',
            'wpml_cf_preferences' => 0,
        ])
        ->addSelect('spacing_size', [
            'label' => 'White space size',
            'choices' => [
                'spacing--xs' => 'Extra Small',
                'spacing--sm' => 'Small',
                'spacing--md' => 'Medium',
                'spacing--lg' => 'Large',
                'spacing--xl' => 'Extra Large',
            ],
            'default' => 'spacing--lg',
            'wpml_cf_preferences' => 0,
        ]);
        return $wrapper;
    }
}

