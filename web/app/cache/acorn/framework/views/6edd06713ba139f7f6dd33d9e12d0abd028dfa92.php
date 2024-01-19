<?php
    $load_more = false;

    if ($number_of_posts == 'All') {
        $load_more = true;
        if ($impact_word_enable === 'yes') {
            $number_of_posts = 10;
        } else {
            $number_of_posts = 9;
        }
    }

    if ($featured_post_type == 'latest') {
        $args = [
            'post_type' => 'post',
            'posts_per_page' => intval($number_of_posts),
            'orderby' => 'date',
            'order' => 'DESC',
        ];
        $latest_posts = new WP_Query($args);
    }

    if ($impact_word_enable === 'yes') {
        $impact = $impact_word_position;
    }

    $background_colour = $background_colour ? $background_colour : 'white';
?>

<section
    class="featured-posts <?php echo e($wrapper ? $wrapper : ''); ?> <?php echo e($spacing_size ? $spacing_size : ''); ?> bg--<?php echo e($background_colour); ?> full-bleed">
    <div
        class="featured-posts__content container <?php echo e($impact_word_enable === 'yes' ? 'impact impact--' . $impact : ''); ?> block-padding">
        <?php if($impact_word_enable === 'yes'): ?>
            <div class="impact__word"><?php echo e($impact_word); ?></div>
        <?php endif; ?>
        <div>
            <?php if($title_style['title']): ?>
                <?php echo $__env->make('partials.title', [$title_style], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
            <?php if(isset($featured_post_type)): ?>
                <?php if($featured_post_type == 'featured'): ?>
                    <div class="featured-posts__featured">
                        <div class="cards-wrapper <?php echo e($impact_word_enable === 'yes' ? 'two-col' : 'three-col'); ?>">
                            <?php $__currentLoopData = $featured_posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo $__env->make('partials.card', ['post' => $post['post']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if($featured_post_type == 'latest'): ?>
                    <div class="featured-posts__latest">
                        <div class="cards-wrapper <?php echo e($impact_word_enable === 'yes' ? 'two-col' : 'three-col'); ?>">
                            <?php $__currentLoopData = $latest_posts->posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo $__env->make('partials.card', ['post' => $post], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="spinner"><img src="<?php echo e(asset('images/football_loading.gif')); ?>" alt="loading image"></div>
                        <?php if($load_more && $latest_posts->post_count >= $number_of_posts): ?>
                            <div class="btn__wrapper">
                                <button class="button button--primary button--raspberry" id="load-more"
                                    data-num="<?php echo e(intval($number_of_posts)); ?>"><?php echo e($load_more_text); ?></button>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php
    wp_reset_postdata();
?>
<?php /**PATH /Users/elliehobbs/Documents/Personal-dev/play-it-forward/play_it_forward/web/app/themes/sage/resources/views/blocks/featured-posts.blade.php ENDPATH**/ ?>