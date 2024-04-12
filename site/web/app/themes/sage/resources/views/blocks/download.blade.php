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

case 'off-white':
$button_colour = 'bg-yellow';
break;

default:
$button_colour = 'bg-raspberry';
break;
}

// $layout switch statement
switch ($layout) {
case 'full':
$layout = 'full-bleed';
break;
default:
$layout = 'default';
}
@endphp
<section
    class="download {{ $layout ?? 'full-bleed' }}  {{ $wrapper ? $wrapper : '' }} {{ $spacing_size ? $spacing_size : '' }} bg--{{ $background_colour }}">
    @if ($download_image)
    <div class="download__wrapper block-padding container flow">
        <div class="download__content flow">
            <div>
                @if ($title_style)
                @include('partials.title', [$title_style])
                @endif
                @if ($description)
                <p>{{ $description }}</p>
                @endif
            </div>
            <div class="download__btn--desktop">
                @include('partials.button', [
                'type' => 'download',
                'link' => $download_file['url'],
                'text' => 'Read now',
                'colour' => $button_colour,
                ])
            </div>
        </div>

        <img class="download__image" src="{{ $download_image['url'] }}""
            alt=" {{ $download_image['alt'] ? $download_image['alt'] : $download_image['name'] }}">
        @if ($download_file)
        <div class="download__btn--mobile">
            @include('partials.button', [
            'type' => 'download',
            'link' => $download_file['url'],
            'text' => 'Read now',
            'colour' => $button_colour,
            ])
        </div>
        @endif
    </div>
    @endif
</section>