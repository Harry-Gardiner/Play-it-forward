@php
$facebook = get_field('facebook_link', 'option');
$instagram = get_field('instagram_link', 'option');
$twitter = get_field('twitter_link', 'option');
$youtube = get_field('youtube_link', 'option');
$linkedin = get_field('linkedin_link', 'option');
@endphp
<footer class="footer">

    <div class="footer__top full-bleed">
        <div class="footer__top__content container">
            <div class="footer__top__col1">
                <div class="footer__logo">
                    @include('partials.logo')
                </div>
                <div class="footer__menu">
                    @if (has_nav_menu('footer_navigation'))
                    {!! wp_nav_menu(['theme_location' => 'footer_navigation', 'menu_class' => 'nav']) !!}
                    @endif
                </div>
            </div>
            <div class="footer__top__col2">
                Will contain form and icons
            </div>
    </div>
    <div class="footer__bottom full-bleed">
        <div class="footer__bottom__content container">
            <div class="footer__social">
                @if ($facebook != '')
                <a href={{ $facebook['url'] }} target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                @endif
                @if ($instagram != '')
                <a href={{ $instagram['url' ] }}target="_blank"><i class="fa-brands fa-instagram"></i></a>
                @endif
                @if ($twitter != '')
                <a href={{ $twitter['url'] }} target="_blank"><i class="fa-brands fa-twitter"></i></a>
                @endif
                @if ($youtube != '')
                <a href={{ $youtube['url'] }} target="_blank"><i class="fa-brands fa-youtube"></i></a>
                @endif
                @if ($linkedin != '')
                <a href={{ $linkedin['url'] }} target="_blank"><i class="fa-brands fa-linkedin"></i></i></a>
                @endif
            </div>
            <div class="footer__builders">
                <p>©
                    <script>
                        document.write(new Date().getFullYear())
                    </script> Website by
                    <a href="https://github.com/Harry-Gardiner" target="_blank">Harry</a>
                    and <a href="https://github.com/Nelboh">Ellie</a>
                </p>
            </div>
        </div>
    </div>
    </div>

    {{-- @php(dynamic_sidebar('sidebar-footer')) --}}
</footer>