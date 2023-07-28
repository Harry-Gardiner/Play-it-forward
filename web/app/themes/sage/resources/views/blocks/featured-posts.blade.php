@php
if ($featured_post_type == 'latest') {
  $args = [
    'post_type' => 'post',
    'posts_per_page' => intval($number_of_posts),
    'orderby' => 'date',
    'order' => 'DESC',
  ];
  $latest_posts = new WP_Query($args);
}  
@endphp

<section
  class="featured-posts {{$wrapper ? $wrapper : ''}} {{$spacing_size ? $spacing_size : ''}} bg--{{ $background_colour }} full-bleed">
  <div class="featured-posts__content container flow">
    @include('partials.title', [$title_style])
    @isset($featured_post_type)
      <div class="featured-posts__featured">
        @if ($featured_post_type == 'featured')
          @foreach ($featured_posts as $post)
            @include('partials.card', ['post' => $post])
          @endforeach
        @endif
      </div>
      <div class="featured-posts__latest">
        <div class="cards-wrapper">
          @if ($featured_post_type == 'latest')
            @foreach ($latest_posts->posts as $post)
              @include('partials.card', ['post' => $post])
            @endforeach
          @endif
        </div>
        <div class="spinner"><img src="{{ asset('images/football_loading.gif') }}" alt="loading image"></div>
        <div class="btn__wrapper">
          <button class="button button--primary button--red" id="load-more">Load more</button>
        </div>
      </div>
    @endisset
  </div>
</section>

@php
   wp_reset_postdata(); 
@endphp