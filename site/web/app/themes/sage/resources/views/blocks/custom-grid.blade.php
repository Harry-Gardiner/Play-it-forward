@php
    // Impact word
    if ($impact_word_enable === 'yes') {
        $impact = $impact_word_position;
    }

    // Custom grid options
    $grid_type = $grid_type ? $grid_type : 'default';

    if ($grid_type === 'icons') {
        # code...
    }

    if ($grid_type === 'default') {
        # code...
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
    class="custom-grid {{ $wrapper ? $wrapper : '' }} {{ $spacing_size ? $spacing_size : '' }} bg--{{ $background_colour }} full-bleed">
    <div class="{{ $impact_word_enable === 'yes' ? 'impact impact--' . $impact : '' }} block-padding container">
        @if ($impact_word_enable === 'yes')
            <div class="impact__word">{{ $impact_word }}</div>
        @endif
        <div class="custom-grid__content">
            @if ($title_style['title'])
                @include('partials.title', [$title_style])
            @endif
            @if ($body)
                <p class="body">{{ $body }}</p>
            @endif
            @if ($items)
                <div class="custom-grid__content--{{ $grid_type }}">
                    @foreach ($items as $item)
                        @if ($grid_type === 'icons' && $item['icon'])
                            <img class="custom-grid__icon" src={{ $item['icon']['sizes']['thumbnail'] }}
                                alt={{ $item['icon']['alt'] }}>
                        @endif
                        @if ($grid_type === 'default')
                            <div class="custom-grid__stat">
                                <p id="custom-grid__stat__number-{{ $loop->index }}" class="custom-grid__stat__number">
                                    {{ $item['item'] }}</p>
                                <p class="custom-grid__stat__description">{{ $item['description'] }}</p>
                            </div>
                        @endif
                        @if ($grid_type === 'combined')
                            <div class="custom-grid__combined">
                                <img class="custom-grid__icon" src={{ $item['icon']['sizes']['thumbnail'] }} alt={{ $item['icon']['alt'] }}>
                                <div class="custom-grid__stat">
                                    <p id="custom-grid__stat__number-{{ $loop->index }}" class="custom-grid__stat__number">
                                        {{ $item['item'] }}</p>
                                    <p class="custom-grid__stat__description">{{ $item['description'] }}</p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="button-container">
                    @if ($show_button == 'yes')
                        @include('partials.button', [
                            'type' => $btn_type,
                            'link' => $btn_link,
                            'text' => $btn_text,
                            'colour' => $button_colour,
                        ])
                    @endif
                </div>
            @endif
        </div>
    </div>
</section>
