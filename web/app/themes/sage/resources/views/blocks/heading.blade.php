<div class="{{ $block->classes }}">
    @if(!empty($text))
        <{{ $heading_semantics }} class="heading__{{ $heading_style }}">{{ $text }}</{{ $heading_semantics }}>
    @endif
</div>