<a class="sr-only focus:not-sr-only absolute top-0 left-0 z-50" href="#main">
    {{ __('Skip to content') }}
</a>

@include('sections.header')

<main id="main" class="main flow">
    @yield('content')
    @include('partials.socialstab')
</main>

@hasSection('sidebar')
    <aside class="sidebar">
        @yield('sidebar')
    </aside>
@endif

@include('sections.footer')
