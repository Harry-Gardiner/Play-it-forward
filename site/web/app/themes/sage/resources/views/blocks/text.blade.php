<div class="{{ $block->classes }} {{ $wrapper ? $wrapper : '' }} {{ $spacing_size ? $spacing_size : '' }}">
    @if(!empty($text))
        <div class="text__{{ $style }} flow" style="text-align: {{ $text_alignment }};">{!! $text !!}</div>
    @endif
</div>
