@php
    //deconstruct button
    if ($show_button == 'yes') {
        $btn_link = $cta_button['link'];
        $btn_text = $cta_button['text'];
        $btn_colour = $cta_button['colour'];
        $btn_type = $cta_button['type'];
    }
    

    //deconstruct background
    $background_colour = !empty($colour_picker) ? $colour_picker['colour'] : 'white';

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
<div class="cta-wrapper {{!$image ? $layout : 'full-bleed'}} {{$background_colour}}">
    @if (!$image)
        <div class="cta-banner {{$wrapper ? $wrapper : ''}}">
            <div class="cta-banner__content flow container">
                <div class="flow">
                    <h1>{{ $title }}</h1>
                    {!! $body !!}
                </div>
                @if ($show_button == 'yes')
                    @include('partials.button', [
                        'type' => $btn_type,
                        'link' => $btn_link,
                        'text' => $btn_text,
                        'colour' => $btn_colour,
                    ])
                @endif
                
            </div>
        </div>
    @endif


    @if ($image)
    <div class="cta-banner__image">
        <img class="image--{{$image_position}}" src="{{$image['url']}}"" alt="{{$image['alt'] ? $image['alt'] : $image['name']}}">
        <div class="cta-banner__image__content container image--{{$image_position}} {{$wrapper ? $wrapper : ''}}">
            <div class="cta-banner__image__content__body flow">
                <div class="flow">
                    <h1>{{ $title }}</h1>
                    {!! $body !!}
                </div>
                @if ($show_button == 'yes')
                    @include('partials.button', [
                        'type' => $btn_type,
                        'link' => $btn_link,
                        'text' => $btn_text,
                        'colour' => $btn_colour,
                    ])
                @endif
            </div>
        </div>
    </div>
    @endif
</div>
