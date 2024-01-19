<?php if(isset($video_url)): ?>
    <?php
        $videoID = '';
        if(strpos($video_url, 'youtube') !== false) {
            parse_str( parse_url( $video_url, PHP_URL_QUERY ), $my_array_of_vars );
            $videoID = $my_array_of_vars['v'];    
        } else if(strpos($video_url, 'vimeo') !== false) {
            $videoID = substr(parse_url($video_url, PHP_URL_PATH), 1);
        }
    ?>

    <?php if(strpos($video_url, 'youtube') !== false): ?>
        <iframe src="https://www.youtube.com/embed/<?php echo e($videoID); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <?php elseif(strpos($video_url, 'vimeo') !== false): ?>
        <iframe src="https://player.vimeo.com/video/<?php echo e($videoID); ?>" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
    <?php endif; ?>
<?php endif; ?><?php /**PATH /Users/elliehobbs/Documents/Personal-dev/play-it-forward/play_it_forward/web/app/themes/sage/resources/views/partials/video.blade.php ENDPATH**/ ?>