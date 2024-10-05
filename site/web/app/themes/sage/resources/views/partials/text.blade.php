<div class="text flow">
    @if(isset($title))
        <h3 class="h3">{{ $title }}</h3>
    @endif
    @if(isset($text))
        {!! $text !!}
    @endif
</div>
