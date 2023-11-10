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
                ->addText('goal_keeper_name', ['title' => 'Name'])
                ->addImage('goal_keeper_image', ['title' => 'Image'])
            ->endRepeater()
            ->addRepeater('defenders', ['title' => 'Defenders'])
                ->addText('defender_name', ['title' => 'Name'])
                ->addImage('defender_image', ['title' => 'Image'])
            ->endRepeater()
            ->addRepeater('midfielders', ['title' => 'Midfielders'])
                ->addText('midfielder_name', ['title' => 'Name'])
                ->addImage('midfielder_image', ['title' => 'Image'])
            ->endRepeater()
            ->addRepeater('forwards', ['title' => 'Forwards'])
                ->addText('forward_name', ['title' => 'Name'])
                ->addImage('forward_image', ['title' => 'Image'])
            ->endRepeater()
            ->addRepeater('coaching_staff', ['title' => 'Coaching Staff'])
                ->addText('coach_name', ['title' => 'Name'])
                ->addImage('coach_image', ['title' => 'Image'])
            ->endRepeater()
            ->addTab('Matches')
            ->addRepeater('matches', ['title' => 'Matches'])
                ->addDatePicker('match_date', ['title' => 'Date'])
                ->addText('match_opponent', ['title' => 'Opponent'])
                ->addText('match_score', ['title' => 'Score', 'instructions' => 'Enter the score in the format: 1-0. Play It Forward FC first, opponent second.'])
            ;

        return $teams->build();
    }
}