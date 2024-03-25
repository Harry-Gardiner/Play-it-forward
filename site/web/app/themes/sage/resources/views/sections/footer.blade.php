@php
    $facebook = get_field('facebook_link', 'option');
    $instagram = get_field('instagram_link', 'option');
    $twitter = get_field('twitter_link', 'option');
    $youtube = get_field('youtube_link', 'option');
    $linkedin = get_field('linkedin_link', 'option');

    $footer_columns = get_field('footer_columns', 'option');
    $show_newsletter = get_field('show_newsletter_signup', 'option');
    $newsletter_shortcode = get_field('newsletter_shortcode', 'option');
@endphp

<footer class="footer">
    <div class="footer__top full-bleed">
        <div class="container block-padding--top">
            <div class="footer__upper">
                @include('partials.button', [
                    'type' => 'donate',
                    'link' => 'https://www.google.co.uk',
                    'text' => 'Donate',
                    'colour' => 'raspberry',
                ])
                <div class="footer__social">
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
            </div>

            <div class="footer__middle">
                @if ($footer_columns)
                    <div class="footer__columns-wrapper">
                        @foreach ($footer_columns as $column)
                            <div class="footer__column">
                                <h3>{{ $column['footer_column_title'] }}</h3>
                                @foreach ($column['column_links'] as $link)
                                    <a href="{{ $link['column_link']['url'] }}">{{ $link['column_link']['title'] }}</a>
                                @endforeach
                            </div>
                        @endforeach

                        @if ($show_newsletter)
                            <div class="footer__newsletter">
                                {{-- <h3>Get the newsletter</h3> --}}
                                <div class="footer__newsletter__form">
                                    {!! do_shortcode($newsletter_shortcode) !!}
                                </div>
                            </div>
                        @endif
                    </div>
                @endif
            </div>

            <div class="footer__banner full-bleed"></div>

            <div class="footer__lower full-bleed">
                <p>©
                    {{ date('Y') }} site & design by
                    <a href="https://github.com/Harry-Gardiner" target="_blank" class="footer__lower link">Harry</a>
                    and <a href="https://github.com/Nelboh" class="footer__lower link">Ellie</a>
                </p>
            </div>
        </div>
    </div>
</footer>
<button id="backToTopBtn" class="hide" aria-label="Back to top"><span>&#8593;</span>back<br> to top</button>
