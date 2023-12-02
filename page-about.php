<?php

/**
 * The template for about page
 * 
 * 
 * @package Tshirt Grind
 */
get_header();
?>

<section class="page-header">
  <div class="page-banner-bg-image" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'tshirt_grind_page_banner'); ?>);">
    <div class="container page-banner-content">
      <div class="breadcrumb"><?php tshirt_grind_breadcrumb(); ?></div>
      <h1 class="page-banner-title"><?php the_title(); ?></h1>
    </div>
  </div>

</section>

<section id="about-content" class="py-5">
  <div class="container">
    <?php echo get_the_content(); ?>
  </div>
</section>

<?php get_footer(); ?>