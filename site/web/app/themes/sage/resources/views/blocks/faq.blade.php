@php
    // Wrapper
    $wrapper = $wrapper ?? null;
    $spacing_size = $spacing_size ?? null;

    // Background
    $background_colour = $background_colour ?? 'white';
@endphp

<section
    class="faq full-bleed {{ $wrapper ? $wrapper : '' }} {{ $spacing_size ? $spacing_size : '' }} bg--{{ $background_colour }}">
    <div class="block-padding container">
        <div class="container">
            @if (isset($title_style) && $title_style['title'] !== '')
                @include('partials.title', [$title_style])
            @endif

            @if (!empty($body))
                <div class="faq__intro flow">
                    {!! $body !!}
                </div>
            @endif
        </div>

        @if (!empty($faqs))
            <div class="faq__list">
                @foreach ($faqs as $faq)
                    @if (!empty($faq['question']))
                        <details class="faq__item" @if (!empty($faq['open'])) open @endif>
                            <summary class="faq__question">
                                {{ $faq['question'] }}
                                <span class="faq__toggle" aria-hidden="true"></span>
                            </summary>
                            @if (!empty($faq['answer']))
                                <div class="faq__answer">
                                    {!! $faq['answer'] !!}
                                </div>
                            @endif
                        </details>
                    @endif
                @endforeach
            </div>
        @endif
    </div>
</section>
