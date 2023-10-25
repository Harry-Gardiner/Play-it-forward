@php
    // Impact word
    if ($impact_word_enable === 'yes') {
        $impact = $impact_word_position;
    }
@endphp

<section
    class="stacked-media {{ $wrapper ? $wrapper : '' }} {{ $spacing_size ? $spacing_size : '' }} bg--{{ $background_colour }} full-bleed">
    <div class="{{ $impact_word_enable === 'yes' ? 'impact impact--' . $impact : '' }} block-padding container">
        @if ($impact_word_enable === 'yes')
            <div class="impact__word">{{ $impact_word }}</div>
        @endif
        <div class="stacked-media__content">
            @if ($title_style)
                @include('partials.title', [$title_style])
            @endif
            @if ($items)
                <div class="stacked-media__content__column">
                    @foreach ($items as $item)
                        @if ($item['media_type'] === 'image')
                            @php
                                $image_sizes = [];
                                foreach ($item['image']['sizes'] as $key => $value) {
                                    if (is_string($value)) {
                                        $image_sizes[$key] = [
                                            'url' => $value,
                                            'width' => $item['image']['sizes'][$key . '-width'],
                                        ];
                                    }
                                }
                                $srcset = [];
                                foreach ($image_sizes as $size => $data) {
                                    // Extract width and URL from the data array
                                    $width = $data['width'];
                                    $url = $data['url'];
                                    $srcset[] = $url . ' ' . $width . 'w';
                                }

                                // Convert the srcset array to a comma-separated string
                                $srcset_string = implode(', ', $srcset);
                            @endphp
                            <div class="stacked-media__content--image">
                                <img class="equal-height-image" src="{{ $item['image']['url'] }}"
                                    srcset="{{ $srcset_string }}" sizes="(min-width: 768px) 50vw, 100vw"
                                    alt="{{ $item['image']['alt'] }}">
                            </div>
                        @endif
                        @if ($item['media_type'] === 'video')
                            <div class="stacked-media__content--video embed-container">
                                {!! $item['video'] !!}
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</section>
