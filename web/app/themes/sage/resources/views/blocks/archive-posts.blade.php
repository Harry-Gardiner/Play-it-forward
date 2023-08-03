@php
  if (isset($latest_posts_type)) {
    $args = [
    'post_type' => $latest_posts_type,
    'posts_per_page' => 10,
    'orderby' => 'date',
    'order' => 'DESC',
    ];
    $latest_posts = new WP_Query($args);
  }
@endphp

<section class="featured-posts {{$wrapper ? $wrapper : ''}} {{$spacing_size ? $spacing_size : ''}} bg--{{ $background_colour }}">
  <div class="featured-posts__latest">
    <div class="cards-wrapper">
      @foreach ($latest_posts->posts as $post)
        @include('partials.card', ['post' => $post])
      @endforeach
    </div>
    <div class="spinner"><img src="{{ asset('images/football_loading.gif') }}" alt="loading image"></div>
    @if ($latest_posts->post_count >= 10)
      <div class="btn__wrapper">
        <button class="button button--primary button--red" id="load-more">Load more</button>
      </div>
    @endif
  </div>
</section>
