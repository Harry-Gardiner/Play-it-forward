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

    // Featured image
    $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
    $image_position = get_field('image_position') ?? 'center center';

    // dump($team_logo, $team_bio, $team_keepers, $team_defenders, $team_midfielders, $team_forwards, $team_staff);
@endphp
<article @php(post_class('football-team h-entry block-padding--bottom'))>
    <header class="football-team__header full-bleed">          
            @if($featured_image)
                <img src="{{ $featured_image }}" alt="{{ get_the_title() }}" class="football-team__featured-image" style="object-position:{{$image_position}}">
            @endif
            <div class="container">
                <div class="football-team__logo">
                    @if($team_logo)
                        <img src="{{ $team_logo['url'] }}" alt="{{ $team_logo['alt'] }}" class="football-team__logo__img">
                    @endif
                </div>
                <div class="football-team__intro">
                    <h1 class="h1">@php(the_title())</h1>
                    @if($team_bio)
                        <p>{{ $team_bio }}</p>
                    @endif
                </div>
            </div>
    </header>
    <div class="e-content flow">
        @php(the_content())

    </div>
</article>
