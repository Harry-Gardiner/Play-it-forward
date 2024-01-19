<?php
// TODO: Delete this file before project launch
/**
 * CODE GRAVEYARD - mayebe used in future
 * Nothing in here will run.
 */

/**
* ACF Options colour palette to JSON file
*/
add_action('acf/save_post', function ($post_id) {
    if (current_user_can('administrator')) {
        // Check if the updated post is the options page
        if ($post_id == 'options') {
            $colours = get_field('pf_colour_palette', 'option');
            
            $formattedArray = [];

            foreach ($colours as $colour) {
                $formattedArray[strtolower(str_replace(" ", "-", $colour['colour_name']))] = $colour['colour'];
            }
            // Convert the colours data to JSON format
            $json_data = json_encode($formattedArray);
            
            // JSON colour file
            $file_path = get_stylesheet_directory() . '/json/colours.json';

            // Save the JSON data to the file
            file_put_contents($file_path, $json_data);
        }
    }
}, 20);

/**
 * Add custom theme colours
 */
add_action('acf/input/admin_footer', function() {
    ?>
    <script type="text/javascript">
    (function() {
        acf.addFilter('color_picker_args', function(args, field) {    
            // Get colours from colours.json
            let colours = <?php echo file_get_contents(get_stylesheet_directory() . '/json/colours.json'); ?>;
            let colourValues = Object.values(colours);
                
            args.palettes = colourValues;

            return args;
        });
    })();
    </script>
    <?php
});