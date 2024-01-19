<?php
    if (isset($title_style)) {
        $title = $title_style['title'];
        $heading_level = $title_style['heading_level'];
        $heading_style = $title_style['heading_style'];
    }
?>

<?php if(isset($title_style)): ?>
    <div class="title">
        <<?php echo e($title_style['heading_level']); ?> class="<?php echo e($heading_style); ?>">
            <?php echo e($title); ?>

            </<?php echo e($title_style['heading_level']); ?>>
    </div>
<?php endif; ?>
<?php /**PATH /Users/elliehobbs/Documents/Personal-dev/play-it-forward/play_it_forward/web/app/themes/sage/resources/views/partials/title.blade.php ENDPATH**/ ?>