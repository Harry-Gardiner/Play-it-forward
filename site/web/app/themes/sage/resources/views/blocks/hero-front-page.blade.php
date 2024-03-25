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
    class="hero-fp full-bleed">

    <div class="hero-fp__top">
        @if ($hero_image)
            <div class="hero-fp__image">
                <img src="{{ $hero_image['sizes']['2048x2048'] }}" alt="{{ $alt_text }}"
                    style="object-position:{{ $hero_image_position }}">
            </div>
        @endif
        @if ($hero_title)
            <div class="hero-fp__title container">
                @if ($hero_icon)
                    <img src="{{ $hero_icon['sizes']['medium'] }}" alt="{{ $hero_icon['alt'] }}">
                @endif
                <h1 class="giant-h1">{!! $hero_title !!}</h1>
            </div>
        @endif
    </div>
    <div class="hero-fp__mid">
        <div class="container">
            @if ($impact_text)
            <div class="embla hero-fp__mid__slider">
                <div class="embla__container">
                    @foreach ($impact_text as $item)
                    <div class="embla__slide hero-fp__mid__slider__item">
                        {{ $item['text_string'] }}
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
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
                        'colour' => 'yellow',
                    ])
                @endif
            </div>
            @endif
        </div>
    </div>  
</section>
