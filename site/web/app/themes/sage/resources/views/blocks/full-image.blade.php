<section
    class="full-image {{ $wrapper ? $wrapper : '' }} {{ $spacing_size ? $spacing_size : '' }} full-bleed">
    @include('partials.image', ['image' => $image])
</section>