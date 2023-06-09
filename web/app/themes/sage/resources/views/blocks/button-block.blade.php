@php
    //deconstruct $items
    $btn_link = $items['link'];
    $btn_text = $items['text'];
    $btn_colour = $items['colour'];
    $btn_type = $items['type'];
    $btn_position = $items['position'];
    
@endphp
<div class="{{ $block->classes }}">
    <div class="button-block flow button-block--{{$btn_position}}">
        @include('partials.button', [
            'type' => $btn_type,
            'link' => $btn_link,
            'text' => $btn_text,
            'colour' => $btn_colour,
        ])
    </div>
</div>
