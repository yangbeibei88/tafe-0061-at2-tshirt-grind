<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo("charset"); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <!-- <title>T-Shirt Grind</title> -->
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <div id="page" class="site">
    <header id="header" class="py-3 shadow-sm sticky-md-top">
      <div class="container">
        <div class="row justify-content-between align-items-center">
          <div class="navbar-brand text-center text-lg-start col-4 order-1 order-lg-0">
            <a href="<?php echo site_url(); ?>">
              <?php if (has_custom_logo()) {
                the_custom_logo();
              } else {; ?>
                <img src="<?php echo get_theme_file_uri("./images/logo.svg"); ?>" alt="tshirt-grind-logo" id="logo" width="65">
              <?php }; ?>
            </a>
          </div>
          <nav class="navbar navbar-expand-lg col-3 col-md-6 header-main-menu order-0 order-lg-1 fw-medium" role="navigation">
            <!-- <div class="container"> -->
            <button class="navbar-toggler my-auto ms-4" type="button" data-bs-toggle="offcanvas" data-bs-target="#header-primary-menu" aria-controls="header-primary-menu" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="header-primary-menu" aria-labelledby="offcanvasHeaderPrimaryMenu">
              <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasHeaderPrimaryMenu">T-Shirt Grind</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>
              <!-- <div class="offcanvas-body"> -->
              <?php wp_nav_menu(array(
                "theme_location" => "tshirt_grind_header_main_menu",
                "depth" => 2,
                "container" => "div",
                "container_class" => "offcanvas-body",
                "container_id" => "header-primary-menu",
                "menu_class" => "nav navbar-nav"
              )); ?>
              <!-- </div> -->
            </div>
            <!-- </div> -->
          </nav>
          <?php if (class_exists('woocommerce')) {
            $wc_login_page_id = 200;
            $wc_register_page_id = 197;; ?>

            <div class="user-cart col-5 col-md-3 order-last">
              <!-- <div class="navbar-expand">
                <ul class="navbar-nav float-left"> -->
              <?php if (is_user_logged_in()) {; ?>
                <div class="dropdown text-center">
                  <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="icon-text">
                      <i class="fas fa-user"></i>
                      <p>My Account</p>
                    </div>
                  </a>
                  <ul class="dropdown-menu fs-4">
                    <li>
                      <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>" class="dropdown-item">View My Account</a>
                    </li>
                    <li>
                    <li>
                      <hr class="dropdown-divider">
                    </li>
                    <a href="<?php
                              echo esc_url(wp_logout_url(get_permalink())); ?>" class="dropdown-item">Logout</a>
                    </li>
                  </ul>
                </div>
              <?php } else {; ?>

                <a href="<?php echo esc_url(get_permalink($wc_login_page_id)); ?>" title="login" class="d-flex flex-column align-items-center justify-content-center">
                  <div class="icon-text">
                    <i class="fas fa-right-to-bracket"></i>
                    <p>Login / Register</p>
                  </div>
                </a>

              <?php }; ?>
              <!-- </ul>
              </div> -->

              <a href="<?php echo wc_get_cart_url(); ?>" class="d-flex flex-column align-items-center justify-content-center">
                <div class="cart icon-text">
                  <i class="fas fa-cart-shopping"></i>
                  <p>Cart</p>
                </div>
                <span class="cart-contents fs-5 text-center"><?php echo WC()->cart->get_cart_contents_count(); ?> <?php echo WC()->cart->get_cart_contents_count() == "1" ? "item" : "items"; ?> <?php echo WC()->cart->get_cart_total(); ?></span>
              </a>
            </div>
          <?php }; ?>
        </div>
      </div>
    </header>