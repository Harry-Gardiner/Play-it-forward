@php
    //deconstruct $ctaBanner
    $title = $items['title'];
    //deconstruct $items['cta_button']
    $btn_link = $items['cta_button']['link'];
    $btn_text = $items['cta_button']['text'];
    $btn_colour = $items['cta_button']['colour'];
    $btn_type = $items['cta_button']['type'];
    
@endphp
<div class="{{ $block->classes }}">
    <div class="cta-banner flow">
        <h1>{{ $title }}</h1>
        @include('partials.button', [
            'type' => $btn_type,
            'link' => $btn_link,
            'text' => $btn_text,
            'colour' => $btn_colour,
        ])
    </div>
</div>
