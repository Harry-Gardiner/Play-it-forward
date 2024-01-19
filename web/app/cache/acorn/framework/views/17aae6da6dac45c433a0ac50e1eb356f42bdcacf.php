<div class="<?php echo e($block->classes); ?>">

  <?php if($blog_content): ?>
    <?php $__currentLoopData = $blog_content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      
      
      <?php if($content['content_type'] === 'heading'): ?>
        <h2 class=""><?php echo e($content['heading_options']['heading']); ?></h2>
      <?php endif; ?>

      
      <?php if($content['content_type'] === 'standfirst'): ?>
        <p class=""><?php echo e($content['standfirst_options']['standfirst']); ?></p>
      <?php endif; ?>

      
      <?php if($content['content_type'] === 'text'): ?>
        <div class=""><?php echo $content['text_options']['text']; ?></div>
      <?php endif; ?>

      
      
      <?php if($content['content_type'] === 'image'): ?>
        
        <img src="" alt="">
      <?php endif; ?>

      

      

      
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <?php endif; ?>
</div>
<?php /**PATH /Users/elliehobbs/Documents/Personal-dev/play-it-forward/play_it_forward/web/app/themes/sage/resources/views/blocks/content-picker.blade.php ENDPATH**/ ?>