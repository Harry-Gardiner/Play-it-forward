<section class="two-column-content two-column-content__align-{{ $align_layout ? $align_layout : 'middle' }}">
    @foreach([1, 2] as $i)
        @if(isset(${'content_'.$i}))
            <div class="two-column-content__column-{{ $i }}">
                @if(${'content_'.$i} === 'text')
                    @include('partials.text', ['text' => ${'text_'.$i}])
                @elseif(${'content_'.$i} === 'quote')
                    @include('partials.quote', ['text' => ${'quote_'.$i}, 'author' => ${'author_'.$i}, 'style' => ${'style_'.$i}])
                @elseif(${'content_'.$i} === 'image')
                    @include('partials.image', ['image' => ${'image_'.$i}])
                @elseif(${'content_'.$i} === 'video')
                    @include('partials.video', ['video_url' => ${'video_url_'.$i}])
                @endif
            </div>
        @endif
    @endforeach
</section>