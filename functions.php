<?php

if (!defined('_S_VERSION')) {
  // Replace the version number of the theme on each release.
  define('_S_VERSION', '1.0.0');
}

require_once get_template_directory() . '/inc/customizer.php';

function tshirt_grind_scripts()
{
  wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.css', array(), '5.3.2', 'all');
  wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array('jquery'), '5.3.2', true);
  wp_enqueue_style('fontawesome', get_template_directory_uri() . '/css/fontawesome.css', array(), '6.4.2', 'all');
  wp_enqueue_style('main-style', get_template_directory_uri() . '/css/main.css');
  // wp_enqueue_script('jquery-js', get_template_directory_uri() . '/js/jquery.min.js', array(), '3.7.1', true);

  // flexbox Javascript and css file in inc/flexslider bolder
  wp_enqueue_style('flexslider-css', get_template_directory_uri() . '/inc/flexslider/flexslider.css', array(), '', 'all');
  wp_enqueue_script('flexslider-js', get_template_directory_uri() . '/inc/flexslider/jquery.flexslider-min.js', array('jquery'), _S_VERSION, true);

  wp_enqueue_script('main-js', get_template_directory_uri() . '/js/script.js', array('jquery'), _S_VERSION, true);
  // jquery & jquery validate
  // wp_enqueue_script('jquery-validate-js', get_template_directory_uri() . '/js/jquery.validate.min.js', array('jquery'), '1.20.0', true);
  // wp_enqueue_script('jquery-addition-methods-js', get_template_directory_uri() . '/js/additional-methods.min.js', array('jquery'), '1.20.0', true);
}

add_action('wp_enqueue_scripts', 'tshirt_grind_scripts');

function tshirt_grind_breadcrumb()
{
  echo '<a href="' . home_url() . '" rel="nofollow">Home</a>';
  if (is_category() || is_single()) {
    echo "&nbsp;&nbsp;&#47;&nbsp;&nbsp;";
    the_category(' &bull; ');
    if (is_single()) {
      echo " &nbsp;&nbsp;&#47;&nbsp;&nbsp; ";
      the_title();
    }
  } elseif (is_page()) {
    echo "&nbsp;&nbsp;&#47;&nbsp;&nbsp;";
    echo the_title();
  } elseif (is_search()) {
    echo "&nbsp;&nbsp;&#47;&nbsp;&nbsp;Search Results for... ";
    echo '"<em>';
    echo the_search_query();
    echo '</em>"';
  }
}

function tshirt_grind_config()
{
  // register menu
  register_nav_menus(
    array(
      "tshirt_grind_header_main_menu" => "Tshirt Grind Header Main Menu",
    )
  );

  // declare Woocommerce support
  add_theme_support("woocommerce", array(
    'thumbnail_image_width' => 150,
    'single_image_width'    => 250,
    'product_grid' => array(
      'default_rows'    => 3,
      'min_rows'        => 2,
      'max_rows'        => 8,
      'default_columns' => 3,
      'min_columns'     => 1,
      'max_columns'     => 3,
    )
  ));

  add_theme_support('wc-product-gallery-zoom');
  add_theme_support('wc-product-gallery-lightbox');
  add_theme_support('wc-product-gallery-slider');
  add_theme_support('custom-logo', array(
    'height' => 70,
    'width' => 70,
    'flex-height' => true,
    'flex-width' => true
  ));

  add_theme_support('post-thumbnails');

  add_theme_support('title-tag');

  // declare custom image size
  add_image_size('tshirt_grind_slider', 1200, 600, array('center', 'center'));
  add_image_size('tshirt_grind_blog', 600, 400, array('center', 'center'));
  add_image_size('tshirt_grind_page_banner', 1200, 300, array('center', 'center'));

  if (!isset($content_width)) {
    $content_width = 600;
  }
}

add_action("after_setup_theme", "tshirt_grind_config", 0);

// Only invoke wc-modifications.php when wc plugin is activated
if (class_exists('woocommerce')) {
  require get_template_directory() . '/inc/wc-modifications.php';
}



// register sidebars
add_action('widgets_init', 'tshirt_grind_sidebars');
function tshirt_grind_sidebars()
{
  register_sidebar(array(
    'name' => 'Tshirt Grind Main Sidebar',
    'id' => 'tshirt-grind-sidebar-1',
    'description' => 'Drag and drop your wdigets here',
    'before_widget' => '<div id="%1$s" class="widget %2$s widget-wrapper">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widget-title">',
    'after_title' => '</h4>',

  ));
  register_sidebar(array(
    'name' => __('Tshirt Grind Shop Sidebar', 'tshirt-grind'),
    'id' => 'tshirt-grind-sidebar-shop',
    'description' => __('Drag and drop your WooCommerce wdigets here', 'tshirt-grind'),
    'before_widget' => '<div id="%1$s" class="widget %2$s widget-wrapper">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widget-title">',
    'after_title' => '</h4>',

  ));
}

/*----------------------------------------------------*/

// disable xmlrpc
function remove_xmlrpc_methods($methods)
{
  return array();
}
add_filter('xmlrpc_methods', 'remove_xmlrpc_methods');

/**---------------------------------------------------------------- */
