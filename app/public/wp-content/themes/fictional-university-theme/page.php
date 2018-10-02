<?php
    get_header();
    while(have_posts()) {
        the_post();
        echo "<h1>This is a page!</h1>";
        echo '<h2>', the_title(), '</h2>';
        echo '<p>', the_content(), '</p>';
    }
    get_footer();
 ?>