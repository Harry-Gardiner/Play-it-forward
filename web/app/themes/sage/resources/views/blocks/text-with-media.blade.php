@php
    // Impact word
    if ($impact_word_enable === 'yes') {
        $impact = $impact_word_position;
    }

@endphp

<section class="text-with-media {{ $wrapper ? $wrapper : '' }} {{ $spacing_size ? $spacing_size : '' }} bg--{{ $background_colour }} full-bleed">
    <div class="{{ $impact_word_enable === 'yes' ? 'impact impact--' . $impact : '' }} block-padding container">
        @if ($impact_word_enable === 'yes')
            <div class="impact__word">{{ $impact_word }}</div>
        @endif
        <div class="text-with-media__content">
            @if ($title_style['title'])
                <div class="text-with-media__content__title title-{{ $title_align }}">
                    @include('partials.title', [$title_style])
                </div>
            @endif

            @if($body)
                <div class="text-with-media__content__body">
                    {!! $body !!}
                </div>
            @endif

            @if($media_type === 'image')
                <img class="text-with-media__content__image" src={{ $image['url'] }} alt={{ $image['alt'] }} />
            @elseif($media_type === 'video')
                <div class="text-with-media__content__video embed-container">
                    {!! $video !!}
                </div>
            @endif

        </div>
</section>