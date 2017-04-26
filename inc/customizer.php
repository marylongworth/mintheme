<?php

function mintheme_customize_register($wp_customize){

    
    $wp_customize->add_section('mintheme_options', array(
        'priority' 		=> 10,
		'capability'     => 'edit_theme_options',
		'title'    		=> __('mintheme options', 'mintheme'),
        'description'   => ' <div class="infohead">' . __('We appreciate an','mintheme') . ' <a href="http://wordpress.org/support/view/theme-reviews/mintheme" target="_blank">' . __('Honest Review','mintheme') . '</a> ' . __('of this Theme if you Love our Work','mintheme') . '<br /> <br />

' . __('Need More Features and Options including Exciting Slide and 100+ Advanced Features? Try ','mintheme') . '<a href="' . esc_url('http://d5creation.com/theme/mintheme/') .'
" target="_blank"><strong>' . __('mintheme Extend','mintheme') . '</strong></a><br /> <br /> 
        
        
' . __('You can Visit the mintheme Extend ','mintheme') . ' <a href="' . esc_url('http://demo.d5creation.com/themes/?theme=mintheme') .'" target="_blank"><strong>' . __('Demo Here','mintheme') . '</strong></a> 
        </div>		
		'
    ));

    //  Logo
    $wp_customize->add_setting( 'mintheme_logo' ); // Add setting for logo uploader
         
    // Add control for logo uploader (actual uploader)
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'mintheme_logo', array(
        'label'    => __( 'Upload Logo (replaces text)', 'mintheme' ),
        'section'  => 'title_tagline',
        'settings' => 'mintheme_logo',
    ) ));
	
	
//  Featured Boxes
    $wp_customize->add_setting('mintheme[srfbox]', array(
        'default'        	=> '1',
    	'sanitize_callback' => 'esc_html',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('mintheme_srfbox', array(
        'label'      => __('Featured Boxes', 'mintheme'),
        'section'    => 'mintheme_options',
        'settings'   => 'mintheme[srfbox]',
		'description' => __('Uncheck this if you do not want to show the Featured Boxes','mintheme'),
		'type' 		 => 'checkbox'
    ));

  
  	foreach (range(1, 4) as $fbsinumber) {
	  
//  Featured Box Image
    $wp_customize->add_setting('mintheme[featured-image2'. $fbsinumber .']', array(
        'default'           => get_template_directory_uri() . '/images/featured-image' . $fbsinumber . '.png',
        'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'esc_url',
        'type'           	=> 'option'
		

    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'featured-image2'. $fbsinumber, array(
        'label'    			=> __('Featured Image', 'mintheme') . ' ' . $fbsinumber,
        'section'  			=> 'mintheme_options',
        'settings' 			=> 'mintheme[featured-image2'. $fbsinumber .']',
		'description'   	=> __('Upload an image for the Featured Box. 50px X 50px image is recommended','mintheme')
    )));
  
// Featured Box Image Title
    $wp_customize->add_setting('mintheme[featured-title2' . $fbsinumber . ']', array(
        'default'        	=> __('mintheme Theme for Business','mintheme'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('mintheme_featured-title2' . $fbsinumber, array(
        'label'      => __('Title', 'mintheme'). ' ' . $fbsinumber,
        'section'    => 'mintheme_options',
        'settings'   => 'mintheme[featured-title2' . $fbsinumber .']'
    ));


// Featured Box Image Description
    $wp_customize->add_setting('mintheme[featured-description2' . $fbsinumber . ']', array(
        'default'        	=> __('mintheme is super elegant and Professional Responsive Theme which will create the business widely expressed. The Color changing options of mintheme will give the WordPress Driven Site an attractive look','mintheme'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('mintheme_featured-description2' . $fbsinumber  , array(
        'label'      => __('Description', 'mintheme') . ' ' . $fbsinumber,
        'section'    => 'mintheme_options',
        'settings'   => 'mintheme[featured-description2' . $fbsinumber .']',
		'type' 		 => 'textarea'
    ));
	
  }


//  Front Page Post
    $wp_customize->add_setting('mintheme[fpost]', array(
        'default'        	=> '0',
    	'sanitize_callback' => 'esc_html',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('mintheme_fpost', array(
        'label'      => __('Do not show any Posts or Page in the Front Page', 'mintheme'),
        'section'    => 'mintheme_options',
        'settings'   => 'mintheme[fpost]',
		'description' => __('Check the Box if you do not want to show any Posts or Page in the Front Page','mintheme'),
		'type' 		 => 'checkbox'
    ));

//  Responsive Layout
    $wp_customize->add_setting('mintheme[responsive]', array(
        'default'        	=> '0',
    	'sanitize_callback' => 'esc_html',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('mintheme_responsive', array(
        'label'      => __('Use Responsive Layout', 'mintheme'),
        'section'    => 'mintheme_options',
        'settings'   => 'mintheme[responsive]',
		'description' => __('Check the Box if you want the Responsive Layout of your Website','mintheme'),
		'type' 		 => 'checkbox'
    ));

 
//  You Tube Channel Link
    $wp_customize->add_setting('mintheme[youtube-link]', array(
        'default'        	=> '#',
    	'sanitize_callback' => 'esc_url',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('mintheme_youtube-link', array(
        'label'      => __('You Tube Channel Link', 'mintheme'),
        'section'    => 'mintheme_options',
        'settings'   => 'mintheme[youtube-link]'
    ));
	
//  Google Plus Link
    $wp_customize->add_setting('mintheme[gplus-link]', array(
        'default'        	=> '#',
    	'sanitize_callback' => 'esc_url',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('mintheme_gplus-link', array(
        'label'      => __('Google Plus Link', 'mintheme'),
        'section'    => 'mintheme_options',
        'settings'   => 'mintheme[gplus-link]'
    ));


//  Picassa Web Album Link
    $wp_customize->add_setting('mintheme[picassa-link]', array(
        'default'        	=> '#',
    	'sanitize_callback' => 'esc_url',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('mintheme_picassa-link', array(
        'label'      => __('Picassa Web Album Link', 'mintheme'),
        'section'    => 'mintheme_options',
        'settings'   => 'mintheme[picassa-link]'
    ));
	
//  Linked In Link
    $wp_customize->add_setting('mintheme[li-link]', array(
        'default'        	=> '#',
    	'sanitize_callback' => 'esc_url',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('mintheme_li-link', array(
        'label'      => __('Linked In Link', 'mintheme'),
        'section'    => 'mintheme_options',
        'settings'   => 'mintheme[li-link]'
    ));




//  Feed or Blog Link
    $wp_customize->add_setting('mintheme[feed-link]', array(
        'default'        	=> '#',
    	'sanitize_callback' => 'esc_url',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('mintheme_feed-link', array(
        'label'      => __('Feed or Blog Link', 'mintheme'),
        'section'    => 'mintheme_options',
        'settings'   => 'mintheme[feed-link]'
    ));


}


add_action('customize_register', 'mintheme_customize_register');


	if ( ! function_exists( 'mintheme_get_option' ) ) :
	function mintheme_get_option( $mintheme_name, $mintheme_default = false ) {
	$mintheme_config = get_option( 'mintheme' );

	if ( ! isset( $mintheme_config ) ) : return $mintheme_default; else: $mintheme_options = $mintheme_config; endif;
	if ( isset( $mintheme_options[$mintheme_name] ) ):  return $mintheme_options[$mintheme_name]; else: return $mintheme_default; endif;
	}
	endif;