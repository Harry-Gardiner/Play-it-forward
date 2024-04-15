{{-- 
    Expects:
        $post: WP_Post object 
--}}

@php
    $post = $post ?? null;
    $thumbnail_id = get_post_thumbnail_id($post->ID);
    $thumbnail_alt = $thumbnail_id ? get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true) : '';
@endphp
<div class="card">
    <div class="card__banner">
        <img src="@asset('images/bitOfEverything.png')" alt="hero banner">
    </div>
    <a href="{{ get_permalink($post->ID) }}">
        <div class="card__image">
            @if ($thumbnail_id)
                <img src="{{ get_the_post_thumbnail_url($post->ID, 'large') }}" alt="{{ $thumbnail_alt }}">
            @else
                <img src="{{ asset('images/placeholder.png') }}" alt="Placeholder image">
            @endif
        </div>
        <div class="card__content">
            <h3 class="card__title h4"><span>{{ $post->post_title }}</span></h3>
        </div>
    </a>
</div>
