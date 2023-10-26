@php
    if (isset($latest_posts_type)) {
        $args = [
            'post_type' => $latest_posts_type,
            'posts_per_page' => 9,
            'orderby' => 'date',
            'order' => 'DESC',
        ];
        $latest_posts = new WP_Query($args);
    }
    // dump($background_colour);
@endphp

<section class="featured-posts {{ $wrapper ? $wrapper : '' }} {{ $spacing_size ? $spacing_size : '' }}">
    <div class="featured-posts__latest block-padding">
        @if ($title_style['title'])
            @include('partials.title', [$title_style])
        @endif
        <div class="cards-wrapper three-col">
            @foreach ($latest_posts->posts as $post)
                @include('partials.card', ['post' => $post])
            @endforeach
        </div>
        <div class="spinner"><img src="{{ asset('images/football_loading.gif') }}" alt="loading image"></div>
        @if ($latest_posts->post_count >= 9)
            <div class="btn__wrapper">
                <button class="button button--primary button--raspberry" id="load-more" data-num="9">Load more</button>
            </div>
        @endif
    </div>
</section>

@php
    wp_reset_postdata();
@endphp
