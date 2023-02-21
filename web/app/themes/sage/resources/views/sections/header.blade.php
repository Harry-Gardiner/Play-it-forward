<header class="header full-bleed">
    <div class="header__wrapper">
        <a class="logo" href="{{ home_url('/') }}">
            <img src="{{ asset('images/logo_white.svg') }}" alt="Play it forward logo">
            <p>play it <strong>forward</strong></p>
        </a>
    
        <input class="drop-menu" type="checkbox" id="drop-menu" />
        <label class="hamb" for="drop-menu"><span class="hamb-line"></span></label>
   
        @if (has_nav_menu('primary_navigation'))
            <nav class="nav" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
                {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'menu', 'walker' => new App\AWP_Menu_Walker(), 'echo' => false]) !!}
            </nav>
        @endif
    </div>  
</header>




{{-- <header class="header full-bleed">
    <div class="header__wrapper">
        <a class="logo" href="{{ home_url('/') }}">
            <div class="logo__wrapper">
                <img src="{{ asset('images/logo_white.svg') }}" alt="Play it forward logo">
                <p>play it <strong>forward</strong></p>
            </div>
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
