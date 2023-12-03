<div class="{{ $block->classes }} {{ $wrapper ? $wrapper : '' }} {{ $spacing_size ? $spacing_size : '' }}">
    @if(!empty($text))
        <{{ $heading_semantics }} class="heading__{{ $heading_style }}">{{ $text }}</{{ $heading_semantics }}>
    @endif
</div>