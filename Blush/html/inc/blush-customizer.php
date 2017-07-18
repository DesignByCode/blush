<?php


function blush_custom_settings( $wp_customize ){

  $wp_customize->add_section('blush_custom_colors', array(
    'title' => __('Bush Theme Custom Colors', 'blush'),
    'priority' => '30'
  ));

  $wp_customize->add_setting('blush_background_body_color', array(
    'default' => '',
    'transport' => 'refresh'
  ));


  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blush_background_body_color_control', array(
    'label' => __('Body Background Colors', 'blush'),
    'section' => 'blush_custom_colors',
    'settings' => 'blush_background_body_color'
  ) ));

  //top-menu
  $wp_customize->add_setting('blush_top_header_background_color', array(
    'default' => '',
    'transport' => 'refresh'
  ));

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blush_top_header_background_color_control', array(
    'label' => __('Top Header Background Colors', 'blush'),
    'section' => 'blush_custom_colors',
    'settings' => 'blush_top_header_background_color'
  ) ));

  //top-menu-text
  $wp_customize->add_setting('blush_top_header_text_color', array(
    'default' => '',
    'transport' => 'refresh'
  ));


  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blush_top_header_text_color_control', array(
    'label' => __('Top Header Text Colors', 'blush'),
    'section' => 'blush_custom_colors',
    'settings' => 'blush_top_header_text_color'
  ) ));

  /**
   * Main text color
   * @var [type]
   */
  $wp_customize->add_setting('blush_background_main_text_color', array(
    'default' => '',
    'transport' => 'refresh'
  ));


  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blush_background_main_text_color_control', array(
    'label' => __('Main Text Colors', 'blush'),
    'section' => 'blush_custom_colors',
    'settings' => 'blush_background_main_text_color'
  ) ));


  /**
   * Sidebar text color
   * @var [type]
   */
  $wp_customize->add_setting('blush_background_text_color', array(
    'default' => '',
    'transport' => 'refresh'
  ));


  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blush_background_text_color_control', array(
    'label' => __('Sidebar Text Colors', 'blush'),
    'section' => 'blush_custom_colors',
    'settings' => 'blush_background_text_color'
  ) ));


  /**
   * Theme stylesheet picker
   */

   $wp_customize->add_section('blush_theme_skin', array(
     'title' => __('Bush Theme Skin', 'blush'),
     'priority' => '29'
   ));

   $wp_customize->add_setting('blush_theme_skin_name', array(
     'default' => 'default'
   ));

   $wp_customize->add_control('blush_theme_skin_control', array(
     'label' => __('Theme Skin', 'blush'),
     'section' => 'blush_theme_skin',
     'settings' => 'blush_theme_skin_name',
     'type' => 'radio',
     'choices' => array(
       'default' => __('Default', 'blush'),
       'steam' => __('Steam', 'blush'),
       'razzmic-gunmetal' => __('Razzmic Gunmetal', 'blush'),
       'custom' => __('Custom Set', 'blush'),
       'baby-girl' => __('Baby Girl', 'blush'),
       'fly-fishing' => __('Fly Fishing', 'blush'),
     )
   ));




}

add_action('customize_register', 'blush_custom_settings');

/**
 * Output custom css
 * @return css styles
 */
function blush_customizer_css(){ ?>

  <style type="text/css">

    body{
      color: <?php echo get_theme_mod('blush_background_main_text_color'); ?>;
      background-color: <?php echo get_theme_mod('blush_background_body_color'); ?>;
    }

    .widget-area{
      background: transparent;
      color: <?php echo get_theme_mod('blush_background_text_color'); ?>;
    }

    .widget-title{
      color: <?php echo get_theme_mod('blush_background_main_text_color'); ?>;
    }

    .top-menu{
      background-color: <?php echo get_theme_mod('blush_top_header_background_color'); ?>;
      color: <?php echo get_theme_mod('blush_top_header_text_color'); ?>;
    }

    .top-menu a{
      color: <?php echo get_theme_mod('blush_top_header_text_color'); ?>;
    }



  </style>

<?php }


add_action('wp_head','blush_customizer_css');
