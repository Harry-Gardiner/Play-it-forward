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

    // Array of all players
    $team_players = [
        'keepers' => $team_keepers,
        'defenders' => $team_defenders,
        'midfielders' => $team_midfielders,
        'forwards' => $team_forwards,
        'staff' => $team_staff,
    ];

    // Match results
    $matches = !empty(get_field('matches')) ? get_field('matches') : null;
    usort($matches, function ($a, $b) {
        $dateA = DateTime::createFromFormat('d/m/Y', $a['match_date']);
        $dateB = DateTime::createFromFormat('d/m/Y', $b['match_date']);

        return $dateB <=> $dateA;
    });
    $last_match = array_shift($matches);
    if ($last_match['match_score'] !== '' && $last_match['match_opponent'] !== '') {
        // split match score into array by the - character
        $score = explode('-', $last_match['match_score']);
        $home_score = $score[0];
        $away_score = $score[1];
    }

    // Featured image
    $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
    $image_position = get_field('image_position') ?? 'center center';

    // Team name
    $team_name = (strpos($_SERVER['REQUEST_URI'], 'womens') !== false) ? 'Play it forward queens' : 'Play it forward fc';
@endphp

<article @php(post_class('football-team h-entry'))>
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
            <section class="football-team__results">
                @if ($last_match['match_score'] !== '' && $last_match['match_opponent'] !== '')
                    <div class="football-team__latest full-bleed bg--yellow">
                        <div class="football-team__latest__content container block-padding">
                            <div class="title">
                                <h2 class="h2 football-team__results__heading">
                                    Latest match results
                                </h2>
                            </div>
                            <p class="football-team__latest__date">{{ $last_match['match_date'] }}</p>
                            <div class="football-team__latest__last">
                                <p class="h1 score-top">{{ $home_score }}-{{ $away_score }}</p>
                                <div class="football-team__latest__score">
                                    <p class="team h1">{{ $home_score }}</p>
                                    <p class="h3">{{ $team_name }}</p>
                                </div>
                                <p class="vs">VS</p>
                                <div class="football-team__latest__score">
                                    <p class="team h1">{{ $away_score }}</p>
                                    <p class="h3">{{ $last_match['match_opponent'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="football-team__matches full-bleed bg--yellow-alt">
                    <div class="football-team__matches__content container block-padding">
                        <div class="title">
                            <h2 class="h2 football-team__results__heading">Recent matches</h2>
                        </div>
                        <div class="football-team__matches__results">
                            @foreach ($matches as $index => $match)
                                @if ($match['match_score'] !== '' && $match['match_opponent'] !== '')
                                <div class="football-team__matches__result"
                                style="{{ $index >= 3 ? 'display: none;' : '' }}">
                                        <p class="match-date">{{ $match['match_date'] }}</p>
                                        <p class="team">{{ $team_name }}</p>
                                        <p class="score">{{ $match['match_score'] }}</p>
                                        {{-- <p class="vs--small">vs</p> --}}
                                        <p class="team">{{ $match['match_opponent'] }}</p>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        @if (count($matches) > 3)
                            <button id="loadMoreMatches" class="button button--primary button--transparent">See more
                                match results</button>
                        @endif
                    </div>
                </div>
            </section>
            <section class="football-team__players block-padding">
                <div class="title">
                    <h2 class="h2">Meet the team</h2>
                </div>
                <div class="football-team__players__content">
                    @if ($team_players)
                        @foreach ($team_players as $position => $players)
                            <div class="football-team__players__position">
                                <h3 class="h2 football-team__players__header full-bleed">
                                    {{ $position }}
                                </h3>
                                <div class="football-team__players__list">
                                    @foreach ($players as $index => $player)
                                        <div class="football-team__player">
                                            @if ($player['player_image'])
                                                <div class="football-team__player__image">
                                                    <img src="{{ $player['player_image']['sizes']['medium_large'] }}"
                                                        alt="{{ $player['player_image']['alt'] }}">
                                                </div>
                                            @else
                                                <div class="football-team__player__image placeholder">
                                                </div>
                                            @endif
                                            <p class="football-team__player__name">{{ $player['player_name'] }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </section>
        </div>
    </div>
    @php(the_content())
</article>
