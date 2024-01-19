<section class="<?php echo e($block->classes); ?> <?php echo e($wrapper ? $wrapper : ''); ?> <?php echo e($spacing_size ? $spacing_size : ''); ?>">
    <div class="button-block flow button-block--<?php echo e($btn_position); ?>">
        <?php echo $__env->make('partials.button', [
            'type' => $btn_type,
            'link' => $btn_link,
            'text' => $btn_text,
            'colour' => $btn_colour,
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</section>
<?php /**PATH /Users/elliehobbs/Documents/Personal-dev/play-it-forward/play_it_forward/web/app/themes/sage/resources/views/blocks/button-block.blade.php ENDPATH**/ ?>