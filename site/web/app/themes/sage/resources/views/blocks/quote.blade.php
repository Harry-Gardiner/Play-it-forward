<section class="{{ $block->classes }} {{ $wrapper ? $wrapper : '' }} {{ $spacing_size ? $spacing_size : '' }}">
    @if (isset($text))
        @php
            $variant = $variant ?? 'simple';
            $image = $image ?? null;
            $image_position = $image_position ?? 'left';
        @endphp

        @if ($variant === 'image' && !empty($image))
            <div class="quote quote--image quote--image-{{ $image_position }}">
                <div class="quote__image">
                    <img src="{{ $image['url'] }}" alt="{{ $image['alt'] ?? '' }}" />
                </div>
                <div class="quote__body">
                    <p class="quote quote__{{ $style }}"><span class="quote__mark"><span
                                class="quote__mark--before">“</span></span>{!! $text !!}<span
                            class="quote__mark"><span class="quote__mark--after">”</span></span></p>
                    @if (isset($author))
                        <p class="quote__author">{!! $author !!}</p>
                    @endif
                </div>
            </div>
        @else
            <p class="quote quote__{{ $style }}"><span class="quote__mark"><span
                        class="quote__mark--before">“</span></span>{!! $text !!}<span
                    class="quote__mark"><span class="quote__mark--after">”</span></span></p>
            @if (isset($author))
                <p class="quote__author">{!! $author !!}</p>
            @endif
        @endif
    @endif
</section>
