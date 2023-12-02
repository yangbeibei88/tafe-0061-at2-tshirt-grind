<?php

/**
 * The template for displaying archive pages
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Tshirt Grind
 */
get_header(); ?>

<main>
  <div class="container">
    <div class="col-lg-9 col-md-8 col-12">
      <div class="row">
        <?php
        the_archive_title('<h1 class="article-title">', '</h1>');
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
      <?php get_sidebar(); ?>
    </div>
  </div>
</main>
<?php get_footer(); ?>