<?php
/**
* Adore Themes Customizer
*
* @package Adore Blog
*
* Trending Section
*/

$wp_customize->add_section(
	'adore_blog_trending_section',
	array(
		'title' => esc_html__( 'Trending Section', 'adore-blog' ),
		'panel' => 'adore_blog_frontpage_panel',
	)
);

// Trending Section enable settings
$wp_customize->add_setting(
	'adore_blog_trending_enable',
	array(
		'default'			=> 'disable',
		'sanitize_callback' => 'adore_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'adore_blog_trending_enable',
	array(
		'section'		=> 'adore_blog_trending_section',
		'label'			=> esc_html__( 'Content type:', 'adore-blog' ),
		'description'	=> esc_html__( 'Choose where you want to render the content from.', 'adore-blog' ),
		'type'			=> 'select',
		'choices'		=> array( 
			'disable'		=> esc_html__( '--Disable--', 'adore-blog' ),
			'post'			=> esc_html__( 'Post', 'adore-blog' ),
		)
	)
);

// Trending Section title settings
$wp_customize->add_setting(
	'adore_blog_trending_title',
	array(
		'default'			=>  __('Trending Section', 'adore-blog'),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'adore_blog_trending_title',
	array(
		'label'				=> esc_html__( 'Section Title:', 'adore-blog' ),		
		'section'			=> 'adore_blog_trending_section',
		'active_callback'	=> 'adore_blog_if_trending_enabled',

	)
);

$wp_customize->selective_refresh->add_partial( 
	'adore_blog_trending_title', 
	array(
		'selector'				=> '#primary-trending-section h2.section-title',
		'settings'				=> 'adore_blog_trending_title',
		'container_inclusive'	=> false,
		'fallback_refresh'		=> true,
		'render_callback'		=> 'adore_blog_trending_partial_title',
	) 
);

for ($i=1; $i <= 4; $i++) { 
// Trending Section post setting
	$wp_customize->add_setting(
		'adore_blog_trending_post_'.$i,
		array(
			'sanitize_callback' => 'adore_blog_sanitize_dropdown_pages',
		)
	);

	$wp_customize->add_control(
		'adore_blog_trending_post_'.$i,
		array(
			'label'				=> sprintf( esc_html__( 'Post %d', 'adore-blog' ), $i ),
			'section'			=> 'adore_blog_trending_section',
			'active_callback'	=> 'adore_blog_if_trending_enabled',
			'type'				=> 'select',
			'choices'			=> adore_blog_get_post_choices(),
		)
	);

}

// Trending Section button settings
$wp_customize->add_setting(
	'adore_blog_trending_button_label',
	array(	
		'default'			=> esc_html__( 'View All', 'adore-blog' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'adore_blog_trending_button_label',
	array(
		'label'				=> __('Button Label', 'adore-blog'),  
		'section'			=> 'adore_blog_trending_section',   		
		'type'				=> 'text',
		'active_callback'	=> 'adore_blog_if_trending_enabled',
	)
);

$wp_customize->selective_refresh->add_partial( 
	'adore_blog_trending_button_label', 
	array(
		'selector'            => '#primary-trending-section .show-more a',
		'settings'            => 'adore_blog_trending_button_label',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'adore_blog_trending_partial_button',
	) 
);

// Trending Section button url settings
$wp_customize->add_setting(
	'adore_blog_trending_button_url',
	array(
		'default'			=> '#',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'adore_blog_trending_button_url',
	array(
		'label'				=> esc_html__( 'Button Url', 'adore-blog' ),
		'section'			=> 'adore_blog_trending_section',
		'type'				=> 'url',
		'active_callback'	=> 'adore_blog_if_trending_enabled',
	)
);

/*========================Active Callback==============================*/
function adore_blog_if_trending_enabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'adore_blog_trending_enable' )->value();
}

/*========================Partial Refresh==============================*/
function adore_blog_trending_partial_title() {
	return esc_html( get_theme_mod( 'adore_blog_trending_title' ) );
}
function adore_blog_trending_partial_button() {
	return esc_html( get_theme_mod( 'adore_blog_trending_button_label' ) );
}