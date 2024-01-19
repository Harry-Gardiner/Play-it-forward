<section class="<?php echo e($block->classes); ?> flow timeline--<?php echo e($items['theme'] ? $items['theme'] : 'light'); ?>">

  <div class="<?php echo e($block->classes); ?>__scroll-prompt">
    <p class="<?php echo e($block->classes); ?>__prompt-text">Scroll</p>
    <img src="<?php echo e(asset('images/pif_down-arrow-off-white.svg')); ?>" class="<?php echo e($block->classes); ?>__prompt-arrow" alt="Down arrow icon"/>
  </div>

  <?php if(isset($items['title'])): ?>
    <h2 class="<?php echo e($block->classes); ?>__top-title"><?php echo e($items['title']); ?></h2>
  <?php endif; ?>

  <div class="<?php echo e($block->classes); ?>__timeline-wrapper">
    <div class="<?php echo e($block->classes); ?>__timeline-line"></div>

    <div class="<?php echo e($block->classes); ?>__cards-wrapper">
      <?php $__currentLoopData = $items['timeline']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
          $year = isset($card['year']) ? $card['year'] : '';
          $split_year = str_split($year, 2);
        ?>

        <div class="<?php echo e($block->classes); ?>__card <?php echo e(!empty($card['year']) ? '' : $block->classes . '__card--no-year'); ?>">
          <?php if(isset($card['year'])): ?>
            <h3 class="<?php echo e($block->classes); ?>__year-container">
              <?php $__currentLoopData = $split_year; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $digits): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($loop->first): ?>
                  <span class="<?php echo e($block->classes); ?>__year">
                    <?php echo e($digits); ?>

                  </span>
                <?php else: ?>
                  <span class="<?php echo e($block->classes); ?>__year <?php echo e($block->classes); ?>__year--red">
                    <?php echo e($digits); ?>

                  </span>
                <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </h3>
          <?php endif; ?>

          <div class="<?php echo e($block->classes); ?>__card-contents">
            <?php if(isset($card['title'])): ?>
              <h3 class="<?php echo e($block->classes); ?>__card-title"><?php echo e($card['title']); ?></h3>
            <?php endif; ?>


            <?php if(isset($card['body'])): ?>
              <p class="<?php echo e($block->classes); ?>__card-body"><?php echo $card['body']; ?></p>
            <?php endif; ?>

            <?php if(isset($card['image'])): ?>
              
              
              
            <?php endif; ?>

            <?php if(isset($card['link'])): ?>
              <a href="<?php echo e($card['link']['url']); ?>" class="<?php echo e($block->classes); ?>__card-link"><?php echo e($card['link']['title']); ?></a>
            <?php endif; ?>

            <?php if($card['add_banner'] && $card['add_banner'] == true): ?>
              <div class="<?php echo e($block->classes); ?>__card-banner <?php echo e($block->classes); ?>__card-banner--<?php echo e($items['theme']); ?> flow">
                <div class="<?php echo e($block->classes); ?>__card-banner-text-wrapper">
                  <div class="<?php echo e($block->classes); ?>__card-banner-text">
                    <p><?php echo e($card['banner_text']); ?>

                    </p>
                    <img src="<?php echo e(asset('images/pif_right-arrow-off-white.svg')); ?>" class="<?php echo e($block->classes); ?>__prompt-arrow" alt="Down arrow icon"/>
                  </div>
                  
                </div>
                <a href="<?php echo e($card['banner_link']['url']); ?>" class="<?php echo e($block->classes); ?>__card-link"><?php echo e($card['banner_link']['title']); ?></a>
              </div>
            <?php endif; ?>
          </div>
        </div>
    
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
  </div>
</section>

<?php /**PATH /Users/elliehobbs/Documents/Personal-dev/play-it-forward/play_it_forward/web/app/themes/sage/resources/views/blocks/timeline.blade.php ENDPATH**/ ?>