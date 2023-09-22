<?php

namespace App\Fields\Partials;

use Log1x\AcfComposer\Partial;
use App\Fields\Partials\ColourPicker;
use App\Fields\Partials\Wrapper;
use StoutLogic\AcfBuilder\FieldsBuilder;

class GeneralTab extends Partial
{
    /**
     * The partial field group.
     *
     * @return \StoutLogic\AcfBuilder\FieldsBuilder
     */
    public function fields()
    {
        $generalTab = new FieldsBuilder('general_tab');

        $generalTab
            ->addTab('General')
            ->addMessage('general_tab_message', 'message', [
                'label' => 'Block settings',
                'message' => 'This tab contains controls settings for the block appearance, such as background colour and block padding/spacing.',
            ])
            ->addFields($this->get(Wrapper::class));
        // ->addFields($this->get(ColourPicker::class));
        return $generalTab;
    }
}
