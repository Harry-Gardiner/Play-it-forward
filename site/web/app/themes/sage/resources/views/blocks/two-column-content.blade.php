@php
$title_style = $title_style ?? [];
$background_colour = $background_colour ?? 'white';
@endphp
<section
    class="two-column-content__align-{{ $align_layout ? $align_layout : 'middle' }} {{ $wrapper ? $wrapper : '' }} {{ $spacing_size ? $spacing_size : '' }} full-bleed bg--{{ $background_colour }}">
    <div class="two-column-content container block-padding">
        @if (is_array($title_style) && isset($title_style['title']) && $title_style['title'] !== '')
            @include('partials.title', [$title_style])
        @endif
        <div class="two-column-content__columns">
            @foreach ([1, 2] as $i)
                @if (isset(${'content_' . $i}))
                    <div class="two-column-content__column-{{ $i }}">
                        @if (${'content_' . $i} === 'text')
                            @include('partials.text', [
                                'text' => ${'text_' . $i},
                                'title' => ${'title_' . $i},
                            ])
                        @elseif(${'content_' . $i} === 'quote')
                            @include('partials.quote', [
                                'text' => ${'quote_' . $i},
                                'author' => ${'author_' . $i},
                                'style' => ${'style_' . $i},
                            ])
                        @elseif(${'content_' . $i} === 'image')
                            @include('partials.image', ['image' => ${'image_' . $i}])
                        @elseif(${'content_' . $i} === 'video')
                            @include('partials.video', ['video_url' => ${'video_url_' . $i}])
                        @endif
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>
