<?php

/**
 * Template overrides for Woocommerce pages
 * @link https://woo.com/document/woocommerce-theme-developer-handbook/#section-3
 * @package Tshirt Grind
 */

function tshirt_grind_wc_modify()
{
  /**
   * modify woocommerce openning and closing html tags
   * use bootstrap class
   */

  function tshirt_grind_open_container_row()
  {
    echo '<div class="container shop-content"><div class="row">';
  }

  function tshirt_grind_close_container_row()
  {
    echo '</div></div>';
  }

  add_action("woocommerce_before_main_content", "tshirt_grind_open_container_row", 5);

  add_action("woocommerce_after_main_content", "tshirt_grind_close_container_row", 5);

  // remove the main wc sidebar from its original position
  remove_action("woocommerce_sidebar", "woocommerce_get_sidebar");

  // only display sidebar in shop page
  if (is_shop() || is_product_category()) {

    function tshirt_grind_add_sidebar_tags()
    {
      echo '<div class="shop-sidebar col-lg-3 col-md-4 order-2 order-md-1">';
    }

    add_action("woocommerce_before_main_content", "tshirt_grind_add_sidebar_tags", 6);

    // add wc sidebar back
    add_action("woocommerce_before_main_content", "woocommerce_get_sidebar", 7);

    function tshirt_grind_close_sidebar_tags()
    {
      echo '</div>';
    }
    add_action("woocommerce_before_main_content", "tshirt_grind_close_sidebar_tags", 8);
  }



  // modify html tags on shop page
  function tshirt_grind_add_shop_tags()
  {
    if (is_shop() || is_product_category()) {
      echo '<div class="col-lg-9 col-md-8 order-1 order-md-2">';
    } else {
      echo '<div class="col">';
    }
  }
  add_action("woocommerce_before_main_content", "tshirt_grind_add_shop_tags", 9);

  function tshirt_grind_close_shop_tags()
  {
    echo '</div>';
  }
  add_action("woocommerce_after_main_content", "tshirt_grind_close_shop_tags", 4);

  /**--------------------------Show cart contents / total Ajax------------------------------- */

  add_filter('woocommerce_add_to_cart_fragments', 'tshirt_grind_woocommerce_header_add_to_cart_fragment');

  function tshirt_grind_woocommerce_header_add_to_cart_fragment($fragments)
  {
    global $woocommerce;

    ob_start();

?>
    <span class="cart-contents fs-5 text-center"><?php echo WC()->cart->get_cart_contents_count(); ?> <?php echo WC()->cart->get_cart_contents_count() == "1" ? "item" : "items"; ?> <?php echo WC()->cart->get_cart_total(); ?></span>
  <?php
    $fragments['span.cart-contents.fs-5'] = ob_get_clean();
    return $fragments;
  }




  /**--------------------------Add register link on login page------------------------------- */
  add_action('woocommerce_login_form_end', 'tshirt_grind_add_register_link_to_login');
  function tshirt_grind_add_register_link_to_login()
  {
    global $current_user;
    $wc_register_page_id = 197;
    echo '<div>New to T-Shirt Grind? <a href="' . get_permalink($wc_register_page_id) . '">Register here</a></div>';
  }

  /**--------------------------Add login link on register page------------------------------- */

  add_action('woocommerce_register_form_end', 'tshirt_grind_add_login_link_to_register');
  function tshirt_grind_add_login_link_to_register()
  {
    global $current_user;
    $wc_login_page_id = 200;
    echo '<div>Already have an account with T-Shirt Grind? <a href="' . get_permalink($wc_login_page_id) . '">Login here</a></div>';
  }


  /**-------------------------Separate login & Register page---------------------------- */
  // Create WC customer registration shortcode
  add_shortcode('wc_form_new_register', 'tshirt_grind_wc_separate_registration_form');

  function tshirt_grind_wc_separate_registration_form()
  {
    if (is_user_logged_in()) return '<p>You are already registered</p>';
    ob_start();
    do_action('woocommerce_before_customer_login_form');
    $html = wc_get_template_html('myaccount/form-login.php');
    $dom = new DOMDocument();
    $dom->encoding = 'utf-8';
    $dom->loadHTML(utf8_decode($html));
    $xpath = new DOMXPath($dom);
    $form = $xpath->query('//form[contains(@class,"register")]');
    $form = $form->item(0);
    echo '<div class="woocommerce">';
    echo $dom->saveXML($form);
    echo '</div>';
    wp_enqueue_script('wc-password-strength-meter');
    return ob_get_clean();
  }

  // Create WC customer login shortcode
  add_shortcode('wc_form_login', 'tshirt_grind_wc_separate_login_form');

  function tshirt_grind_wc_separate_login_form()
  {
    if (is_user_logged_in()) return '<p>You are already logged in</p>';
    ob_start();
    do_action('woocommerce_before_customer_login_form');
    woocommerce_login_form(array('redirect' => wc_get_page_permalink('myaccount')));
    return ob_get_clean();
  }

  // Optionally Redirect Login & Registration Pages to My Account Page If Customer Is Logged In
  add_action('template_redirect', 'tshirt_grind_redirect_login_registration_if_logged_in');

  function tshirt_grind_redirect_login_registration_if_logged_in()
  {
    if (is_page() && is_user_logged_in() && (has_shortcode(get_the_content(), 'wc_form_login') || has_shortcode(get_the_content(), 'wc_form_new_register'))) {
      wp_safe_redirect(wc_get_page_permalink('myaccount'));
      exit;
    }
  }

  // Redirect Logged Out Customers to home page
  // add_filter('woocommerce_logout_default_redirect_url', 'tshirt_grind_redirect_after_wc_logout');

  // function tshirt_grind_redirect_after_wc_logout()
  // {
  //   $wc_login_page_id = 200;
  //   return get_permalink($wc_login_page_id);
  // }
  add_filter('logout_url', 'tshirt_grind_redirect_after_wc_logout', 10, 2);

  function tshirt_grind_redirect_after_wc_logout($logout_url, $redirect)
  {
    return $logout_url . '&amp;redirect_to=' . home_url();
  }





  // Redirect Login user to previous page
  /** I will do this later */

  /**-------------------------Customise shop page loop item---------------------------- */

  // add sku on loop item, before title
  add_action('woocommerce_before_shop_loop_item_title', 'tshirt_grind_display_product_sku_in_loop', 10);
  function tshirt_grind_display_product_sku_in_loop()
  {
    global $product;

    if ($product && $product->get_sku()) {
      echo '<div class="tg-product-sku">' . esc_html__('SKU: ', 'tshirt-grind') . $product->get_sku() . '</div>';
    }
  }

  // add discount percentage after title
  add_action('woocommerce_after_shop_loop_item_title', 'tshirt_grind_display_product_discount_percentage_in_loop', 9);

  function tshirt_grind_display_product_discount_percentage_in_loop()
  {
    global $product;

    $is_on_sale = $product->is_on_sale();
    $is_variable = $product->is_type('variable');

    if ($is_variable) {
      $variation_prices = $product->get_variation_prices();
      $min_regular_price = min($variation_prices['regular_price']);
      $max_regular_price = max($variation_prices['regular_price']);
      $min_sale_price = min($variation_prices['sale_price']);
      $max_sale_price = max($variation_prices['sale_price']);

      // for on sale variable products, display max RRP, also styling in css (strike through, font size & color)
      if ($is_on_sale) {

        echo '<div class="tg-regular-price">' . '<del>was ' .  wc_price($max_regular_price) . '</del></div>';

        if ($min_sale_price !== $max_sale_price) {
          echo '<div class="tg-sale-price">' . wc_price($min_sale_price) . ' - ' . wc_price($max_sale_price) . ' <span class="gst-text">ex GST</span></div>';
        } else {
          echo '<div class="tg-sale-price">' . wc_price($min_sale_price) . ' <span class="gst-text">ex GST</span></div>';
        }

        // calculate & display max discount percentage
        $max_discount_percentage = 0;
        foreach ($product->get_children() as $variation_id) {
          $regular_price = (float) get_post_meta($variation_id, '_regular_price', true);
          $sale_price = (float) get_post_meta($variation_id, '_sale_price', true);

          if ($regular_price > 0 && $sale_price > 0 && $regular_price > $sale_price) {
            $discount_percentage = round((($regular_price - $sale_price) / $regular_price) * 100);
            $max_discount_percentage = max($max_discount_percentage, $discount_percentage);
          }
        }
        if ($max_discount_percentage > 0) {
          echo '<div class="tg-discount-wrapper"><span class="tg-discount-percentage">' . sprintf(esc_html__('save up to %s%%', 'tshirt-grind'), $max_discount_percentage) . '</span></div>';
        }
      } else {
        if ($min_regular_price !== $max_regular_price) {
          echo '<div class="tg-regular-price">&nbsp;</div>';
          echo '<div class="tg-sale-price">' . wc_price($min_regular_price) . ' - ' . wc_price($max_regular_price) . '<span class="gst-text">ex GST</span></div>';
          echo '<div class="tg-discount-wrapper"><span class="tg-discount-percentage0">&nbsp;</span></div>';
        } else {
          echo '<div class="tg-regular-price">&nbsp;</div>';
          echo '<div class="tg-sale-price">' . 'was ' .  wc_price($min_regular_price) . ' <span class="gst-text">ex GST</span></div>';
          echo '<div class="tg-discount-wrapper"><span class="tg-discount-percentage0">&nbsp;</span></div>';
        }
      }
    } else {


      if ($is_on_sale) {
        echo '<div class="tg-regular-price">' . '<del>was ' . wc_price($product->get_regular_price()) . '</del></div>';

        echo '<div class="tg-sale-price">' . wc_price($product->get_sale_price()) . ' <span class="gst-text">ex GST</span></div>';
        // Calculate & display non-variable products discount percentage
        $regular_price = (float) $product->get_regular_price();
        $sale_price = (float) $product->get_sale_price();
        $discount_percentage = round((($regular_price - $sale_price) / $regular_price) * 100);

        echo '<div class="tg-discount-wrapper"><span class="tg-discount-percentage">' . sprintf(esc_html__('save %s%%', 'tshirt-grind'), $discount_percentage) . '</span></div>';
      } else {
        echo '<div class="tg-regular-price">&nbsp;</div>';
        echo '<div class="tg-sale-price">' .  wc_price($product->get_regular_price()) . ' <span class="gst-text">ex GST</span></div>';
        echo '<div class="tg-discount-wrapper"><span class="tg-discount-percentage0">&nbsp;</span></div>';
      }
    }
  }


  /*------------modify product page quantity input field with plus minus button---------------*/
  add_action('woocommerce_before_add_to_cart_quantity', 'tshirt_grind_display_quantity_minus', 9);
  function tshirt_grind_display_quantity_minus()
  {
    echo '<div class="input-group qtyWrapper"><button type="button" class="minus input-group-text" >&#8722;</button>';
  }
  add_action('woocommerce_after_add_to_cart_quantity', 'tshirt_grind_display_quantity_plus', 10);
  function tshirt_grind_display_quantity_plus()
  {
    echo '<button type="button" class="plus input-group-text" >&#43;</button></div>';
  }

  add_action('wp_footer', 'tshirt_grind_add_cart_quantity_plus_minus');
  function tshirt_grind_add_cart_quantity_plus_minus()
  {
    // Only run this on the single product page
    if (!is_product()) return; ?>
    <script type="text/javascript">
      jQuery(document).ready(function($) {
        $('form.cart').on('click', 'button.plus, button.minus', function() {
          // Get current quantity values
          var qty = $(this).closest('form.cart').find('.qty');
          var val = parseFloat(qty.val());
          var max = parseFloat(qty.attr('max'));
          var min = parseFloat(qty.attr('min'));
          var step = parseFloat(qty.attr('step'));
          // Change the value if plus or minus
          if ($(this).is('.plus')) {
            if (max && (max <= val)) {
              qty.val(max);
            } else {
              qty.val(val + step);
            }
          } else {
            if (min && (min >= val)) {
              qty.val(min);
            } else if (val > 1) {
              qty.val(val - step);
            }
          }
        });
      });
    </script>
    <?php
  }

  /**---------------Display SKU below item name at cart, checkout and orders---------------------- */
  function tshirt_grind_return_sku($product)
  {
    $sku = $product->get_sku();
    if (!empty($sku)) {
      return '<p class="cart-sku">SKU: ' . $sku . '</p>';
    } else {
      return '';
    }
  }

  // add SKU under item name at cart and checkout
  add_filter('woocommerce_cart_item_name', 'tshirt_grind_sku_cart_checkout_pages', 9999, 3);

  function tshirt_grind_sku_cart_checkout_pages($item_name, $cart_item, $cart_item_key)
  {
    $product = $cart_item['data'];
    $item_name .= tshirt_grind_return_sku($product);
    return $item_name;
  }

  // add SKU under item name in orders
  add_action('woocommerce_order_item_meta_start', 'tshirt_grind_sku_thankyou_order_email_pages', 9999, 4);

  function tshirt_grind_sku_thankyou_order_email_pages($item_id, $item, $order, $plain_text)
  {
    $product = $item->get_product();
    echo tshirt_grind_return_sku($product);
  }

  /**---------------register order status--------------------- */
  add_filter('woocommerce_register_shop_order_post_statuses', 'tshirt_grind_register_custom_order_status_1');

  function tshirt_grind_register_custom_order_status_1($order_statuses)
  {
    // Status must start with "wc-"!
    $order_statuses['wc-custom-status-shipped'] = array(
      'label' => 'Shipped',
      'public' => true,
      'exclude_from_search' => false,
      'show_in_admin_all_list' => true,
      'show_in_admin_status_list' => true,
      'label_count' => _n_noop('Shipped <span class="count">(%s)</span>', 'Shipped <span class="count">(%s)</span>', 'woocommerce'),
    );
    return $order_statuses;
  }

  add_filter('wc_order_statuses', 'tshirt_grind_show_custom_order_status_single_order_dropdown_1');

  function tshirt_grind_show_custom_order_status_single_order_dropdown_1($order_statuses)
  {
    $order_statuses['wc-custom-status-shipped'] = 'Shipped';
    return $order_statuses;
  }


  /**---------------modify single product order--------------------- */
  remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
  add_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 6);

  // add ex gst to price
  add_action('woocommerce_single_product_summary', 'tshirt_grind_product_page_display_gst_after_main_price', 11);
  function tshirt_grind_product_page_display_gst_after_main_price()
  {
    echo '<span class="gst-text">ex GST</span>';
    add_action('wp_footer', 'tshirt_grind_product_page_add_gst_after_variation_price');
    function tshirt_grind_product_page_add_gst_after_variation_price()
    {

      global $product;

      $is_variable = $product->is_type('variable');
      $sku = $product->get_sku();

      // Only run this on the single product page
      if (!$is_variable) return; ?>
      <script type="text/javascript">
        jQuery(document).ready(function($) {
          $('form.variations_form').on('show_variation', function(event, variation) {
            // Check if the variation price element exists
            if ($('.woocommerce-variation-price') && $('.woocommerce-variation-price').text() !== '') {
              // Append ' ex GST' text
              $('.woocommerce-variation-price').append('<span class="gst-text"> ex GST</span>');
            }

          });
        });
      </script>
<?php
    }
  }
}

add_action("wp", "tshirt_grind_wc_modify");
