@php
    if (isset($title_style)) {
        $title = $title_style['title'];
        $heading_level = $title_style['heading_level'];
        $heading_style = $title_style['heading_style'];
    }
@endphp

@if (isset($title_style))
    <div class="title">
        <{{ $title_style['heading_level'] }} {{ $heading_style }}>
            {{ $title }}
            </{{ $title_style['heading_level'] }}>
    </div>
@endif
