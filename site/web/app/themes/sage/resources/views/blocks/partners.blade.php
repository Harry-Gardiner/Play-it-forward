@php
    if ($impact_word_enable === 'yes') {
        $impact = $impact_word_position;
    }
@endphp

<section
    class="partners {{ $wrapper ? $wrapper : '' }} {{ $spacing_size ? $spacing_size : '' }} bg--{{ $background_colour }} full-bleed">
    <div
        class="partners__content container {{ $impact_word_enable === 'yes' ? 'impact impact--' . $impact : '' }} block-padding">
        @if ($impact_word_enable === 'yes')
            <div class="impact__word">{{ $impact_word }}</div>
        @endif
        <div>
            @if ($title_style['title'])
                @include('partials.title', [$title_style])
            @endif
            @if ($body)
                <div class="partners__body">{!! $body !!}</div>
            @endif
            @if ($partners)
                <div class="partners__list">
                    @foreach ($partners as $partner)
                        <div class="partners__item">
                            @if (is_array($partner['logo']))
                            <img src="{{ $partner['logo']['sizes']['thumbnail'] }}" alt="{{ $partner['logo']['alt'] }}">
                            @endif
                            <div class="partners__item__info">
                                <p class="h3">{{ $partner['name'] }}</p>
                                <p>{{ $partner['description'] }}</p>
                                @if ($partner['url'])
                                    <a href="{{ $partner['url'] }}" target="_blank">
                                        <div class="arrow-container">
                                            <p>Find out more</p>
                                            <div class="arrow">
                                                <div class="arrow-line"></div>
                                                <div class="arrow-head">
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</section>
