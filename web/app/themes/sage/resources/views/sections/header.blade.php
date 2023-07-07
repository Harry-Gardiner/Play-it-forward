<header class="header full-bleed">
    <div class="header__wrapper container">
        @include('partials.logo')

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
            @include('partials.button', ['type' => 'donate', 'colour' => 'white'])
            <button class="hamb"><span class="hamb-line"></span><span class="visually-hidden">Toggle Menu</span></button>
        </div>
    </div>
</header>
