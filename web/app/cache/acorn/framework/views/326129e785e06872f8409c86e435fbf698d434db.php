<?php switch($type):
    case ('donate'): ?>
        <?php
            $donationsLink = get_field('donation_link', 'options');
            // Deconstruct $donationsLink
            $link = $donationsLink['url'];
            $text = $donationsLink['title'];
            $target = $donationsLink['target'] ? $donationsLink['target'] : '_self';
        ?>
        <a class="button button--donate button--<?php echo e($colour); ?>" href="<?php echo e($link); ?>">
            <?php echo e($text); ?>

            <span class="visually-hidden">Link to donate</span>
        </a>
    <?php break; ?>

    <?php case ('header'): ?>
        <?php
            $donationsLink = get_field('donation_link', 'options');
            // Deconstruct $donationsLink
            $link = $donationsLink['url'];
            $text = $donationsLink['title'];
            $target = $donationsLink['target'] ? $donationsLink['target'] : '_self';
        ?>
        <a class="button button--header" href="<?php echo e($link); ?>">
            <?php echo e($text); ?>

            <span class="visually-hidden">Link to donate</span>
        </a>
    <?php break; ?>

    <?php default: ?>
        <a class="button button--primary button--<?php echo e($colour); ?>" href="<?php echo e($link); ?>"><?php echo e($text); ?></a>
<?php endswitch; ?>
<?php /**PATH /Users/elliehobbs/Documents/Personal-dev/play-it-forward/play_it_forward/web/app/themes/sage/resources/views/partials/button.blade.php ENDPATH**/ ?>