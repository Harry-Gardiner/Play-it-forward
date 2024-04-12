@php
// $cards = $fields['cards'];
// $theme = $fields['theme'] ? 'timeline--' . $fields['theme'] : '';
// dump($title_style);
@endphp


@if ($cards && !empty($cards))
<section class="section--timeline">
  <div class="block-padding">
    @if (isset($title_style))
      <div class="timeline__text-wrapper">
        @if ($title_style['title'])
            @include('partials.title', [$title_style])
        @endif
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
      </div>
    </div>
  </div>
</section>
@endif