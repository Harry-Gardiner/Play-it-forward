{{-- @php
$cards = $fields['cards'];
$theme = $fields['theme'] ? 'timeline--' . $fields['theme'] : '';
@endphp --}}

@if ($cards && !empty($cards))
<section class="section--timeline">
  @if (isset($title))
    <div class="timeline__text-wrapper">
      <h2 class="timeline__title">{{ $title }}</h2>
      <p class="timeline__instructions timeline__instructions--desktop">Click & Drag</p>
      <p class="timeline__instructions timeline__instructions--mobile">Swipe</p>
    </div>
  @endif
  <div class="timeline__cards-wrapper">

    <div class="embla timeline__slider">
      <div class="embla__buttons">
        <button class="embla__button embla__button--prev" type="button" disabled="" tabindex="0">
          <span class="visually-hidden">Previous slide</span>
        </button>
        <button class="embla__button embla__button--next" type="button" disabled="" tabindex="0">
          <span class="visually-hidden">Next slide</span>
        </button>
      </div>

      <div class="embla__viewport">
        <div class="embla__container">
          @foreach ($cards as $card)
            <div class="embla__slide" tabindex="0">
              @include('partials.timeline-card', $card)
            </div>
          @endforeach
        </div>
      </div>
</section>
@endif


{{-- @component('patterns.section.section', [
'sectionClass' => 'section--timeline ' . $theme,
"bg_class" => "",
"attributes" => [
"data-scroll-section" => 1
]
])

@if(isset($title))
<div class="timeline__text-wrapper">
  <h2 class="timeline__title">{{ $fields['title'] }}</h2>

  <p class="timeline__instructions timeline__instructions--desktop">Click & Drag</p>
  <p class="timeline__instructions timeline__instructions--mobile">Swipe</p>

</div>

<div class="timeline__cards-wrapper">

  @if (is_array($cards))

  <div class="embla timeline__slider">
    <div class="embla__buttons">
      <button class="embla__button embla__button--prev" type="button" disabled="" tabindex="0">
        <span class="visually-hidden">Previous slide</span>
      </button>
      <button class="embla__button embla__button--next" type="button" disabled="" tabindex="0">
        <span class="visually-hidden">Next slide</span>
      </button>
    </div>

    <div class="embla__viewport">
      <div class="embla__container">

        @foreach ($cards as $card)
        <div class="embla__slide" tabindex="0">
          @include('patterns.timeline-card.timeline-card', $card)
        </div>
        @endforeach

      </div>
    </div>
  </div>
  @endif

</div>

@endif

@endcomponent --}}