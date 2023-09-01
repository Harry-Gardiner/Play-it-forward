<?php

namespace App\Fields\Partials;

use Log1x\AcfComposer\Partial;
use StoutLogic\AcfBuilder\FieldsBuilder;

class ImpactWord extends Partial
{
    /**
     * The partial field group.
     *
     * @return \StoutLogic\AcfBuilder\FieldsBuilder
     */
    public function fields()
    {
        $impact_word = new FieldsBuilder('impact_word');

        $impact_word
            ->addTab('Impact word')
            ->addMessage('impact_tab_message', 'message', [
                'label' => 'Impact word settings',
                'message' => 'This tab contains controls settings for the impact word, such as the word itself and its position. The word will be displayed vertically on the left/right of the block. The word will only display on larger screens.',
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
            ])->conditional('impact_word_enable', '==', 'yes')
            ->addSelect('impact_word_position', [
                'label' => 'Impact word position',
                'instructions' => 'This is the position of the impact word.',
                'choices' => [
                    'left' => 'Left',
                    'right' => 'Right',
                ],
                'default_value' => 'left',
            ])->conditional('impact_word_enable', '==', 'yes')
            ;

        return $impact_word;
    }
}
