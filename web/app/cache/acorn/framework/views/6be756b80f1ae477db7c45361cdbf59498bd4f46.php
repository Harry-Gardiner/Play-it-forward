<?php
    $background_colour = $background_colour ? $background_colour : 'white';
?>

<?php if($people): ?>
    <section
        class="people <?php echo e($wrapper ? $wrapper : ''); ?> <?php echo e($spacing_size ? $spacing_size : ''); ?> bg--<?php echo e($background_colour); ?> full-bleed">
        <div class="people__wrapper container block-padding">
            <?php if($title_style['title']): ?>
                <?php echo $__env->make('partials.title', [$title_style], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
            <div class="people__list">
              <?php $__currentLoopData = $people; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $person): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="person flow">
                      <?php if($person['image']): ?>
                          <div class="person__image">
                              <img src="<?php echo e($person['image']['sizes']['medium_large']); ?>"
                                  alt="<?php echo e($person['image']['alt']); ?>">
                          </div>
                      <?php else: ?>
                          <div class="person__image placeholder">
                          </div>
                      <?php endif; ?>
                      <p class="person__name h3"><?php echo e($person['name']); ?></p>
                      <div class="person_bio">
                        <?php echo $person['bio']; ?>

                      </div>
                  </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH /Users/elliehobbs/Documents/Personal-dev/play-it-forward/play_it_forward/web/app/themes/sage/resources/views/blocks/people.blade.php ENDPATH**/ ?>