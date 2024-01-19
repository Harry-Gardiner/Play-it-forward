<section class="<?php echo e($block->classes); ?> <?php echo e($wrapper ? $wrapper : ''); ?> <?php echo e($spacing_size ? $spacing_size : ''); ?>">
    <?php if(isset($text)): ?>
        <p class="quote__<?php echo e($style); ?>"><?php echo $text; ?></p>
        <?php if(isset($author)): ?>
            <p class="quote__author"><?php echo $author; ?></p>
        <?php endif; ?>
    <?php endif; ?>
</section><?php /**PATH /Users/elliehobbs/Documents/Personal-dev/play-it-forward/play_it_forward/web/app/themes/sage/resources/views/blocks/quote.blade.php ENDPATH**/ ?>