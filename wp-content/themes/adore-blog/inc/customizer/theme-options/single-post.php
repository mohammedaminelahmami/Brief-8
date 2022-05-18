<?php
/**
* Single posts setting 
*/

// Single setting section 
$wp_customize->add_section(
	'adore_blog_single_settings',
	array(
		'title'			=> esc_html__( 'Single Posts Options', 'adore-blog' ),
		'description'	=> esc_html__( 'Settings for all single posts.', 'adore-blog' ),
		'panel'			=> 'adore_blog_theme_options_panel',
	)
);

// Date enable setting
$wp_customize->add_setting(
	'adore_blog_enable_single_date',
	array(
		'default'			=> true,
		'sanitize_callback'	=> 'adore_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'adore_blog_enable_single_date',
	array(
		'label'		=> esc_html__( 'Enable date.', 'adore-blog' ),
		'section'	=> 'adore_blog_single_settings',
		'type'		=> 'checkbox',
	)
);

// Category enable setting
$wp_customize->add_setting(
	'adore_blog_enable_single_cat',
	array(
		'default'			=> true,
		'sanitize_callback' => 'adore_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'adore_blog_enable_single_cat',
	array(
		'label'		=> esc_html__( 'Enable category.', 'adore-blog' ),
		'section'	=> 'adore_blog_single_settings',
		'type'		=> 'checkbox',
	)
);

// Tag enable setting
$wp_customize->add_setting(
	'adore_blog_enable_single_tag',
	array(
		'default'			=> true,
		'sanitize_callback'	=> 'adore_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'adore_blog_enable_single_tag',
	array(
		'label'		=> esc_html__( 'Enable tags.', 'adore-blog' ),
		'section'	=> 'adore_blog_single_settings',
		'type'		=> 'checkbox',
	)
);

// Comment enable setting
$wp_customize->add_setting(
	'adore_blog_enable_single_comment',
	array(
		'default'			=> true,
		'sanitize_callback' => 'adore_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'adore_blog_enable_single_comment',
	array(
		'label'		=> esc_html__( 'Enable comment.', 'adore-blog' ),
		'section'	=> 'adore_blog_single_settings',
		'type'		=> 'checkbox',
	)
);


// Author enable setting
$wp_customize->add_setting(
	'adore_blog_enable_single_author',
	array(
		'default'			=> true,
		'sanitize_callback' => 'adore_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'adore_blog_enable_single_author',
	array(
		'label'		=> esc_html__( 'Enable author.', 'adore-blog' ),
		'section'	=> 'adore_blog_single_settings',
		'type'		=> 'checkbox',
	)
);

// Featured image enable setting
$wp_customize->add_setting(
	'adore_blog_enable_single_featured_img',
	array(
		'default'			=> true,
		'sanitize_callback' => 'adore_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'adore_blog_enable_single_featured_img',
	array(
		'section'	=> 'adore_blog_single_settings',
		'label'		=> esc_html__( 'Enable featured image.', 'adore-blog' ),
		'type'		=> 'checkbox',
	)
);

// Pagination enable setting
$wp_customize->add_setting(
	'adore_blog_enable_single_pagination',
	array(
		'default'			=> true,
		'sanitize_callback' => 'adore_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'adore_blog_enable_single_pagination',
	array(
		'label'		=> esc_html__( 'Enable pagination.', 'adore-blog' ),
		'section'	=> 'adore_blog_single_settings',
		'type'		=> 'checkbox',
	)
);