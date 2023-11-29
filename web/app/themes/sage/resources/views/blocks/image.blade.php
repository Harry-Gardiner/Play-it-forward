<section
    class="full-image {{ $wrapper ? $wrapper : '' }} {{ $spacing_size ? $spacing_size : '' }} bg--{{ $background_colour }} full-bleed">
    @include('partials.image', ['image' => $image])
</section>