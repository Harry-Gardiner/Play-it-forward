@extends('layouts.app')

@section('content')
  {{-- @include('partials.page-header') --}}

  @if (! have_posts())
    
      <div class="error-404 full-bleed block-padding">
        <div class="error-404__circle">
          <p class="h1">404</p>
          <p class="h2">Sorry, page not found</p>
        </div>
      </div>
      <div class="home-button block-padding--bottom">
        @include('partials.button', [
          'type' => 'button',
          'link' => '/',
          'text' => 'Back to home',
          'colour' => 'bg-raspberry',
            ])
      </div>
  @endif
@endsection
