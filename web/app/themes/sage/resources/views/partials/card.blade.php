{{-- 
    Expects:
        $post: WP_Post object 
--}}

@php
    $post = $post ?? null;
@endphp
<div class="card">
    <a href="{{get_permalink($post->ID)}}">
        <div class="card__image">
            <img src="{{get_the_post_thumbnail_url($post->ID)}}" alt="">  
        </div>
        <div class="card__content">
            <h3 class="card__title h2"><span>{{$post->post_title}}</span></h3>
            <p class="card__excerpt">{{$post->post_excerpt}}</p>    
        </div>
    </a>
</div>