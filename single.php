<?php

/**
 * The template for displaying all single posts
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * 
 * @package Tshirt Grind
 */
get_header();
?>
<div class="breadcrumb"><?php tshirt_grind_breadcrumb(); ?></div>
<div class="content-area">
  <main>
    <div class="container">
      <div class="col-lg-9 col-md-8 col-12">
        <div class="row">
          <?php
          while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID() ?>" <?php post_class(); ?>>
              <h1><?php the_title(); ?></h1>
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
              <div class="post-thumbnail">
                <?php
                if (has_post_thumbnail()) :
                  the_post_thumbnail('tshirt_grind_blog', array('class' => 'img-fluid'));
                endif;
                ?>
              </div>
              <div class="content">
                <?php the_content(); ?>
              </div>
            </article>
          <?php endwhile;
          ?>
        </div>
        <?php get_sidebar(); ?>
      </div>
    </div>
  </main>
</div>

<?php get_footer(); ?>