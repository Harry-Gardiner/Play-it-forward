@if(isset($video_url))
    @php
        $videoID = '';
        if(strpos($video_url, 'youtube') !== false) {
            parse_str( parse_url( $video_url, PHP_URL_QUERY ), $my_array_of_vars );
            $videoID = $my_array_of_vars['v'];    
        } else if(strpos($video_url, 'vimeo') !== false) {
            $videoID = substr(parse_url($video_url, PHP_URL_PATH), 1);
        }
    @endphp

    @if(strpos($video_url, 'youtube') !== false)
        <iframe src="https://www.youtube.com/embed/{{ $videoID }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    @elseif(strpos($video_url, 'vimeo') !== false)
        <iframe src="https://player.vimeo.com/video/{{ $videoID }}" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
    @endif
@endif