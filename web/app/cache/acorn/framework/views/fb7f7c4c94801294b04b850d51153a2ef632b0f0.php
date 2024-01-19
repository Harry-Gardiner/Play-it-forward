<?php
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
?>
<section class="author <?php echo e($wrapper ? $wrapper : ''); ?> <?php echo e($spacing_size ? $spacing_size : ''); ?>">
    <div class="author__avatar">
        <img src="<?php echo e($author_avatar); ?>" alt="<?php echo e($author); ?>" />
    </div>
    <div class="author__info">
        <div class="author__name">by <?php echo e($author); ?></div>
        <div class="author__date"><?php echo e($date_posted); ?></div>
    </div>
</section>
<?php /**PATH /Users/elliehobbs/Documents/Personal-dev/play-it-forward/play_it_forward/web/app/themes/sage/resources/views/blocks/author.blade.php ENDPATH**/ ?>