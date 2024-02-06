{{-- <script>
    ! function(e, t) {
        if (!e.getElementById(t)) {
            var c = e.createElement("script");
            c.id = t, c.src = "https://static.beaconproducts.co.uk/js-sdk/production/beaconcrm.min.js", e
                .getElementsByTagName("head")[0].appendChild(c)
        }
    }(document, "beacon-js-sdk")
</script> --}}

<section class="donate {{ $wrapper ? $wrapper : '' }} {{ $spacing_size ? $spacing_size : '' }} bg--off-white full-bleed">
    <div class="block-padding container">
        <div class="donate__content">
            {{-- @if ($title_style['title'])
                @include('partials.title', [$title_style])
            @endif --}}
            @if ($body)
                {!! $body !!}
            @endif
            <div class="beacon-form" data-account="playitforward" data-form="461adf42"></div>
        </div>
    </div>
</section>
