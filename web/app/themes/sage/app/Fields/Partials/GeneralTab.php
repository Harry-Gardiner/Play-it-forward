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
            ->addFields($this->get(Wrapper::class))
            ->addFields($this->get(ColourPicker::class))
            ->addGroup('impact_word_group', [
                'label' => 'Impact word',
                'instructions' => 'This is the word that will be displayed vertically on the left/right of the block.',
            ])
                ->addRadio('impact_word_enable', [
                    'label' => 'Enable impact word',
                    'instructions' => 'This will enable the impact word.',
                    'choices' => [
                        'yes' => 'Yes',
                        'no' => 'No',
                    ],
                    'default_value' => 'no',
                ])
                ->addText('impact_word', [
                    'label' => 'Impact word',
                    'instructions' => 'This is the word that will be displayed vertically on the left/right of the block.',
                ])
                ->addSelect('impact_word_position', [
                    'label' => 'Impact word position',
                    'instructions' => 'This is the position of the impact word.',
                    'choices' => [
                        'left' => 'Left',
                        'right' => 'Right',
                    ],
                    'default_value' => 'left',
                ])
            ->endGroup()
;
        return $generalTab;
    }
}
