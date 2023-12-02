<?php

/**
 * The template for the sidebar containing woo shop widget area
 * 
 * @package Tshirt Grind
 */
?>

<?php if (is_active_sidebar('tshirt-grind-sidebar-shop')) : ?>
    <aside id="sidebar-shop" class="sidebar-shop-widget">
        <?php dynamic_sidebar('tshirt-grind-sidebar-shop'); ?>
    </aside>
<?php endif; ?>