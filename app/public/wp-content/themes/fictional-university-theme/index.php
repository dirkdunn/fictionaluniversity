<?php 
    get_header();
    while(have_posts()) {
        the_post();
        echo '<h2><a href="', the_permalink(),'">', the_title(), '</a></h2>';
        echo '<p>', the_content(), '</p>';
        echo '<hr>';
    }
    get_footer();
 ?>
