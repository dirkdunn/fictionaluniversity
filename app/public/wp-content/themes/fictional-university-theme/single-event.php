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
      <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('event'); ?>">
          <i class="fa fa-home" aria-hidden="true"></i>
          Event Home
      </a>
      <span class="metabox__main">
      <?php echo the_title(); ?>
      </span>
      </p>
  </div>
  <div class="generic-content">
      <?php the_content();?>
  </div>
</div>
<?php get_footer(); wp_reset_postdata();?>