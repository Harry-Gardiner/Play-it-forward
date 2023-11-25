{{--
    This element expects:
    "content": {string}
--}}

@if (!empty($content))
    <div class='info-banner full-bleed'>
        <span class="info-banner__icon info-banner__info-icon">
            <img src="{{ asset('images/icons/info-circle.svg') }}" alt="information">
        </span>
        {!! $content !!}
        <button class="info-banner__close-btn info-banner__icon ">
            <img src="{{ asset('images/icons/cross-charcoal.svg') }}" class="info-banner__close-icon" alt="close icon"/>
            <span class="visually-hidden">Close banner</span>
        </button>
    </div>
@endif
