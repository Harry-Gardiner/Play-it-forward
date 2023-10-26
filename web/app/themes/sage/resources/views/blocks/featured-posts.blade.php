@php
    $load_more = false;

    if ($number_of_posts == 'All') {
        $load_more = true;
        if ($impact_word_enable === 'yes') {
            $number_of_posts = 10;
        } else {
            $number_of_posts = 9;
        }
    }

    if ($featured_post_type == 'latest') {
        $args = [
            'post_type' => 'post',
            'posts_per_page' => intval($number_of_posts),
            'orderby' => 'date',
            'order' => 'DESC',
        ];
        $latest_posts = new WP_Query($args);
    }

    if ($impact_word_enable === 'yes') {
        $impact = $impact_word_position;
    }
@endphp

<section
    class="featured-posts {{ $wrapper ? $wrapper : '' }} {{ $spacing_size ? $spacing_size : '' }} bg--{{ $background_colour }} full-bleed">
    <div
        class="featured-posts__content container {{ $impact_word_enable === 'yes' ? 'impact impact--' . $impact : '' }} block-padding">
        @if ($impact_word_enable === 'yes')
            <div class="impact__word">{{ $impact_word }}</div>
        @endif
        <div>
            @if ($title_style['title'])
                @include('partials.title', [$title_style])
            @endif
            @isset($featured_post_type)
                @if ($featured_post_type == 'featured')
                    <div class="featured-posts__featured">
                        <div class="cards-wrapper {{ $impact_word_enable === 'yes' ? 'two-col' : 'three-col' }}">
                            @foreach ($featured_posts as $post)
                                @include('partials.card', ['post' => $post['post']])
                            @endforeach
                        </div>
                    </div>
                @endif
                @if ($featured_post_type == 'latest')
                    <div class="featured-posts__latest">
                        <div class="cards-wrapper {{ $impact_word_enable === 'yes' ? 'two-col' : 'three-col' }}">
                            @foreach ($latest_posts->posts as $post)
                                @include('partials.card', ['post' => $post])
                            @endforeach
                        </div>
                        <div class="spinner"><img src="{{ asset('images/football_loading.gif') }}" alt="loading image"></div>
                        @if ($load_more && $latest_posts->post_count >= $number_of_posts)
                            <div class="btn__wrapper">
                                <button class="button button--primary button--raspberry" id="load-more"
                                    data-num="{{ intval($number_of_posts) }}">{{ $load_more_text }}</button>
                            </div>
                        @endif
                    </div>
                @endif
            @endisset
        </div>
    </div>
</section>

@php
    wp_reset_postdata();
@endphp
