<?php
    switch ($background_colour) {
        case 'yellow':
            $button_colour = 'bg-yellow';
            break;

        case 'dark-green':
            $button_colour = 'bg-green';
            break;

        case 'raspberry':
            $button_colour = 'bg-raspberry';
            break;

        case 'charcoal':
            $button_colour = 'white';
            break;

        default:
            $button_colour = 'bg-raspberry';
            break;
    }
    if ($form_type === 'newsletter') {
        $newsletter_shortcode = get_field('newsletter_shortcode', 'option');
    }
?>
<section
    class="form-block full-bleed <?php echo e($wrapper ? $wrapper : ''); ?> <?php echo e($spacing_size ? $spacing_size : ''); ?> bg--<?php echo e($background_colour); ?>">
    <?php if($image): ?>
        <div class="form-block__image">
            <img src="<?php echo e($image['url']); ?>"" alt="<?php echo e($image['alt'] ? $image['alt'] : $image['name']); ?>">
            <div class="form-block__content container <?php echo e($wrapper ? $wrapper : ''); ?> block-padding">
                <div class="form-block__content__body">
                    <div class="flow">
                        <?php if($title_style['title']): ?>
                            <?php echo $__env->make('partials.title', [$title_style], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                        <?php if($body): ?>
                            <?php echo $body; ?>

                        <?php endif; ?>
                        <div class="form-block__form btn-<?php echo e($button_colour); ?>">
                            <?php if($form_type === 'newsletter'): ?>
                                <?php echo do_shortcode($newsletter_shortcode); ?>

                            <?php else: ?>
                                Other
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</section>
<?php /**PATH /Users/elliehobbs/Documents/Personal-dev/play-it-forward/play_it_forward/web/app/themes/sage/resources/views/blocks/form.blade.php ENDPATH**/ ?>