<?php

/**
 * The main template file
 * 
 * This is the most generic template file in WP classic theme
 * and one of the two required files for a theme (the other being style.css)
 * It is used to display a page when nothing more specific matches a query.
 * e.g. it pushs together the home page when no home.php file exists.
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Tshirt Grind
 */
get_header(); ?>

<main>
  <div class="container">
    <div class="breadcrumb"><?php tshirt_grind_breadcrumb(); ?></div>
  </div>
  <div class="container">

    <div class="row">
      <div class="col-lg-9 col-md-8 col-12">
        <?php
        // if there are any posts
        if (have_posts()) {

          // load posts loop
          while (have_posts()) {
            the_post(); ?>
            <article <?php post_class(); ?>>
              <h2>
                <a href="<?php the_permalink(); ?>">
                  <?php the_title(); ?>
                </a>
              </h2>
              <div class="post-thumbnail">
                <a href="<?php the_permalink(); ?>">
                  <?php
                  if (has_post_thumbnail()) :
                    the_post_thumbnail('tshirt_grind_blog', array('class' => 'img-fluid'));
                  endif;
                  ?>
                </a>
              </div>
              <div class="meta">
                <p>Published by <?php the_author_posts_link(); ?> on <?php echo get_the_date(); ?>
                  <br />
                  <?php if (has_category()) : ?>
                    Categories: <span><?php the_category(' '); ?></span>
                  <?php endif; ?>
                  <br />
                  <?php if (has_tag()) : ?>
                    Tags: <span><?php the_tags('', ', '); ?></span>
                  <?php endif; ?>
                </p>
              </div>
              <div><?php the_excerpt(); ?></div>

            </article>
        <?php  }
        } ?>
      </div>
      <!-- <aside class="col-lg-3 col-md-4 col-12 h-100"> -->
      <?php get_sidebar(); ?>
      <!-- </aside> -->
    </div>
  </div>
</main>
<?php get_footer(); ?>