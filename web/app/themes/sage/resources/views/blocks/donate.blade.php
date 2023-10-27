@php

@endphp

<section
    class="custom-grid {{ $wrapper ? $wrapper : '' }} {{ $spacing_size ? $spacing_size : '' }} bg--white full-bleed">
    <div class="block-padding container">
        <div class="custom-grid__content">
            @if ($title_style['title'])
                @include('partials.title', [$title_style])
            @endif
            @if ($body)
                {!! $body !!}
            @endif
            <div class="beacon-form" data-account="playitforward" data-form="461adf42"></div>
        </div>
    </div>
</section>
