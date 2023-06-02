@php
    //deconstruct button
    $btn_link = $cta_button['link'];
    $btn_text = $cta_button['text'];
    $btn_colour = $cta_button['colour'];
    $btn_type = $cta_button['type'];
    // dump($image);
    // dump($image_position);

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
<div class="cta-wrapper {{$layout}}" style="background-color: {{ $background_colour }}">
    @if (!$image)
        <div class="cta-banner">
            <div class="cta-banner__content flow container">
                <div class="flow">
                    <h1>{{ $title }}</h1>
                    {!! $body !!}
                </div>
                @include('partials.button', [
                    'type' => $btn_type,
                    'link' => $btn_link,
                    'text' => $btn_text,
                    'colour' => $btn_colour,
                ])
            </div>
        </div>
    @endif


    @if ($image)
    <div class="cta-banner__image">
        <img class="cta-banner--{{$image_position}}" src="{{$image['url']}}"" alt="{{$image['alt'] ? $image['alt'] : $image['name']}}">
        <div class="cta-banner__image__content container">
            <div class="cta-banner__image__content__body flow">
                <div class="flow">
                    <h1>{{ $title }}</h1>
                    {!! $body !!}
                </div>
                @include('partials.button', [
                    'type' => $btn_type,
                    'link' => $btn_link,
                    'text' => $btn_text,
                    'colour' => $btn_colour,
                ])
            </div>
        </div>
    </div>
    @endif
</div>
