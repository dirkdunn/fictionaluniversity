<?php
// With filename single-(posttype).php, WP will automatically use this as the PHP file for
// a given posttype.
  get_header();
  the_post();
?>

<div class="page-banner">
  <div
      class="page-banner__bg-image"
      style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg') ?>);">
  </div>
  <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title"><?php the_title(); ?></h1>
      <div class="page-banner__intro">
          <p>DON'T FORGET TO REPLACE ME LATER boo</p>
      </div>
  </div>  
</div>
<div class="container container--narrow page-section">
  <div class="metabox metabox--position-up metabox--with-home-link">
      <p>
      <!-- get_permalink gets the URL to the given page ID param -->
      <!-- get_post_type_archive_link(posttypestring); returns the URL of the post type archive page. -->
      <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('program'); ?>">
          <i class="fa fa-home" aria-hidden="true"></i>
          All Programs
      </a>
      <span class="metabox__main">
      <?php echo the_title(); ?>
      </span>
      </p>
  </div>
  <div class="generic-content">
      <?php the_content();?>
  </div>
  <?php
          $today = date('Ymd');
          $homepageEvents = new WP_Query(array(
            'posts_per_page' => -1,
            'post_type' => 'event',
            // orderby meta_value says order by a custom value
            'orderby' => 'meta_value_num',
            // meta_key which field?
            'meta_key' => 'event_date',
            'order' => 'ASC',
            // Only show us posts where the event_date field is GTE to todays date.
            'meta_query' => array(
              array(
                'key' => 'event_date',
                'compare' => '>=',
                'value' => $today,
                'type' => 'numeric',
              ),
              // Only show us posts where the 'related_programs' field contains this programs.
              array(
                'key' => 'related_programs',
                'compare' => 'LIKE',
                // We want to surround the ID in quotes"" because when it tries to find arrays in the DB,
                // they are serialized, and the only way to grab the value is to wrap in quotes to it matches.
                // because the array looks like {a: "12",{B: "1200"}}
                'value' => '"' . get_the_ID() . '"',
              ),
            ),
          ));

          if($homepageEvents->have_posts()) {

          echo '<hr class="section-break">';
          echo '<h2 class="headline headline--medium" >Upcoming ', get_the_title(), ' Events</h2>';

          while ($homepageEvents->have_posts()) {
            $homepageEvents->the_post();
        ?>
        
        <div class="event-summary">
          <a class="event-summary__date t-center" href="<?php the_permalink() ?>">
            <span class="event-summary__month">
              <?php
                $eventDate = new DateTime(get_field('event_date'));
                echo $eventDate->format('M');
              ?>
            </span>
            <span class="event-summary__day">
              <?php
                echo $eventDate->format('d');
              ?>
            </span>  
          </a>
          <div class="event-summary__content">
            <h5 class="event-summary__title headline headline--tiny">
            <a href="<?php the_permalink() ?>"><?php the_title() ?></a></h5>
            <p>
            <?php
              if (has_excerpt()) {
                echo get_the_excerpt();
              }
              else {
                echo wp_trim_words(get_the_content(), 18);
              }
            ?>
              <a href="<?php the_permalink() ?>" class="nu gray">Learn more</a>
            </p>
          </div>
        </div>
        <?php }} wp_reset_postdata(); ?>
</div>
<?php get_footer(); wp_reset_postdata();?>