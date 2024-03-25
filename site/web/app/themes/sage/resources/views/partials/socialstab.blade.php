@php
    $facebook = get_field('facebook_link', 'option');
    $instagram = get_field('instagram_link', 'option');
    $twitter = get_field('twitter_link', 'option');
    $youtube = get_field('youtube_link', 'option');
    $linkedin = get_field('linkedin_link', 'option');

    // check if there are socials from the above
    $socials = array($facebook, $instagram, $twitter, $youtube, $linkedin);
    $socials = array_filter($socials);
    $socials = count($socials);
    $socials = $socials > 0 ? true : false;

@endphp
@if ($socials)
<aside class="socials-tab">
    <div class="socials-tab__socials">
        @if ($facebook != '')
            <a href={{ $facebook }} target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
        @endif
        @if ($instagram != '')
            <a href={{ $instagram }}target="_blank"><i class="fa-brands fa-instagram"></i></a>
        @endif
        @if ($twitter != '')
            <a href={{ $twitter }} target="_blank"><i class="fa-brands fa-twitter"></i></a>
        @endif
        @if ($youtube != '')
            <a href={{ $youtube }} target="_blank"><i class="fa-brands fa-youtube"></i></a>
        @endif
        @if ($linkedin != '')
            <a href={{ $linkedin }} target="_blank"><i class="fa-brands fa-linkedin"></i></i></a>
        @endif
    </div>
    <p class="socials-tab__text">Socials</p>
</aside>
@endif
