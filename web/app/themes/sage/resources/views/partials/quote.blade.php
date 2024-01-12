<div class="two-column-quote">
    @if(isset($text))
        <p class="quote two-column-quote__{{ $style }}"><span class="quote__mark"><span class="quote__mark--before">“</span></span>{!! $text !!}<span class="quote__mark"><span class="quote__mark--after">”</span></span></p>
        @if(isset($author))
            <p class="two-column-quote__author">{!! $author !!}</p>
        @endif
    @endif
</div>