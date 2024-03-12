@php
    $slides = $slides ?? null;
    $slider_type = $slider_type ?? null;
    $title_style = $title_style ?? null;
@endphp

@if ($slides)
    <section class="carousel {{$wrapper ? $wrapper : ''}} {{$spacing_size ? $spacing_size : ''}} bg--{{ $background_colour }}">
        <div class="block-padding">
            @if ($title_style['title'] !== '')
                @include('partials.title', [$title_style])
            @endif
            <div class="carousel embla">
                <div class="embla__viewport">
                    <div class="embla__container">
                        @if ($slider_type === 'slider-type-images')
                            @foreach ($slides as $slide)
                                <div class="embla__slide">
                                    @if ($slide['image'])
                                        <img src="{{ $slide['image']['sizes']['medium_large'] }}" alt="{{ $slide['image']['alt'] }}">
                                    @endif
                                    @if ($slide['title'])
                                        <h3>{{ $slide['title'] }}</h3>
                                    @endif
                                    @if ($slide['subtitle'])
                                        <p>{{ $slide['subtitle'] }}</p>
                                    @endif
                                    @if ($slide['link'])
                                        <a href="{{ $slide['link'] }}" class="button">{{ $slide['link_text'] }}</a>
                                    @endif
                                </div>
                            @endforeach
                        @endif
                        @if ($slider_type === 'slider-type-icons')
                            @foreach ($slides as $slide)
                                <div class="embla__slide">
                                    <img src="{{ $slide['icon']['sizes']['medium'] }}" alt="{{ $slide['icon']['alt'] }}">
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif