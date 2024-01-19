<?php
    if ($impact_word_enable === 'yes') {
        $impact = $impact_word_position;
    }
?>

<section
    class="partners <?php echo e($wrapper ? $wrapper : ''); ?> <?php echo e($spacing_size ? $spacing_size : ''); ?> bg--<?php echo e($background_colour); ?> full-bleed">
    <div
        class="partners__content container <?php echo e($impact_word_enable === 'yes' ? 'impact impact--' . $impact : ''); ?> block-padding">
        <?php if($impact_word_enable === 'yes'): ?>
            <div class="impact__word"><?php echo e($impact_word); ?></div>
        <?php endif; ?>
        <div>
            <?php if($title_style['title']): ?>
                <?php echo $__env->make('partials.title', [$title_style], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
            <?php if($body): ?>
                <div class="partners__body"><?php echo $body; ?></div>
            <?php endif; ?>
            <?php if($partners): ?>
                <div class="partners__list">
                    <?php $__currentLoopData = $partners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        <div class="partners__item">
                            <img src="<?php echo e($partner['logo']['sizes']['thumbnail']); ?>" alt="<?php echo e($partner['logo']['alt']); ?>">
                            <div class="partners__item__info">
                                <p class="h3"><?php echo e($partner['name']); ?></p>
                                <p><?php echo e($partner['description']); ?></p>
                                <?php if($partner['url']): ?>
                                    <a href="<?php echo e($partner['url']); ?>" target="_blank">
                                        <div class="arrow-container">
                                            <p>Find out more</p>
                                            <div class="arrow">
                                                <div class="arrow-line"></div>
                                                <div class="arrow-head">
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php /**PATH /Users/elliehobbs/Documents/Personal-dev/play-it-forward/play_it_forward/web/app/themes/sage/resources/views/blocks/partners.blade.php ENDPATH**/ ?>