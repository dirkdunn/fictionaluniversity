<?php get_header(); ?>

<?php 
    while(have_posts()) {
        the_post();
?>
 <div class="page-banner">
    <div
        class="page-banner__bg-image"
        style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg') ?>);">
    </div>
    <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title"><?php the_title() ?></h1>
      <div class="page-banner__intro">
        <p>DON'T FOREGET TO REPLACE ME LATER</p>
      </div>
    </div>  
  </div>

  <div class="container container--narrow page-section">
    <!-- breadcrumb box -->
    <?php
      // wp_get_post_parent_id returns 0 if page has no parent, otherwise, returns the parent ID of the ID param.
      $parent_page_id = wp_get_post_parent_id(get_the_ID());
      if($parent_page_id) {
    ?>
    <div class="metabox metabox--position-up metabox--with-home-link">
      <p>
        <!-- get_permalink gets the URL to the given page ID param -->
        <a class="metabox__blog-home-link" href="<?php echo get_permalink($parent_page_id)?>">
          <i class="fa fa-home" aria-hidden="true"></i>
          Back to <?php echo get_the_title($parent_page_id) ?>
        </a>
        <span class="metabox__main"><?php the_title() ?></span>
      </p>
    </div>
    <?php } ?>
    <?php
      $hasChildren = get_pages(array('child_of' => get_the_ID()));
      if ($parent_page_id or $hasChildren) { 
    ?>
    <div class="page-links">
      <h2 class="page-links__title">
        <a href="<?php echo get_permalink($parent_page_id) ?>">
          <?php echo get_the_title($parent_page_id) ?>
        </a>
      </h2>
      <ul class="min-list">
      <?php
        if ($parent_page_id) {
          $find_children_of = $parent_page_id;
        }
        else {
          $find_children_of = get_the_ID();
        }
        wp_list_pages(array(
          // Get rid of the default list title
          'title_li' => NULL,
          'child_of' => $find_children_of,
          'sort_column' => 'menu_order',
        ));
      ?>
      </ul>
    </div>
    <?php } ?>

    <div class="generic-content">
        <?php the_content() ?>
    </div>

  </div>

</div>
<?php } get_footer(); ?>