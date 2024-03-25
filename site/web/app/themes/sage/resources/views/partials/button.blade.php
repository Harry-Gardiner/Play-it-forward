@switch($type)
    @case('donate')
        @php
            $donationsLink = get_field('donation_link', 'options');
            // Deconstruct $donationsLink
            $link = $donationsLink['url'];
            $text = $donationsLink['title'];
            $target = $donationsLink['target'] ? $donationsLink['target'] : '_self';
        @endphp
        <a class="button button--donate button--{{ $colour }}" href="{{ $link }}">
            {{ $text }}
            <span class="visually-hidden">Link to donate</span>
        </a>
    @break

    @case('header')
        @php
            $donationsLink = get_field('donation_link', 'options');
            // Deconstruct $donationsLink
            $link = $donationsLink['url'];
            $text = $donationsLink['title'];
            $target = $donationsLink['target'] ? $donationsLink['target'] : '_self';
        @endphp
        <a class="button button--header" href="{{ $link }}">
            {{ $text }}
            <span class="visually-hidden">Link to donate</span>
        </a>
    @break

    @case('download')
        <a class="button button--primary button--{{ $colour }}" href="{{ $link }}" download>
            {{ $text }}
            <span class="visually-hidden">Download {{ $text }}</span>
        </a>
    @break

    @default
        <a class="button button--primary button--{{ $colour }}" href="{{ $link }}">{{ $text }}</a>
@endswitch
