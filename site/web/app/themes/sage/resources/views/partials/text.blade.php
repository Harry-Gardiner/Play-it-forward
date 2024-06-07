<div class="text flow">
    @if(isset($title))
        <h2 class="text__title">{{ $title }}</h2>
    @endif
    @if(isset($text))
        {!! $text !!}
    @endif
</div>