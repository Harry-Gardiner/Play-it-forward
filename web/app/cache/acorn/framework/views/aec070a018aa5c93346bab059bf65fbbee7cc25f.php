<?php
    // Impact word
    if ($impact_word_enable === 'yes') {
        $impact = $impact_word_position;
    }
?>

<section
    class="downloads <?php echo e($wrapper ? $wrapper : ''); ?> <?php echo e($spacing_size ? $spacing_size : ''); ?> bg--<?php echo e($background_colour); ?> full-bleed">
    <div class="<?php echo e($impact_word_enable === 'yes' ? 'impact impact--' . $impact : ''); ?> block-padding container">
        <?php if($impact_word_enable === 'yes'): ?>
            <div class="impact__word"><?php echo e($impact_word); ?></div>
        <?php endif; ?>
        <div class="downloads__content">
            <?php if($title_style['title']): ?>
                <?php echo $__env->make('partials.title', [$title_style], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
            <?php if($download_grid): ?>
                <div class="downloads__grid">
                    <?php $__currentLoopData = $download_grid; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $download): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="downloads__item <?php echo e($download['download_image_orientation']); ?> flow">
                            <?php if($download['download_image']): ?>
                                <div class="downloads__image">
                                    <img src="<?php echo e($download['download_image']['sizes']['medium_large']); ?>"
                                        alt="<?php echo e($download['download_image']['alt']); ?>">
                                </div>
                            <?php endif; ?>
                            <?php if($download['title']): ?>
                                <p class="downloads__title"><?php echo e($download['title']); ?></p>
                            <?php endif; ?>
                            <?php if($download['description']): ?>
                                <p class="downloads__description"><?php echo e($download['description']); ?></p>
                            <?php endif; ?>
                            <a href="<?php echo e($download['download_file']['url']); ?>" download
                                class="downloads__link button button--primary button--download"
                                title="Download <?php echo e($download['title']); ?> in PDF format"
                                aria-label="Download <?php echo e($download['title']); ?> in PDF format">
                                Download
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php /**PATH /Users/elliehobbs/Documents/Personal-dev/play-it-forward/play_it_forward/web/app/themes/sage/resources/views/blocks/downloads.blade.php ENDPATH**/ ?>