

<?php if(!empty($content)): ?>
    <div class='info-banner full-bleed'>
        <span class="info-banner__icon info-banner__info-icon">
            <img src="<?php echo e(asset('images/icons/info-circle.svg')); ?>" alt="information">
        </span>
        <?php echo $content; ?>

        <button class="info-banner__close-btn info-banner__icon ">
            <img src="<?php echo e(asset('images/icons/cross-charcoal.svg')); ?>" class="info-banner__close-icon" alt="close icon"/>
            <span class="visually-hidden">Close banner</span>
        </button>
    </div>
<?php endif; ?>
<?php /**PATH /Users/elliehobbs/Documents/Personal-dev/play-it-forward/play_it_forward/web/app/themes/sage/resources/views/partials/banner.blade.php ENDPATH**/ ?>