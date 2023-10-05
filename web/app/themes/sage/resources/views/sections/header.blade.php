@php
    $header_style;
    
    function is_blog()
    {
        return (is_author() || is_category() || is_tag() || is_date() || is_home() || is_single()) && 'post' == get_post_type();
    }
    
    if (is_front_page()) {
        $header_style = 'header--font-page';
        $btn_colour = 'white';
    } elseif (is_blog()) {
        $header_style = 'header--blog';
        $btn_colour = 'white';
    } else {
        $header_style = 'header--default';
        $btn_colour = 'raspberry';
    }
@endphp
<header class="header full-bleed {{ $header_style }}">
    <div class="header__wrapper">
        @include('partials.logo')

        <div class="header__wrapper__nav">
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
                @include('partials.button', ['type' => 'donate', 'colour' => $btn_colour])
                <button class="hamb"><span class="hamb-line"></span><span class="visually-hidden">Toggle
                        Menu</span></button>
            </div>
        </div>
    </div>
</header>
