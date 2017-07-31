<?php


function blush_custom_settings( $wp_customize ){

  $wp_customize->add_section('blush_custom_colors', array(
    'title' => __('Sidebar Colors', 'blush'),
    'priority' => '70',
    'capability'  => 'edit_theme_options',
  ));


  /**
   * Sidebar text color
   * @var [type]
   */
  $wp_customize->add_setting('blush_sidebar_heading_text_color', array(
    'default' => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'sanitize_hex_color'
  ));


  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blush_sidebar_heading_text_color_control', array(
    'label' => __('Sidebar Heading Text Colors', 'blush'),
    'section' => 'blush_custom_colors',
    'settings' => 'blush_sidebar_heading_text_color'
  ) ));

  $wp_customize->add_setting('blush_sidebar_text_color', array(
    'default' => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'sanitize_hex_color'
  ));


  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blush_sidebar_text_color_control', array(
    'label' => __('Sidebar Text Colors', 'blush'),
    'section' => 'blush_custom_colors',
    'settings' => 'blush_sidebar_text_color'
  ) ));

  $wp_customize->add_setting('blush_sidebar_link_text_color', array(
    'default' => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'sanitize_hex_color'
  ));


  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blush_sidebar_link_text_color_control', array(
    'label' => __('Sidebar Link Text Colors', 'blush'),
    'section' => 'blush_custom_colors',
    'settings' => 'blush_sidebar_link_text_color'
  ) ));


  /**
   * Theme stylesheet picker
   */

   $wp_customize->add_section('blush_theme_skin', array(
     'title' => __('Bush Theme Skin', 'blush'),
     'priority' => '20',
     'capability'  => 'edit_theme_options',
   ));

   $wp_customize->add_setting('blush_theme_skin_name', array(
     'default' => 'default',
     'transport' => 'refresh',
     'sanitize_callback' => 'blush_sanitize_radio'
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
       'black-white' => __('Black &amp; White', 'blush'),
       'airbase' => __('Airbase', 'blush'),
     )
   ));


   /**
    * Footer ssl image
    */

    $wp_customize->add_section('blush_ssl_image', array(
      'title' => __('Footer SSL Image', 'blush'),
      'priority' => '90',
      'capability'  => 'edit_theme_options',
      'description' => __('Add SSL Image to the footer', 'blush')
    ));

    $wp_customize->add_setting('blush_ssl_image_setting', array(
      'default' => '',
      'transport' => 'refresh',
      'sanitize_callback' => '',

    ));

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'blush_ssl_control', array(
      'label' => __('SSL Image', 'blush'),
      'section' => 'blush_ssl_image',
      'settings' => 'blush_ssl_image_setting',

    ) ));

    $wp_customize->add_setting('blush_ssl_image_link_setting', array(
      'default' => '',
      'transport' => 'refresh',
      'sanitize_callback' => ''
    ));

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'blush_ssl_link_control', array(
      'label' => __('SSL Url', 'blush'),
      'section' => 'blush_ssl_image',
      'settings' => 'blush_ssl_image_link_setting',
      'type' => 'url',
    ) ));

    function blush_ssl_sanitize(){
      return;
    }
    function blush_ssl_url_sanitize(){
      return;
    }





   /**
    * new image section
    */






}



function blush_sanitize_radio($input, $setting){
  // Ensure input is a slug
  $input = sanitize_key($input);

  return $input;
}

/**
 * Return whether we're previewing the front page and it's a static page.
 */
function blush_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}




add_action('customize_register', 'blush_custom_settings');

/**
 * Output custom css
 * @return css styles
 */
function blush_customizer_css(){ ?>

  <style type="text/css">
    #sidebar-left .widget,
    #sidebar-right .widget{
      background: transparent;
      color: <?php echo get_theme_mod('blush_sidebar_text_color'); ?>;
    }

    #sidebar-left .widget a,
    #sidebar-right .widget a{

      color: <?php echo get_theme_mod('blush_sidebar_link_text_color'); ?>;
    }
    #sidebar-left .widget-title,
    #sidebar-right .widget-title{
      color: <?php echo get_theme_mod('blush_sidebar_heading_text_color'); ?>;
    }

    .featured__banner{
      background: url(<?php header_image(); ?>);
      background-position: center top;
      background-attachment: fixed;
      background-size: cover;
    }


  </style>

<?php }


add_action('wp_head','blush_customizer_css');
