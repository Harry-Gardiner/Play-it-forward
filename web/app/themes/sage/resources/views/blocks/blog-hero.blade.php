@php
    // Wrapper
    $wrapper = $wrapper ?? null;
    $spacing_size = $spacing_size ?? null;

    // Image
    if ($show_hero_image == 'yes') {
        $hero_image = get_the_post_thumbnail_url(null, 'medium_large') ?? null;
        $alt_text = '';
        if ($hero_image) {
            $post_thumbnail_id = get_post_thumbnail_id();
            $alt_text = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', true);
        }
        $image_position = $hero_image_position ?? 'center center';
    }

    // Content
    $hero_title = get_the_title() ?? null;
@endphp

<section class="blog-hero full-bleed {{ $wrapper ? $wrapper : '' }} {{ $spacing_size ? $spacing_size : '' }}">

    @if ($hero_image)
        <div class="blog-hero__image">
            <img src="{{ $hero_image }}" alt="{{ $alt_text }}" style="object-position:{{ $hero_image_position }}">
        </div>
    @endif

    @if ($hero_title)
        <div class="blog-hero__inner container">
            <div class="blog-hero__inner__content flow">
                <div class="blog-hero__title">
                    <h1 class="giant-h1">{!! $hero_title !!}</h1>
                </div>
            </div>
        </div>
    @endif
</section>