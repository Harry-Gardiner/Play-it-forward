{{-- <header class="header full-bleed">
    <div class="header__wrapper">
        <a class="logo" href="{{ home_url('/') }}">
            <img src="{{ asset('images/logo_white.svg') }}" alt="Play it forward logo">
            <p>play it <span class="strong">forward</span></p>
        </a>
    
        <input class="drop-menu" type="checkbox" id="drop-menu" />
        <label class="hamb" for="drop-menu"><span class="hamb-line"></span></label>
   
        @if (has_nav_menu('primary_navigation'))
            <nav class="nav" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
                {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'menu', 'walker' => new App\AWP_Menu_Walker(), 'echo' => false]) !!}
            </nav>
        @endif
    </div>  
</header> --}}

<header class="header full-bleed">
    <div class="header__wrapper container">
        <a class="logo" href="{{ home_url('/') }}">
            <div class="logo__wrapper">
                <img src="{{ asset('images/logo_white.svg') }}" alt="Play it forward logo">
                <p>play it <span class="strong">forward</span></p>
            </div>
        </a>

        <button class="hamb"><span class="hamb-line"></span><span class="visually-hidden">Toggle Menu</span></button>

        @if (has_nav_menu('primary_navigation'))
            <nav class="nav container" role="navigation" aria-label="<?php _e('Main Menu', 'textdomain'); ?>">
                {!! wp_nav_menu([
                    'theme_location' => 'primary_navigation',
                    'container' => false,
                    'menu_class' => 'main-navigation flow',
                    'items_wrap' => '<ul id="%1$s" class="%2$s" role="menubar">%3$s</ul>',
                ]) !!}
            </nav>
            {{-- <nav class="nav__mobile container" role="navigation" aria-label="<?php _e('Main Menu', 'textdomain'); ?>">
                {!! wp_nav_menu([
                    'theme_location' => 'primary_navigation',
                    'container' => false,
                    'menu_class' => 'main-navigation',
                    'items_wrap' => '<ul id="%1$s" class="%2$s" role="menubar">%3$s</ul>',
                ]) !!}
            </nav> --}}
        @endif
    </div>
</header>
