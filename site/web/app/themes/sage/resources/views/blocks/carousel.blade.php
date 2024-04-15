@php
    $slides = $slides ?? null;
    $slider_type = $slider_type ?? null;
    $title_style = $title_style ?? null;

    // Wrapper
    $wrapper = $wrapper ?? null;
    $spacing_size = $spacing_size ?? null;

    //BG
    $background_colour = $background_colour ?? 'white';
@endphp

@if ($slides)
    <section class="carousel full-bleed {{$wrapper ? $wrapper : ''}} {{$spacing_size ? $spacing_size : ''}} bg--{{ $background_colour }}">
        <div class="block-padding container">
            @if ($title_style['title'] !== '')
                @include('partials.title', [$title_style])
            @endif
            <div class="carousel embla {{ $slider_type }}">
                <div class="embla__viewport">
                    <div class="embla__container">
                        @if ($slider_type === 'slider-images')
                            @foreach ($slides as $slide)
                                <div class="embla__slide">
                                    @if ($slide['image'])
                                        <img src="{{ $slide['image']['sizes']['medium_large'] }}" alt="{{ $slide['image']['alt'] }}">
                                        <div>
                                            <img src="@asset('images/bitOfEverything.png')" alt="hero banner">
                                        </div>
                                    @endif

                                    <div class="carousel__body">
                                        @if ($slide['title'])
                                            <h3>{{ $slide['title'] }}</h3>
                                        @endif
                                        @if ($slide['subtitle'])
                                            <p class="carousel__subtitle">{{ $slide['subtitle'] }}</p>
                                        @endif
                                        @if ($slide['content'])
                                            <p class="carousel__content">{{ $slide['content'] }}</p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        @if ($slider_type === 'slider-icons')
                            @foreach ($slides as $slide)
                                <div class="embla__slide">
                                    @if ($slide['image'])
                                        <img src="{{ $slide['image']['sizes']['medium_large'] }}" alt="{{ $slide['image']['alt'] }}">
                                    @endif
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif