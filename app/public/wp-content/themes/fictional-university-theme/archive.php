<?php get_header(); ?>
<div class="page-banner">
    <div
        class="page-banner__bg-image"
        style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg') ?>);">
    </div>
    <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title">
      <?php the_archive_title() ?>
      <?php
        // more custom
        // if (is_category()) {
        //   echo single_cat_title();
        // }
        // elseif (is_author()) {
        //   echo 'Posts by '; the_author();
        // }
      ?>
      </h1>
      <div class="page-banner__intro">
        <p><?php the_archive_description() ?></p>
      </div>
    </div>  
  </div>
  <div class="container container--narrow page-section">
  <?php
    while(have_posts()) {
      the_post();
  ?>
    <div class="post-item">
      <h2 class="headline headline--medium headline--post-title">
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
      </h2>
      <div class="metabox">
        <p>
          <?php
          echo "Posted by ",
          the_author_posts_link(),
          " on ",
          the_time('g:ia n.j.y'),
          " in ",
          get_the_category_list(', ');
          ?>
        </p>
      </div>
      <div class="generic-content">
        <!-- the_excerpt() returns a shortened version of the blog post -->
        <?php the_excerpt(); ?>
        <p>
          <a class="btn btn--blue" href="<?php the_permalink() ?>">
            Continue Reading &raquo;
          </a>
        </p>
      </div>
    </div>
  <?php } ?>
  <?php  echo paginate_links(); ?>
  </div>
<?php get_footer(); ?>