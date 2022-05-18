<?php
/**
 * Single pages setting 
 */

// Single pages setting section 
$wp_customize->add_section(
	'adore_blog_single_page_settings',
	array(
		'title'			=> esc_html__( 'Single Pages Options', 'adore-blog' ),
		'description'	=> esc_html__( 'Settings for all single pages.', 'adore-blog' ),
		'panel'			=> 'adore_blog_theme_options_panel',
	)
);

// Featured image enable setting
$wp_customize->add_setting(
	'adore_blog_enable_single_page_featured_img',
	array(
		'default'			=> true,
		'sanitize_callback'	=> 'adore_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'adore_blog_enable_single_page_featured_img',
	array(
		'section'	=> 'adore_blog_single_page_settings',
		'label'		=> esc_html__( 'Enable featured image.', 'adore-blog' ),
		'type'		=> 'checkbox',
	)
);