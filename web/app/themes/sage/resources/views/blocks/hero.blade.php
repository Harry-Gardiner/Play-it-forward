@php
  $hero_image = $hero_image ?? null;
  $alt_text = '';
  if (is_array($hero_image) && isset($hero_image['alt'])) {
    $alt_text = $hero_image['alt'] !== '' ? $hero_image['alt'] : 'hero image';
  }
  $hero_content = $hero_content ?? null;

@endphp
<section class="hero full-bleed {{$wrapper ? $wrapper : ''}} {{$spacing_size ? $spacing_size : ''}} bg--{{ $background_colour }}">
 
    @if ($hero_image)
      <div class="hero__image">
        <img class="hero__image" src="{{ $hero_image['url'] }}" alt="{{$alt_text}}">
        <div class="overlay"></div>
      </div>
     
    @endif
    @if ($hero_content)
      <div class="hero__inner container">
        <div class="hero__content flow">
          {!! $hero_content !!}
        </div>
      </div>
    @endif
  
</section>