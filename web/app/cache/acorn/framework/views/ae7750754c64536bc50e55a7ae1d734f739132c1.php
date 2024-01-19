

<section class="donate <?php echo e($wrapper ? $wrapper : ''); ?> <?php echo e($spacing_size ? $spacing_size : ''); ?> bg--off-white full-bleed">
    <div class="block-padding container">
        <div class="donate__content">
            <?php if($title_style['title']): ?>
                <?php echo $__env->make('partials.title', [$title_style], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
            <?php if($body): ?>
                <?php echo $body; ?>

            <?php endif; ?>
            <div class="beacon-form" data-account="playitforward" data-form="461adf42"></div>
        </div>
    </div>
</section>
<?php /**PATH /Users/elliehobbs/Documents/Personal-dev/play-it-forward/play_it_forward/web/app/themes/sage/resources/views/blocks/donate.blade.php ENDPATH**/ ?>