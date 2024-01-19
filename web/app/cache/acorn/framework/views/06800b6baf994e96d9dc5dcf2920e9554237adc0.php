<?php
    // Wrapper
    $wrapper = $wrapper ?? null;
    $spacing_size = $spacing_size ?? null;

    // Image
    if ($show_hero_image == 'yes') {
        $hero_image = get_the_post_thumbnail_url(null, 'medium_large') ?? null;
        $alt_text = '';
        if ($hero_image) {
            $post_thumbnail_id = get_post_thumbnail_id();
            $alt_text = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', true);
        }
        $image_position = $hero_image_position ?? 'center center';
    }

    // Meta
    $categories = get_the_category();

    // Content
    $hero_title = get_the_title() ?? null;
?>

<header
    class="blog-hero full-bleed <?php echo e($wrapper ? $wrapper : ''); ?> <?php echo e($spacing_size ? $spacing_size : ''); ?> bg--<?php echo e($background_colour); ?> <?php echo e($show_hero_image !== 'yes' ? 'base' : 'has-image'); ?>">
    
    <?php if($hero_title): ?>
        <div class="blog-hero__inner container">
            <div class="blog-hero__wrapper flow">
                <div class="blog-hero__inner__content">Blog <span>|</span>
                    <?php if(!empty($categories)): ?>
                        <div class="blog-hero__inner__categories">
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span><?php echo e($category->name); ?></span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="blog-hero__title">
                    <h1 class="h1"><?php echo $hero_title; ?></h1>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if($show_hero_image == 'yes' && $hero_image): ?>
        <div class="blog-hero__image">
            <img src="<?php echo e($hero_image); ?>" alt="<?php echo e($alt_text); ?>" style="object-position:<?php echo e($hero_image_position); ?>">
        </div>
    <?php else: ?>
       <div class="blog-hero__image--base">
        <img src="<?php echo e(asset('images/pif_logo_lrg_white.png')); ?>"
        alt="Play it forward logo">
       </div>
    <?php endif; ?>
</header>
<?php /**PATH /Users/elliehobbs/Documents/Personal-dev/play-it-forward/play_it_forward/web/app/themes/sage/resources/views/blocks/blog-hero.blade.php ENDPATH**/ ?>