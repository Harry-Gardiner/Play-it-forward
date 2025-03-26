<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Teams extends Field
{
    /**
     * The field group.
     *
     * @return array
     */
    public function fields()
    {
        $teams = new FieldsBuilder('team_info', ['title' => 'Team Information']);

        $teams
            ->setLocation('post_type', '==', 'football_teams');
        $teams
            ->addTab('Team Bio')
            ->addImage('team_logo', ['title' => 'Team Logo'])
            ->addText('team_bio', ['title' => 'Team Bio'])
            ->addTab('Team Roster')
            ->addRepeater('goal_keepers', ['title' => 'Goal Keepers'])
                ->addText('player_name', ['title' => 'Name'])
                ->addImage('player_image', ['title' => 'Image'])
            ->endRepeater()
            ->addRepeater('defenders', ['title' => 'Defenders'])
                ->addText('player_name', ['title' => 'Name'])
                ->addImage('player_image', ['title' => 'Image'])
            ->endRepeater()
            ->addRepeater('midfielders', ['title' => 'Midfielders'])
                ->addText('player_name', ['title' => 'Name'])
                ->addImage('player_image', ['title' => 'Image'])
            ->endRepeater()
            ->addRepeater('forwards', ['title' => 'Forwards'])
                ->addText('player_name', ['title' => 'Name'])
                ->addImage('player_image', ['title' => 'Image'])
            ->endRepeater()
            ->addRepeater('coaching_staff', ['title' => 'Coaching Staff'])
                ->addText('player_name', ['title' => 'Name'])
                ->addImage('player_image', ['title' => 'Image'])
            ->endRepeater()
            ->addTab('Matches')
            ->addRepeater('matches', ['title' => 'Matches'])
                ->addDatePicker('match_date', ['title' => 'Date'])
                ->addText('match_opponent', ['title' => 'Opponent'])
                ->addText('match_score', ['title' => 'Score', 'instructions' => 'Score format: If PIF home, enter PIF score first. If away, enter opponent score first.'])
                ->addSelect('match_location', [
                    'title' => 'Location',
                    'choices' => [
                        'home' => 'Home',
                        'away' => 'Away',
                    ],
                    'default_value' => 'home',
                ])
            ->endRepeater()
            ->addTab('Image')
            ->addMessage('general_tab_message', 'message', [
                'label' => 'Image settings',
                'message' => 'The image is pulled from the teams featured image. If you would like to change the image, please do so in the featured image section of the page.',
            ])
            ->addSelect('image_position', [
                'title' => 'Image Position',
                'choices' => [
                    'top' => 'Top',
                    'bottom' => 'Bottom',
                    'center' => 'Center'
                ],
                'default_value' => 'center'
                ])
            ;

        return $teams->build();
    }
}
