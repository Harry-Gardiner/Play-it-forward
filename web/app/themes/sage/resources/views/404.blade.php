@extends('layouts.app')

@section('content')
  {{-- @include('partials.page-header') --}}

  @if (! have_posts())
    
      <div class="error-404 full-bleed">
        <div class="error-404__circle">
          <p>404</p>
          <p>Sorry, page not found</p>
        </div>
      </div>

  @endif
@endsection
