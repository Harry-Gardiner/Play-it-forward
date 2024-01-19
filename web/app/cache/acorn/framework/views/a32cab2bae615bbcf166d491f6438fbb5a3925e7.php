<?php
    // Impact word
    if ($impact_word_enable === 'yes') {
        $impact = $impact_word_position;
    }
?>

<section
    class="stacked-media <?php echo e($wrapper ? $wrapper : ''); ?> <?php echo e($spacing_size ? $spacing_size : ''); ?> bg--<?php echo e($background_colour); ?> full-bleed">
    <div class="<?php echo e($impact_word_enable === 'yes' ? 'impact impact--' . $impact : ''); ?> block-padding container">
        <?php if($impact_word_enable === 'yes'): ?>
            <div class="impact__word"><?php echo e($impact_word); ?></div>
        <?php endif; ?>
        <div class="stacked-media__content">
            <?php if($title_style['title']): ?>
                <?php echo $__env->make('partials.title', [$title_style], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
            <?php if($items): ?>
                <div class="stacked-media__content__column">
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($item['media_type'] === 'image'): ?>
                            <?php
                                $image_sizes = [];
                                foreach ($item['image']['sizes'] as $key => $value) {
                                    if (is_string($value)) {
                                        $image_sizes[$key] = [
                                            'url' => $value,
                                            'width' => $item['image']['sizes'][$key . '-width'],
                                        ];
                                    }
                                }
                                $srcset = [];
                                foreach ($image_sizes as $size => $data) {
                                    // Extract width and URL from the data array
                                    $width = $data['width'];
                                    $url = $data['url'];
                                    $srcset[] = $url . ' ' . $width . 'w';
                                }

                                // Convert the srcset array to a comma-separated string
                                $srcset_string = implode(', ', $srcset);
                            ?>
                            <div class="stacked-media__content--image">
                                <img class="equal-height-image" src="<?php echo e($item['image']['url']); ?>"
                                    srcset="<?php echo e($srcset_string); ?>" sizes="100vw" alt="<?php echo e($item['image']['alt']); ?>">
                            </div>
                        <?php endif; ?>
                        <?php if($item['media_type'] === 'video'): ?>
                            <div class="stacked-media__content--video embed-container">
                                <?php echo $item['video']; ?>

                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php /**PATH /Users/elliehobbs/Documents/Personal-dev/play-it-forward/play_it_forward/web/app/themes/sage/resources/views/blocks/stacked-media.blade.php ENDPATH**/ ?>