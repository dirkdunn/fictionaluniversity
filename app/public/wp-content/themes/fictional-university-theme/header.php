<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
      <!-- meta tag for responsive websites-->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- meta tag for charset (UTF-8, etc) -->
      <meta charset="<?php bloginfo('charset'); ?>">
      <!-- Bring in all head assets (CSS, dependencies from plugins etc.) -->
      <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
  <header class="site-header">
    <div class="container">
    <h1 class="school-logo-text float-left">
        <a href="<?php echo site_url()?>"><strong>Fictional</strong> University</a>
    </h1>
      <span class="js-search-trigger site-header__search-trigger">
          <i class="fa fa-search" aria-hidden="true"></i>
      </span>
      <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>
      <div class="site-header__menu group">
        <nav class="main-navigation">
         <!-- site_url(path_name) returns the site domain you are currently on,
            protects against multiple instances (look up) -->
          <ul>
            <!-- is_page(page_slug) returns bool, wp_get_post_parent_id(current page id)(0 means this page) -->
            <li <?php if (is_page('about-us') or wp_get_post_parent_id(0) == 15) echo 'class="current-menu-item"'; ?>>
              <a href="<?php echo site_url('/about-us')?>">About Us</a>
            </li>
            <li <?php if (get_post_type() == 'program') echo 'class="current-menu-item"'; ?>><a href="<?php echo get_post_type_archive_link('program')?>">Programs</a></li>
            <li <?php if (get_post_type() == 'event' or is_page('past-events')) echo 'class="current-menu-item"'; ?>>
              <a href="<?php echo get_post_type_archive_link('event'); ?>">Events</a>
            </li>
            <li><a href="#">Campuses</a></li>
            <li <?php if (get_post_type() == 'post') echo 'class="current-menu-item"'; ?>>
              <a href="<?php echo site_url('/blog')?>">Blog</a>
            </li>
          </ul>
          <!-- Dynamic Menu wp_nav_menu(navMenuData(array),)-->
          <?php
            // wp_nav_menu(array(
            //   'theme_location' => 'header_menu',
            // ));
          ?>
        </nav>
        <div class="site-header__util">
          <a href="#" class="btn btn--small btn--orange float-left push-right">Login</a>
          <a href="#" class="btn btn--small  btn--dark-orange float-left">Sign Up</a>
          <span class="search-trigger js-search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
        </div>
      </div>
    </div>
  </header>