@php
    $blog_logo = is_blog();
@endphp

<a class="logo" href="{{ home_url('/') }}">
    <div class="logo__wrapper">
        <img src="{{ $blog_logo ? asset('images/pif_logo_black.png') : asset('images/pif_logo_white.png') }}"
            alt="Play it forward logo">
        <p class="logo__wrapper__text">play it <span class="strong">forward</span></p>
    </div>
</a>
