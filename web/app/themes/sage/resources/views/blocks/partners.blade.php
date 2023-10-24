@php
    if ($impact_word_enable === 'yes') {
        $impact = $impact_word_position;
    }
@endphp

<section
    class="partners {{ $wrapper ? $wrapper : '' }} {{ $spacing_size ? $spacing_size : '' }} bg--{{ $background_colour }} full-bleed">
    <div class="partners__content container {{ $impact_word_enable === 'yes' ? 'impact impact--' . $impact : '' }}">
        @if ($impact_word_enable === 'yes')
            <div class="impact__word">{{ $impact_word }}</div>
        @endif
        <div>
            @include('partials.title', [$title_style])
            @if ($body)
                <div class="partners__body">{!! $body !!}</div>
            @endif
            @if ($partners)
                <div class="partners__list">
                    @foreach ($partners as $partner)
                        @dump($partner)
                        <div class="partners__item">
                            @if ($partner['url'])
                                <a href="{{ $partner['url'] }}" target="_blank">
                                    <img src="{{ $partner['logo']['url'] }}" alt="{{ $partner['logo']['alt'] }}">
                                    <div class="partners__item__info">
                                        <p class="h3">{{ $partner['name'] }}</p>
                                        <p>{{ $partner['description'] }}</p>
                                    </div>
                                </a>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</section>
