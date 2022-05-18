<?php
/**
* Blog/Archive section 
*/

// Blog/Archive section 
$wp_customize->add_section(
	'adore_blog_archive_settings',
	array(
		'title' => esc_html__( 'Archive/Blog Options', 'adore-blog' ),
		'description' => esc_html__( 'Settings for archive pages including blog page too.', 'adore-blog' ),
		'panel' => 'adore_blog_theme_options_panel',
	)
);

// Archive excerpt length setting
$wp_customize->add_setting(
	'adore_blog_archive_excerpt_length',
	array(
		'default'			=> 20,
		'sanitize_callback' => 'adore_blog_sanitize_number_range',
	)
);

$wp_customize->add_control(
	'adore_blog_archive_excerpt_length',
	array(
		'label'			=> esc_html__( 'Excerpt more length:', 'adore-blog' ),
		'section'		=> 'adore_blog_archive_settings',
		'type'			=> 'number',
		'input_attrs'   => array( 'min' => 5 ),
	)
);

// Date enable setting
$wp_customize->add_setting(
	'adore_blog_enable_archive_date',
	array(
		'default'			=> true,
		'sanitize_callback' => 'adore_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'adore_blog_enable_archive_date',
	array(
		'label'		=> esc_html__( 'Enable date.', 'adore-blog' ),
		'section'	=> 'adore_blog_archive_settings',
		'type'		=> 'checkbox',
	)
);

// Category enable setting
$wp_customize->add_setting(
	'adore_blog_enable_archive_cat',
	array(
		'default'			=> true,
		'sanitize_callback' => 'adore_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'adore_blog_enable_archive_cat',
	array(
		'label'		=> esc_html__( 'Enable category.', 'adore-blog' ),
		'section'	=> 'adore_blog_archive_settings',
		'type'		=> 'checkbox',
	)
);

// archive image enable setting
$wp_customize->add_setting(
	'adore_blog_enable_archive_featured_img',
	array(
		'default'			=> true,
		'sanitize_callback' => 'adore_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'adore_blog_enable_archive_featured_img',
	array(
		'label'		=> esc_html__( 'Enable featured image.', 'adore-blog' ),
		'section'	=> 'adore_blog_archive_settings',
		'type'		=> 'checkbox',
	)
);

// Content type setting
$wp_customize->add_setting(
	'adore_blog_enable_archive_content_type',
	array(
		'default'			=> 'excerpt',
		'sanitize_callback'	=> 'adore_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'adore_blog_enable_archive_content_type',
	array(
		'label'		=> esc_html__( 'Content type:', 'adore-blog' ),
		'section'	=> 'adore_blog_archive_settings',
		'type'		=> 'radio',
		'choices'	=> array(
			'full-content'	=> esc_html__( 'Full content', 'adore-blog' ), 
			'excerpt'		=> esc_html__( 'Excerpt', 'adore-blog' ), 
		),
	)
);

// Pagination type setting
$wp_customize->add_setting(
	'adore_blog_archive_pagination_type',
	array(
		'default'			=> 'numeric',
		'sanitize_callback' => 'adore_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'adore_blog_archive_pagination_type',
	array(
		'label'			=> esc_html__( 'Pagination type:', 'adore-blog' ),
		'section'		=> 'adore_blog_archive_settings',
		'type'			=> 'select',
		'choices'		=> array( 
			'disable'		=> esc_html__( '--Disable--', 'adore-blog' ),
			'numeric'		=> esc_html__( 'Numeric', 'adore-blog' ),
			'older_newer'	=> esc_html__( 'Older / Newer', 'adore-blog' ),
		)
	)
);