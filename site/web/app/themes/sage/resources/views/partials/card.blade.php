{{-- 
    Expects:
        $post: WP_Post object 
--}}

@php
    $post = $post ?? null;
    $thumbnail_id = get_post_thumbnail_id($post->ID);
    $thumbnail_alt = $thumbnail_id ? get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true) : '';
    $post_type_label = match ($post->post_type ?? '') {
        'news' => 'News',
        'post' => 'Blog',
        default => null,
    };
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
            @if ($post_type_label)
                <span class="card__category card__category--{{ $post->post_type }}">{{ $post_type_label }}</span>
            @endif
            <span class="card__date">{{ get_the_date('j F Y', $post->ID) }}</span>
            <h3 class="card__title h4"><span>{{ $post->post_title }}</span></h3>
        </div>
    </a>
</div>
