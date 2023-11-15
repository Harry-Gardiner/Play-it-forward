<div class="{{ $block->classes }}">
    @if(isset($text))
        <p class="quote__{{ $style }}">{!! $text !!}</p>
        @if(isset($author))
            <p class="quote__author">{!! $author !!}</p>
        @endif

    @endif
</div>