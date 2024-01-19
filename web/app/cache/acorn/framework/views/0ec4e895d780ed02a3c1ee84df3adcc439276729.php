<?php
    // Impact word
    if ($impact_word_enable === 'yes') {
        $impact = $impact_word_position;
    }

?>

<section class="text-with-media <?php echo e($wrapper ? $wrapper : ''); ?> <?php echo e($spacing_size ? $spacing_size : ''); ?> bg--<?php echo e($background_colour); ?> full-bleed">
    <div class="<?php echo e($impact_word_enable === 'yes' ? 'impact impact--' . $impact : ''); ?> block-padding container">
        <?php if($impact_word_enable === 'yes'): ?>
            <div class="impact__word"><?php echo e($impact_word); ?></div>
        <?php endif; ?>
        <div class="text-with-media__content">
            <?php if($title_style['title']): ?>
                <div class="text-with-media__content__title title-<?php echo e($title_align); ?>">
                    <?php echo $__env->make('partials.title', [$title_style], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            <?php endif; ?>

            <?php if($body): ?>
                <div class="text-with-media__content__body">
                    <?php echo $body; ?>

                </div>
            <?php endif; ?>

            <?php if($media_type === 'image'): ?>
                <img class="text-with-media__content__image" src=<?php echo e($image['url']); ?> alt=<?php echo e($image['alt']); ?> />
            <?php elseif($media_type === 'video'): ?>
                <div class="text-with-media__content__video embed-container">
                    <?php echo $video; ?>

                </div>
            <?php endif; ?>

        </div>
</section><?php /**PATH /Users/elliehobbs/Documents/Personal-dev/play-it-forward/play_it_forward/web/app/themes/sage/resources/views/blocks/text-with-media.blade.php ENDPATH**/ ?>