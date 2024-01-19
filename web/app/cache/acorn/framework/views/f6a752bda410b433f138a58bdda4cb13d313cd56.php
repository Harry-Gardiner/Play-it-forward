<?php
    // Impact word
    if ($impact_word_enable === 'yes') {
        $impact = $impact_word_position;
    }

    // Custom grid options
    $grid_type = $grid_type ? $grid_type : 'default';

    if ($grid_type === 'icons') {
        # code...
    }

    if ($grid_type === 'default') {
        # code...
    }

    // deconstruct button
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
?>

<section
    class="custom-grid <?php echo e($wrapper ? $wrapper : ''); ?> <?php echo e($spacing_size ? $spacing_size : ''); ?> bg--<?php echo e($background_colour); ?> full-bleed">
    <div class="<?php echo e($impact_word_enable === 'yes' ? 'impact impact--' . $impact : ''); ?> block-padding container">
        <?php if($impact_word_enable === 'yes'): ?>
            <div class="impact__word"><?php echo e($impact_word); ?></div>
        <?php endif; ?>
        <div class="custom-grid__content">
            <?php if($title_style['title']): ?>
                <?php echo $__env->make('partials.title', [$title_style], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
            <?php if($body): ?>
                <p class="body"><?php echo e($body); ?></p>
            <?php endif; ?>
            <?php if($items): ?>
                <div class="custom-grid__content--<?php echo e($grid_type); ?>">
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($grid_type === 'icons' && $item['icon']): ?>
                            <img class="custom-grid__icon" src=<?php echo e($item['icon']['sizes']['thumbnail']); ?>

                                alt=<?php echo e($item['icon']['alt']); ?>>
                        <?php endif; ?>
                        <?php if($grid_type === 'default'): ?>
                            <div class="custom-grid__stat">
                                <p id="custom-grid__stat__number-<?php echo e($loop->index); ?>" class="custom-grid__stat__number">
                                    <?php echo e($item['item']); ?></p>
                                <p class="custom-grid__stat__description"><?php echo e($item['description']); ?></p>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="button-container">
                    <?php if($show_button == 'yes'): ?>
                        <?php echo $__env->make('partials.button', [
                            'type' => $btn_type,
                            'link' => $btn_link,
                            'text' => $btn_text,
                            'colour' => $button_colour,
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php /**PATH /Users/elliehobbs/Documents/Personal-dev/play-it-forward/play_it_forward/web/app/themes/sage/resources/views/blocks/custom-grid.blade.php ENDPATH**/ ?>