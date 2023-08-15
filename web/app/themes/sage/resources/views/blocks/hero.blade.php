@php
// Image
$hero_image = $hero_image ?? null;
$alt_text = '';
if (is_array($hero_image) && isset($hero_image['alt'])) {
$alt_text = $hero_image['alt'] !== '' ? $hero_image['alt'] : 'hero image';
}
$image_position = $hero_image_position ?? 'center center';

// Content
$hero_title = $hero_title ?? null;
$hero_content = $hero_content ?? null;

// Btn
if ($show_button == 'yes') {
$btn_link = $cta_button['link'] ?? null;
$btn_text = $cta_button['text'] ?? null;
$btn_colour = $cta_button['colour'] ?? null;
$btn_type = $cta_button['type'] ?? null;
}

@endphp
<section
  class="hero full-bleed {{$wrapper ? $wrapper : ''}} {{$spacing_size ? $spacing_size : ''}} bg--{{ $background_colour }}">

  @if ($hero_title)
    <div class="hero__inner container">
      <div class="hero__title flow">
        {{$hero_title}}
      </div>
      <div>
        {!! $hero_content !!}
      </div>
      @if ($show_button == 'yes')
        @include('partials.button', [
        'type' => $btn_type,
        'link' => $btn_link,
        'text' => $btn_text,
        'colour' => $btn_colour,
        ])
      @endif
    </div>
  @endif

  @if ($hero_image)
    <div class="hero__image">
      <img class="hero__image" src="{{ $hero_image['url'] }}" alt="{{$alt_text}}"
        style="object-position:{{$hero_image_position}}">
    </div>
  @endif

</section>