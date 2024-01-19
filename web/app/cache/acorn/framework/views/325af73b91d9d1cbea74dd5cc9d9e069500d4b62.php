<div class="<?php echo e($block->classes); ?>">
  <?php if($items): ?>
    <ul>
      <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($item['item']); ?></li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
  <?php else: ?>
    <p><?php echo e($block->preview ? 'Add an item...' : 'No items found!'); ?></p>
  <?php endif; ?>

  <div>
    <InnerBlocks />
  </div>
</div>
<?php /**PATH /Users/elliehobbs/Documents/Personal-dev/play-it-forward/play_it_forward/web/app/themes/sage-pif/resources/views/blocks/cta-banner.blade.php ENDPATH**/ ?>