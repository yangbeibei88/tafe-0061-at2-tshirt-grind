<?php

/**
 * The template for the sidebar containing the main widget area
 * 
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#create-a-sidebar-template-file
 * @package Tshirt Grind
 */
?>

<?php if (is_active_sidebar('tshirt-grind-sidebar-1')) : ?>
  <aside class="col-lg-3 col-md-4 col-12 h-100">
    <?php dynamic_sidebar('tshirt-grind-sidebar-1'); ?>
  </aside>
<?php endif; ?>