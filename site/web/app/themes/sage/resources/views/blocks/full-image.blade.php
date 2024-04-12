@php
    if (!$image_height) {
        $image_height = 400;
    }
@endphp
<section
    class="full-image {{ $wrapper ? $wrapper : '' }} {{ $spacing_size ? $spacing_size : '' }} full-bleed" style="height:{{ $image_height }}px">
    @if ($image)
        <img src="{{ $image['url'] }}" alt="{{ $image['alt'] }}" style="object-position:{{ $full_image_position }}"/>
    @endif
</section>