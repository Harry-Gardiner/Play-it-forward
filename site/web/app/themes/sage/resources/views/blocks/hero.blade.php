@php
    // Wrapper
    $wrapper = $wrapper ?? null;
    $spacing_size = $spacing_size ?? null;
    $background_colour = $background_colour ? $background_colour : 'white';

    // Image
    $hero_image = $hero_image ?? null;
    // dump($hero_image);
    $alt_text = '';
    // if (is_array($hero_image) && isset($hero_image['alt'])) {
    //     $alt_text = $hero_image['alt'] !== '' ? $hero_image['alt'] : 'hero image';
    // }
    $image_position = $hero_image_position ?? 'center center';

    // Content
    $hero_title = $hero_title ?? null;
    $hero_content = $hero_content ?? null;

@endphp
{{-- <section class="hero {{ $wrapper ? $wrapper : '' }} {{ $spacing_size ? $spacing_size : '' }}">

    @if ($hero_title)
        <div class="hero__inner flow">
                <div class="hero__title">
                    <h1 class="h1">{!! $hero_title !!}</h1>
                </div>
                <div class="hero__content">
                    {!! $hero_content !!}
                </div>
        </div>
    @endif

    @if ($hero_image)
        <div class="hero__image bg--{{ $background_colour }} full-bleed">
            <img src="{{ $hero_image['url'] }}" alt="{{ $alt_text }}"
                style="object-position:{{ $hero_image_position }}">
        </div>
    @endif

</section> --}}


<section
    class="blog-hero full-bleed {{ $wrapper ? $wrapper : '' }} {{ $spacing_size ? $spacing_size : '' }} bg--{{ $background_colour }} {{ $show_hero_image !== 'yes' ? 'base' : 'has-image' }}">
    
    @if ($hero_title)
        <div class="blog-hero__inner container">
            <div class="blog-hero__wrapper flow">
                <div class="blog-hero__title">
                    <h1 class="h1">{!! $hero_title !!}</h1>
                </div>
                @if ($hero_content)
                    <div>{!! $hero_content !!}</div>
                @endif
            </div>
        </div>
    @endif

    @if ($show_hero_image == 'yes' && $hero_image)
        <div class="blog-hero__image">
            <img src="{{ $hero_image['url'] }}" alt="{{ $alt_text }}" style="object-position:{{ $image_position }}">
        </div>
    @else
       <div class="blog-hero__image--base">
        <img src="{{ asset('images/pif_logo_lrg_white.png') }}"
        alt="Play it forward logo">
       </div>
    @endif
    </section>