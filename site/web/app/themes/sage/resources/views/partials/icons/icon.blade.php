@switch($icon ?? 'none')
    @case('basket')
        @include('partials.icons.basket')
    @break

    @case('padlock')
        @include('partials.icons.padlock')
    @break

    @default
        {{-- no icon --}}
@endswitch
