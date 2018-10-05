<!-- This file allows us to have a conversation with the WP system itself -->
<?php

    function university_files() {
        // wp_enqueue_script(str_alias, uri_location, dependencies, str_version, bool_loadatbottom);
        wp_enqueue_script(
            'main-js',
            get_theme_file_uri('/js/scripts-bundled.js'),
            // Dependencies?
            NULL,
            // Version (microtime makes it not cache)
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

    function university_features() {
        // Adds a <title> html tag to the site.
        add_theme_support('title-tag');
        // Creates a menu item under "Appreance", and registers a dynamic menu w/ wordpress.
        register_nav_menu('header_menu', 'Header Menu');
        register_nav_menu('footer_explore_menu', 'Footer Explore Menu');
        register_nav_menu('footer_learn_menu', 'Footer Learn Menu');
    }

    function adjust_event_archive_query($query) {
        $onEventsArchive = !is_admin() && is_post_type_archive('event');
        $isMainQuery = $query->is_main_query();
        // If we are on event archive page and it is the main default QP query for that page.

        if ($onEventsArchive && $isMainQuery) {
            $today = date('Ymd');
            $query->set('meta_key', 'event_date');
            $query->set('orderby', 'meta_value_num');
            $query->set('order', 'ASC');
            $query->set('meta_query', array(
                array(
                    'key' => 'event_date',
                    'compare' => '>=',
                    'value' => $today,
                    'type' => 'numeric',
                ),
            ));
        }
    }

    // add_action(at_which_moment_to_call, function_name)
    add_action('wp_enqueue_scripts','university_files');
    // add action for page title
    add_action('after_setup_theme', 'university_features');
    // Create a new post type
    add_action('init', 'university_post_types');
    // pre_get_posts hook allow us to modify queries on pages, passes $query object
    // to function on each page.
    add_action('pre_get_posts', 'adjust_event_archive_query');
?>