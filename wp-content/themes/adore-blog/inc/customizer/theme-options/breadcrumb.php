<?php
/**
 * Breadcrumb settings
 */

$wp_customize->add_section(
	'adore_blog_breadcrumb_section',
	array(
		'title' => esc_html__( 'Breadcrumb Options', 'adore-blog' ),
		'panel' => 'adore_blog_theme_options_panel',
	)
);

// Breadcrumb enable setting
$wp_customize->add_setting(
	'adore_blog_breadcrumb_enable',
	array(
		'default'			=> true,
		'sanitize_callback' => 'adore_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'adore_blog_breadcrumb_enable',
	array(
		'section'	=> 'adore_blog_breadcrumb_section',
		'label'		=> esc_html__( 'Enable breadcrumb.', 'adore-blog' ),
		'type'		=> 'checkbox',
	)
);

// Breadcrumb - Separator.
$wp_customize->add_setting(
	'adore_blog_breadcrumb_separator',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '/',
	)
);

$wp_customize->add_control(
	'adore_blog_breadcrumb_separator',
	array(
		'label'           => esc_html__( 'Separator', 'adore-blog' ),
		'section'         => 'adore_blog_breadcrumb_section',
		'active_callback' => function( $control ) {
			return ( $control->manager->get_setting( 'adore_blog_breadcrumb_enable' )->value() );
		},
	)
);