@php
    // Impact word
    if ($impact_word_enable === 'yes') {
        $impact = $impact_word_position;
    }

    // Custom grid options
    $grid_type = $grid_type ? $grid_type : 'default';

    if ($grid_type === 'icons') {
        # code...
        dump('icons');
    }

    if ($grid_type === 'default') {
        # code...
        dump('default');
    }

    // deconstruct button
    if ($show_button == 'yes') {
        $btn_link = $cta_button['link'];
        $btn_text = $cta_button['text'];
        $btn_type = $cta_button['type'];

        if ($cta_button['btn_colour'] !== '') {
            $button_colour = $cta_button['btn_colour'];
        } else {
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
        }
    }

@endphp

<section
    class="custom-grid {{ $wrapper ? $wrapper : '' }} {{ $spacing_size ? $spacing_size : '' }} bg--{{ $background_colour }}">
    <div class="custom-grid__content {{ $impact_word_enable === 'yes' ? 'impact impact--' . $impact : '' }}">
        @if ($impact_word_enable === 'yes')
            <div class="impact__word">{{ $impact_word }}</div>
        @endif
        <div>
            @include('partials.title', [$title])
            <p>{{ $body }}</p>
            <p>TEST</p>
        </div>
    </div>
</section>
