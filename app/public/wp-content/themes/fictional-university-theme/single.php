<?php get_header(); ?>

<div class="page-banner">
    <div
        class="page-banner__bg-image"
        style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg') ?>);">
    </div>
    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title"><?php the_title() ?></h1>
        <div class="page-banner__intro">
            <p>DON'T FORGET TO REPLACE ME LATER boo</p>
        </div>
    </div>  
</div>
<div class="container container--narrow page-section">
    <div class="metabox metabox--position-up metabox--with-home-link">
        <p>
        <!-- get_permalink gets the URL to the given page ID param -->
        <a class="metabox__blog-home-link" href="<?php echo site_url('/blog')?>">
            <i class="fa fa-home" aria-hidden="true"></i>
            Blog Home
        </a>
        <span class="metabox__main">
        <?php
          the_post();
          echo "Posted by ",
          the_author_posts_link(),
          " on ",
          the_time('g:ia n.j.y'),
          " in ",
          get_the_category_list(', ');
        ?>
        </span>
        </p>
    </div>
    <div class="generic-content">
        <?php the_content();?>
    </div>
</div>
<?php get_footer(); ?>
