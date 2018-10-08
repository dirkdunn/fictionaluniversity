<?php
    // The mu-plugins directory will make this code available to all themes, and since it's mu- and not plugins
    // it will always run and never be deactivated.

    // Make sure you go to settings -> permalinks and resave, that way wp "resets" it's permalink structure
    // and recognizes the url domain.com/posttypename etc
  function university_post_types() {
    // Adding a new "post type" outside of page.
    // Event post type
    register_post_type('event', array(
        // everyone can see it
        'supports' => array('title', 'editor', 'excerpt'),
        'rewrite' => array('slug' => 'events'),
        'has_archive' => true,
        'public' => true,
        'labels' => array(
            // Label params to customize the post type.
            'name' => 'Events',
            'add_new_item' => 'Add New Event',
            'edit_item' => 'Edit Event',
            'all_items' => 'All Events',
            'singular_name' => 'Event',
        ),
        'menu_icon' => 'dashicons-calendar',
    ));

    // Program post type
    register_post_type('program', array(
        // everyone can see it
        'supports' => array('title', 'editor'),
        'rewrite' => array('slug' => 'programs'),
        'has_archive' => true,
        'public' => true,
        'labels' => array(
            // Label params to customize the post type.
            'name' => 'Programs',
            'add_new_item' => 'Add New Program',
            'edit_item' => 'Edit Program',
            'all_items' => 'All Programs',
            'singular_name' => 'Program',
        ),
        'menu_icon' => 'dashicons-awards',
    ));
  }
?>