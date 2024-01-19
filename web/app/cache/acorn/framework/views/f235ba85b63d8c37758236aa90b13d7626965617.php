<?php $__env->startSection('content'); ?>
  

  <?php if(! have_posts()): ?>
    
      <div class="error-404 full-bleed block-padding">
        <div class="error-404__circle">
          <p class="h1">404</p>
          <p class="h2">Sorry, page not found</p>
        </div>
      </div>
      <div class="home-button block-padding--bottom">
        <?php echo $__env->make('partials.button', [
          'type' => 'button',
          'link' => '/',
          'text' => 'Back to home',
          'colour' => 'bg-raspberry',
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </div>
  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/elliehobbs/Documents/Personal-dev/play-it-forward/play_it_forward/web/app/themes/sage/resources/views/404.blade.php ENDPATH**/ ?>