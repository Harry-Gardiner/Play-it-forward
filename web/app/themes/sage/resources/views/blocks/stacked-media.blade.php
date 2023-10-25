@php
    // Impact word
    if ($impact_word_enable === 'yes') {
        $impact = $impact_word_position;
    }
@endphp

<section
    class="stacked-media {{ $wrapper ? $wrapper : '' }} {{ $spacing_size ? $spacing_size : '' }} bg--{{ $background_colour }} full-bleed">
    <div class="{{ $impact_word_enable === 'yes' ? 'impact impact--' . $impact : '' }} block-padding container">
        @if ($impact_word_enable === 'yes')
            <div class="impact__word">{{ $impact_word }}</div>
        @endif
        <div class="stacked-media__content">
            @include('partials.title', [$title_style])
            @if ($items)
                <div class="stacked-media__content--column">
                    @foreach ($items as $item)
                        @if ($item['media_type'] === 'image')
                            <div class="stacked-media__content--image">
                                <img src="{{ $item['image']['url'] }}" alt="{{ $item['image']['alt'] }}">
                            </div>
                        @endif
                        @if ($item['media_type'] === 'video')
                            <div class="stacked-media__content--video embed-container">
                                {!! $item['video'] !!}
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</section>
