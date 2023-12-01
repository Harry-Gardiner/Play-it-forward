<div class="{{ $block->classes }} {{ $wrapper ? $wrapper : '' }} {{ $spacing_size ? $spacing_size : '' }}">
    @if(!empty($text))
        <div class="text__{{ $style }}">{!! $text !!}</div>
    @endif
</div>