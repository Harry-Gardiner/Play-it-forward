<?php
  $num_slides = count($slides);
  $full = $full ?? 'false';
  $num_of_shown_slides = $num_of_shown_slides ?? $num_slides;

  if ($slider_type === 'slider-type-images') {
    $slider_autoplay = $slider_autoplay ?? 'false';
    $slider_ratio = $slider_ratio ?? '21:9';
    $slide_gap = $slide_gap ?? 'true';
    $slide_reveal = $slide_reveal ?? 'false';
  }
?>

<section class="carousel <?php echo e($wrapper ? $wrapper : ''); ?> <?php echo e($spacing_size ? $spacing_size : ''); ?> bg--<?php echo e($background_colour); ?> <?php echo e($full === 'true' ? 'full-bleed' : ''); ?>">
 
    <?php if($slider_type === 'slider-type-images'): ?>
        <div class="swiffy-slider <?php echo e($slider_autoplay === 'true' ? 'slider-nav-autoplay' : ''); ?> slider-nav-autopause slider-item-first-visibles slider-nav-autohide slider-nav-caretfill slider-item-ratio <?php echo e($slider_ratio); ?> <?php echo e($slide_gap === 'true' ? '' : 'slider-item-nogap'); ?> <?php echo e($slide_reveal === 'true' ? 'slider-item-reveal' : ''); ?> slider-item-show<?php echo e($num_of_shown_slides); ?>">
    <?php endif; ?>
  
    <?php if($slider_type === 'slider-type-icons'): ?>
        <div class="swiffy-slider slider-item-show<?php echo e($num_of_shown_slides); ?> slider-nav-outside slider-indicators-dark slider-indicators-outside slider-indicators-round slider-nav-dark slider-nav-sm slider-item-snapstart slider-nav-autoplay slider-nav-autopause slider-item-ratio slider-item-ratio-contain py-3 py-lg-4" data-slider-nav-autoplay-interval="2000"">
    <?php endif; ?>

        <ul class="slider-container">
            <?php $__currentLoopData = $slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
            $image = $slide['image'];
            $title = $slide['title'];
            $subtitle = $slide['subtitle'];
            $add_text = $slide['add_text'];
            ?>
            <li>
                
    
                    <img class="slider-content__image" src="<?php echo e($image['url']); ?>" alt="<?php echo e($image['alt']); ?>">
    
                    <?php if($add_text === 'true'): ?>
                    <div class="slider-content__text flow">
                        <h3 class="h3"><?php echo e($title); ?></h2>
                            <p><?php echo e($subtitle); ?></p>
                    </div>
                    <?php endif; ?>
                
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    
        <button type="button" class="slider-nav"></button>
        <button type="button" class="slider-nav slider-nav-next"></button>
    
        <div class="slider-indicators">
            <?php if($num_slides > 1): ?>
            <?php for($i = 0; $i < $num_slides; $i++): ?> <button class="<?php echo e($i == 0 ? 'active' : ''); ?>"></button>
                <?php endfor; ?>
                <?php endif; ?>
        </div>
    </div>
  
</section><?php /**PATH /Users/elliehobbs/Documents/Personal-dev/play-it-forward/play_it_forward/web/app/themes/sage/resources/views/blocks/carousel.blade.php ENDPATH**/ ?>