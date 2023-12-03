@php
    $header_style;
    
    function is_blog()
    {
        return (is_author() || is_category() || is_tag() || is_date() || is_home() || is_single()) && 'post' == get_post_type();
    }

    $header_style = 'header--default';
    
    if (is_blog()) {
        $header_style = 'header--blog';
        $btn_colour = 'white';
    } 

    $banner = get_field('info-banner-content', 'options');
@endphp
@include('partials.banner', ['content' => $banner])
<header class="header full-bleed {{ $header_style }} header__transparent-start">
    <div class="header__wrapper">
        @include('partials.logo')

        <div class="header__wrapper__nav">
            <div class="header__wrapper__nav__inner">
                @if (has_nav_menu('primary_navigation'))
                    <nav class="nav" role="navigation" aria-label="<?php _e('Main Menu', 'textdomain'); ?>">
                        {!! wp_nav_menu([
                            'theme_location' => 'primary_navigation',
                            'container' => false,
                            'menu_class' => 'main-navigation',
                            'items_wrap' => '<ul id="%1$s" class="%2$s" role="menubar">%3$s</ul>',
                        ]) !!}
                    </nav>
                @endif
                <div class="header__buttons">
                    @include('partials.button', ['type' => 'header'])
                    <button class="hamb {{ $header_style }}"><span class="hamb-line"></span><span
                            class="visually-hidden">Toggle
                            Menu</span></button>
                </div>
            </div>
        </div>
    </div>
</header>
