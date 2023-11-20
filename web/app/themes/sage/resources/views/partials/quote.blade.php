<div class="two-column-quote">
    @if(isset($text))
        <p class="two-column-quote__{{ $style }}">{!! $text !!}</p>
        @if(isset($author))
            <p class="quote__author">{!! $author !!}</p>
        @endif
    @endif
</div>