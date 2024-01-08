<div class="{{ $block->classes }} {{ $text_alignment ? $text_alignment : 'left' }} {{ $wrapper ? $wrapper : '' }} {{$text_colour}} {{ $spacing_size ? $spacing_size : '' }}">
    @if(!empty($text))
        <{{ $heading_semantics }} class="heading__{{ $heading_style }}">{{ $text }}</{{ $heading_semantics }}>
    @endif
</div>