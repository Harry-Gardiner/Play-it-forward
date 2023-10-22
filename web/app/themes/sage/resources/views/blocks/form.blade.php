@php
    switch ($background_colour) {
        case 'yellow':
            $button_colour = 'bg-yellow';
            break;

        case 'dark-green':
            $button_colour = 'bg-green';
            break;

        case 'raspberry':
            $button_colour = 'bg-raspberry';
            break;

        case 'charcoal':
            $button_colour = 'white';
            break;

        default:
            $button_colour = 'bg-raspberry';
            break;
    }
    if ($form_type === 'newsletter') {
        $newsletter_shortcode = get_field('newsletter_shortcode', 'option');
    }
@endphp
<section
    class="form-block full-bleed {{ $wrapper ? $wrapper : '' }} {{ $spacing_size ? $spacing_size : '' }} bg--{{ $background_colour }}">
    @if ($image)
        <div class="form-block__image">
            <img src="{{ $image['url'] }}"" alt="{{ $image['alt'] ? $image['alt'] : $image['name'] }}">
            <div class="form-block__content container {{ $wrapper ? $wrapper : '' }} block-padding">
                <div class="form-block__content__body">
                    <div class="flow">
                        @include('partials.title', [$title_style])
                        {!! $body !!}
                        <div class="form-block__form btn-{{ $button_colour }}">
                            @if ($form_type === 'newsletter')
                                {!! do_shortcode($newsletter_shortcode) !!}
                            @else
                                Other
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</section>
