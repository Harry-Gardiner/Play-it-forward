<div class="two-column-quote">
    <?php if(isset($text)): ?>
        <p class="quote two-column-quote__<?php echo e($style); ?>"><span class="quote__mark"><span class="quote__mark--before">“</span></span><?php echo $text; ?><span class="quote__mark"><span class="quote__mark--after">”</span></span></p>
        <?php if(isset($author)): ?>
            <p class="two-column-quote__author"><?php echo $author; ?></p>
        <?php endif; ?>
    <?php endif; ?>
</div><?php /**PATH /Users/elliehobbs/Documents/Personal-dev/play-it-forward/play_it_forward/web/app/themes/sage/resources/views/partials/quote.blade.php ENDPATH**/ ?>