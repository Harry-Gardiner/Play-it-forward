@php
    // Impact word
    if ($impact_word_enable === 'yes') {
        $impact = $impact_word_position;
    }
@endphp

<section
    class="downloads {{ $wrapper ? $wrapper : '' }} {{ $spacing_size ? $spacing_size : '' }} bg--{{ $background_colour }} full-bleed">
    <div class="{{ $impact_word_enable === 'yes' ? 'impact impact--' . $impact : '' }} block-padding container">
        @if ($impact_word_enable === 'yes')
            <div class="impact__word">{{ $impact_word }}</div>
        @endif
        <div class="downloads__content">
            @if ($title_style['title'])
                @include('partials.title', [$title_style])
            @endif
            @if ($download_grid)
                <div class="downloads__grid">
                    @foreach ($download_grid as $download)
                        <div class="downloads__item {{ $download['download_image_orientation'] }} flow">
                            @if ($download['download_image'])
                                <div class="downloads__image">
                                    <img src="{{ $download['download_image']['sizes']['medium_large'] }}"
                                        alt="{{ $download['download_image']['alt'] }}">
                                </div>
                            @endif
                            @if ($download['title'])
                                <p class="downloads__title">{{ $download['title'] }}</p>
                            @endif
                            @if ($download['description'])
                                <p class="downloads__description">{{ $download['description'] }}</p>
                            @endif
                            <a href="{{ $download['download_file']['url'] }}" download
                                class="downloads__link button button--primary button--download"
                                title="Download {{ $download['title'] }} in PDF format"
                                aria-label="Download {{ $download['title'] }} in PDF format">
                                Download
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</section>
