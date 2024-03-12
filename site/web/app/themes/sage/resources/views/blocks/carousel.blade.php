@php
//   $num_slides = count($slides);
@endphp

<section class="carousel {{$wrapper ? $wrapper : ''}} {{$spacing_size ? $spacing_size : ''}} bg--{{ $background_colour }}">
{{--  
    @if ($slider_type === 'slider-type-images')
     
    @endif
  
    @if ($slider_type === 'slider-type-icons')
       
    @endif --}}

    <div class="carousel">
        <div class="embla__container">
          <div class="embla__slide">Slide 1</div>
          <div class="embla__slide">Slide 2</div>
          <div class="embla__slide">Slide 3</div>
        </div>
    </div>
</section>