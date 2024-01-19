<?php
$team_one_matches = !empty(get_field('matches', $team_one->ID)) ? get_field('matches', $team_one->ID) : null;
$team_two_matches = !empty(get_field('matches', $team_two->ID)) ? get_field('matches', $team_two->ID) : null;

// dd($team_one_matches, $team_two_matches);

// Match function
if (!function_exists('getLastValidMatch')) {
function getLastValidMatch($matches)
{
usort($matches, function ($a, $b) {
$dateA = DateTime::createFromFormat('d/m/Y', $a['match_date']);
$dateB = DateTime::createFromFormat('d/m/Y', $b['match_date']);

return $dateA <=> $dateB;
    });

    do {
    $last_match = array_pop($matches);
    } while ($last_match && ($last_match['match_score'] === '' || $last_match['match_opponent'] === ''));

    if ($last_match) {
    // split match score into array by the - character
    $score = explode('-', $last_match['match_score']);
    $last_match['home_score'] = $score[0];
    $last_match['away_score'] = $score[1];
    }

    return $last_match;
    }
    }

    // Lates match results
    $team_one_last_match = $team_one_matches ? getLastValidMatch($team_one_matches) : null;
    $team_two_last_match = $team_two_matches ? getLastValidMatch($team_two_matches) : null;

    $teams = [$team_one_last_match, $team_two_last_match];
    ?>

    
    <section
        class="results <?php echo e($wrapper ? $wrapper : ''); ?> <?php echo e($spacing_size ? $spacing_size : ''); ?> bg--raspberry full-bleed">
        <div class="results__wrapper container">
            <div class="results__tabs full-bleed">
                <button id="defaultOpen" class="results__tab active" data-team="team-one">
                    <span class="results__tab__text"><?php echo e($team_one->post_title); ?></span>
                </button>
                <button class="results__tab" data-team="team-two">
                    <span class="results__tab__text"><?php echo e($team_two->post_title); ?></span>
                </button>
            </div>

            <div id="team-one" class="results__team block-padding--top">
                <div class="results__content flow">
                    <p class="h2 results__content__title"><?php echo e($team_one_title); ?></p>
                    <div class="results__body"><?php echo $team_one_body; ?></div>
                    <?php echo $__env->make('partials.button', [
                    'type' => 'button',
                    'link' => get_permalink($team_one->ID),
                    'text' => 'Find out more',
                    'colour' => 'white',
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <?php if($team_one_matches): ?>
                <div class="results__recent">
                    <div class="football-team__latest__content block-padding--top">
                        <div class="title">
                            <h2 class="h2 football-team__results__heading">
                                Recent match results
                            </h2>
                        </div>
                        <div class="football-team__latest__last">
                            <p class="h1 score-top">
                                <?php echo e($team_one_last_match['home_score']); ?>-<?php echo e($team_one_last_match['away_score']); ?>

                            </p>
                            <div class="football-team__latest__score">
                                <p class="team h1"><?php echo e($team_one_last_match['home_score']); ?></p>
                                <p class="h3">Play it forward fc</p>
                            </div>
                            <p class="vs">VS</p>
                            <div class="football-team__latest__score">
                                <p class="team h1"><?php echo e($team_one_last_match['away_score']); ?></p>
                                <p class="h3"><?php echo e($team_one_last_match['match_opponent']); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <div id="team-two" class="results__team block-padding--top">
                <div class="results__content flow">
                    <p class="h2 results__content__title"><?php echo e($team_two_title); ?></p>
                    <div class="results__body"><?php echo $team_two_body; ?></div>
                    <?php echo $__env->make('partials.button', [
                    'type' => 'button',
                    'link' => get_permalink($team_two->ID),
                    'text' => 'Find out more',
                    'colour' => 'white',
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <?php if($team_two_matches): ?>
                <div class="results__recent">
                    <div class="football-team__latest__content block-padding--top">
                        <div class="title">
                            <h2 class="h2 football-team__results__heading">
                                Recent match results
                            </h2>
                        </div>
                        <div class="football-team__latest__last">
                            <p class="h1 score-top">
                                <?php echo e($team_two_last_match['home_score']); ?>-<?php echo e($team_two_last_match['away_score']); ?>

                            </p>
                            <div class="football-team__latest__score">
                                <p class="team h1"><?php echo e($team_two_last_match['home_score']); ?></p>
                                <p class="h3">Play it forward fc</p>
                            </div>
                            <p class="vs">VS</p>
                            <div class="football-team__latest__score">
                                <p class="team h1"><?php echo e($team_two_last_match['away_score']); ?></p>
                                <p class="h3"><?php echo e($team_two_last_match['match_opponent']); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php /**PATH /Users/elliehobbs/Documents/Personal-dev/play-it-forward/play_it_forward/web/app/themes/sage/resources/views/blocks/results.blade.php ENDPATH**/ ?>