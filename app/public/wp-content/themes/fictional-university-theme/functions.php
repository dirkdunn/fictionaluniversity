<!-- This file allows us to have a conversation with the WP system itself -->
<?php

    function university_files() {
        // wp_enqueue_script(str_alias, uri_location, dependencies, str_version, bool_loadatbottom);
        wp_enqueue_script(
            'main-js',
            get_theme_file_uri('/js/scripts-bundled.js'),
            // Dependencies?
            NULL,
            // Version
            microtime(),
            // '1.0.0',
            // Load at bottom of page?
            true
        );
        // wp_enqueue_style(stylesheet_alias, location_of_file, dependencies, str_version, bool_loadatbottom));
        wp_enqueue_style('style', get_stylesheet_uri(), NULL, microtime());
        wp_enqueue_style('font-awesome-css', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
        wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    }

    // add_action(at_which_moment_to_call, function_name)
    add_action('wp_enqueue_scripts','university_files');
?>