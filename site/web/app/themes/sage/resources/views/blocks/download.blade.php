@php

    switch ($background_colour) {
        case 'yellow':
            $button_colour = 'bg-yellow';
            break;

        case 'dark-green':
            $button_colour = 'bg-green';
            break;

        case 'raspberry':
            $button_colour = 'bg-raspberry';
            break;

        case 'charcoal':
            $button_colour = 'white';
            break;

        default:
            $button_colour = 'bg-raspberry';
            break;
    }

    // $layout switch statement
    // switch ($layout) {
    //     case 'full':
    //         $layout = 'full-bleed';
    //         break;
    //     case 'contained':
    //         $layout = 'contained';
    //         break;
    //     default:
    //         $layout = 'default';
    // }

@endphp
<section
    class="download {{ $wrapper ? $wrapper : '' }} {{ $spacing_size ? $spacing_size : '' }} bg--{{ $background_colour }}">
    @if ($download_image)
        <div class="download__wrapper block-padding">
            <img class="download__image" src="{{ $download_image['url'] }}""
                alt="{{ $download_image['alt'] ? $download_image['alt'] : $download_image['name'] }}">
            <div
                class="download__content container">
                <div class="download__content__body flow">
                    <div class="flow">
                        @if ($title_style['title'])
                            @include('partials.title', [$title_style])
                        @endif
                        {{-- @if ($title)
                            <h2 class="download__title">{{ $title }}</h2>                            
                        @endif --}}
                        @if ($description)
                            {!! $description !!}
                        @endif
                    </div>
                    @if ($download_file)
                        @include('partials.button', [
                            'type' => 'primary',
                            'link' => $download_file['url'],
                            'text' => 'Download',
                            'colour' => $button_colour,
                        ])
                    @endif
                </div>
            </div>
        </div>
    @endif
</section>
