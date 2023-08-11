@php
  // dump($slides);
@endphp
<section class="carousel full-bleed {{$wrapper ? $wrapper : ''}} {{$spacing_size ? $spacing_size : ''}} bg--{{ $background_colour }}">
 
  <div class="swiffy-slider container">
    <ul class="slider-container">
        @foreach ($slides as $slide)
            @php
                $image = $slide['image'];
                $title = $slide['title'];
                $subtitle = $slide['subtitle'];
            @endphp
            <li>
                <div class="slider-content">
                    <div class="slider-content__image">
                        <img src="{{ $image['url'] }}" alt="{{ $image['alt'] }}">
                    </div>
                    <div class="slider-content__text">
                        <h2>{{ $title }}</h2>
                        <p>{{ $subtitle }}</p>
                    </div>
                </div>
            </li>            
        @endforeach
    </ul>

    <button type="button" class="slider-nav"></button>
    <button type="button" class="slider-nav slider-nav-next"></button>

    <div class="slider-indicators">
        <button class="active"></button>
        <button></button>
        <button></button>
    </div>
  </div>
  
</section>