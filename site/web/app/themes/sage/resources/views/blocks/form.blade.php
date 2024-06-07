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
                <div class="form-block__content__body flow">
                    
                        @if ($title_style['title'])
                            @include('partials.title', [$title_style])
                        @endif
                        @if ($body)
                            <div class="form-block__body">{!! $body !!}</div>
                        @endif
                        <div class="form-block__form btn-{{ $button_colour }}">
                            <small>* indicates required</small>
                            @if ($form_type === 'newsletter')
                                {!! do_shortcode($newsletter_shortcode) !!}
                            @else
                                Other
                            @endif
                        </div>
                   
                </div>
            </div>
        </div>
    @endif
    @if (!$image)
        <div class="form-block__content container {{ $wrapper ? $wrapper : '' }} block-padding">
            <div class="form-block__default-img">
                <img src="{{ asset('images/pif_logo_white_no_chevron.png') }}"
                alt="Play it forward logo">
               </div>
            <div class="form-block__content__body--alt flow">
                
                    @if ($title_style['title'])
                        @include('partials.title', [$title_style])
                    @endif
                    @if ($body)
                        <div class="form-block__body">{!! $body !!}</div>
                    @endif
                    <div class="form-block__form btn-{{ $button_colour }}">
                        <small>* indicates required</small>
                        @if ($form_type === 'newsletter')
                            {!! do_shortcode($newsletter_shortcode) !!}
                        @else
                            @if ($form_shortcode)
                                {!! $form_shortcode !!}
                            @endif
                        @endif
                    </div>
               
            </div>
        </div>
    @endif

</section>
