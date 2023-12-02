<?php

/**
 * The template for displaying 404 pages (not found)
 * 
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 * @package Tshirt Grind
 */
get_header();
?>
<div class="content-area">
  <main>
    <div class="container">
      <div class="error-404">
        <h1>Page not found</h1>
        <p>The page you tried to reach does not exist.</p>
        <?php the_widget('WP_Widget_Recent_Posts', array(
          'title' => 'Take a look at our latest posts',
          'number' => 3
        )); ?>
      </div>
    </div>
  </main>
</div>
<?php get_footer(); ?>