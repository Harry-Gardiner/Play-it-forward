@switch($type)
    @case('secondary')
        <a class="button button--secondary button--{{ $colour }}" href="{{ $link }}">{{ $text }}</a>
    @break

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

    @default
        <a class="button button--primary button--{{ $colour }}" href="{{ $link }}">{{ $text }}</a>
@endswitch
