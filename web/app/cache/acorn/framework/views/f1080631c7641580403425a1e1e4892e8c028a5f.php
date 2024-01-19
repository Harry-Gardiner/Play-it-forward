<?php
    // Wrapper
    $wrapper = $wrapper ?? null;
    $spacing_size = $spacing_size ?? null;
    $background_colour = $background_colour ? $background_colour : 'white';

    // Image
    $hero_image = $hero_image ?? null;
    // dump($hero_image);
    $alt_text = '';
    // if (is_array($hero_image) && isset($hero_image['alt'])) {
    //     $alt_text = $hero_image['alt'] !== '' ? $hero_image['alt'] : 'hero image';
    // }
    $image_position = $hero_image_position ?? 'center center';

    // Content
    $hero_title = $hero_title ?? null;
    $hero_content = $hero_content ?? null;

    $hero_style = $hero_style ?? null;
    // dd($hero_style);

?>



<section
    class="blog-hero full-bleed <?php echo e($wrapper ? $wrapper : ''); ?> <?php echo e($spacing_size ? $spacing_size : ''); ?> bg--<?php echo e($background_colour); ?> <?php echo e($show_hero_image !== 'yes' ? 'base' : 'has-image'); ?>">
    
    <?php if($hero_title): ?>
        <div class="blog-hero__inner container">
            <div class="blog-hero__wrapper flow">
                <div class="blog-hero__title">
                    <h1 class="h1"><?php echo $hero_title; ?></h1>
                </div>
                <?php if($hero_content): ?>
                    <div><?php echo $hero_content; ?></div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if($show_hero_image == 'yes' && $hero_image): ?>
        <div class="blog-hero__image">
            <img src="<?php echo e($hero_image['url']); ?>" alt="<?php echo e($alt_text); ?>" style="object-position:<?php echo e($image_position); ?>">
        </div>
    <?php else: ?>
       <div class="blog-hero__image--base">
        <img src="<?php echo e(asset('images/pif_logo_lrg_white.png')); ?>"
        alt="Play it forward logo">
       </div>
    <?php endif; ?>
    </section><?php /**PATH /Users/elliehobbs/Documents/Personal-dev/play-it-forward/play_it_forward/web/app/themes/sage/resources/views/blocks/hero.blade.php ENDPATH**/ ?>