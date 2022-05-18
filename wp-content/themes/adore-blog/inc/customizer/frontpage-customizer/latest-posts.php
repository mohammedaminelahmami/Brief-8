<?php
/**
* Adore Themes Customizer
*
* @package Adore Blog
*
* Latest Posts Section
*/

$wp_customize->add_section(
	'adore_blog_latest_posts_section',
	array(
		'title' => esc_html__( 'Latest Posts Section', 'adore-blog' ),
		'panel' => 'adore_blog_frontpage_panel',
	)
);

// Latest Posts Section enable settings
$wp_customize->add_setting(
	'adore_blog_latest_posts_enable',
	array(
		'default'			=> 'disable',
		'sanitize_callback' => 'adore_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'adore_blog_latest_posts_enable',
	array(
		'section'		=> 'adore_blog_latest_posts_section',
		'label'			=> esc_html__( 'Content type:', 'adore-blog' ),
		'description'	=> esc_html__( 'Choose where you want to render the content from.', 'adore-blog' ),
		'type'			=> 'select',
		'choices'		=> array( 
			'disable'		=> esc_html__( '--Disable--', 'adore-blog' ),
			'post'			=> esc_html__( 'Post', 'adore-blog' ),
			'category'		=> esc_html__( 'Category', 'adore-blog' ),
		)
	)
);

// Latest Posts Section title settings
$wp_customize->add_setting(
	'adore_blog_latest_posts_title',
	array(
		'default'			=>  __('Latest Posts', 'adore-blog'),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'adore_blog_latest_posts_title',
	array(
		'label'				=> esc_html__( 'Section Title:', 'adore-blog' ),		
		'section'			=> 'adore_blog_latest_posts_section',
		'active_callback'	=> 'adore_blog_if_latest_posts_enabled',

	)
);

$wp_customize->selective_refresh->add_partial( 
	'adore_blog_latest_posts_title', 
	array(
		'selector'				=> '#latest-post-section h2.section-title',
		'settings'				=> 'adore_blog_latest_posts_title',
		'container_inclusive'	=> false,
		'fallback_refresh'		=> true,
		'render_callback'		=> 'adore_blog_latest_posts_partial_title',
	) 
);

for ($i=1; $i <= 3; $i++) { 
// Latest Posts Section post setting
	$wp_customize->add_setting(
		'adore_blog_latest_posts_post_'.$i,
		array(
			'sanitize_callback' => 'adore_blog_sanitize_dropdown_pages',
		)
	);

	$wp_customize->add_control(
		'adore_blog_latest_posts_post_'.$i,
		array(
			'label'				=> sprintf( esc_html__( 'Post %d', 'adore-blog' ), $i ),
			'section'			=> 'adore_blog_latest_posts_section',
			'active_callback'	=> 'adore_blog_if_latest_posts_post',
			'type'				=> 'select',
			'choices'			=> adore_blog_get_post_choices(),
		)
	);

}

// Latest Posts Section category setting
$wp_customize->add_setting(
	'adore_blog_latest_posts_category',
	array(
		'sanitize_callback' => 'adore_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'adore_blog_latest_posts_category',
	array(
		'label'				=> esc_html__( 'Select Category', 'adore-blog' ),
		'section'			=> 'adore_blog_latest_posts_section',
		'type'				=> 'select',
		'choices'			=> adore_blog_get_post_cat_choices(),
		'active_callback'	=> 'adore_blog_if_latest_posts_category',
	)
);

// Latest Posts Section button settings
$wp_customize->add_setting(
	'adore_blog_latest_posts_button_label',
	array(	
		'default'			=> esc_html__( 'View All', 'adore-blog' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'adore_blog_latest_posts_button_label',
	array(
		'label'				=> __('Button Label', 'adore-blog'),  
		'section'			=> 'adore_blog_latest_posts_section',   		
		'type'				=> 'text',
		'active_callback'	=> 'adore_blog_if_latest_posts_enabled',
	)
);

$wp_customize->selective_refresh->add_partial( 
	'adore_blog_latest_posts_button_label', 
	array(
		'selector'            => '#latest-post-section .show-more a',
		'settings'            => 'adore_blog_latest_posts_button_label',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'adore_blog_latest_posts_partial_button',
	) 
);

// Latest Posts Section button url settings
$wp_customize->add_setting(
	'adore_blog_latest_posts_button_url',
	array(
		'default'			=> '#',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'adore_blog_latest_posts_button_url',
	array(
		'label'				=> esc_html__( 'Button Url', 'adore-blog' ),
		'section'			=> 'adore_blog_latest_posts_section',
		'type'				=> 'url',
		'active_callback'	=> 'adore_blog_if_latest_posts_enabled',
	)
);

/*========================Active Callback==============================*/
function adore_blog_if_latest_posts_enabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'adore_blog_latest_posts_enable' )->value();
}
function adore_blog_if_latest_posts_category( $control ) {
	return 'category' === $control->manager->get_setting( 'adore_blog_latest_posts_enable' )->value();
}
function adore_blog_if_latest_posts_post( $control ) {
	return 'post' === $control->manager->get_setting( 'adore_blog_latest_posts_enable' )->value();
}

/*========================Partial Refresh==============================*/
function adore_blog_latest_posts_partial_title() {
	return esc_html( get_theme_mod( 'adore_blog_latest_posts_title' ) );
}
function adore_blog_latest_posts_partial_button() {
	return esc_html( get_theme_mod( 'adore_blog_latest_posts_button_label' ) );
}