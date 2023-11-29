<section class="{{ $block->classes }} {{ $wrapper ? $wrapper : '' }} {{ $spacing_size ? $spacing_size : '' }}">
    @if(isset($text))
        <p class="quote__{{ $style }}">{!! $text !!}</p>
        @if(isset($author))
            <p class="quote__author">{!! $author !!}</p>
        @endif
    @endif
</section>