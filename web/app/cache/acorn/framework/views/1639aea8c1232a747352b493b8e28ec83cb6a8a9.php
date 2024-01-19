<section class="two-column-content__align-<?php echo e($align_layout ? $align_layout : 'middle'); ?> <?php echo e($wrapper ? $wrapper : ''); ?> <?php echo e($spacing_size ? $spacing_size : ''); ?>">
    <div class="two-column-content container block-padding">
        <?php $__currentLoopData = [1, 2]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(isset(${'content_'.$i})): ?>
                <div class="two-column-content__column-<?php echo e($i); ?>">
                    <?php if(${'content_'.$i} === 'text'): ?>
                        <?php echo $__env->make('partials.text', ['text' => ${'text_'.$i}], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php elseif(${'content_'.$i} === 'quote'): ?>
                        <?php echo $__env->make('partials.quote', ['text' => ${'quote_'.$i}, 'author' => ${'author_'.$i}, 'style' => ${'style_'.$i}], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php elseif(${'content_'.$i} === 'image'): ?>
                        <?php echo $__env->make('partials.image', ['image' => ${'image_'.$i}], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php elseif(${'content_'.$i} === 'video'): ?>
                        <?php echo $__env->make('partials.video', ['video_url' => ${'video_url_'.$i}], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</section><?php /**PATH /Users/elliehobbs/Documents/Personal-dev/play-it-forward/play_it_forward/web/app/themes/sage/resources/views/blocks/two-column-content.blade.php ENDPATH**/ ?>