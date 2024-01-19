<?php
    // Image
    $hero_image = $hero_image ?? null;
    $alt_text = '';
    if (is_array($hero_image) && isset($hero_image['alt'])) {
        $alt_text = $hero_image['alt'] !== '' ? $hero_image['alt'] : 'hero image';
    }
    $image_position = $hero_image_position ?? 'center center';

    // Content
    $hero_title = $hero_title ?? null;
    $highlighted_text = $highlighted_text ?? null;
    $hero_content = $hero_content ?? null;

    if ($highlighted_text && !empty($highlighted_text)) {
        foreach ($highlighted_text as $word) {
            $word = $word['text_string'];
            $hero_title = str_replace($word, '<span class="highlight">' . $word . '</span>', $hero_title);
        }
    }

    // Btn
    if ($show_button == 'yes') {
        $btn_link = $cta_button['link'] ?? null;
        $btn_text = $cta_button['text'] ?? null;
        $btn_colour = 'raspberry';
        $btn_type = $cta_button['type'] ?? null;
    }
?>
<section
    class="hero-fp full-bleed">

    <div class="hero-fp__top">
        <?php if($hero_image): ?>
            <div class="hero-fp__image">
                <img src="<?php echo e($hero_image['sizes']['2048x2048']); ?>" alt="<?php echo e($alt_text); ?>"
                    style="object-position:<?php echo e($hero_image_position); ?>">
            </div>
        <?php endif; ?>
        <?php if($hero_title): ?>
            <div class="hero-fp__title container">
                <h1 class="giant-h1"><?php echo $hero_title; ?></h1>
            </div>
        <?php endif; ?>
    </div>
    <div class="hero-fp__mid">
        <div class="container">
            <?php if($impact_text): ?>
            <div class="embla hero-fp__mid__slider">
                <div class="embla__container">
                    <?php $__currentLoopData = $impact_text; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="embla__slide hero-fp__mid__slider__item">
                        <?php echo e($item['text_string']); ?>

                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="hero-fp__bottom block-padding--bottom">
        <div class="container">
            <?php if($hero_content): ?>
            <div class="hero-fp__bottom__sub-text flow">
                <?php echo $hero_content; ?>

                <?php if($show_button == 'yes'): ?>
                    <?php echo $__env->make('partials.button', [
                        'type' => $btn_type,
                        'link' => $btn_link,
                        'text' => $btn_text,
                        'colour' => 'transparent',
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>  
</section>
<?php /**PATH /Users/elliehobbs/Documents/Personal-dev/play-it-forward/play_it_forward/web/app/themes/sage/resources/views/blocks/hero-front-page.blade.php ENDPATH**/ ?>