@php
    // Wrapper
    $wrapper = $wrapper ?? null;
    $spacing_size = $spacing_size ?? null;

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
<section class="hero full-bleed {{ $wrapper ? $wrapper : '' }} {{ $spacing_size ? $spacing_size : '' }}">

    @if ($hero_title)
        <div class="hero__inner">
            <div class="hero__inner__content flow">
                <div class="hero__title">
                    <h1 class="giant-h1">{!! $hero_title !!}</h1>
                </div>
                @if ($show_button == 'yes')
                    <div class="hero__sub-text flow">
                        @include('partials.button', [
                            'type' => $btn_type,
                            'link' => $btn_link,
                            'text' => $btn_text,
                            'colour' => $btn_colour,
                        ])
                    </div>
                @endif
            </div>
        </div>
    @endif

    @if ($hero_image)
        <div class="hero__image">
            <img src="{{ $hero_image['url'] }}" alt="{{ $alt_text }}"
                style="object-position:{{ $hero_image_position }}">
        </div>
    @endif

</section>
