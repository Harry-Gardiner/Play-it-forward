<article class="timeline__card">
    <p class="timeline__card__year">{{ $card['card_year'] ?? '' }}</p>
    <h3 class="timeline__card__title">{{ $card['card_title'] ?? '' }}</h3>
    @if (!empty($card['card_image']))
        <img class="timeline__card__img" src="{{ $card_image['sizes']['medium_large'] ?? '' }}" alt="{{$card_image['alt'] ?? ''}}">
    @endif
    <div class="timeline__card__text">{!! $card['card_text'] ?? '' !!}</div>
</article>