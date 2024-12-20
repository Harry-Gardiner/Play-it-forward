@php
    // Wrapper
    $wrapper = $wrapper ?? null;
    $spacing_size = $spacing_size ?? null;

    //BG
    $background_colour = $background_colour ?? 'white';
@endphp

<section class="card-row full-bleed {{ $wrapper ? $wrapper : '' }} {{ $spacing_size ? $spacing_size : '' }} bg--{{ $background_colour }}">
   <div class="block-padding container">
     <div class="container">
        @if ($title_style['title'] !== '')
            @include('partials.title', [$title_style])
        @endif
     </div>
     <div class="card-row__grid">
        @foreach ($items as $item)
            <div class="card-row__item">
                <div class="card-row__item__inner">
                    <div class="card-row__item__content flow">
                        @if ($item['image'])
                            <img class="card-row__item__image" src="{{ $item['image']['sizes']['medium_large'] }}""
                            alt="{{ $item['image']['alt'] ? $item['image']['alt'] : $item['image']['name'] }}">
                        @endif
                        <div class="card-row__item__body">
                          @if ($item['title'])
                              <h3 class="card-row__item__title">{{ $item['title'] }}</h3>
                          @endif
                          @if ($item['link'])
                              @include('partials.button', [
                              'type' => $item['type'],
                              'link' => $item['link'],
                              'text' => $item['text'],
                              'colour' => $item['btn_colour'],
                              'new_tab' => $item['new_tab'],
                              ])
                          @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
     </div>
   </div>
</section>
