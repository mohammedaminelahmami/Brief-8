<?php
/**
* Footer copyright
*/

// Footer copyright
$wp_customize->add_section(
	'adore_blog_footer_section',
	array(
		'title' => esc_html__( 'Footer Options', 'adore-blog' ),
		'panel' => 'adore_blog_theme_options_panel',
	)
);

// Footer copyright setting
$wp_customize->add_setting(
	'adore_blog_copyright_txt',
	array(
		'default'			=> $default['adore_blog_copyright_txt'],
		'sanitize_callback' => 'adore_blog_sanitize_html',
	)
);

$wp_customize->add_control(
	'adore_blog_copyright_txt',
	array(
		'label'				=> esc_html__( 'Copyright text:', 'adore-blog' ),
		'section'			=> 'adore_blog_footer_section',
		'type'				=> 'textarea',
	)
);