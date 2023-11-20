@php
    //deconstruct button
    if ($show_button == 'yes') {
        $btn_link = $cta_button['link'];
        $btn_text = $cta_button['text'];
        $btn_type = $cta_button['type'];

        if ($cta_button['btn_colour'] !== '') {
            $button_colour = $cta_button['btn_colour'];
        } else {
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
        }
    }

    // $layout switch statement
    switch ($layout) {
        case 'full':
            $layout = 'full-bleed';
            break;
        case 'contained':
            $layout = 'contained';
            break;
        default:
            $layout = 'default';
    }

@endphp
<section
    class="cta-wrapper {{ !$image ? $layout : 'full-bleed' }} {{ $wrapper ? $wrapper : '' }} {{ $spacing_size ? $spacing_size : '' }} bg--{{ $background_colour }}">
    @if (!$image)
        <div class="cta-banner">
            <div class="cta-banner__content flow container block-padding">
                <div class="flow">
                    @if ($title_style['title'])
                        @include('partials.title', [$title_style])
                    @endif
                    @if ($body)
                        {!! $body !!}
                    @endif
                </div>
                @if ($show_button == 'yes')
                    @include('partials.button', [
                        'type' => $btn_type,
                        'link' => $btn_link,
                        'text' => $btn_text,
                        'colour' => $button_colour,
                    ])
                @endif

            </div>
        </div>
    @endif


    @if ($image)
        <div class="cta-banner__image">
            <img class="image--{{ $image_position }}" src="{{ $image['url'] }}""
                alt="{{ $image['alt'] ? $image['alt'] : $image['name'] }}">
            <div
                class="cta-banner__image__content container image--{{ $image_position }} {{ $wrapper ? $wrapper : '' }} block-padding">
                <div class="cta-banner__image__content__body flow">
                    <div class="flow">
                        @if ($title_style['title'])
                            @include('partials.title', [$title_style])
                        @endif
                        @if ($body)
                            {!! $body !!}
                        @endif
                    </div>
                    @if ($show_button == 'yes')
                        @include('partials.button', [
                            'type' => $btn_type,
                            'link' => $btn_link,
                            'text' => $btn_text,
                            'colour' => $button_colour,
                        ])
                    @endif
                </div>
            </div>
        </div>
    @endif
</section>
