<?php
/**
* Global Layout
*/

// Global Layout
$wp_customize->add_section(
	'adore_blog_global_layout',
	array(
		'title' => esc_html__( 'Global Layout Options', 'adore-blog' ),
		'panel' => 'adore_blog_theme_options_panel',
	)
);

// Global site layout setting
$wp_customize->add_setting(
	'adore_blog_site_layout',
	array(
		'default'			=> 'wide',
		'sanitize_callback' => 'adore_blog_sanitize_select',
		'transport'			=> 'postMessage',
	)
);

$wp_customize->add_control(
	'adore_blog_site_layout',
	array(
		'label'			=> esc_html__( 'Site layout', 'adore-blog' ),
		'section'		=> 'adore_blog_global_layout',
		'type'			=> 'radio',
		'choices'		=> array( 
			'boxed'	=> esc_html__( 'Boxed', 'adore-blog' ), 
			'wide'	=> esc_html__( 'Wide', 'adore-blog' ), 
			'frame'	=> esc_html__( 'Frame', 'adore-blog' ), 
		),
	)
);

// Global archive layout setting
$wp_customize->add_setting(
	'adore_blog_archive_sidebar',
	array(
		'default'			=> 'right',
		'sanitize_callback' => 'adore_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'adore_blog_archive_sidebar',
	array(
		'label'			=> esc_html__( 'Archive Sidebar', 'adore-blog' ),
		'description'	=> esc_html__( 'This option works on all archive and blog pages.', 'adore-blog' ),
		'section'		=> 'adore_blog_global_layout',
		'type'			=> 'radio',
		'choices'		=> array( 
			'left'	=> esc_html__( 'Left', 'adore-blog' ), 
			'right'	=> esc_html__( 'Right', 'adore-blog' ), 
		),
	)
);

// Global page layout setting
$wp_customize->add_setting(
	'adore_blog_global_page_layout',
	array(
		'default'			=> 'right',
		'sanitize_callback'	=> 'adore_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'adore_blog_global_page_layout',
	array(
		'label'			=> esc_html__( 'Global page sidebar', 'adore-blog' ),
		'description'	=> esc_html__( 'This option works only on single pages.', 'adore-blog' ),
		'section'		=> 'adore_blog_global_layout',
		'type'			=> 'radio',
		'choices'		=> array( 
			'left'	=> esc_html__( 'Left', 'adore-blog' ), 
			'right'	=> esc_html__( 'Right', 'adore-blog' ), 
		),
	)
);

// Global post layout setting
$wp_customize->add_setting(
	'adore_blog_global_post_layout',
	array(
		'default'			=> 'right',
		'sanitize_callback'	=> 'adore_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'adore_blog_global_post_layout',
	array(
		'label'			=> esc_html__( 'Global post sidebar', 'adore-blog' ),
		'description'	=> esc_html__( 'This option works only on single posts', 'adore-blog' ),
		'section'		=> 'adore_blog_global_layout',
		'type'			=> 'radio',
		'choices'		=> array( 
			'left'	=> esc_html__( 'Left', 'adore-blog' ), 
			'right'	=> esc_html__( 'Right', 'adore-blog' ), 
		),
	)
);