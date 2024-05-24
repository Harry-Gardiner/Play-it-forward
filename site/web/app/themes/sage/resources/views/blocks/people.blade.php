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
                  <div class="person">
                      @if ($person['image'])
                          <div class="person__image">
                            @if ($person['linkedin'])
                                <div class="person__linkedin">
                                    <a href={{ $person['linkedin'] }} target="_blank"><i class="fa-brands fa-linkedin"></i></i></a>     
                                </div>    
                            @endif
                              <img src="{{ $person['image']['sizes']['medium_large'] }}"
                                  alt="{{ $person['image']['alt'] }}">
                          </div>
                      @else
                          <div class="person__image placeholder">
                          </div>
                      @endif
                      <div class="person__info">
                          <p class="person__name h3">{{ $person['name'] }}</p>
                          @if ($person['position'])
                              <p class="person__position">{{ $person['position'] }}</p>
                          @endif
                          @if ($person['bio'])
                            <div class="person__bio-prompt">
                                <p>BIO</p>
                                <img src="@asset('images/down-arrow-pif.png')" alt="arrow">
                            </div>
                            <div class="person__bio">
                                {!! $person['bio'] !!}
                            </div>
                          @endif
                      </div>
                  </div>
              @endforeach
            </div>
        </div>
    </section>
@endif
