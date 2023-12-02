<?php get_header(); ?>

<main>
  <div class="container">
    <div class="row">
      <?php
      if (have_posts()) :; ?>
        <div class="breadcrumb"><?php tshirt_grind_breadcrumb(); ?></div>
        <?php while (have_posts()) {
          the_post();
        ?>
          <article class="col">

            <h1><?php the_title(); ?></h1>
            <div><?php the_content(); ?></div>
          </article>
        <?php  }; ?>
      <?php endif; ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>