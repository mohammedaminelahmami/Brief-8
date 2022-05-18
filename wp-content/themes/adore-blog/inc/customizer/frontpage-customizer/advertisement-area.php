<?php
/**
* Adore Themes Customizer
*
* @package Adore Blog
*
* Advertisement section
*/

$wp_customize->add_section(
	'adore_blog_advertisement_section',
	array(
		'title' => esc_html__( 'Advertisement Area', 'adore-blog' ),
		'panel' => 'adore_blog_frontpage_panel',
	)
);

$wp_customize->add_setting(
	'adore_blog_advertisement_enable',
	array(
		'sanitize_callback' => 'adore_blog_sanitize_checkbox',
		'default' => false,
	)
);

$wp_customize->add_control(
	'adore_blog_advertisement_enable',
	array(
		'section'		=> 'adore_blog_advertisement_section',
		'label'			=> esc_html__( 'Advertisement Enable/Disable', 'adore-blog' ),
		'type'			=> 'checkbox',
	)
);

//Advertisement Image
$wp_customize->add_setting( 
	'adore_blog_advertisement_image',
	array(
		'sanitize_callback' => 'adore_blog_sanitize_image',
	) 
);

$wp_customize->add_control( 
	new WP_Customize_Image_Control( $wp_customize, 'adore_blog_advertisement_image',
		array(
			'label'       		=> esc_html__( 'Advertisement Image', 'adore-blog' ),
			'section'     		=> 'adore_blog_advertisement_section',
			'active_callback'	=> 'adore_blog_if_advertisement_enabled',
		)
	) );

//Advertisement Image Url
$wp_customize->add_setting(
	'adore_blog_advertisement_image_url',
	array(
		'default' => '#',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'adore_blog_advertisement_image_url',
	array(
		'label'			=> esc_html__( 'Advertisement Url', 'adore-blog' ),
		'section'		=> 'adore_blog_advertisement_section',
		'type'			=> 'url',
		'active_callback'	=> 'adore_blog_if_advertisement_enabled',
	)
);

/*===================Active Callback=========================*/
function adore_blog_if_advertisement_enabled( $control ) {
	return $control->manager->get_setting( 'adore_blog_advertisement_enable' )->value();
}