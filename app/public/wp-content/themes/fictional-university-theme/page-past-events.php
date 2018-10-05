<?php get_header(); ?>
<div class="page-banner">
    <div
        class="page-banner__bg-image"
        style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg') ?>);">
    </div>
    <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title">
        Past Events
      </h1>
      <div class="page-banner__intro">
        <p>A recap of our past events.</p>
      </div>
    </div>  
  </div>
  <div class="container container--narrow page-section">
  <?php
    $today = date('Ymd');
    $past_events = new WP_Query(array(
      // Which page am I on? get_query_var('paged', defaultPage) grabs the number at the end of the URL,
      // Therefore making it dynamic.
      'paged' => get_query_var('paged', 1),
      // 'posts_per_page' => 1,
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
          'compare' => '<',
          'value' => $today,
          'type' => 'numeric',
        ),
      ),
    ));
    while($past_events->have_posts()) {
      $past_events->the_post();
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
          <?php echo $eventDate->format('d'); ?>
        </span>  
      </a>
      <div class="event-summary__content">
        <h5 class="event-summary__title headline headline--tiny">
        <a href="<?php the_permalink() ?>"><?php the_title() ?></a></h5>
        <p><?php echo wp_trim_words(get_the_content(), 18)?>
          <a href="<?php the_permalink() ?>" class="nu gray">Learn more</a>
        </p>
      </div>
    </div>
  <?php } ?>
  <?php
    // For custom queries, paginate_links works differently, we need
    echo paginate_links(array(
      'total'=> $past_events->max_num_pages,
    ));
  ?>
  <hr class="section-break">
  <p>Looking for current events?
    <a href="<?php echo site_url('/events')?>">Go back to our current events.</a>
  </p>
  </div>
<?php get_footer(); ?>