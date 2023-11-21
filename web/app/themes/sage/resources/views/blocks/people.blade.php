@php
    $background_colour = $background_colour ? $background_colour : 'white';
@endphp

@if ($people)
    <section
        class="people {{ $wrapper ? $wrapper : '' }} {{ $spacing_size ? $spacing_size : '' }} bg--{{ $background_colour }} full-bleed">
        <div class="people__wrapper container block-padding">
            @if ($title_style['title'])
                @include('partials.title', [$title_style])
            @endif
            <div class="people__list">
              @foreach ($people as $person)
                  <div class="person flow">
                      @if ($person['image'])
                          <div class="person__image">
                              <img src="{{ $person['image']['sizes']['medium_large'] }}"
                                  alt="{{ $person['image']['alt'] }}">
                          </div>
                      @else
                          <div class="person__image placeholder">
                          </div>
                      @endif
                      <p class="person__name">{{ $person['name'] }}</p>
                      <div class="person_bio">
                        {!! $person['bio'] !!}
                      </div>
                  </div>
              @endforeach
            </div>
        </div>
    </section>
@endif
