@php
    $background_colour = $background_colour ?? 'off-white';
    $hasPublications   = !empty($publications);
    $hasAnyContent     = !empty($combined_posts) || $hasPublications;
    $showLoadMore      = ($has_more_blog ?? false) || ($has_more_news ?? false);
@endphp

<section class="news-media {{ $wrapper ?? '' }} {{ $spacing_size ?? '' }} bg--{{ $background_colour }} full-bleed">
    <div class="news-media__inner block-padding container">

        @if (!empty($title_style['title']))
            @include('partials.title', [$title_style])
        @endif

        @if ($hasAnyContent)

            {{-- Tab buttons --}}
            <div class="news-media__tabs" role="tablist" aria-label="News and media categories">
                <button class="news-media__tab is-active" data-tab="all" role="tab" aria-selected="true">
                    All
                </button>
                @if ($has_blog)
                    <button class="news-media__tab" data-tab="blog" role="tab" aria-selected="false">
                        Blog
                    </button>
                @endif
                @if ($has_news)
                    <button class="news-media__tab" data-tab="news" role="tab" aria-selected="false">
                        News
                    </button>
                @endif
                @if ($hasPublications)
                    <button class="news-media__tab" data-tab="publications" role="tab" aria-selected="false">
                        Publications
                    </button>
                @endif
            </div>

            {{-- Card grid --}}
            <div class="news-media__grid cards-wrapper three-col">

                {{-- Blog + News posts, sorted by date across both types --}}
                @foreach ($combined_posts as $item)
                    <div class="news-media__item" data-type="{{ $item['type'] }}">
                        @include('partials.card', ['post' => $item['post']])
                    </div>
                @endforeach

                {{-- Publications --}}
                @if ($hasPublications)
                    @foreach ($publications as $pub)
                        <div class="news-media__item" data-type="publications">
                            <div class="card card--publication">
                                <div class="card__banner">
                                    <img src="@asset('images/bitOfEverything.png')" alt="">
                                </div>
                                <a href="{{ $pub['publication_file']['url'] }}" target="_blank" rel="noopener noreferrer">
                                    <div class="card__image">
                                        @if (!empty($pub['publication_image']))
                                            <img
                                                src="{{ $pub['publication_image']['sizes']['medium_large'] }}"
                                                alt="{{ $pub['publication_image']['alt'] ?? $pub['publication_title'] }}"
                                            >
                                        @else
                                            <img src="{{ asset('images/placeholder.png') }}" alt="Publication cover">
                                        @endif
                                    </div>
                                    <div class="card__content">
                                        <span class="card__category card__category--publications">Publication</span>
                                        @if (!empty($pub['publication_date']))
                                            <span class="card__date">{{ $pub['publication_date'] }}</span>
                                        @endif
                                        <h3 class="card__title h4">
                                            <span>{{ $pub['publication_title'] }}</span>
                                        </h3>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>

            <p class="news-media__empty" hidden>No items found in this category.</p>

            {{-- Load more button — shown only when on Blog or News tab with more posts available --}}
            @if ($showLoadMore)
                <div class="news-media__load-more-wrapper btn__wrapper">
                    <div class="spinner news-media__spinner">
                        <img src="{{ asset('images/football_loading.gif') }}" alt="Loading">
                    </div>
                    <button
                        class="button button--primary button--raspberry news-media__load-more"
                        data-per-page="{{ $posts_per_type ?? 9 }}"
                        data-page-blog="{{ ($has_more_blog ?? false) ? 1 : 0 }}"
                        data-page-news="{{ ($has_more_news ?? false) ? 1 : 0 }}"
                        data-has-more-blog="{{ ($has_more_blog ?? false) ? 'true' : 'false' }}"
                        data-has-more-news="{{ ($has_more_news ?? false) ? 'true' : 'false' }}"
                        hidden
                    >
                        Load more
                    </button>
                </div>
            @endif

        @else
            <p>No content available yet.</p>
        @endif

    </div>
</section>

@php wp_reset_postdata(); @endphp
