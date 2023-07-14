@php
// dump()
@endphp

<section
  class="featured-posts {{$wrapper ? $wrapper : ''}} {{$spacing_size ? $spacing_size : ''}} bg--{{ $background_colour }}">
  <div class="featured-posts__content flow">
    @include('partials.title', [$title_style])
    @isset($featured_posts_type)
      <div class="featured-posts__featured">
        @if ($featured_posts_type == 'featured')
          @foreach ($featured_posts as $featured_post)
            {{-- Card partial here --}}
            card here
          @endforeach
        @endif
      </div>
      <div class="featured-posts__latest">
        @if ($featured_posts_type == 'latest')
          
        @endif
      </div>
    @endisset
  </div>
</section>