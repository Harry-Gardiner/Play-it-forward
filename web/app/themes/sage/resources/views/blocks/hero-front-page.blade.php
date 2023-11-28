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
    $highlighted_text = $highlighted_text ?? null;
    $hero_content = $hero_content ?? null;

    if ($highlighted_text && !empty($highlighted_text)) {
        foreach ($highlighted_text as $word) {
            $word = $word['text_string'];
            $hero_title = str_replace($word, '<span class="highlight">' . $word . '</span>', $hero_title);
        }
    }

    // Btn
    if ($show_button == 'yes') {
        $btn_link = $cta_button['link'] ?? null;
        $btn_text = $cta_button['text'] ?? null;
        $btn_colour = 'raspberry';
        $btn_type = $cta_button['type'] ?? null;
    }

@endphp
<section
    class="hero-fp full-bleed {{ $wrapper ? $wrapper : '' }} {{ $spacing_size ? $spacing_size : '' }} bg--{{ $background_colour }}">

    <div class="hero-fp__top">
        @if ($hero_image)
            <div class="hero-fp__image">
                <img src="{{ $hero_image['url'] }}" alt="{{ $alt_text }}"
                    style="object-position:{{ $hero_image_position }}">
            </div>
        @endif
        @if ($hero_title)
            <div class="hero-fp__title">
                <h1 class="giant-h1">{!! $hero_title !!}</h1>
            </div>
        @endif
    </div>
    <div class="hero-fp__mid">
        <div class="container">
            @if ($impact_text)
            <div class="embla hero-fp__slider">
                <div class="embla__container">
                    @foreach ($impact_text as $item)
                    <div class="embla__slide">
                        {{ $item['text_string'] }}
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
        <div class="hero-fp__mid__vector block-padding-bottom">
            <svg xmlns="http://www.w3.org/2000/svg" width="70" height="35" viewBox="0 0 70 35" fill="none">
                <path d="M35 34.759L0.37207 0.131104H69.6279L35 34.759Z" fill="#FAB200"/>
                </svg>
        </div>
    </div>
    <div class="hero-fp__bottom block-padding--bottom">
        <div class="container">
            @if ($hero_content)
            <div class="hero-fp__bottom__sub-text flow">
                {!! $hero_content !!}
                @if ($show_button == 'yes')
                    @include('partials.button', [
                        'type' => $btn_type,
                        'link' => $btn_link,
                        'text' => $btn_text,
                        'colour' => 'transparent',
                    ])
                @endif
            </div>
            @endif
        </div>
    </div>

    {{-- @if ($hero_title)
        <div class="hero-fp__inner container">
            <div class="hero-fp__inner__content flow">
                <div class="hero-fp__title">
                    <h1 class="giant-h1">{!! $hero_title !!}</h1>
                </div>
                <div class="hero-fp__sub-text flow">
                    {!! $hero_content !!}
                    @if ($show_button == 'yes')
                        @include('partials.button', [
                            'type' => $btn_type,
                            'link' => $btn_link,
                            'text' => $btn_text,
                            'colour' => $btn_colour,
                        ])
                    @endif
                </div>
            </div>
        </div>
        <div class="hero-fp__inner">
            <div class="hero-fp__inner__content flow">
                <div class="hero-fp__title">
                    <h1 class="giant-h1">{!! $hero_title !!}</h1>
                </div>
                <div class="hero-fp__sub-text flow">
                    {!! $hero_content !!}
                    @if ($show_button == 'yes')
                        @include('partials.button', [
                            'type' => $btn_type,
                            'link' => $btn_link,
                            'text' => $btn_text,
                            'colour' => $btn_colour,
                        ])
                    @endif
                </div>
            </div>
        </div>
    @endif --}}

    

</section>
