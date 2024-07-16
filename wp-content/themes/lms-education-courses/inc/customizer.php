<?php
/**
 * LMS Education Courses Theme Customizer
 *
 * @package LMS Education Courses
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function lms_education_courses_custom_controls() {
	load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'lms_education_courses_custom_controls' );

function lms_education_courses_customize_register( $wp_customize ) {


	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.logo .site-title a',
	 	'render_callback' => 'lms_education_courses_Customize_partial_blogname',
	));

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => 'p.site-description',
		'render_callback' => 'lms_education_courses_Customize_partial_blogdescription',
	));

	// add home page setting pannel
	$wp_customize->add_panel( 'lms_education_courses_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'Homepage Settings', 'lms-education-courses' ),
		'priority' => 10,
	));

 	// Header Background color
	$wp_customize->add_setting('lms_education_courses_header_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'lms_education_courses_header_background_color', array(
		'label'    => __('Header Background Color', 'lms-education-courses'),
		'section'  => 'header_image',
	)));

	$wp_customize->add_setting('lms_education_courses_header_img_position',array(
	  'default' => 'center top',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'lms_education_courses_sanitize_choices'
	));
	$wp_customize->add_control('lms_education_courses_header_img_position',array(
		'type' => 'select',
		'label' => __('Header Image Position','lms-education-courses'),
		'section' => 'header_image',
		'choices' 	=> array(
			'left top' 		=> esc_html__( 'Top Left', 'lms-education-courses' ),
			'center top'   => esc_html__( 'Top', 'lms-education-courses' ),
			'right top'   => esc_html__( 'Top Right', 'lms-education-courses' ),
			'left center'   => esc_html__( 'Left', 'lms-education-courses' ),
			'center center'   => esc_html__( 'Center', 'lms-education-courses' ),
			'right center'   => esc_html__( 'Right', 'lms-education-courses' ),
			'left bottom'   => esc_html__( 'Bottom Left', 'lms-education-courses' ),
			'center bottom'   => esc_html__( 'Bottom', 'lms-education-courses' ),
			'right bottom'   => esc_html__( 'Bottom Right', 'lms-education-courses' ),
		),
		));

	//Topbar
	$wp_customize->add_section('lms_education_courses_topbar_section' , array(
  		'title' => __( 'Topbar Section', 'lms-education-courses' ),
		'panel' => 'lms_education_courses_panel_id'
	) );

	$wp_customize->add_setting( 'lms_education_courses_header_search',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'lms_education_courses_switch_sanitization'
    ));
    $wp_customize->add_control( new LMS_Education_Courses_Toggle_Switch_Custom_Control( $wp_customize, 'lms_education_courses_header_search',array(
      	'label' => esc_html__( 'Show / Hide Search','lms-education-courses' ),
      	'section' => 'lms_education_courses_topbar_section'
    )));

	$wp_customize->add_setting('lms_education_courses_topbar_button_label',array(
		'default' => 'Log In / Register',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_courses_topbar_button_label',array(
		'label' => __('Button','lms-education-courses'),
		'input_attrs' => array(
      'placeholder' => esc_html__( 'Log In / Register', 'lms-education-courses' ),
      ),
		'section' => 'lms_education_courses_topbar_section',
		'setting' => 'lms_education_courses_topbar_button_label',
		'type' => 'text'
	));

	$wp_customize->add_setting('lms_education_courses_topbar_button_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));

	$wp_customize->add_control('lms_education_courses_topbar_button_url',array(
		'label'	=> __('Add Button URL','lms-education-courses'),
		'section'	=> 'lms_education_courses_topbar_section',
		'setting'	=> 'lms_education_courses_topbar_button_url',
		'type'	=> 'url'
	));

	//Slider
	$wp_customize->add_section( 'lms_education_courses_slidersettings' , array(
  	'title'      => __( 'Slider Settings', 'lms-education-courses' ),
	'panel' => 'lms_education_courses_panel_id',
	'description' => __('Free theme has 3 slides options, For unlimited slides and more options </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/products/lms-education-wordpress-theme">GET PRO</a>','lms-education-courses'),
	) );

	$wp_customize->add_setting( 'lms_education_courses_slider_hide_show',array(
    'default' => 0,
    'transport' => 'refresh',
    'sanitize_callback' => 'lms_education_courses_switch_sanitization'
	));
	$wp_customize->add_control( new LMS_Education_Courses_Toggle_Switch_Custom_Control( $wp_customize, 'lms_education_courses_slider_hide_show',array(
	'label' => esc_html__( 'Show / Hide Slider','lms-education-courses' ),
	'section' => 'lms_education_courses_slidersettings'
	)));

	$wp_customize->add_setting( 'lms_education_courses_certified_text_small_title1', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'lms_education_courses_certified_text_small_title1', array(
		'label'    => __( 'Add Tutor Count', 'lms-education-courses' ),
		'input_attrs' => array(
            'placeholder' => __( 'More Than 1k+ Tutors', 'lms-education-courses' ),
        ),
		'section'  => 'lms_education_courses_slidersettings',
		'type'     => 'text'
	) );

	$wp_customize->add_setting( 'lms_education_courses_certified_text_small_title2', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'lms_education_courses_certified_text_small_title2', array(
		'label'    => __( 'Add Certified Count', 'lms-education-courses' ),
		'input_attrs' => array(
            'placeholder' => __( '239+', 'lms-education-courses' ),
        ),
		'section'  => 'lms_education_courses_slidersettings',
		'type'     => 'text'
	) );

	$wp_customize->add_setting( 'lms_education_courses_certified_text_small_title3', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'lms_education_courses_certified_text_small_title3', array(
		'label'    => __( 'Add Certified Text', 'lms-education-courses' ),
		'input_attrs' => array(
            'placeholder' => __( 'Certified Teachers', 'lms-education-courses' ),
        ),
		'section'  => 'lms_education_courses_slidersettings',
		'type'     => 'text'
	) );

   	//Selective Refresh
 	$wp_customize->selective_refresh->add_partial('lms_education_courses_slider_hide_show',array(
		'selector'        => '.slider-btn a',
		'render_callback' => 'lms_education_courses_customize_partial_lms_education_courses_slider_hide_show',
	));

	for ( $count = 1; $count <= 3; $count++ ) {
		$wp_customize->add_setting( 'lms_education_courses_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'lms_education_courses_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'lms_education_courses_slider_page' . $count, array(
			'label'    => __( 'Select Slider Page', 'lms-education-courses' ),
			'description' => __('Slider image size (1400 x 550)','lms-education-courses'),
			'section'  => 'lms_education_courses_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting('lms_education_courses_slider_button_text',array(
		'default'=> 'Get Start',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_courses_slider_button_text',array(
		'label'	=> __('Add Slider Button Text','lms-education-courses'),
		'input_attrs' => array(
            'placeholder' => __( 'Get Start', 'lms-education-courses' ),
        ),
		'section'=> 'lms_education_courses_slidersettings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('lms_education_courses_top_button_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('lms_education_courses_top_button_url',array(
		'label'	=> __('Add Button URL','lms-education-courses'),
		'section'	=> 'lms_education_courses_slidersettings',
		'setting'	=> 'lms_education_courses_top_button_url',
		'type'	=> 'url'
	));

   //Slider content padding
    $wp_customize->add_setting('lms_education_courses_slider_content_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_courses_slider_content_padding_top_bottom',array(
		'label'	=> __('Slider Content Padding Top Bottom','lms-education-courses'),
		'description'	=> __('Enter a value in %. Example:20%','lms-education-courses'),
		'input_attrs' => array(
            'placeholder' => __( '50%', 'lms-education-courses' ),
        ),
		'section'=> 'lms_education_courses_slidersettings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('lms_education_courses_slider_content_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_courses_slider_content_padding_left_right',array(
		'label'	=> __('Slider Content Padding Left Right','lms-education-courses'),
		'description'	=> __('Enter a value in %. Example:20%','lms-education-courses'),
		'input_attrs' => array(
            'placeholder' => __( '50%', 'lms-education-courses' ),
        ),
		'section'=> 'lms_education_courses_slidersettings',
		'type'=> 'text'
	));

    //Slider excerpt
	$wp_customize->add_setting( 'lms_education_courses_slider_excerpt_number', array(
		'default'              => 20,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'lms_education_courses_sanitize_number_range'
	) );
	$wp_customize->add_control( 'lms_education_courses_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','lms-education-courses' ),
		'section'     => 'lms_education_courses_slidersettings',
		'type'        => 'range',
		'settings'    => 'lms_education_courses_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		)
	) );

	$wp_customize->add_setting( 'lms_education_courses_slider_speed', array(
		'default'  => 4000,
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'lms_education_courses_slider_speed', array(
		'label' => esc_html__('Slider Transition Speed','lms-education-courses'),
		'section' => 'lms_education_courses_slidersettings',
		'type'  => 'text'
	) );

	//Slider height
	$wp_customize->add_setting('lms_education_courses_slider_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_courses_slider_height',array(
		'label'	=> __('Slider Height','lms-education-courses'),
		'description'	=> __('Specify the slider height (px).','lms-education-courses'),
		'input_attrs' => array(
            'placeholder' => __( '500px', 'lms-education-courses' ),
        ),
		'section'=> 'lms_education_courses_slidersettings',
		'type'=> 'text'
	));

	//Opacity
	$wp_customize->add_setting('lms_education_courses_slider_opacity_color',array(
      'default'              => '',
      'sanitize_callback' => 'lms_education_courses_sanitize_choices'
	));
	$wp_customize->add_control( 'lms_education_courses_slider_opacity_color', array(
		'label'       => esc_html__( 'Slider Image Opacity','lms-education-courses' ),
		'section'     => 'lms_education_courses_slidersettings',
		'type'        => 'select',
		'settings'    => 'lms_education_courses_slider_opacity_color',
		'choices' => array(
			'0' =>  esc_attr('0','lms-education-courses'),
			'0.1' =>  esc_attr('0.1','lms-education-courses'),
			'0.2' =>  esc_attr('0.2','lms-education-courses'),
			'0.3' =>  esc_attr('0.3','lms-education-courses'),
			'0.4' =>  esc_attr('0.4','lms-education-courses'),
			'0.5' =>  esc_attr('0.5','lms-education-courses'),
			'0.6' =>  esc_attr('0.6','lms-education-courses'),
			'0.7' =>  esc_attr('0.7','lms-education-courses'),
			'0.8' =>  esc_attr('0.8','lms-education-courses'),
			'0.9' =>  esc_attr('0.9','lms-education-courses')
	)
	));

	$wp_customize->add_setting( 'lms_education_courses_slider_image_overlay',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'lms_education_courses_switch_sanitization'
  ));
  $wp_customize->add_control( new LMS_Education_Courses_Toggle_Switch_Custom_Control( $wp_customize, 'lms_education_courses_slider_image_overlay',array(
    	'label' => esc_html__( 'Slider Image Overlay','lms-education-courses' ),
    	'section' => 'lms_education_courses_slidersettings'
  )));

  $wp_customize->add_setting('lms_education_courses_slider_image_overlay_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'lms_education_courses_slider_image_overlay_color', array(
		'label'    => __('Slider Image Overlay Color', 'lms-education-courses'),
		'section'  => 'lms_education_courses_slidersettings'
	)));

	$wp_customize->add_setting( 'lms_education_courses_slider_arrow_hide_show',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'lms_education_courses_switch_sanitization'
	));
	$wp_customize->add_control( new LMS_Education_Courses_Toggle_Switch_Custom_Control( $wp_customize, 'lms_education_courses_slider_arrow_hide_show',array(
		'label' => esc_html__( 'Show / Hide Slider Arrows','lms-education-courses' ),
		'section' => 'lms_education_courses_slidersettings'
	))); 

	$wp_customize->add_setting('lms_education_courses_slider_prev_icon',array(
		'default'	=> 'fas fa-angle-left',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new LMS_Education_Courses_Fontawesome_Icon_Chooser(
        $wp_customize,'lms_education_courses_slider_prev_icon',array(
		'label'	=> __('Add Slider Prev Icon','lms-education-courses'),
		'transport' => 'refresh',
		'section'	=> 'lms_education_courses_slidersettings',
		'setting'	=> 'lms_education_courses_slider_prev_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('lms_education_courses_slider_next_icon',array(
		'default'	=> 'fas fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new LMS_Education_Courses_Fontawesome_Icon_Chooser(
        $wp_customize,'lms_education_courses_slider_next_icon',array(
		'label'	=> __('Add Slider Next Icon','lms-education-courses'),
		'transport' => 'refresh',
		'section'	=> 'lms_education_courses_slidersettings',
		'setting'	=> 'lms_education_courses_slider_next_icon',
		'type'		=> 'icon'
	)));

	//Category Section
	$wp_customize->add_section('lms_education_courses_category_section', array(
		'title'       => __('Category Section', 'lms-education-courses'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','lms-education-courses'),
		'priority'    => null,
		'panel'       => 'lms_education_courses_panel_id',
	));

	$wp_customize->add_setting('lms_education_courses_category_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_courses_category_text',array(
		'description' => __('<p>1. More options for category section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for category section.</p>','lms-education-courses'),
		'section'=> 'lms_education_courses_category_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('lms_education_courses_category_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_courses_category_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=lms_education_courses_guide') ." '>More Info</a>",
		'section'=> 'lms_education_courses_category_section',
		'type'=> 'hidden'
	));

	//courses Section
	$wp_customize->add_section('lms_education_courses_courses_section', array(
		'title'       => __('Courses Section', 'lms-education-courses'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','lms-education-courses'),
		'priority'    => null,
		'panel'       => 'lms_education_courses_panel_id',
	));

	$wp_customize->add_setting('lms_education_courses_courses_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_courses_courses_text',array(
		'description' => __('<p>1. More options for courses section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for courses section.</p>','lms-education-courses'),
		'section'=> 'lms_education_courses_courses_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('lms_education_courses_courses_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_courses_courses_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=lms_education_courses_guide') ." '>More Info</a>",
		'section'=> 'lms_education_courses_courses_section',
		'type'=> 'hidden'
	));

	//	our partner Section
	$wp_customize->add_section('lms_education_courses_our_partner_section', array(
		'title'       => __('	Our Partner Section', 'lms-education-courses'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','lms-education-courses'),
		'priority'    => null,
		'panel'       => 'lms_education_courses_panel_id',
	));

	$wp_customize->add_setting('lms_education_courses_our_partner_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_courses_our_partner_text',array(
		'description' => __('<p>1. More options for our partner section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for our partner section.</p>','lms-education-courses'),
		'section'=> 'lms_education_courses_our_partner_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('lms_education_courses_our_partner_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_courses_our_partner_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=lms_education_courses_guide') ." '>More Info</a>",
		'section'=> 'lms_education_courses_our_partner_section',
		'type'=> 'hidden'
	));

	//our-philosophy Section
	$wp_customize->add_section('lms_education_our_philosophy_section', array(
		'title'       => __('Our Philosophy Section', 'lms-education-courses'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','lms-education-courses'),
		'priority'    => null,
		'panel'       => 'lms_education_courses_panel_id',
	));

	$wp_customize->add_setting('lms_education_our_philosophy_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_our_philosophy_text',array(
		'description' => __('<p>1. More options for our philosophy section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for our philosophy section.</p>','lms-education-courses'),
		'section'=> 'lms_education_our_philosophy_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('lms_education_our_philosophy_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_our_philosophy_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=lms_education_courses_guide') ." '>More Info</a>",
		'section'=> 'lms_education_our_philosophy_section',
		'type'=> 'hidden'
	));

	// Degree and Courses Section
	$wp_customize->add_section('lms_education_courses_degree_courses_section',array(
		'title'	=> __('Degree and Courses Section','lms-education-courses'),
		'description' => __('For more options of the degree and courses section </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/products/lms-education-wordpress-theme">GET PRO</a>','lms-education-courses'),
		'panel' => 'lms_education_courses_panel_id',
	));

	$wp_customize->add_setting( 'lms_education_courses_degree_courses_small_title', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'lms_education_courses_degree_courses_small_title', array(
		'label'    => __( 'Add Section Text', 'lms-education-courses' ),
		'input_attrs' => array(
            'placeholder' => __( 'Degree and Courses', 'lms-education-courses' ),
        ),
		'section'  => 'lms_education_courses_degree_courses_section',
		'type'     => 'text'
	) );

	$wp_customize->add_setting( 'lms_education_courses_degree_courses_heading', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'lms_education_courses_degree_courses_heading', array(
		'label'    => __( 'Add Section Heading', 'lms-education-courses' ),
		'input_attrs' => array(
            'placeholder' => __( 'Top Degree and Courses That Fit Your Life', 'lms-education-courses' ),
        ),
		'section'  => 'lms_education_courses_degree_courses_section',
		'type'     => 'text'
	) );

	//event Section
	$wp_customize->add_section('lms_education_event_section', array(
		'title'       => __('Event Section', 'lms-education-courses'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','lms-education-courses'),
		'priority'    => null,
		'panel'       => 'lms_education_courses_panel_id',
	));

	$wp_customize->add_setting('lms_education_event_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_event_text',array(
		'description' => __('<p>1. More options for event section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for event section.</p>','lms-education-courses'),
		'section'=> 'lms_education_event_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('lms_education_event_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_event_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=lms_education_courses_guide') ." '>More Info</a>",
		'section'=> 'lms_education_event_section',
		'type'=> 'hidden'
	));

	//free-courses Section
	$wp_customize->add_section('lms_education_free_courses_section', array(
		'title'       => __('Free Courses Section', 'lms-education-courses'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','lms-education-courses'),
		'priority'    => null,
		'panel'       => 'lms_education_courses_panel_id',
	));

	$wp_customize->add_setting('lms_education_free_courses_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_free_courses_text',array(
		'description' => __('<p>1. More options for free courses section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for free courses section.</p>','lms-education-courses'),
		'section'=> 'lms_education_free_courses_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('lms_education_free_courses_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_free_courses_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=lms_education_courses_guide') ." '>More Info</a>",
		'section'=> 'lms_education_free_courses_section',
		'type'=> 'hidden'
	));

	//testimonials Section
	$wp_customize->add_section('lms_education_testimonials_section', array(
		'title'       => __('Testimonials Section', 'lms-education-courses'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','lms-education-courses'),
		'priority'    => null,
		'panel'       => 'lms_education_courses_panel_id',
	));

	$wp_customize->add_setting('lms_education_testimonials_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_testimonials_text',array(
		'description' => __('<p>1. More options for testimonials section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for testimonials section.</p>','lms-education-courses'),
		'section'=> 'lms_education_testimonials_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('lms_education_testimonials_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_testimonials_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=lms_education_courses_guide') ." '>More Info</a>",
		'section'=> 'lms_education_testimonials_section',
		'type'=> 'hidden'
	));

	//why-choose-us Section
	$wp_customize->add_section('lms_education_why_choose_us_section', array(
		'title'       => __('Why Choose Us Section', 'lms-education-courses'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','lms-education-courses'),
		'priority'    => null,
		'panel'       => 'lms_education_courses_panel_id',
	));

	$wp_customize->add_setting('lms_education_why_choose_us_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_why_choose_us_text',array(
		'description' => __('<p>1. More options for why choose us section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for why choose us section.</p>','lms-education-courses'),
		'section'=> 'lms_education_why_choose_us_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('lms_education_why_choose_us_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_why_choose_us_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=lms_education_courses_guide') ." '>More Info</a>",
		'section'=> 'lms_education_why_choose_us_section',
		'type'=> 'hidden'
	));

	//instructor Section
	$wp_customize->add_section('lms_education_instructor_section', array(
		'title'       => __('Instructor Section', 'lms-education-courses'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','lms-education-courses'),
		'priority'    => null,
		'panel'       => 'lms_education_courses_panel_id',
	));

	$wp_customize->add_setting('lms_education_instructor_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_instructor_text',array(
		'description' => __('<p>1. More options for instructor section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for instructor section.</p>','lms-education-courses'),
		'section'=> 'lms_education_instructor_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('lms_education_instructor_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_instructor_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=lms_education_courses_guide') ." '>More Info</a>",
		'section'=> 'lms_education_instructor_section',
		'type'=> 'hidden'
	));

	//blog Section
	$wp_customize->add_section('lms_education_blog_section', array(
		'title'       => __('Blog Section', 'lms-education-courses'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','lms-education-courses'),
		'priority'    => null,
		'panel'       => 'lms_education_courses_panel_id',
	));

	$wp_customize->add_setting('lms_education_blog_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_blog_text',array(
		'description' => __('<p>1. More options for blog section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for blog section.</p>','lms-education-courses'),
		'section'=> 'lms_education_blog_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('lms_education_blog_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_blog_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=lms_education_courses_guide') ." '>More Info</a>",
		'section'=> 'lms_education_blog_section',
		'type'=> 'hidden'
	));

	//newsletter Section
	$wp_customize->add_section('lms_education_newsletter_section', array(
		'title'       => __('Newsletter Section', 'lms-education-courses'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','lms-education-courses'),
		'priority'    => null,
		'panel'       => 'lms_education_courses_panel_id',
	));

	$wp_customize->add_setting('lms_education_newsletter_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_newsletter_text',array(
		'description' => __('<p>1. More options for newsletter section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for newsletter section.</p>','lms-education-courses'),
		'section'=> 'lms_education_newsletter_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('lms_education_newsletter_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_newsletter_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=lms_education_courses_guide') ." '>More Info</a>",
		'section'=> 'lms_education_newsletter_section',
		'type'=> 'hidden'
	));

	//Footer Text
	$wp_customize->add_section('lms_education_courses_footer',array(
		'title'	=> esc_html__('Footer Settings','lms-education-courses'),
		'panel' => 'lms_education_courses_panel_id',
		'description' => __('For more options of the footer section </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/products/lms-education-wordpress-theme">GET PRO</a>','lms-education-courses'),
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('lms_education_courses_footer_text', array(
		'selector' => '.copyright p',
		'render_callback' => 'lms_education_courses_Customize_partial_lms_education_courses_footer_text',
	));

  	$wp_customize->add_setting( 'lms_education_courses_footer_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'lms_education_courses_switch_sanitization'
  	));
  	$wp_customize->add_control( new LMS_Education_Courses_Toggle_Switch_Custom_Control( $wp_customize, 'lms_education_courses_footer_hide_show',array(
	    'label' => esc_html__( 'Show / Hide Footer','lms-education-courses' ),
	    'section' => 'lms_education_courses_footer'
  	)));
	// font size
	$wp_customize->add_setting('lms_education_courses_button_footer_font_size',array(
		'default'=> 30,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_courses_button_footer_font_size',array(
		'label'	=> __('Footer Heading Font Size','lms-education-courses'),
  		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'lms_education_courses_footer',
	));

	$wp_customize->add_setting('lms_education_courses_button_footer_heading_letter_spacing',array(
		'default'=> 1,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_courses_button_footer_heading_letter_spacing',array(
		'label'	=> __('Heading Letter Spacing','lms-education-courses'),
  		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
	),
		'section'=> 'lms_education_courses_footer',
	));

	// text trasform
	$wp_customize->add_setting('lms_education_courses_button_footer_text_transform',array(
		'default'=> 'Capitalize',
		'sanitize_callback'	=> 'lms_education_courses_sanitize_choices'
	));
	$wp_customize->add_control('lms_education_courses_button_footer_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Heading Text Transform','lms-education-courses'),
		'choices' => array(
      'Uppercase' => __('Uppercase','lms-education-courses'),
      'Capitalize' => __('Capitalize','lms-education-courses'),
      'Lowercase' => __('Lowercase','lms-education-courses'),
    ),
		'section'=> 'lms_education_courses_footer',
	));

	$wp_customize->add_setting('lms_education_courses_footer_heading_weight',array(
        'default' => 600,
        'transport' => 'refresh',
        'sanitize_callback' => 'lms_education_courses_sanitize_choices'
	));
	$wp_customize->add_control('lms_education_courses_footer_heading_weight',array(
        'type' => 'select',
        'label' => __('Heading Font Weight','lms-education-courses'),
        'section' => 'lms_education_courses_footer',
        'choices' => array(
        	'100' => __('100','lms-education-courses'),
            '200' => __('200','lms-education-courses'),
            '300' => __('300','lms-education-courses'),
            '400' => __('400','lms-education-courses'),
            '500' => __('500','lms-education-courses'),
            '600' => __('600','lms-education-courses'),
            '700' => __('700','lms-education-courses'),
            '800' => __('800','lms-education-courses'),
            '900' => __('900','lms-education-courses'),
        ),
	) );

	$wp_customize->add_setting('lms_education_courses_footer_template',array(
	  'default'	=> esc_html('lms_education_courses-footer-one'),
	  'sanitize_callback'	=> 'lms_education_courses_sanitize_choices'	
	));
	$wp_customize->add_control('lms_education_courses_footer_template',array(
	      'label'	=> esc_html__('Footer style','lms-education-courses'),
	      'section'	=> 'lms_education_courses_footer',
	      'setting'	=> 'lms_education_courses_footer_template',
	      'type' => 'select',
	      'choices' => array(
	          'lms_education_courses-footer-one' => esc_html__('Style 1', 'lms-education-courses'),
	          'lms_education_courses-footer-two' => esc_html__('Style 2', 'lms-education-courses'),
	          'lms_education_courses-footer-three' => esc_html__('Style 3', 'lms-education-courses'),
	          'lms_education_courses-footer-four' => esc_html__('Style 4', 'lms-education-courses'),
	          'lms_education_courses-footer-five' => esc_html__('Style 5', 'lms-education-courses'),
	          )
	));	

	$wp_customize->add_setting('lms_education_courses_footer_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'lms_education_courses_footer_background_color', array(
		'label'    => __('Footer Background Color', 'lms-education-courses'),
		'section'  => 'lms_education_courses_footer',
	)));

  // footer padding
  $wp_customize->add_setting('lms_education_courses_footer_padding',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('lms_education_courses_footer_padding',array(
    'label' => __('Footer Top Bottom Padding','lms-education-courses'),
    'description' => __('Enter a value in pixels. Example:20px','lms-education-courses'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'lms-education-courses' ),
    ),
    'section'=> 'lms_education_courses_footer',
    'type'=> 'text'
  ));

  $wp_customize->add_setting('lms_education_courses_footer_widgets_heading',array(
    'default' => 'Left',
    'transport' => 'refresh',
    'sanitize_callback' => 'lms_education_courses_sanitize_choices'
  ));
  $wp_customize->add_control('lms_education_courses_footer_widgets_heading',array(
    'type' => 'select',
    'label' => __('Footer Widget Heading','lms-education-courses'),
    'section' => 'lms_education_courses_footer',
    'choices' => array(
      'Left' => __('Left','lms-education-courses'),
      'Center' => __('Center','lms-education-courses'),
      'Right' => __('Right','lms-education-courses')
    ),
  ) );

  $wp_customize->add_setting('lms_education_courses_footer_widgets_content',array(
    'default' => 'Left',
    'transport' => 'refresh',
    'sanitize_callback' => 'lms_education_courses_sanitize_choices'
  ));
  $wp_customize->add_control('lms_education_courses_footer_widgets_content',array(
    'type' => 'select',
    'label' => __('Footer Widget Content','lms-education-courses'),
    'section' => 'lms_education_courses_footer',
    'choices' => array(
      'Left' => __('Left','lms-education-courses'),
      'Center' => __('Center','lms-education-courses'),
      'Right' => __('Right','lms-education-courses')
    ),
  	) );

	$wp_customize->add_setting('lms_education_courses_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_courses_footer_text',array(
		'label'	=> esc_html__('Copyright Text','lms-education-courses'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Copyright 2021, .....', 'lms-education-courses' ),
        ),
		'section'=> 'lms_education_courses_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'lms_education_courses_copyright_hide_show',array(
	  'default' => 1,
	  'transport' => 'refresh',
	  'sanitize_callback' => 'lms_education_courses_switch_sanitization'
	));
	$wp_customize->add_control( new LMS_Education_Courses_Toggle_Switch_Custom_Control( $wp_customize, 'lms_education_courses_copyright_hide_show',array(
		'label' => esc_html__( 'Show / Hide Copyright','lms-education-courses' ),
		'section' => 'lms_education_courses_footer'
	)));

	$wp_customize->add_setting('lms_education_courses_copyright_alingment',array(
        'default' => 'center',
        'sanitize_callback' => 'lms_education_courses_sanitize_choices'
	));
	$wp_customize->add_control(new LMS_Education_Courses_Image_Radio_Control($wp_customize, 'lms_education_courses_copyright_alingment', array(
        'type' => 'select',
        'label' => esc_html__('Copyright Alignment','lms-education-courses'),
        'section' => 'lms_education_courses_footer',
        'settings' => 'lms_education_courses_copyright_alingment',
        'choices' => array(
            'left' => esc_url(get_template_directory_uri()).'/assets/images/copyright1.png',
            'center' => esc_url(get_template_directory_uri()).'/assets/images/copyright2.png',
            'right' => esc_url(get_template_directory_uri()).'/assets/images/copyright3.png'
    ))));

	$wp_customize->add_setting('lms_education_courses_copyright_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'lms_education_courses_copyright_background_color', array(
		'label'    => __('Copyright Background Color', 'lms-education-courses'),
		'section'  => 'lms_education_courses_footer',
	)));

	$wp_customize->add_setting('lms_education_courses_copyright_font_size',array(
		'default'=> '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_courses_copyright_font_size',array(
		'label' => __('Copyright Font Size','lms-education-courses'),
		'description' => __('Enter a value in pixels. Example:20px','lms-education-courses'),
		'input_attrs' => array(
		        'placeholder' => __( '10px', 'lms-education-courses' ),
		    ),
		'section'=> 'lms_education_courses_footer',
		'type'=> 'text'
	));

    $wp_customize->add_setting( 'lms_education_courses_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'lms_education_courses_switch_sanitization'
    ));
    $wp_customize->add_control( new LMS_Education_Courses_Toggle_Switch_Custom_Control( $wp_customize, 'lms_education_courses_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll to Top','lms-education-courses' ),
      	'section' => 'lms_education_courses_footer'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial('lms_education_courses_scroll_to_top_icon', array(
		'selector' => '.scrollup i',
		'render_callback' => 'lms_education_courses_Customize_partial_lms_education_courses_scroll_to_top_icon',
	));

    $wp_customize->add_setting('lms_education_courses_scroll_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'lms_education_courses_sanitize_choices'
	));
	$wp_customize->add_control(new LMS_Education_Courses_Image_Radio_Control($wp_customize, 'lms_education_courses_scroll_top_alignment', array(
        'type' => 'select',
        'label' => esc_html__('Scroll To Top','lms-education-courses'),
        'section' => 'lms_education_courses_footer',
        'settings' => 'lms_education_courses_scroll_top_alignment',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/layout2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/layout3.png'
    ))));

     $wp_customize->add_setting('lms_education_courses_scroll_top_icon',array(
    'default' => 'fas fa-long-arrow-alt-up',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(new LMS_Education_Courses_Fontawesome_Icon_Chooser($wp_customize,'lms_education_courses_scroll_top_icon',array(
    'label' => __('Add Scroll to Top Icon','lms-education-courses'),
    'transport' => 'refresh',
    'section' => 'lms_education_courses_footer',
    'setting' => 'lms_education_courses_scroll_top_icon',
    'type'    => 'icon'
  )));

  $wp_customize->add_setting('lms_education_courses_scroll_to_top_font_size',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('lms_education_courses_scroll_to_top_font_size',array(
    'label' => __('Icon Font Size','lms-education-courses'),
    'description' => __('Enter a value in pixels. Example:20px','lms-education-courses'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'lms-education-courses' ),
    ),
    'section'=> 'lms_education_courses_footer',
    'type'=> 'text'
  ));

  $wp_customize->add_setting('lms_education_courses_scroll_to_top_padding',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('lms_education_courses_scroll_to_top_padding',array(
    'label' => __('Icon Top Bottom Padding','lms-education-courses'),
    'description' => __('Enter a value in pixels. Example:20px','lms-education-courses'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'lms-education-courses' ),
    ),
    'section'=> 'lms_education_courses_footer',
    'type'=> 'text'
  ));

  $wp_customize->add_setting('lms_education_courses_scroll_to_top_width',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('lms_education_courses_scroll_to_top_width',array(
    'label' => __('Icon Width','lms-education-courses'),
    'description' => __('Enter a value in pixels Example:20px','lms-education-courses'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'lms-education-courses' ),
  ),
  'section'=> 'lms_education_courses_footer',
  'type'=> 'text'
  ));

  $wp_customize->add_setting('lms_education_courses_scroll_to_top_height',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('lms_education_courses_scroll_to_top_height',array(
    'label' => __('Icon Height','lms-education-courses'),
    'description' => __('Enter a value in pixels. Example:20px','lms-education-courses'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'lms-education-courses' ),
    ),
    'section'=> 'lms_education_courses_footer',
    'type'=> 'text'
  ));

  $wp_customize->add_setting( 'lms_education_courses_scroll_to_top_border_radius', array(
    'default'              => '',
    'transport'        => 'refresh',
    'sanitize_callback'    => 'lms_education_courses_sanitize_number_range'
  ) );
  $wp_customize->add_control( 'lms_education_courses_scroll_to_top_border_radius', array(
    'label'       => esc_html__( 'Icon Border Radius','lms-education-courses' ),
    'section'     => 'lms_education_courses_footer',
    'type'        => 'range',
    'input_attrs' => array(
      'step'             => 1,
      'min'              => 1,
      'max'              => 50,
    ),
  ) );

   	//Blog Post
	$wp_customize->add_panel( 'lms_education_courses_blog_post_parent_panel', array(
		'title' => esc_html__( 'Blog Post Settings', 'lms-education-courses' ),
		'panel' => 'lms_education_courses_panel_id',
		'priority' => 20,
	));

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'lms_education_courses_post_settings', array(
		'title' => esc_html__( 'Post Settings', 'lms-education-courses' ),
		'panel' => 'lms_education_courses_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('lms_education_courses_toggle_postdate', array(
		'selector' => '.post-main-box h2 a',
		'render_callback' => 'lms_education_courses_Customize_partial_lms_education_courses_toggle_postdate',
	));

	//Blog layout
  $wp_customize->add_setting('lms_education_courses_blog_layout_option',array(
    'default' => 'Default',
    'sanitize_callback' => 'lms_education_courses_sanitize_choices'
  ));
  $wp_customize->add_control(new LMS_Education_Courses_Image_Radio_Control($wp_customize, 'lms_education_courses_blog_layout_option', array(
    'type' => 'select',
    'label' => __('Blog Post Layouts','lms-education-courses'),
    'section' => 'lms_education_courses_post_settings',
    'choices' => array(
        'Default' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout1.png',
        'Center' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout2.png',
        'Left' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout3.png',
  ))));

	$wp_customize->add_setting('lms_education_courses_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'lms_education_courses_sanitize_choices'
	));
	$wp_customize->add_control('lms_education_courses_theme_options',array(
        'type' => 'select',
        'label' => esc_html__('Post Sidebar Layout','lms-education-courses'),
        'description' => esc_html__('Here you can change the sidebar layout for posts. ','lms-education-courses'),
        'section' => 'lms_education_courses_post_settings',
        'choices' => array(
            'Left Sidebar' => esc_html__('Left Sidebar','lms-education-courses'),
            'Right Sidebar' => esc_html__('Right Sidebar','lms-education-courses'),
            'One Column' => esc_html__('One Column','lms-education-courses'),
            'Grid Layout' => esc_html__('Grid Layout','lms-education-courses')
        ),
	) );

 	$wp_customize->add_setting('lms_education_courses_theme_options',array(
    'default' => 'Right Sidebar',
    'sanitize_callback' => 'lms_education_courses_sanitize_choices'
	));
	$wp_customize->add_control('lms_education_courses_theme_options',array(
    'type' => 'select',
    'label' => esc_html__('Post Sidebar Layout','lms-education-courses'),
    'description' => esc_html__('Here you can change the sidebar layout for posts. ','lms-education-courses'),
    'section' => 'lms_education_courses_post_settings',
    'choices' => array(
        'Left Sidebar' => esc_html__('Left Sidebar','lms-education-courses'),
        'Right Sidebar' => esc_html__('Right Sidebar','lms-education-courses'),
        'One Column' => esc_html__('One Column','lms-education-courses'),
        'Grid Layout' => esc_html__('Grid Layout','lms-education-courses')
        ),
	) );

	$wp_customize->add_setting('lms_education_courses_theme_options',array(
    'default' => 'Right Sidebar',
    'sanitize_callback' => 'lms_education_courses_sanitize_choices'
	));
	$wp_customize->add_control('lms_education_courses_theme_options',array(
    'type' => 'select',
    'label' => esc_html__('Post Sidebar Layout','lms-education-courses'),
    'description' => esc_html__('Here you can change the sidebar layout for posts. ','lms-education-courses'),
    'section' => 'lms_education_courses_post_settings',
    'choices' => array(
        'Left Sidebar' => esc_html__('Left Sidebar','lms-education-courses'),
        'Right Sidebar' => esc_html__('Right Sidebar','lms-education-courses'),
        'One Column' => esc_html__('One Column','lms-education-courses'),
        'Grid Layout' => esc_html__('Grid Layout','lms-education-courses')
        ),
	) );

  	$wp_customize->add_setting('lms_education_courses_toggle_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new LMS_Education_Courses_Fontawesome_Icon_Chooser(
        $wp_customize,'lms_education_courses_toggle_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','lms-education-courses'),
		'transport' => 'refresh',
		'section'	=> 'lms_education_courses_post_settings',
		'setting'	=> 'lms_education_courses_toggle_postdate_icon',
		'type'		=> 'icon'
	)));

 	$wp_customize->add_setting( 'lms_education_courses_blog_toggle_postdate',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'lms_education_courses_switch_sanitization'
  ));
  $wp_customize->add_control( new LMS_Education_Courses_Toggle_Switch_Custom_Control( $wp_customize, 'lms_education_courses_blog_toggle_postdate',array(
    'label' => esc_html__( 'Show / Hide Post Date','lms-education-courses' ),
    'section' => 'lms_education_courses_post_settings'
  )));

	$wp_customize->add_setting('lms_education_courses_toggle_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new LMS_Education_Courses_Fontawesome_Icon_Chooser(
        $wp_customize,'lms_education_courses_toggle_author_icon',array(
		'label'	=> __('Add Author Icon','lms-education-courses'),
		'transport' => 'refresh',
		'section'	=> 'lms_education_courses_post_settings',
		'setting'	=> 'lms_education_courses_toggle_author_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'lms_education_courses_blog_toggle_author',array(
	'default' => 1,
	'transport' => 'refresh',
	'sanitize_callback' => 'lms_education_courses_switch_sanitization'
  ));
  $wp_customize->add_control( new LMS_Education_Courses_Toggle_Switch_Custom_Control( $wp_customize, 'lms_education_courses_blog_toggle_author',array(
	'label' => esc_html__( 'Show / Hide Author','lms-education-courses' ),
	'section' => 'lms_education_courses_post_settings'
  )));

  $wp_customize->add_setting('lms_education_courses_toggle_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new LMS_Education_Courses_Fontawesome_Icon_Chooser(
        $wp_customize,'lms_education_courses_toggle_comments_icon',array(
		'label'	=> __('Add Comments Icon','lms-education-courses'),
		'transport' => 'refresh',
		'section'	=> 'lms_education_courses_post_settings',
		'setting'	=> 'lms_education_courses_toggle_comments_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'lms_education_courses_blog_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'lms_education_courses_switch_sanitization'
  ) );
  $wp_customize->add_control( new LMS_Education_Courses_Toggle_Switch_Custom_Control( $wp_customize, 'lms_education_courses_blog_toggle_comments',array(
		'label' => esc_html__( 'Show / Hide Comments','lms-education-courses' ),
		'section' => 'lms_education_courses_post_settings'
  )));

  $wp_customize->add_setting('lms_education_courses_toggle_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new LMS_Education_Courses_Fontawesome_Icon_Chooser(
        $wp_customize,'lms_education_courses_toggle_time_icon',array(
		'label'	=> __('Add Time Icon','lms-education-courses'),
		'transport' => 'refresh',
		'section'	=> 'lms_education_courses_post_settings',
		'setting'	=> 'lms_education_courses_toggle_time_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'lms_education_courses_blog_toggle_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'lms_education_courses_switch_sanitization'
  ) );
  $wp_customize->add_control( new LMS_Education_Courses_Toggle_Switch_Custom_Control( $wp_customize, 'lms_education_courses_blog_toggle_time',array(
		'label' => esc_html__( 'Show / Hide Time','lms-education-courses' ),
		'section' => 'lms_education_courses_post_settings'
  )));

  $wp_customize->add_setting( 'lms_education_courses_featured_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'lms_education_courses_switch_sanitization'
	));
  $wp_customize->add_control( new LMS_Education_Courses_Toggle_Switch_Custom_Control( $wp_customize, 'lms_education_courses_featured_image_hide_show', array(
		'label' => esc_html__( 'Show / Hide Featured Image','lms-education-courses' ),
		'section' => 'lms_education_courses_post_settings'
  )));

  $wp_customize->add_setting( 'lms_education_courses_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'lms_education_courses_sanitize_number_range'
	) );
	$wp_customize->add_control( 'lms_education_courses_featured_image_border_radius', array(
		'label'       => esc_html__( 'Featured Image Border Radius','lms-education-courses' ),
		'section'     => 'lms_education_courses_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'lms_education_courses_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'lms_education_courses_sanitize_number_range'
	) );
	$wp_customize->add_control( 'lms_education_courses_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Featured Image Box Shadow','lms-education-courses' ),
		'section'     => 'lms_education_courses_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Featured Image
	$wp_customize->add_setting('lms_education_courses_blog_post_featured_image_dimension',array(
       'default' => 'default',
       'sanitize_callback'	=> 'lms_education_courses_sanitize_choices'
	));
	$wp_customize->add_control('lms_education_courses_blog_post_featured_image_dimension',array(
		'type' => 'select',
		'label'	=> __('Blog Post Featured Image Dimension','lms-education-courses'),
		'section'	=> 'lms_education_courses_post_settings',
		'choices' => array(
		'default' => __('Default','lms-education-courses'),
		'custom' => __('Custom Image Size','lms-education-courses'),
      ),
	));

	$wp_customize->add_setting('lms_education_courses_blog_post_featured_image_custom_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
		));
	$wp_customize->add_control('lms_education_courses_blog_post_featured_image_custom_width',array(
		'label'	=> __('Featured Image Custom Width','lms-education-courses'),
		'description'	=> __('Enter a value in pixels. Example:20px','lms-education-courses'),
		'input_attrs' => array(
    	'placeholder' => __( '10px', 'lms-education-courses' ),),
		'section'=> 'lms_education_courses_post_settings',
		'type'=> 'text',
		'active_callback' => 'lms_education_courses_blog_post_featured_image_dimension'
		));

	$wp_customize->add_setting('lms_education_courses_blog_post_featured_image_custom_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_courses_blog_post_featured_image_custom_height',array(
		'label'	=> __('Featured Image Custom Height','lms-education-courses'),
		'description'	=> __('Enter a value in pixels. Example:20px','lms-education-courses'),
		'input_attrs' => array(
    	'placeholder' => __( '10px', 'lms-education-courses' ),),
		'section'=> 'lms_education_courses_post_settings',
		'type'=> 'text',
		'active_callback' => 'lms_education_courses_blog_post_featured_image_dimension'
	));

  $wp_customize->add_setting( 'lms_education_courses_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'lms_education_courses_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'lms_education_courses_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','lms-education-courses' ),
		'section'     => 'lms_education_courses_post_settings',
		'type'        => 'range',
		'settings'    => 'lms_education_courses_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('lms_education_courses_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_courses_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','lms-education-courses'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','lms-education-courses'),
		'section'=> 'lms_education_courses_post_settings',
		'type'=> 'text'
	));

  $wp_customize->add_setting('lms_education_courses_excerpt_settings',array(
    'default' => 'Excerpt',
    'transport' => 'refresh',
    'sanitize_callback' => 'lms_education_courses_sanitize_choices'
	));
	$wp_customize->add_control('lms_education_courses_excerpt_settings',array(
    'type' => 'select',
    'label' => esc_html__('Post Content','lms-education-courses'),
    'section' => 'lms_education_courses_post_settings',
    'choices' => array(
    	'Content' => esc_html__('Content','lms-education-courses'),
        'Excerpt' => esc_html__('Excerpt','lms-education-courses'),
        'No Content' => esc_html__('No Content','lms-education-courses')
        ),
	) );

  $wp_customize->add_setting('lms_education_courses_blog_page_posts_settings',array(
    'default' => 'Into Blocks',
    'transport' => 'refresh',
    'sanitize_callback' => 'lms_education_courses_sanitize_choices'
	));
	$wp_customize->add_control('lms_education_courses_blog_page_posts_settings',array(
    'type' => 'select',
    'label' => __('Display Blog Posts','lms-education-courses'),
    'section' => 'lms_education_courses_post_settings',
    'choices' => array(
    	'Into Blocks' => __('Into Blocks','lms-education-courses'),
        'Without Blocks' => __('Without Blocks','lms-education-courses')
        ),
	) );

	$wp_customize->add_setting( 'lms_education_courses_blog_pagination_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'lms_education_courses_switch_sanitization'
  ));
  $wp_customize->add_control( new LMS_Education_Courses_Toggle_Switch_Custom_Control( $wp_customize, 'lms_education_courses_blog_pagination_hide_show',array(
		'label' => esc_html__( 'Show / Hide Blog Pagination','lms-education-courses' ),
		'section' => 'lms_education_courses_post_settings'
  )));

	$wp_customize->add_setting('lms_education_courses_blog_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_courses_blog_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','lms-education-courses'),
		'input_attrs' => array(
            'placeholder' => __( '[...]', 'lms-education-courses' ),
        ),
		'section'=> 'lms_education_courses_post_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'lms_education_courses_blog_pagination_type', array(
    'default'			=> 'blog-page-numbers',
    'sanitize_callback'	=> 'lms_education_courses_sanitize_choices'
  ));
  $wp_customize->add_control( 'lms_education_courses_blog_pagination_type', array(
    'section' => 'lms_education_courses_post_settings',
    'type' => 'select',
    'label' => __( 'Blog Pagination', 'lms-education-courses' ),
    'choices'		=> array(
        'blog-page-numbers'  => __( 'Numeric', 'lms-education-courses' ),
        'next-prev' => __( 'Older Posts/Newer Posts', 'lms-education-courses' ),
  )));

    // Button Settings
	$wp_customize->add_section( 'lms_education_courses_button_settings', array(
		'title' => esc_html__( 'Button Settings', 'lms-education-courses' ),
		'panel' => 'lms_education_courses_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('lms_education_courses_button_text', array(
		'selector' => '.post-main-box .more-btn a',
		'render_callback' => 'lms_education_courses_Customize_partial_lms_education_courses_button_text',
	));

  $wp_customize->add_setting('lms_education_courses_button_text',array(
		'default'=> esc_html__('Read More','lms-education-courses'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_courses_button_text',array(
		'label'	=> esc_html__('Add Button Text','lms-education-courses'),
		'input_attrs' => array(
    'placeholder' => esc_html__( 'Read More', 'lms-education-courses' ),
        ),
		'section'=> 'lms_education_courses_button_settings',
		'type'=> 'text'
	));

	// font size button
	$wp_customize->add_setting('lms_education_courses_button_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_courses_button_font_size',array(
		'label'	=> __('Button Font Size','lms-education-courses'),
		'description'	=> __('Enter a value in pixels. Example:20px','lms-education-courses'),
		'input_attrs' => array(
  		'placeholder' => __( '10px', 'lms-education-courses' ),
    ),
  	'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'lms_education_courses_button_settings',
	));


	$wp_customize->add_setting( 'lms_education_courses_button_border_radius', array(
		'default'              => 5,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'lms_education_courses_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'lms_education_courses_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','lms-education-courses' ),
		'section'     => 'lms_education_courses_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	// button padding
	$wp_customize->add_setting('lms_education_courses_button_top_bottom_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_courses_button_top_bottom_padding',array(
		'label'	=> __('Button Top Bottom Padding','lms-education-courses'),
		'description'	=> __('Enter a value in pixels. Example:20px','lms-education-courses'),
		'input_attrs' => array(
      'placeholder' => __( '10px', 'lms-education-courses' ),
    ),
		'section'=> 'lms_education_courses_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('lms_education_courses_button_left_right_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_courses_button_left_right_padding',array(
		'label'	=> __('Button Left Right Padding','lms-education-courses'),
		'description'	=> __('Enter a value in pixels. Example:20px','lms-education-courses'),
		'input_attrs' => array(
      'placeholder' => __( '10px', 'lms-education-courses' ),
    ),
		'section'=> 'lms_education_courses_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('lms_education_courses_button_letter_spacing',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_courses_button_letter_spacing',array(
		'label'	=> __('Button Letter Spacing','lms-education-courses'),
		'description'	=> __('Enter a value in pixels. Example:20px','lms-education-courses'),
		'input_attrs' => array(
      	'placeholder' => __( '10px', 'lms-education-courses' ),
  ),
  	'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
	),
		'section'=> 'lms_education_courses_button_settings',
	));

	// text trasform
	$wp_customize->add_setting('lms_education_courses_button_text_transform',array(
		'default'=> 'Capitalize',
		'sanitize_callback'	=> 'lms_education_courses_sanitize_choices'
	));
	$wp_customize->add_control('lms_education_courses_button_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Button Text Transform','lms-education-courses'),
		'choices' => array(
      'Uppercase' => __('Uppercase','lms-education-courses'),
      'Capitalize' => __('Capitalize','lms-education-courses'),
      'Lowercase' => __('Lowercase','lms-education-courses'),
    ),
		'section'=> 'lms_education_courses_button_settings',
	));

	// Related Post Settings
	$wp_customize->add_section( 'lms_education_courses_related_posts_settings', array(
		'title' => esc_html__( 'Related Posts Settings', 'lms-education-courses' ),
		'panel' => 'lms_education_courses_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('lms_education_courses_related_post_title', array(
		'selector' => '.related-post h3',
		'render_callback' => 'lms_education_courses_Customize_partial_lms_education_courses_related_post_title',
	));

  $wp_customize->add_setting( 'lms_education_courses_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'lms_education_courses_switch_sanitization'
  ) );
  $wp_customize->add_control( new LMS_Education_Courses_Toggle_Switch_Custom_Control( $wp_customize, 'lms_education_courses_related_post',array(
		'label' => esc_html__( 'Related Post','lms-education-courses' ),
		'section' => 'lms_education_courses_related_posts_settings'
  )));

  $wp_customize->add_setting('lms_education_courses_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_courses_related_post_title',array(
		'label'	=> esc_html__('Add Related Post Title','lms-education-courses'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Related Post', 'lms-education-courses' ),
        ),
		'section'=> 'lms_education_courses_related_posts_settings',
		'type'=> 'text'
	));

 	$wp_customize->add_setting('lms_education_courses_related_posts_count',array(
		'default'=> 3,
		'sanitize_callback'	=> 'lms_education_courses_sanitize_number_absint'
	));
	$wp_customize->add_control('lms_education_courses_related_posts_count',array(
		'label'	=> esc_html__('Add Related Post Count','lms-education-courses'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '3', 'lms-education-courses' ),
        ),
		'section'=> 'lms_education_courses_related_posts_settings',
		'type'=> 'number'
	));

	$wp_customize->add_setting( 'lms_education_courses_related_posts_excerpt_number', array(
		'default'              => 20,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'lms_education_courses_sanitize_number_range'
	) );
	$wp_customize->add_control( 'lms_education_courses_related_posts_excerpt_number', array(
		'label'       => esc_html__( 'Related Posts Excerpt length','lms-education-courses' ),
		'section'     => 'lms_education_courses_related_posts_settings',
		'type'        => 'range',
		'settings'    => 'lms_education_courses_related_posts_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	// Single Posts Settings
	$wp_customize->add_section( 'lms_education_courses_single_blog_settings', array(
		'title' => __( 'Single Post Settings', 'lms-education-courses' ),
		'panel' => 'lms_education_courses_blog_post_parent_panel',
	));

  	$wp_customize->add_setting('lms_education_courses_single_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new LMS_Education_Courses_Fontawesome_Icon_Chooser(
        $wp_customize,'lms_education_courses_single_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','lms-education-courses'),
		'transport' => 'refresh',
		'section'	=> 'lms_education_courses_single_blog_settings',
		'setting'	=> 'lms_education_courses_single_postdate_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'lms_education_courses_single_postdate',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'lms_education_courses_switch_sanitization'
	) );
	$wp_customize->add_control( new LMS_Education_Courses_Toggle_Switch_Custom_Control( $wp_customize, 'lms_education_courses_single_postdate',array(
	   'label' => esc_html__( 'Show / Hide Date','lms-education-courses' ),
	   'section' => 'lms_education_courses_single_blog_settings'
	)));

	$wp_customize->add_setting('lms_education_courses_single_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new LMS_Education_Courses_Fontawesome_Icon_Chooser(
        $wp_customize,'lms_education_courses_single_author_icon',array(
		'label'	=> __('Add Author Icon','lms-education-courses'),
		'transport' => 'refresh',
		'section'	=> 'lms_education_courses_single_blog_settings',
		'setting'	=> 'lms_education_courses_single_author_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'lms_education_courses_single_author',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'lms_education_courses_switch_sanitization'
	) );
	$wp_customize->add_control( new LMS_Education_Courses_Toggle_Switch_Custom_Control( $wp_customize, 'lms_education_courses_single_author',array(
	    'label' => esc_html__( 'Show / Hide Author','lms-education-courses' ),
	    'section' => 'lms_education_courses_single_blog_settings'
	)));

   	$wp_customize->add_setting('lms_education_courses_single_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new LMS_Education_Courses_Fontawesome_Icon_Chooser(
        $wp_customize,'lms_education_courses_single_comments_icon',array(
		'label'	=> __('Add Comments Icon','lms-education-courses'),
		'transport' => 'refresh',
		'section'	=> 'lms_education_courses_single_blog_settings',
		'setting'	=> 'lms_education_courses_single_comments_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'lms_education_courses_single_comments',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'lms_education_courses_switch_sanitization'
	) );
	$wp_customize->add_control( new LMS_Education_Courses_Toggle_Switch_Custom_Control( $wp_customize, 'lms_education_courses_single_comments',array(
	    'label' => esc_html__( 'Show / Hide Comments','lms-education-courses' ),
	    'section' => 'lms_education_courses_single_blog_settings'
	)));

  	$wp_customize->add_setting('lms_education_courses_single_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new LMS_Education_Courses_Fontawesome_Icon_Chooser(
        $wp_customize,'lms_education_courses_single_time_icon',array(
		'label'	=> __('Add Time Icon','lms-education-courses'),
		'transport' => 'refresh',
		'section'	=> 'lms_education_courses_single_blog_settings',
		'setting'	=> 'lms_education_courses_single_time_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'lms_education_courses_single_time',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'lms_education_courses_switch_sanitization'
	) );
	$wp_customize->add_control( new LMS_Education_Courses_Toggle_Switch_Custom_Control( $wp_customize, 'lms_education_courses_single_time',array(
	    'label' => esc_html__( 'Show / Hide Time','lms-education-courses' ),
	    'section' => 'lms_education_courses_single_blog_settings'
	)));

	$wp_customize->add_setting( 'lms_education_courses_toggle_tags',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'lms_education_courses_switch_sanitization'
	));
  $wp_customize->add_control( new LMS_Education_Courses_Toggle_Switch_Custom_Control( $wp_customize, 'lms_education_courses_toggle_tags', array(
		'label' => esc_html__( 'Show / Hide Tags','lms-education-courses' ),
		'section' => 'lms_education_courses_single_blog_settings'
  )));

	$wp_customize->add_setting( 'lms_education_courses_single_post_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'lms_education_courses_switch_sanitization'
    ) );
 	 $wp_customize->add_control( new LMS_Education_Courses_Toggle_Switch_Custom_Control( $wp_customize, 'lms_education_courses_single_post_breadcrumb',array(
		'label' => esc_html__( 'Show / Hide Breadcrumb','lms-education-courses' ),
		'section' => 'lms_education_courses_single_blog_settings'
    )));

	// Single Posts Category
 	 $wp_customize->add_setting( 'lms_education_courses_single_post_category',array(
		'default' => true,
		'transport' => 'refresh',
		'sanitize_callback' => 'lms_education_courses_switch_sanitization'
    ) );
  	$wp_customize->add_control( new LMS_Education_Courses_Toggle_Switch_Custom_Control( $wp_customize, 'lms_education_courses_single_post_category',array(
		'label' => esc_html__( 'Show / Hide Category','lms-education-courses' ),
		'section' => 'lms_education_courses_single_blog_settings'
    )));

	$wp_customize->add_setting('lms_education_courses_single_post_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_courses_single_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','lms-education-courses'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','lms-education-courses'),
		'section'=> 'lms_education_courses_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'lms_education_courses_single_blog_post_navigation_show_hide',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'lms_education_courses_switch_sanitization'
	));
	$wp_customize->add_control( new LMS_Education_Courses_Toggle_Switch_Custom_Control( $wp_customize, 'lms_education_courses_single_blog_post_navigation_show_hide', array(
		  'label' => esc_html__( 'Show / Hide Post Navigation','lms-education-courses' ),
		  'section' => 'lms_education_courses_single_blog_settings'
	)));

	$wp_customize->add_setting( 'lms_education_courses_single_post_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'lms_education_courses_switch_sanitization'
    ) );
   $wp_customize->add_control( new LMS_Education_Courses_Toggle_Switch_Custom_Control( $wp_customize, 'lms_education_courses_single_post_breadcrumb',array(
		'label' => esc_html__( 'Show / Hide Breadcrumb','lms-education-courses' ),
		'section' => 'lms_education_courses_single_blog_settings'
    )));

	//navigation text
	$wp_customize->add_setting('lms_education_courses_single_blog_prev_navigation_text',array(
		'default'=> 'PREVIOUS',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_courses_single_blog_prev_navigation_text',array(
		'label'	=> __('Post Navigation Text','lms-education-courses'),
		'input_attrs' => array(
            'placeholder' => __( 'PREVIOUS', 'lms-education-courses' ),
        ),
		'section'=> 'lms_education_courses_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('lms_education_courses_single_blog_next_navigation_text',array(
		'default'=> 'NEXT',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_courses_single_blog_next_navigation_text',array(
		'label'	=> __('Post Navigation Text','lms-education-courses'),
		'input_attrs' => array(
            'placeholder' => __( 'NEXT', 'lms-education-courses' ),
        ),
		'section'=> 'lms_education_courses_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('lms_education_courses_single_blog_comment_title',array(
		'default'=> 'Leave a Reply',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('lms_education_courses_single_blog_comment_title',array(
		'label'	=> __('Add Comment Title','lms-education-courses'),
		'input_attrs' => array(
        'placeholder' => __( 'Leave a Reply', 'lms-education-courses' ),
    	),
		'section'=> 'lms_education_courses_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('lms_education_courses_single_blog_comment_button_text',array(
		'default'=> 'Post Comment',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('lms_education_courses_single_blog_comment_button_text',array(
		'label'	=> __('Add Comment Button Text','lms-education-courses'),
		'input_attrs' => array(
    'placeholder' => __( 'Post Comment', 'lms-education-courses' ),
        ),
		'section'=> 'lms_education_courses_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('lms_education_courses_single_blog_comment_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_courses_single_blog_comment_width',array(
		'label'	=> __('Comment Form Width','lms-education-courses'),
		'description'	=> __('Enter a value in %. Example:50%','lms-education-courses'),
		'input_attrs' => array(
            'placeholder' => __( '100%', 'lms-education-courses' ),
        ),
		'section'=> 'lms_education_courses_single_blog_settings',
		'type'=> 'text'
	));

	 // Grid layout setting
	$wp_customize->add_section( 'lms_education_courses_grid_layout_settings', array(
		'title' => __( 'Grid Layout Settings', 'lms-education-courses' ),
		'panel' => 'lms_education_courses_blog_post_parent_panel',
	));

  	$wp_customize->add_setting('lms_education_courses_grid_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new LMS_Education_Courses_Fontawesome_Icon_Chooser(
        $wp_customize,'lms_education_courses_grid_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','lms-education-courses'),
		'transport' => 'refresh',
		'section'	=> 'lms_education_courses_grid_layout_settings',
		'setting'	=> 'lms_education_courses_grid_postdate_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'lms_education_courses_grid_postdate',array(
	  'default' => 1,
	  'transport' => 'refresh',
	  'sanitize_callback' => 'lms_education_courses_switch_sanitization'
  ) );
  $wp_customize->add_control( new LMS_Education_Courses_Toggle_Switch_Custom_Control( $wp_customize, 'lms_education_courses_grid_postdate',array(
    'label' => esc_html__( 'Show / Hide Post Date','lms-education-courses' ),
    'section' => 'lms_education_courses_grid_layout_settings'
  )));

	$wp_customize->add_setting('lms_education_courses_grid_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new LMS_Education_Courses_Fontawesome_Icon_Chooser(
        $wp_customize,'lms_education_courses_grid_author_icon',array(
		'label'	=> __('Add Author Icon','lms-education-courses'),
		'transport' => 'refresh',
		'section'	=> 'lms_education_courses_grid_layout_settings',
		'setting'	=> 'lms_education_courses_grid_author_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'lms_education_courses_grid_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'lms_education_courses_switch_sanitization'
    ) );
    $wp_customize->add_control( new LMS_Education_Courses_Toggle_Switch_Custom_Control( $wp_customize, 'lms_education_courses_grid_author',array(
		'label' => esc_html__( 'Show / Hide Author','lms-education-courses' ),
		'section' => 'lms_education_courses_grid_layout_settings'
    )));

    $wp_customize->add_setting('lms_education_courses_grid_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new LMS_Education_Courses_Fontawesome_Icon_Chooser(
        $wp_customize,'lms_education_courses_grid_comments_icon',array(
		'label'	=> __('Add Comments Icon','lms-education-courses'),
		'transport' => 'refresh',
		'section'	=> 'lms_education_courses_grid_layout_settings',
		'setting'	=> 'lms_education_courses_grid_comments_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'lms_education_courses_grid_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'lms_education_courses_switch_sanitization'
    ) );
    $wp_customize->add_control( new LMS_Education_Courses_Toggle_Switch_Custom_Control( $wp_customize, 'lms_education_courses_grid_time',array(
		'label' => esc_html__( 'Show / Hide Time','lms-education-courses' ),
		'section' => 'lms_education_courses_grid_layout_settings'
    )));

    $wp_customize->add_setting('lms_education_courses_grid_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new LMS_Education_Courses_Fontawesome_Icon_Chooser(
        $wp_customize,'lms_education_courses_grid_time_icon',array(
		'label'	=> __('Add Time Icon','lms-education-courses'),
		'transport' => 'refresh',
		'section'	=> 'lms_education_courses_grid_layout_settings',
		'setting'	=> 'lms_education_courses_grid_time_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'lms_education_courses_grid_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'lms_education_courses_switch_sanitization'
    ) );
    $wp_customize->add_control( new LMS_Education_Courses_Toggle_Switch_Custom_Control( $wp_customize, 'lms_education_courses_grid_comments',array(
		'label' => esc_html__( 'Show / Hide Comments','lms-education-courses' ),
		'section' => 'lms_education_courses_grid_layout_settings'
    )));

 	$wp_customize->add_setting('lms_education_courses_grid_post_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_courses_grid_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','lms-education-courses'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','lms-education-courses'),
		'section'=> 'lms_education_courses_grid_layout_settings',
		'type'=> 'text'
	));

  $wp_customize->add_setting('lms_education_courses_display_grid_posts_settings',array(
    'default' => 'Into Blocks',
    'transport' => 'refresh',
    'sanitize_callback' => 'lms_education_courses_sanitize_choices'
	));
	$wp_customize->add_control('lms_education_courses_display_grid_posts_settings',array(
    'type' => 'select',
    'label' => __('Display Grid Posts','lms-education-courses'),
    'section' => 'lms_education_courses_grid_layout_settings',
    'choices' => array(
    	'Into Blocks' => __('Into Blocks','lms-education-courses'),
      'Without Blocks' => __('Without Blocks','lms-education-courses')
      ),
	) );

	$wp_customize->add_setting('lms_education_courses_grid_button_text',array(
		'default'=> esc_html__('Read More','lms-education-courses'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_courses_grid_button_text',array(
		'label'	=> esc_html__('Add Button Text','lms-education-courses'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Read More', 'lms-education-courses' ),
        ),
		'section'=> 'lms_education_courses_grid_layout_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('lms_education_courses_grid_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_courses_grid_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','lms-education-courses'),
		'input_attrs' => array(
        'placeholder' => __( '[...]', 'lms-education-courses' ),
        ),
		'section'=> 'lms_education_courses_grid_layout_settings',
		'type'=> 'text'
	));

  $wp_customize->add_setting('lms_education_courses_grid_excerpt_settings',array(
    'default' => 'Excerpt',
    'transport' => 'refresh',
    'sanitize_callback' => 'lms_education_courses_sanitize_choices'
	));
	$wp_customize->add_control('lms_education_courses_grid_excerpt_settings',array(
    'type' => 'select',
    'label' => esc_html__('Grid Post Content','lms-education-courses'),
    'section' => 'lms_education_courses_grid_layout_settings',
    'choices' => array(
    	'Content' => esc_html__('Content','lms-education-courses'),
        'Excerpt' => esc_html__('Excerpt','lms-education-courses'),
        'No Content' => esc_html__('No Content','lms-education-courses')
    ),
	) );

    $wp_customize->add_setting( 'lms_education_courses_grid_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'lms_education_courses_sanitize_number_range'
	) );
	$wp_customize->add_control( 'lms_education_courses_grid_featured_image_border_radius', array(
		'label'       => esc_html__( 'Grid Featured Image Border Radius','lms-education-courses' ),
		'section'     => 'lms_education_courses_grid_layout_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'lms_education_courses_grid_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'lms_education_courses_sanitize_number_range'
	) );
	$wp_customize->add_control( 'lms_education_courses_grid_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Grid Featured Image Box Shadow','lms-education-courses' ),
		'section'     => 'lms_education_courses_grid_layout_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Other
	$wp_customize->add_panel( 'lms_education_courses_other_parent_panel', array(
		'title' => esc_html__( 'Other Settings', 'lms-education-courses' ),
		'panel' => 'lms_education_courses_panel_id',
		'priority' => 20,
	));

	// Layout
	$wp_customize->add_section( 'lms_education_courses_left_right', array(
  	'title' => esc_html__('General Settings', 'lms-education-courses'),
		'panel' => 'lms_education_courses_other_parent_panel'
	) );

	$wp_customize->add_setting('lms_education_courses_width_option',array(
    'default' => 'Full Width',
    'sanitize_callback' => 'lms_education_courses_sanitize_choices'
	));
	$wp_customize->add_control(new LMS_Education_Courses_Image_Radio_Control($wp_customize, 'lms_education_courses_width_option', array(
    'type' => 'select',
    'label' => esc_html__('Width Layouts','lms-education-courses'),
    'description' => esc_html__('Here you can change the width layout of Website.','lms-education-courses'),
    'section' => 'lms_education_courses_left_right',
    'choices' => array(
        'Full Width' => esc_url(get_template_directory_uri()).'/assets/images/full-width.png',
        'Wide Width' => esc_url(get_template_directory_uri()).'/assets/images/wide-width.png',
        'Boxed' => esc_url(get_template_directory_uri()).'/assets/images/boxed-width.png',
  ))));

	$wp_customize->add_setting('lms_education_courses_page_layout',array(
    'default' => 'One_Column',
    'sanitize_callback' => 'lms_education_courses_sanitize_choices'
	));
	$wp_customize->add_control('lms_education_courses_page_layout',array(
    'type' => 'select',
    'label' => esc_html__('Page Sidebar Layout','lms-education-courses'),
    'description' => esc_html__('Here you can change the sidebar layout for pages. ','lms-education-courses'),
    'section' => 'lms_education_courses_left_right',
    'choices' => array(
        'Left_Sidebar' => esc_html__('Left Sidebar','lms-education-courses'),
        'Right_Sidebar' => esc_html__('Right Sidebar','lms-education-courses'),
        'One_Column' => esc_html__('One Column','lms-education-courses')
    ),
	) );
	
    // Pre-Loader
	$wp_customize->add_setting( 'lms_education_courses_loader_enable',array(
    'default' => 0,
    'transport' => 'refresh',
    'sanitize_callback' => 'lms_education_courses_switch_sanitization'
  ) );
  $wp_customize->add_control( new LMS_Education_Courses_Toggle_Switch_Custom_Control( $wp_customize, 'lms_education_courses_loader_enable',array(
    'label' => esc_html__( 'Pre-Loader','lms-education-courses' ),
    'section' => 'lms_education_courses_left_right'
  )));

	$wp_customize->add_setting('lms_education_courses_preloader_bg_color', array(
		'default'           => '#3790CB',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'lms_education_courses_preloader_bg_color', array(
		'label'    => __('Pre-Loader Background Color', 'lms-education-courses'),
		'section'  => 'lms_education_courses_left_right',
	)));

	$wp_customize->add_setting('lms_education_courses_preloader_border_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'lms_education_courses_preloader_border_color', array(
		'label'    => __('Pre-Loader Border Color', 'lms-education-courses'),
		'section'  => 'lms_education_courses_left_right',
	)));

	$wp_customize->add_setting('lms_education_courses_preloader_bg_img',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'lms_education_courses_preloader_bg_img',array(
    'label' => __('Preloader Background Image','lms-education-courses'),
    'section' => 'lms_education_courses_left_right'
	)));

    //404 Page Setting
	$wp_customize->add_section('lms_education_courses_404_page',array(
		'title'	=> __('404 Page Settings','lms-education-courses'),
		'panel' => 'lms_education_courses_other_parent_panel',
	));

	$wp_customize->add_setting('lms_education_courses_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('lms_education_courses_404_page_title',array(
		'label'	=> __('Add Title','lms-education-courses'),
		'input_attrs' => array(
            'placeholder' => __( '404 Not Found', 'lms-education-courses' ),
        ),
		'section'=> 'lms_education_courses_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('lms_education_courses_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('lms_education_courses_404_page_content',array(
		'label'	=> __('Add Text','lms-education-courses'),
		'input_attrs' => array(
            'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'lms-education-courses' ),
        ),
		'section'=> 'lms_education_courses_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('lms_education_courses_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_courses_404_page_button_text',array(
		'label'	=> __('Add Button Text','lms-education-courses'),
		'input_attrs' => array(
            'placeholder' => __( 'Go Back', 'lms-education-courses' ),
        ),
		'section'=> 'lms_education_courses_404_page',
		'type'=> 'text'
	));

	//No Result Page Setting
	$wp_customize->add_section('lms_education_courses_no_results_page',array(
		'title'	=> __('No Results Page Settings','lms-education-courses'),
		'panel' => 'lms_education_courses_other_parent_panel',
	));

	$wp_customize->add_setting('lms_education_courses_no_results_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('lms_education_courses_no_results_page_title',array(
		'label'	=> __('Add Title','lms-education-courses'),
		'input_attrs' => array(
            'placeholder' => __( 'Nothing Found', 'lms-education-courses' ),
        ),
		'section'=> 'lms_education_courses_no_results_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('lms_education_courses_no_results_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('lms_education_courses_no_results_page_content',array(
		'label'	=> __('Add Text','lms-education-courses'),
		'input_attrs' => array(
            'placeholder' => __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'lms-education-courses' ),
        ),
		'section'=> 'lms_education_courses_no_results_page',
		'type'=> 'text'
	));

	//Social Icon Setting
	$wp_customize->add_section('lms_education_courses_social_icon_settings',array(
		'title'	=> __('Social Icons Settings','lms-education-courses'),
		'panel' => 'lms_education_courses_other_parent_panel',
	));

	$wp_customize->add_setting('lms_education_courses_social_icon_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_courses_social_icon_font_size',array(
		'label'	=> __('Icon Font Size','lms-education-courses'),
		'description'	=> __('Enter a value in pixels. Example:20px','lms-education-courses'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'lms-education-courses' ),
        ),
		'section'=> 'lms_education_courses_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('lms_education_courses_social_icon_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_courses_social_icon_padding',array(
		'label'	=> __('Icon Padding','lms-education-courses'),
		'description'	=> __('Enter a value in pixels. Example:20px','lms-education-courses'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'lms-education-courses' ),
        ),
		'section'=> 'lms_education_courses_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('lms_education_courses_social_icon_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_courses_social_icon_width',array(
		'label'	=> __('Icon Width','lms-education-courses'),
		'description'	=> __('Enter a value in pixels. Example:20px','lms-education-courses'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'lms-education-courses' ),
        ),
		'section'=> 'lms_education_courses_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('lms_education_courses_social_icon_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_courses_social_icon_height',array(
		'label'	=> __('Icon Height','lms-education-courses'),
		'description'	=> __('Enter a value in pixels. Example:20px','lms-education-courses'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'lms-education-courses' ),
        ),
		'section'=> 'lms_education_courses_social_icon_settings',
		'type'=> 'text'
	));

	//Responsive Media Settings
	$wp_customize->add_section('lms_education_courses_responsive_media',array(
		'title'	=> esc_html__('Responsive Media','lms-education-courses'),
		'panel' => 'lms_education_courses_other_parent_panel',
	));

  $wp_customize->add_setting( 'lms_education_courses_resp_scroll_top_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'lms_education_courses_switch_sanitization'
  ));
  $wp_customize->add_control( new LMS_Education_Courses_Toggle_Switch_Custom_Control( $wp_customize, 'lms_education_courses_resp_scroll_top_hide_show',array(
    	'label' => esc_html__( 'Show / Hide Scroll To Top','lms-education-courses' ),
    	'section' => 'lms_education_courses_responsive_media'
  )));

 	$wp_customize->add_setting( 'lms_education_courses_sidebar_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'lms_education_courses_switch_sanitization'
    ));  
    $wp_customize->add_control( new LMS_Education_Courses_Toggle_Switch_Custom_Control( $wp_customize, 'lms_education_courses_sidebar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Blog Sidebar','lms-education-courses' ),
      'section' => 'lms_education_courses_responsive_media'
    )));

    $wp_customize->add_setting( 'lms_education_courses_responsive_preloader_hide',array(
        'default' => false,
        'transport' => 'refresh',
        'sanitize_callback' => 'lms_education_courses_switch_sanitization'
    ) );
    $wp_customize->add_control( new LMS_Education_Courses_Toggle_Switch_Custom_Control( $wp_customize, 'lms_education_courses_responsive_preloader_hide',array(
        'label' => esc_html__( 'Show / Hide Preloader','lms-education-courses' ),
        'section' => 'lms_education_courses_responsive_media'
    )));

  $wp_customize->add_setting('lms_education_courses_res_open_menu_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new LMS_Education_Courses_Fontawesome_Icon_Chooser(
        $wp_customize,'lms_education_courses_res_open_menu_icon',array(
		'label'	=> __('Add Open Menu Icon','lms-education-courses'),
		'transport' => 'refresh',
		'section'	=> 'lms_education_courses_responsive_media',
		'setting'	=> 'lms_education_courses_res_open_menu_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('lms_education_courses_res_close_menu_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new LMS_Education_Courses_Fontawesome_Icon_Chooser(
        $wp_customize,'lms_education_courses_res_close_menu_icon',array(
		'label'	=> __('Add Close Menu Icon','lms-education-courses'),
		'transport' => 'refresh',
		'section'	=> 'lms_education_courses_responsive_media',
		'setting'	=> 'lms_education_courses_res_close_menu_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('lms_education_courses_resp_menu_toggle_btn_bg_color', array(
		'default'           => '#3790CB',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'lms_education_courses_resp_menu_toggle_btn_bg_color', array(
		'label'    => __('Toggle Button Bg Color', 'lms-education-courses'),
		'section'  => 'lms_education_courses_responsive_media',
	)));

  //Woocommerce settings
	$wp_customize->add_section('lms_education_courses_woocommerce_section', array(
		'title'    => __('WooCommerce Layout', 'lms-education-courses'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'lms_education_courses_woocommerce_shop_page_sidebar', array( 'selector' => '.post-type-archive-product #sidebar',
		'render_callback' => 'lms_education_courses_customize_partial_lms_education_courses_woocommerce_shop_page_sidebar', ) );

    //Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'lms_education_courses_woocommerce_shop_page_sidebar',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'lms_education_courses_switch_sanitization'
  ) );
  $wp_customize->add_control( new LMS_Education_Courses_Toggle_Switch_Custom_Control( $wp_customize, 'lms_education_courses_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Show / Hide Shop Page Sidebar','lms-education-courses' ),
		'section' => 'lms_education_courses_woocommerce_section'
  )));

   $wp_customize->add_setting('lms_education_courses_shop_page_layout',array(
    'default' => 'Right Sidebar',
    'sanitize_callback' => 'lms_education_courses_sanitize_choices'
	));
	$wp_customize->add_control('lms_education_courses_shop_page_layout',array(
    'type' => 'select',
    'label' => __('Shop Page Sidebar Layout','lms-education-courses'),
    'section' => 'lms_education_courses_woocommerce_section',
    'choices' => array(
        'Left Sidebar' => __('Left Sidebar','lms-education-courses'),
        'Right Sidebar' => __('Right Sidebar','lms-education-courses'),
    ),
	) );

   //Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'lms_education_courses_woocommerce_single_product_page_sidebar', array( 'selector' => '.single-product #sidebar',
		'render_callback' => 'lms_education_courses_customize_partial_lms_education_courses_woocommerce_single_product_page_sidebar', ) );

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'lms_education_courses_woocommerce_single_product_page_sidebar',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'lms_education_courses_switch_sanitization'
   ) );
 	$wp_customize->add_control( new LMS_Education_Courses_Toggle_Switch_Custom_Control( $wp_customize, 'lms_education_courses_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Show / Hide Single Product Sidebar','lms-education-courses' ),
		'section' => 'lms_education_courses_woocommerce_section'
  )));

   $wp_customize->add_setting('lms_education_courses_single_product_layout',array(
    'default' => 'Right Sidebar',
    'sanitize_callback' => 'lms_education_courses_sanitize_choices'
	));
	$wp_customize->add_control('lms_education_courses_single_product_layout',array(
    'type' => 'select',
    'label' => __('Single Product Sidebar Layout','lms-education-courses'),
    'section' => 'lms_education_courses_woocommerce_section',
    'choices' => array(
        'Left Sidebar' => __('Left Sidebar','lms-education-courses'),
        'Right Sidebar' => __('Right Sidebar','lms-education-courses'),
    ),
	) );

    //Products per page
    $wp_customize->add_setting('lms_education_courses_products_per_page',array(
		'default'=> '9',
		'sanitize_callback'	=> 'lms_education_courses_sanitize_float'
	));
	$wp_customize->add_control('lms_education_courses_products_per_page',array(
		'label'	=> __('Products Per Page','lms-education-courses'),
		'description' => __('Display on shop page','lms-education-courses'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'lms_education_courses_woocommerce_section',
		'type'=> 'number',
	));

    //Products per row
    $wp_customize->add_setting('lms_education_courses_products_per_row',array(
		'default'=> '3',
		'sanitize_callback'	=> 'lms_education_courses_sanitize_choices'
	));
	$wp_customize->add_control('lms_education_courses_products_per_row',array(
		'label'	=> __('Products Per Row','lms-education-courses'),
		'description' => __('Display on shop page','lms-education-courses'),
		'choices' => array(
            '2' => '2',
			'3' => '3',
			'4' => '4',
        ),
		'section'=> 'lms_education_courses_woocommerce_section',
		'type'=> 'select',
	));

	//Products padding
	$wp_customize->add_setting('lms_education_courses_products_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_courses_products_padding_top_bottom',array(
		'label'	=> __('Products Padding Top Bottom','lms-education-courses'),
		'description'	=> __('Enter a value in pixels. Example:20px','lms-education-courses'),
		'input_attrs' => array(
        'placeholder' => __( '10px', 'lms-education-courses' ),
        ),
		'section'=> 'lms_education_courses_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('lms_education_courses_products_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_courses_products_padding_left_right',array(
		'label'	=> __('Products Padding Left Right','lms-education-courses'),
		'description'	=> __('Enter a value in pixels. Example:20px','lms-education-courses'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'lms-education-courses' ),
        ),
		'section'=> 'lms_education_courses_woocommerce_section',
		'type'=> 'text'
	));

	//Products box shadow
	$wp_customize->add_setting( 'lms_education_courses_products_box_shadow', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'lms_education_courses_sanitize_number_range'
	) );
	$wp_customize->add_control( 'lms_education_courses_products_box_shadow', array(
		'label'       => esc_html__( 'Products Box Shadow','lms-education-courses' ),
		'section'     => 'lms_education_courses_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products border radius
    $wp_customize->add_setting( 'lms_education_courses_products_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'lms_education_courses_sanitize_number_range'
	) );
	$wp_customize->add_control( 'lms_education_courses_products_border_radius', array(
		'label'       => esc_html__( 'Products Border Radius','lms-education-courses' ),
		'section'     => 'lms_education_courses_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'lms_education_courses_products_button_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'lms_education_courses_sanitize_number_range'
	) );
	$wp_customize->add_control( 'lms_education_courses_products_button_border_radius', array(
		'label'       => esc_html__( 'Products Button Border Radius','lms-education-courses' ),
		'section'     => 'lms_education_courses_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('lms_education_courses_products_btn_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_courses_products_btn_padding_top_bottom',array(
		'label'	=> __('Products Button Padding Top Bottom','lms-education-courses'),
		'description'	=> __('Enter a value in pixels. Example:20px','lms-education-courses'),
		'input_attrs' => array(
        'placeholder' => __( '10px', 'lms-education-courses' ),
        ),
		'section'=> 'lms_education_courses_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('lms_education_courses_products_btn_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_courses_products_btn_padding_left_right',array(
		'label'	=> __('Products Button Padding Left Right','lms-education-courses'),
		'description'	=> __('Enter a value in pixels. Example:20px','lms-education-courses'),
		'input_attrs' => array(
        'placeholder' => __( '10px', 'lms-education-courses' ),
        ),
		'section'=> 'lms_education_courses_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('lms_education_courses_woocommerce_sale_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_courses_woocommerce_sale_font_size',array(
		'label'	=> __('Sale Font Size','lms-education-courses'),
		'description'	=> __('Enter a value in pixels. Example:20px','lms-education-courses'),
		'input_attrs' => array(
        'placeholder' => __( '10px', 'lms-education-courses' ),
        ),
		'section'=> 'lms_education_courses_woocommerce_section',
		'type'=> 'text'
	));

	//Products Sale Badge
	$wp_customize->add_setting('lms_education_courses_woocommerce_sale_position',array(
    'default' => 'right',
    'sanitize_callback' => 'lms_education_courses_sanitize_choices'
	));
	$wp_customize->add_control('lms_education_courses_woocommerce_sale_position',array(
    'type' => 'select',
    'label' => __('Sale Badge Position','lms-education-courses'),
    'section' => 'lms_education_courses_woocommerce_section',
    'choices' => array(
        'left' => __('Left','lms-education-courses'),
        'right' => __('Right','lms-education-courses'),
    ),
	) );

	$wp_customize->add_setting('lms_education_courses_woocommerce_sale_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_courses_woocommerce_sale_padding_top_bottom',array(
		'label'	=> __('Sale Padding Top Bottom','lms-education-courses'),
		'description'	=> __('Enter a value in pixels. Example:20px','lms-education-courses'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'lms-education-courses' ),
        ),
		'section'=> 'lms_education_courses_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('lms_education_courses_woocommerce_sale_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lms_education_courses_woocommerce_sale_padding_left_right',array(
		'label'	=> __('Sale Padding Left Right','lms-education-courses'),
		'description'	=> __('Enter a value in pixels. Example:20px','lms-education-courses'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'lms-education-courses' ),
        ),
		'section'=> 'lms_education_courses_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'lms_education_courses_woocommerce_sale_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'lms_education_courses_sanitize_number_range'
	) );
	$wp_customize->add_control( 'lms_education_courses_woocommerce_sale_border_radius', array(
		'label'       => esc_html__( 'Sale Border Radius','lms-education-courses' ),
		'section'     => 'lms_education_courses_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	// Related Product
  $wp_customize->add_setting( 'lms_education_courses_related_product_show_hide',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'lms_education_courses_switch_sanitization'
  ) );
  $wp_customize->add_control( new LMS_Education_Courses_Toggle_Switch_Custom_Control( $wp_customize, 'lms_education_courses_related_product_show_hide',array(
    'label' => esc_html__( 'Show / Hide Related product','lms-education-courses' ),
    'section' => 'lms_education_courses_woocommerce_section'
  )));

}

add_action( 'customize_register', 'lms_education_courses_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class LMS_Education_Courses_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'LMS_Education_Courses_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new LMS_Education_Courses_Customize_Section_Pro( $manager,'lms_education_courses_go_pro', array(
			'priority'   => 1,
			'title'    => esc_html__( 'LMS EDUCATION PRO', 'lms-education-courses' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'lms-education-courses' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/products/lms-education-wordpress-theme'),
		) )	);

		// Register sections.
		$manager->add_section(new LMS_Education_Courses_Customize_Section_Pro($manager,'lms_education_courses_get_started_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'lms-education-courses' ),
			'pro_text' => esc_html__( 'DOCS', 'lms-education-courses' ),
			'pro_url'  => esc_url('https://preview.vwthemesdemo.com/docs/free-lms-education-courses/'),
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'lms-education-courses-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'lms-education-courses-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
LMS_Education_Courses_Customize::get_instance();
