@php
    // Team bio
    $team_logo = get_field('team_logo') ?? null;
    $team_bio = get_field('team_bio') ?? null;

    // Team roster
    $team_keepers = !empty(get_field('goal_keepers')) ? get_field('goal_keepers') : null;
    $team_defenders = !empty(get_field('defenders')) ? get_field('defenders') : null;
    $team_midfielders = !empty(get_field('midfielders')) ? get_field('midfielders') : null;
    $team_forwards = !empty(get_field('forwards')) ? get_field('forwards') : null;
    $team_staff = !empty(get_field('coaching_staff')) ? get_field('coaching_staff') : null;

    // Match results
    $matches = !empty(get_field('matches')) ? get_field('matches') : null;
    usort($matches, function ($a, $b) {
        $dateA = DateTime::createFromFormat('d/m/Y', $a['match_date']);
        $dateB = DateTime::createFromFormat('d/m/Y', $b['match_date']);

        return $dateA <=> $dateB;
    });
    $last_match = array_pop($matches);
    if ($last_match['match_score'] !== '' && $last_match['match_opponent'] !== '') {
       // split match score into array by the - character
         $score = explode('-', $last_match['match_score']);
        $home_score = $score[0];
        $away_score = $score[1];
    }


    // Featured image
    $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
    $image_position = get_field('image_position') ?? 'center center';

    // dump($matches, $last_match);

@endphp
<article @php(post_class('football-team h-entry block-padding--bottom'))>
    <header class="football-team__header full-bleed block-padding--bottom">
        @if ($featured_image)
            <img src="{{ $featured_image }}" alt="{{ get_the_title() }}" class="football-team__featured-image"
                style="object-position:{{ $image_position }}">
        @endif
        <div class="container">
            <div class="football-team__logo">
                @if ($team_logo)
                    <img src="{{ $team_logo['url'] }}" alt="{{ $team_logo['alt'] }}" class="football-team__logo__img">
                @endif
            </div>
            <div class="football-team__intro">
                <h1 class="h1">@php(the_title())</h1>
                @if ($team_bio)
                    <p>{{ $team_bio }}</p>
                @endif
            </div>
        </div>
    </header>
    <div class="e-content">
        <div class="football-team__content">
            <div class="football-team__results">
                @if ($last_match['match_score'] !== '' && $last_match['match_opponent'] !== '')
                    <div class="football-team__latest full-bleed bg--yellow">
                        <div class="football-team__latest__content container block-padding">
                            <h2 class="h2 football-team__results__heading">
                                Last match results
                            </h2>
                            <div class="football-team__latest__last">
                                <p class="h1 score-top">{{$home_score}}-{{$away_score}}</p>
                                <div class="football-team__latest__score">
                                    <p class="team h1">{{ $home_score }}</p>
                                    <p class="h3">Play it forward fc</p>
                                </div>
                                <p class="vs">VS</p>
                                <div class="football-team__latest__score">
                                    <p class="team h1">{{ $away_score }}</p>
                                    <p class="h3">{{$last_match['match_opponent']}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                
                <div class="football-team__matches full-bleed bg--yellow-alt">
                    <div class="football-team__matches__content container block-padding">
                        <h2 class="h2 football-team__results__heading">Recent matches</h2>
                        <div class="football-team__matches__results">
                            @foreach ($matches as $match)
                                @if ($match['match_score'] !== '' && $match['match_opponent'] !== '')
                                    <div class="football-team__matches__result">
                                        <p class="score">{{ $match['match_score'] }}</p>
                                        <p class="team">Play it forward fc</p>
                                        <p class="vs--small">vs</p>
                                        <p class="team">{{ $match['match_opponent'] }}</p>
                                    </div>                                   
                                @endif
                            @endforeach      
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @php(the_content())
    </div>
</article>
