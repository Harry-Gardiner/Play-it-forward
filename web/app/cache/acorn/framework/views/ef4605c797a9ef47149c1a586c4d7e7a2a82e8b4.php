<?php
    //deconstruct button
    if ($show_button == 'yes') {
        $btn_link = $cta_button['link'];
        $btn_text = $cta_button['text'];
        $btn_type = $cta_button['type'];

        if ($cta_button['btn_colour'] !== '') {
            $button_colour = $cta_button['btn_colour'];
        } else {
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
        }
    }

    // $layout switch statement
    switch ($layout) {
        case 'full':
            $layout = 'full-bleed';
            break;
        case 'contained':
            $layout = 'contained';
            break;
        default:
            $layout = 'default';
    }

?>
<section
    class="cta-wrapper <?php echo e(!$image ? $layout : 'full-bleed'); ?> <?php echo e($wrapper ? $wrapper : ''); ?> <?php echo e($spacing_size ? $spacing_size : ''); ?> bg--<?php echo e($background_colour); ?>">
    <?php if(!$image): ?>
        <div class="cta-banner">
            <div class="cta-banner__content flow container block-padding">
                <div class="flow">
                    <?php if($title_style['title']): ?>
                        <?php echo $__env->make('partials.title', [$title_style], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                    <?php if($body): ?>
                        <?php echo $body; ?>

                    <?php endif; ?>
                </div>
                <?php if($show_button == 'yes'): ?>
                    <?php echo $__env->make('partials.button', [
                        'type' => $btn_type,
                        'link' => $btn_link,
                        'text' => $btn_text,
                        'colour' => $button_colour,
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>

            </div>
        </div>
    <?php endif; ?>


    <?php if($image): ?>
        <div class="cta-banner__image">
            <img class="image--<?php echo e($image_position); ?>" src="<?php echo e($image['url']); ?>""
                alt="<?php echo e($image['alt'] ? $image['alt'] : $image['name']); ?>">
            <div
                class="cta-banner__image__content container image--<?php echo e($image_position); ?> <?php echo e($wrapper ? $wrapper : ''); ?> block-padding">
                <div class="cta-banner__image__content__body flow">
                    <div class="flow">
                        <?php if($title_style['title']): ?>
                            <?php echo $__env->make('partials.title', [$title_style], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                        <?php if($body): ?>
                            <?php echo $body; ?>

                        <?php endif; ?>
                    </div>
                    <?php if($show_button == 'yes'): ?>
                        <?php echo $__env->make('partials.button', [
                            'type' => $btn_type,
                            'link' => $btn_link,
                            'text' => $btn_text,
                            'colour' => $button_colour,
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</section>
<?php /**PATH /Users/elliehobbs/Documents/Personal-dev/play-it-forward/play_it_forward/web/app/themes/sage/resources/views/blocks/cta-banner.blade.php ENDPATH**/ ?>