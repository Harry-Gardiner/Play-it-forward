<div class="{{ $block->classes }} {{ $text_alignment ? $text_alignment : 'left' }} {{ $wrapper ? $wrapper : '' }} {{ $enable_text_background ? 'bg--' . $text_background_colour : '' }} {{ $enable_text_colour ? $text_colour : 'charcoal' }} {{ $spacing_size ? $spacing_size : '' }}  {{ $enable_text_background ? 'full-bleed block-padding' : '' }}">
    @if(!empty($text))
        <{{ $heading_semantics }} class="heading__{{ $heading_style }} {{ $text_background_colour ? 'container' : '' }}">{{ $text }}</{{ $heading_semantics }}>
    @endif
</div>