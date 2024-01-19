

<?php
    $post = $post ?? null;
    $thumbnail_id = get_post_thumbnail_id($post->ID);
    $thumbnail_alt = $thumbnail_id ? get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true) : '';
?>
<div class="card">
    <a href="<?php echo e(get_permalink($post->ID)); ?>">
        <div class="card__image">
            <?php if($thumbnail_id): ?>
                <img src="<?php echo e(get_the_post_thumbnail_url($post->ID, 'large')); ?>" alt="<?php echo e($thumbnail_alt); ?>">
            <?php else: ?>
                <img src="<?php echo e(asset('images/placeholder.png')); ?>" alt="Placeholder image">
            <?php endif; ?>
        </div>
        <div class="card__content">
            <h3 class="card__title h4"><span><?php echo e($post->post_title); ?></span></h3>
        </div>
    </a>
</div>
<?php /**PATH /Users/elliehobbs/Documents/Personal-dev/play-it-forward/play_it_forward/web/app/themes/sage/resources/views/partials/card.blade.php ENDPATH**/ ?>