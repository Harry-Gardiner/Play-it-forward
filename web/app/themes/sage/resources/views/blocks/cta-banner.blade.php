@php
    //deconstruct button
    $btn_link = $cta_button['link'];
    $btn_text = $cta_button['text'];
    $btn_colour = $cta_button['colour'];
    $btn_type = $cta_button['type'];
    // dump($image);
@endphp
<div class="{{ $block->classes }} full-bleed" style="background-color: {{ $background_colour }}">
    @if (!$image)
        <div class="cta-banner container">
            <div class="cta-banner__content flow">
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
        IMAGE
    @endif
</div>
