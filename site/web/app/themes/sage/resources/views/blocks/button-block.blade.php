<section class="{{ $block->classes }} {{ $wrapper ? $wrapper : '' }} {{ $spacing_size ? $spacing_size : '' }}">
    <div class="button-block flow button-block--{{ $btn_position }}">
        @include('partials.button', [
            'type' => $btn_type,
            'link' => $btn_link,
            'text' => $btn_text,
            'colour' => $btn_colour,
            'new_tab' => $btn_new_tab,
        ])
    </div>
</section>
