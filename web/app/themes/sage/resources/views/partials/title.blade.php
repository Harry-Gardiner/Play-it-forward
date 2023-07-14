@php
    if(isset($title_style)) {
        $title = $title_style['title'];
        $heading_level = $title_style['heading_level'];
        $title_colour = $title_style['colour_picker'];
    }
@endphp

@if(isset($title_style))
    <div class="title">
        <{{$title_style['heading_level']}} class="{{$title_colour}}">{{$title}}</{{$title_style['heading_level']}}>
    </div>
@endif