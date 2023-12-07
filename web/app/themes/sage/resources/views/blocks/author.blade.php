@php
    $authorID = $selected_user ?? '';

    $author = get_the_author_meta('display_name', $authorID);
    if (empty($author)) {
        $author = get_the_author_meta('first_name', $authorID);
        if (empty($author)) {
            $author = get_the_author_meta('last_name', $authorID);
            if (empty($author)) {
                $author = get_the_author_meta('user_login', $authorID);
            }
        }
    }

    $author_avatar = get_avatar_url($authorID);
    $date_posted = get_the_date();
@endphp
<section class="author {{ $wrapper ? $wrapper : '' }} {{ $spacing_size ? $spacing_size : '' }}">
    <div class="author__avatar">
        <img src="{{ $author_avatar }}" alt="{{ $author }}" />
    </div>
    <div class="author__info">
        <div class="author__name">{{ $author }}</div>
        <div class="author__date">{{ $date_posted }}</div>
    </div>
</section>
