<div class="<?php echo e($block->classes); ?> text-with-quote__<?php echo e($layout); ?>">
    <?php if(isset($quote)): ?>
        <div class="text-with-quote__quote">
            <p class="quote__<?php echo e($style); ?>"><?php echo $quote; ?></p>
            <?php if(isset($author)): ?>
                <p class="quote__author"><?php echo $author; ?></p>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <?php if(isset($text)): ?>
        <div class="text-with-quote__text"><?php echo $text; ?></div>
    <?php endif; ?>
</div><?php /**PATH /Users/elliehobbs/Documents/Personal-dev/play-it-forward/play_it_forward/web/app/themes/sage/resources/views/blocks/text-with-quote.blade.php ENDPATH**/ ?>