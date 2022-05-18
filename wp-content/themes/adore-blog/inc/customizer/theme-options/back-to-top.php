<?php
/**
 * Back To Top settings
 */

$wp_customize->add_section(
	'adore_blog_back_to_top_section',
	array(
		'title' => esc_html__( 'Scroll Up ( Back To Top )', 'adore-blog' ),
		'panel' => 'adore_blog_theme_options_panel',
	)
);

// Backtop enable setting
$wp_customize->add_setting(
	'adore_blog_back_to_top_enable',
	array(
		'default'			=> true,
		'sanitize_callback' => 'adore_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'adore_blog_back_to_top_enable',
	array(
		'section'	=> 'adore_blog_back_to_top_section',
		'label'		=> esc_html__( 'Enable Scroll up ( Back to top ).', 'adore-blog' ),
		'type'		=> 'checkbox',
	)
);