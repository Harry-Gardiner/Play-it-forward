@php
    // Wrapper
    $wrapper = $wrapper ?? null;
    $spacing_size = $spacing_size ?? null;

    //BG
    $background_colour = $background_colour ?? 'white';
@endphp

<section
    class="card-row full-bleed {{ $wrapper ? $wrapper : '' }} {{ $spacing_size ? $spacing_size : '' }} bg--{{ $background_colour }}">
    <div class="block-padding container">
        <div class="container">
            @if ($title_style['title'] !== '')
                @include('partials.title', [$title_style])
            @endif
        </div>
        <div class="card-row__grid">
            @foreach ($items as $item)
                <div class="card-row__item">
                    <div class="card-row__item__inner">
                        <div class="card-row__item__content flow">
                            @if ($item['image'])
                                @php
                                    $imgUrl = $item['image']['sizes']['full'] ?? $item['image']['url'];
                                    $imgAlt = $item['image']['alt'] ?? $item['image']['name'];
                                    $lightboxCaption = $item['image_lightbox_caption'] ?? '';
                                @endphp

                                @if (!empty($item['image_lightbox']))
                                    <a
                                        href="{{ $imgUrl }}"
                                        class="card-row__lightbox"
                                        data-title="{{ $lightboxCaption }}"
                                        aria-label="Open image in lightbox"
                                        >
                                        <img class="card-row__item__image" src="{{ $item['image']['sizes']['medium_large'] }}" alt="{{ $imgAlt }}">
                                        <span class="card-row__lightbox-overlay">
                                            <span class="card-row__lightbox-overlay-text">Open</span>
                                        </span>
                                    </a>
                                @else
                                    <img class="card-row__item__image" src="{{ $item['image']['sizes']['medium_large'] }}" alt="{{ $imgAlt }}">
                                @endif
                            @endif
                            <div class="card-row__item__body">
                                @if ($item['title'])
                                    <h3 class="card-row__item__title">{{ $item['title'] }}</h3>
                                @endif

                                @if (!empty($item['content'] ?? null))
                                    <div class="card-row__item__content-text">
                                        {!! $item['content'] !!}
                                    </div>
                                @endif

                                @if ($item['link'])
                                    @include('partials.button', [
                                        'type' => $item['type'],
                                        'link' => $item['link'],
                                        'text' => $item['text'],
                                        'colour' => $item['btn_colour'],
                                        'new_tab' => $item['new_tab'],
                                    ])
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
