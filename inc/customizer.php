<?php

/**
 * Tshirt Grind Custom Theme Customizer
 * 
 * @package Tshirt Grind
 */

function tshirt_grind_customizer($wp_customize)
{
  // copyright section
  $wp_customize->add_section(
    'sec_copyright',
    array(
      'title' => 'Copyright Setting',
      'description' => 'Copyright Section'
    )
  );

  // Field 1 - Copyright text box
  $wp_customize->add_setting(
    'set_copyright',
    array(
      'type' => 'theme_mod',
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field',
    )
  );

  $wp_customize->add_control(
    'set_copyright',
    array(
      'label' => 'Copyright',
      'description' => 'Add your copyright here',
      'section' => 'sec_copyright',
      'type' => 'text'
    )
  );

  /*------------------------------------------------------------------------------*/

  // home page settings
  $wp_customize->add_section(
    'sec_home_page',
    array(
      'title' => 'Home Page Product and Blog Setting',
      'description' => 'Home Page Section'
    )
  );

  $wp_customize->add_setting(
    'set_bestsellers_max_num',
    array(
      'type' => 'theme_mod',
      'default' => '',
      'sanitize_callback' => 'absint',
    )
  );
  $wp_customize->add_control(
    'set_bestsellers_max_num',
    array(
      'label' => 'Bestsellers Max Number',
      'description' => 'Bestsellers Max Number',
      'section' => 'sec_home_page',
      'type' => 'number'
    )
  );
  $wp_customize->add_setting(
    'set_bestsellers_max_col',
    array(
      'type' => 'theme_mod',
      'default' => '',
      'sanitize_callback' => 'absint',
    )
  );
  $wp_customize->add_control(
    'set_bestsellers_max_col',
    array(
      'label' => 'Bestsellers Max Columns',
      'description' => 'Bestsellers Max Columns',
      'section' => 'sec_home_page',
      'type' => 'number'
    )
  );
  $wp_customize->add_setting(
    'set_bestsellers_skus',
    array(
      'type' => 'theme_mod',
      'default' => '',
      'sanitize_callback' => 'wp_filter_nohtml_kses',
    )
  );
  $wp_customize->add_control(
    'set_bestsellers_skus',
    array(
      'label' => 'Bestsellers skus',
      'description' => 'Type in bestsellers skus, separated by comma',
      'section' => 'sec_home_page',
      'type' => 'text'
    )
  );
  $wp_customize->add_setting(
    'set_top_category_ids',
    array(
      'type' => 'theme_mod',
      'default' => '',
      'sanitize_callback' => 'wp_filter_nohtml_kses',
    )
  );
  $wp_customize->add_control(
    'set_top_category_ids',
    array(
      'label' => 'Category IDs',
      'description' => 'Type in Top Category IDs, separated by comma',
      'section' => 'sec_home_page',
      'type' => 'text'
    )
  );
  $wp_customize->add_setting(
    'set_top_categories_max_num',
    array(
      'type' => 'theme_mod',
      'default' => '',
      'sanitize_callback' => 'absint',
    )
  );
  $wp_customize->add_control(
    'set_top_categories_max_num',
    array(
      'label' => 'Top-Level Categories Max Number',
      'description' => 'Top-Level Categories Max Number',
      'section' => 'sec_home_page',
      'type' => 'number'
    )
  );
  $wp_customize->add_setting(
    'set_top_categories_max_col',
    array(
      'type' => 'theme_mod',
      'default' => '',
      'sanitize_callback' => 'absint',
    )
  );
  $wp_customize->add_control(
    'set_top_categories_max_col',
    array(
      'label' => 'Top-Level Categories Max Columns',
      'description' => 'Top-Level Categories Max Columns',
      'section' => 'sec_home_page',
      'type' => 'number'
    )
  );
  $wp_customize->add_setting(
    'set_blog_title',
    array(
      'type' => 'theme_mod',
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field',
    )
  );
  $wp_customize->add_control(
    'set_blog_title',
    array(
      'label' => 'Blog Section Title',
      'description' => 'Blog Section Title',
      'section' => 'sec_home_page',
      'type' => 'text'
    )
  );
  /*--------------------------------------------------------------------------------------*/
  // home slider section
  $wp_customize->add_section(
    'sec_slider',
    array(
      'title' => 'Slider Setting',
      'description' => 'Slider Section'
    )
  );
  // slider number 1
  $wp_customize->add_setting(
    'set_slider_1',
    array(
      'type' => 'theme_mod',
      'default' => '',
      'sanitize_callback' => 'absint',
    )
  );
  $wp_customize->add_control(
    'set_slider_1',
    array(
      'label' => 'Set slider 1',
      'description' => 'Set slider 1',
      'section' => 'sec_slider',
      'type' => 'dropdown-pages'
    )
  );
  // slider button text number 1
  $wp_customize->add_setting(
    'set_slider_btn_text1',
    array(
      'type' => 'theme_mod',
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field',
    )
  );
  $wp_customize->add_control(
    'set_slider_btn_text1',
    array(
      'label' => 'Button text for slider 1',
      'description' => 'Button text for slider 1',
      'section' => 'sec_slider',
      'type' => 'text'
    )
  );
  // slider url 1
  $wp_customize->add_setting(
    'set_slider_btn_url1',
    array(
      'type' => 'theme_mod',
      'default' => '',
      'sanitize_callback' => 'esc_url_raw',
    )
  );
  $wp_customize->add_control(
    'set_slider_btn_url1',
    array(
      'label' => 'URL for slider 1',
      'description' => 'URL for slider 1',
      'section' => 'sec_slider',
      'type' => 'url'
    )
  );
  // slider number 2
  $wp_customize->add_setting(
    'set_slider_2',
    array(
      'type' => 'theme_mod',
      'default' => '',
      'sanitize_callback' => 'absint',
    )
  );
  $wp_customize->add_control(
    'set_slider_2',
    array(
      'label' => 'Set slider 2',
      'description' => 'Set slider 2',
      'section' => 'sec_slider',
      'type' => 'dropdown-pages'
    )
  );
  // slider button text number 2
  $wp_customize->add_setting(
    'set_slider_btn_text2',
    array(
      'type' => 'theme_mod',
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field',
    )
  );
  $wp_customize->add_control(
    'set_slider_btn_text2',
    array(
      'label' => 'Button text for slider 2',
      'description' => 'Button text for slider 2',
      'section' => 'sec_slider',
      'type' => 'text'
    )
  );
  // slider url 2
  $wp_customize->add_setting(
    'set_slider_btn_url2',
    array(
      'type' => 'theme_mod',
      'default' => '',
      'sanitize_callback' => 'esc_url_raw',
    )
  );
  $wp_customize->add_control(
    'set_slider_btn_url2',
    array(
      'label' => 'URL for slider 2',
      'description' => 'URL for slider 2',
      'section' => 'sec_slider',
      'type' => 'url'
    )
  );
  // slider number 3
  $wp_customize->add_setting(
    'set_slider_3',
    array(
      'type' => 'theme_mod',
      'default' => '',
      'sanitize_callback' => 'absint',
    )
  );
  $wp_customize->add_control(
    'set_slider_3',
    array(
      'label' => 'Set slider 3',
      'description' => 'Set slider 3',
      'section' => 'sec_slider',
      'type' => 'dropdown-pages'
    )
  );
  // slider button text number 3
  $wp_customize->add_setting(
    'set_slider_btn_text3',
    array(
      'type' => 'theme_mod',
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field',
    )
  );
  $wp_customize->add_control(
    'set_slider_btn_text3',
    array(
      'label' => 'Button text for slider 3',
      'description' => 'Button text for slider 3',
      'section' => 'sec_slider',
      'type' => 'text'
    )
  );
  // slider url 3
  $wp_customize->add_setting(
    'set_slider_btn_url3',
    array(
      'type' => 'theme_mod',
      'default' => '',
      'sanitize_callback' => 'esc_url_raw',
    )
  );
  $wp_customize->add_control(
    'set_slider_btn_url3',
    array(
      'label' => 'URL for slider 3',
      'description' => 'URL for slider 3',
      'section' => 'sec_slider',
      'type' => 'url'
    )
  );
}

add_action('customize_register', 'tshirt_grind_customizer');
