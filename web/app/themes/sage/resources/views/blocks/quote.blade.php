<section class="{{ $block->classes }} {{ $wrapper ? $wrapper : '' }} {{ $spacing_size ? $spacing_size : '' }}">
    @if (isset($text))
        <p class="quote quote__{{ $style }}"><span class="quote__mark"><span class="quote__mark--before">“</span></span>{!! $text !!}<span class="quote__mark"><span class="quote__mark--after">”</span></span></p>
        @if (isset($author))
            <p class="quote__author">{!! $author !!}</p>
        @endif
    @endif
</section>
