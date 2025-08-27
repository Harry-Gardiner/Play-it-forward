@php
    $slides = $slides ?? null;
    $autoplay = $autoplay ?? false;
    $autoplay_speed = $autoplay_speed ?? 5000;
    $show_arrows = $show_arrows ?? true;
    $show_dots = $show_dots ?? true;
    $overlay_opacity = $overlay_opacity ?? 30;
@endphp

@if ($slides)
    <section class="hero-slider embla">
        <div class="embla__viewport">
            <div class="embla__container">
                @foreach ($slides as $index => $slide)
                    <div class="embla__slide hero-slider__slide">
                        @if ($slide['image'])
                            <div class="hero-slider__image">
                                <img src="{{ $slide['image']['url'] }}" 
                                     alt="{{ $slide['image']['alt'] ?: 'Hero slide' }}" 
                                     loading="{{ $index === 0 ? 'eager' : 'lazy' }}">
                            </div>
                        @endif
                        
                        @if ($overlay_opacity > 0)
                            <div class="hero-slider__overlay" style="opacity: {{ $overlay_opacity / 100 }};"></div>
                        @endif
                        
                        <div class="hero-slider__content">
                            @if ($slide['title'])
                                <h1 class="hero-slider__title">{{ $slide['title'] }}</h1>
                            @endif
                            
                            @if ($slide['subtitle'])
                                <p class="hero-slider__subtitle">{{ $slide['subtitle'] }}</p>
                            @endif
                            
                            @if ($slide['cta_text'] && $slide['cta_link'])
                                <div class="hero-slider__cta">
                                    <a href="{{ $slide['cta_link']['url'] ?? $slide['cta_link'] }}" 
                                       class="button button--primary button--yellow"
                                       {{ ($slide['cta_link']['target'] ?? false) ? 'target="' . $slide['cta_link']['target'] . '"' : '' }}>
                                        {{ $slide['cta_text'] }}
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        
        @if ($show_arrows && count($slides) > 1)
            <div class="hero-slider__navigation">
                <button class="hero-slider__nav hero-slider__nav--prev embla__prev" aria-label="Previous slide">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
                <button class="hero-slider__nav hero-slider__nav--next embla__next" aria-label="Next slide">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 6L15 12L9 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </div>
        @endif
        
        @if ($show_dots && count($slides) > 1)
            <div class="hero-slider__pagination embla__dots">
                @foreach ($slides as $index => $slide)
                    <button class="hero-slider__dot embla__dot" 
                            aria-label="Go to slide {{ $index + 1 }}">
                    </button>
                @endforeach
            </div>
        @endif
    </section>
@endif
