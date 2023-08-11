@php
  $num_slides = count($slides);
@endphp
<section class="carousel {{$wrapper ? $wrapper : ''}} {{$spacing_size ? $spacing_size : ''}} bg--{{ $background_colour }} {{ $full === 'true' ? 'full-bleed' : '' }}">
 
  <div class="swiffy-slider slider-item-nogap {{ $slider_autoplay === 'true' ? 'slider-nav-autoplay' : ''}} slider-nav-autopause slider-item-first-visibles slider-nav-autohide slider-nav-caretfill slider-item-ratio {{ $slider_ratio }}">
    <ul class="slider-container">
        @foreach ($slides as $slide)
            @php
                $image = $slide['image'];
                $title = $slide['title'];
                $subtitle = $slide['subtitle'];
                $add_text = $slide['add_text'];
            @endphp
            <li>
                <div class="slider-content">
                  
                        <img class="slider-content__image" src="{{ $image['url'] }}" alt="{{ $image['alt'] }}">
                  
                    @if ($add_text === 'true')
                    <div class="slider-content__text flow">
                      <h3 class="h3">{{ $title }}</h2>
                      <p>{{ $subtitle }}</p>
                  </div>
                    @endif
                </div>
            </li>            
        @endforeach
    </ul>

    <button type="button" class="slider-nav"></button>
    <button type="button" class="slider-nav slider-nav-next"></button>

    <div class="slider-indicators">
        @if ($num_slides > 1)
            @for ($i = 0; $i < $num_slides; $i++)
                <button class="{{ $i == 0 ? 'active' : '' }}"></button>
            @endfor 
        @endif
    </div>
  </div>
  
</section>