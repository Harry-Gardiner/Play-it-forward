<?php
    $facebook = get_field('facebook_link', 'option');
    $instagram = get_field('instagram_link', 'option');
    $twitter = get_field('twitter_link', 'option');
    $youtube = get_field('youtube_link', 'option');
    $linkedin = get_field('linkedin_link', 'option');

    $footer_columns = get_field('footer_columns', 'option');
    $show_newsletter = get_field('show_newsletter_signup', 'option');
    $newsletter_shortcode = get_field('newsletter_shortcode', 'option');
?>

<footer class="footer">
    <div class="footer__top full-bleed">
        <div class="container block-padding--top">
            <div class="footer__upper">
                <?php echo $__env->make('partials.button', [
                    'type' => 'donate',
                    'link' => 'https://www.google.co.uk',
                    'text' => 'Donate',
                    'colour' => 'raspberry',
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="footer__social">
                    <?php if($facebook != ''): ?>
                        <a href=<?php echo e($facebook); ?> target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                    <?php endif; ?>
                    <?php if($instagram != ''): ?>
                        <a href=<?php echo e($instagram); ?>target="_blank"><i class="fa-brands fa-instagram"></i></a>
                    <?php endif; ?>
                    <?php if($twitter != ''): ?>
                        <a href=<?php echo e($twitter); ?> target="_blank"><i class="fa-brands fa-twitter"></i></a>
                    <?php endif; ?>
                    <?php if($youtube != ''): ?>
                        <a href=<?php echo e($youtube); ?> target="_blank"><i class="fa-brands fa-youtube"></i></a>
                    <?php endif; ?>
                    <?php if($linkedin != ''): ?>
                        <a href=<?php echo e($linkedin); ?> target="_blank"><i class="fa-brands fa-linkedin"></i></i></a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="footer__middle">
                <?php if($footer_columns): ?>
                    <div class="footer__columns-wrapper">
                        <?php $__currentLoopData = $footer_columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="footer__column">
                                <h3><?php echo e($column['footer_column_title']); ?></h3>
                                <?php $__currentLoopData = $column['column_links']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e($link['column_link']['url']); ?>"><?php echo e($link['column_link']['title']); ?></a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php if($show_newsletter): ?>
                            <div class="footer__newsletter">
                                <h3>Get the newsletter</h3>
                                <div class="footer__newsletter__form">
                                    <?php echo do_shortcode($newsletter_shortcode); ?>

                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="footer__lower full-bleed">
                <p>©
                    <?php echo e(date('Y')); ?> site & design by
                    <a href="https://github.com/Harry-Gardiner" target="_blank" class="footer__lower link">Harry</a>
                    and <a href="https://github.com/Nelboh" class="footer__lower link">Ellie</a>
                </p>
            </div>
        </div>
    </div>
</footer>
<button id="backToTopBtn" class="hide"><span>&#8593;</span>back<br> to top</button>
<?php /**PATH /Users/elliehobbs/Documents/Personal-dev/play-it-forward/play_it_forward/web/app/themes/sage/resources/views/sections/footer.blade.php ENDPATH**/ ?>