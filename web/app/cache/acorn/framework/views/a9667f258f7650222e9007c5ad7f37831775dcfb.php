<?php
    if (isset($latest_posts_type)) {
        $args = [
            'post_type' => $latest_posts_type,
            'posts_per_page' => 9,
            'orderby' => 'date',
            'order' => 'DESC',
        ];
        $latest_posts = new WP_Query($args);
    }
    // dump($background_colour);
?>

<section class="featured-posts <?php echo e($wrapper ? $wrapper : ''); ?> <?php echo e($spacing_size ? $spacing_size : ''); ?>">
    <div class="featured-posts__latest block-padding">
        <?php if($title_style['title']): ?>
            <?php echo $__env->make('partials.title', [$title_style], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <div class="cards-wrapper three-col">
            <?php $__currentLoopData = $latest_posts->posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('partials.card', ['post' => $post], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="spinner"><img src="<?php echo e(asset('images/football_loading.gif')); ?>" alt="loading image"></div>
        <?php if($latest_posts->post_count >= 9): ?>
            <div class="btn__wrapper">
                <button class="button button--primary button--raspberry" id="load-more" data-num="9">Load more</button>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php
    wp_reset_postdata();
?>
<?php /**PATH /Users/elliehobbs/Documents/Personal-dev/play-it-forward/play_it_forward/web/app/themes/sage/resources/views/blocks/archive-posts.blade.php ENDPATH**/ ?>