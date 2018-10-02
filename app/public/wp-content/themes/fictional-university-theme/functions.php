<!-- This file allows us to have a conversation with the WP system itself -->
<?php

    function university_files() {
        // wp_enqueue_style(stylesheet_name, location_of_file);
        wp_enqueue_style('style', get_stylesheet_uri());
    }

    /*add_action(at_which_moment_to_call, function_name)*/
    add_action('wp_enqueue_scripts','university_files');
?>