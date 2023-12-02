<?php get_header(); ?>
<section class="slider">
  <div class="flexslider">
    <ul class="slides">
      <?php
      for ($i = 1; $i < 4; $i++) :
        $slider_page[$i] = get_theme_mod('set_slider_' . $i);
        $slider_btn_text[$i] = get_theme_mod('set_slider_btn_text' . $i);
        $slider_btn_url[$i] = get_theme_mod('set_slider_btn_url' . $i);
      endfor;

      $args = array(
        'post_type' => 'page',
        'post_per_page' => 3,
        'post__in' => $slider_page,
        'orderby' => 'post__in',
      );

      $slider_loop = new WP_Query($args);

      $j = 1;
      if ($slider_loop->have_posts()) :
        while ($slider_loop->have_posts()) :
          $slider_loop->the_post();
      ?>
          <li>
            <?php the_post_thumbnail('tshirt_grind_slider', array('class' => 'img-fluid')); ?>
            <div class="container banner-container">
              <div class="slider-content">
                <h1><?php the_title(); ?></h1>
                <a href="<?php echo $slider_btn_url[$j]; ?>" class="link"><button class="btn btn-primary btn-lg border border-light"><?php echo $slider_btn_text[$j]; ?></button></a>
              </div>
            </div>
          </li>
      <?php
          $j++;
        endwhile;
        wp_reset_postdata();
      endif; ?>
    </ul>
  </div>
</section>
<section id="home-features" class="d-none d-sm-block bg-light py-4">
  <div class="container">
    <div class="row row-cols-3">
      <div class="col">
        <div class="row">
          <div class="col-1">
            <i class="fas fa-truck-fast"></i>
          </div>
          <div class="col-11">
            <h4 class="fw-bold">
              Free Shipping
            </h4>
            <p class="fs-4">
              From all orders over $100
            </p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="row">
          <div class="col-1">
            <i class="fas fa-shield-halved"></i>
          </div>
          <div class="col-11">
            <h4 class="fw-bold">
              Secure Shopping
            </h4>
            <p class="fs-4">
              PayPal secure payment gateway
            </p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="row">
          <div class="col-1">
            <i class="fas fa-compass-drafting"></i>
          </div>
          <div class="col-11">
            <h4 class="fw-bold">
              Custom Design
            </h4>
            <p class="fs-4">
              Design customisation available
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- START class_exists for woocommerce -->
<?php if (class_exists('woocommerce')) : ?>
  <section id="best-sellers">
    <div class="container">
      <h2 class="section-title">Best Sellers</h2>
      <?php
      $bestsellers_limit = get_theme_mod('set_bestsellers_max_num', 4);
      $bestsellers_col = get_theme_mod('set_bestsellers_max_col', 4);
      $bestsellers_skus = get_theme_mod('set_bestsellers_skus', "COS002,SCI001,SCI003,GEE002");
      ?>
      <?php echo do_shortcode('[products limit=" ' . $bestsellers_limit . ' " columns=" ' . $bestsellers_col . ' " skus=" ' . $bestsellers_skus . ' " best_selling="true"]'); ?>
    </div>
  </section>
  <section id="top-categories">
    <div class="container mx-auto">
      <h2 class="section-title">Featured Categories</h2>
      <?php
      $top_categories_limit = get_theme_mod('set_top_categories_max_num', 4);
      $top_categories_col = get_theme_mod('set_top_categories_max_col', 4);
      $top_categories_ids = get_theme_mod('set_top_category_ids', "16,25,29");
      ?>
      <?php echo do_shortcode('[product_categories limit=" ' . $top_categories_limit . ' " columns=" ' . $top_categories_col . ' " ids=" ' . $top_categories_ids . ' " number="0" parent="0" ]'); ?>
    </div>
  </section>
<?php endif; ?>
<!-- END class_exists for woocommerce -->
<section class="blog">
  <div class="container">
    <div class="section-title">
      <h2><?php echo get_theme_mod('set_blog_title', 'Latest Blogs'); ?></h2>
    </div>
    <div class="row">
      <?php
      $args = array(
        'post_type' => 'post',
        'posts_per_page' => 2,
      );

      $blog_posts = new WP_Query($args);

      // if there are any posts
      if ($blog_posts->have_posts()) {
        // load posts loop
        while ($blog_posts->have_posts()) {
          $blog_posts->the_post(); ?>
          <article class="col-12 col-md-6 p-5 shadow bg-body-tertiary rounded">
            <a href="<?php the_permalink(); ?>">
              <?php
              if (has_post_thumbnail()) :
                the_post_thumbnail('tshirt_grind_blog', array('class' => 'img-fluid'));
              endif;
              ?>
            </a>
            <h3>
              <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
              </a>
            </h3>
            <div class="excerpt"><?php the_excerpt(); ?></div>
          </article>
      <?php }
        wp_reset_postdata();
      } ?>
    </div>
  </div>
</section>
<?php get_footer(); ?>