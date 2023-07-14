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
        ->addGroup('title_style')
            ->addText('title', [
                'label' => 'Title',
                'required' => 1,
                'default_value' => 'Title',
            ])
            ->addSelect('heading_level', [
                'label' => 'Heading Level',
                'required' => 1,
                'choices' => [
                    'h1' => 'H1',
                    'h2' => 'H2',
                    'h3' => 'H3',
                    'h4' => 'H4',
                    'h5' => 'H5',
                    'h6' => 'H6',
                ],
                'default_value' => 'h2',
            ])
      
            ->addFields($this->get(ColourPicker::class))
            ->endGroup();
        return $title;
    }
}
