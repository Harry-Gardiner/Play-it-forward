<?php
    $header_style;
    
    function is_blog()
    {
        return (is_author() || is_category() || is_tag() || is_date() || is_home() || is_single()) && 'post' == get_post_type();
    }

    $header_style = 'header--default';
    
    if (!is_front_page()) {
        $header_style = 'header--blog';
        $btn_colour = 'white';
    } 

    $banner = get_field('info-banner-content', 'options');
?>
<?php echo $__env->make('partials.banner', ['content' => $banner], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<header class="header full-bleed <?php echo e($header_style); ?> header__transparent-start">
    <div class="header__wrapper">
        <?php echo $__env->make('partials.logo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="header__wrapper__nav">
            <div class="header__wrapper__nav__inner">
                <?php if(has_nav_menu('primary_navigation')): ?>
                    <nav class="nav" role="navigation" aria-label="<?php _e('Main Menu', 'textdomain'); ?>">
                        <?php echo wp_nav_menu([
                            'theme_location' => 'primary_navigation',
                            'container' => false,
                            'menu_class' => 'main-navigation',
                            'items_wrap' => '<ul id="%1$s" class="%2$s" role="menubar">%3$s</ul>',
                        ]); ?>

                    </nav>
                <?php endif; ?>
                <div class="header__buttons">
                    <?php echo $__env->make('partials.button', ['type' => 'header'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <button class="hamb <?php echo e($header_style); ?>"><span class="hamb-line"></span><span
                            class="visually-hidden">Toggle
                            Menu</span></button>
                </div>
            </div>
        </div>
    </div>
</header>
<?php /**PATH /Users/elliehobbs/Documents/Personal-dev/play-it-forward/play_it_forward/web/app/themes/sage/resources/views/sections/header.blade.php ENDPATH**/ ?>