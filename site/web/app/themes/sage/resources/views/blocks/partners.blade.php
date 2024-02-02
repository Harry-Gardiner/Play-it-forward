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
                            @if(!empty($partner['logo']))
                                <img src="{{ $partner['logo']['sizes']['thumbnail'] ? $partner['logo']['sizes']['thumbnail'] : $partner['url'] }}" alt="{{ $partner['logo']['alt'] ? $partner['logo']['alt'] : $partner['name'] . ' logo' }}">
                            @endif

                            @if($partner['name'] || $partner['description'] || $partner['url'])
                                <div class="partners__item__info">

                                    @if($partner['description'])
                                        <p class="partners__item__info__desc">{{ $partner['description'] }}</p>
                                    @endif

                                    @if ($partner['url'])
                                        <a class="partners__item__info__link" href="{{ $partner['url'] }}" target="_blank">
                                            Find out more <span class="visually-hidden">about {{ $partner['name'] }}</span>
                                        </a>
                                    @endif
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</section>
