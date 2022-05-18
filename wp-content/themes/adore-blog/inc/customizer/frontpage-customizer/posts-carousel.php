<?php
/**
* Adore Themes Customizer
*
* @package Adore Blog
*
* Posts Carousel section
*/

$wp_customize->add_section(
	'adore_blog_posts_carousel_section',
	array(
		'title' => esc_html__( 'Posts Carousel', 'adore-blog' ),
		'panel' => 'adore_blog_frontpage_panel',
	)
);

// Posts Carousel enable settings
$wp_customize->add_setting(
	'adore_blog_posts_carousel_enable',
	array(
		'default'			=> 'disable',
		'sanitize_callback' => 'adore_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'adore_blog_posts_carousel_enable',
	array(
		'section'		=> 'adore_blog_posts_carousel_section',
		'label'			=> esc_html__( 'Content type:', 'adore-blog' ),
		'description'	=> esc_html__( 'Choose where you want to render the content from.', 'adore-blog' ),
		'type'			=> 'select',
		'choices'		=> array( 
			'disable'		=> esc_html__( '--Disable--', 'adore-blog' ),
			'post'			=> esc_html__( 'Post', 'adore-blog' ),
		)
	)
);

// Posts Carousel title settings
$wp_customize->add_setting(
	'adore_blog_posts_carousel_title',
	array(
		'default'			=>  __('Posts Carousel', 'adore-blog'),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'adore_blog_posts_carousel_title',
	array(
		'label'				=> esc_html__( 'Section Title:', 'adore-blog' ),		
		'section'			=> 'adore_blog_posts_carousel_section',
		'active_callback'	=> 'adore_blog_if_posts_carousel_enabled',

	)
);

$wp_customize->selective_refresh->add_partial( 
	'adore_blog_posts_carousel_title', 
	array(
		'selector'				=> '#featured-post-section h2.section-title',
		'settings'				=> 'adore_blog_posts_carousel_title',
		'container_inclusive'	=> false,
		'fallback_refresh'		=> true,
		'render_callback'		=> 'adore_blog_posts_carousel_partial_title',
	) 
);

for ($i=1; $i <= 4; $i++) { 
// Posts Carousel post setting
	$wp_customize->add_setting(
		'adore_blog_posts_carousel_post_'.$i,
		array(
			'sanitize_callback' => 'adore_blog_sanitize_dropdown_pages',
		)
	);

	$wp_customize->add_control(
		'adore_blog_posts_carousel_post_'.$i,
		array(
			'label'				=> sprintf( esc_html__( 'Post %d', 'adore-blog' ), $i ),
			'section'			=> 'adore_blog_posts_carousel_section',
			'active_callback'	=> 'adore_blog_if_posts_carousel_enabled',
			'type'				=> 'select',
			'choices'			=> adore_blog_get_post_choices(),
		)
	);

}

// Posts Carousel button settings
$wp_customize->add_setting(
	'adore_blog_posts_carousel_button_label',
	array(	
		'default'			=> esc_html__( 'View All', 'adore-blog' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'adore_blog_posts_carousel_button_label',
	array(
		'label'				=> __('Button Label', 'adore-blog'),  
		'section'			=> 'adore_blog_posts_carousel_section',   		
		'type'				=> 'text',
		'active_callback'	=> 'adore_blog_if_posts_carousel_enabled',
	)
);

$wp_customize->selective_refresh->add_partial( 
	'adore_blog_posts_carousel_button_label', 
	array(
		'selector'            => '#featured-post-section .show-more a',
		'settings'            => 'adore_blog_posts_carousel_button_label',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'adore_blog_posts_carousel_partial_button',
	) 
);

// Posts Carousel button url settings
$wp_customize->add_setting(
	'adore_blog_posts_carousel_button_url',
	array(
		'default'			=> '#',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'adore_blog_posts_carousel_button_url',
	array(
		'label'				=> esc_html__( 'Button Url', 'adore-blog' ),
		'section'			=> 'adore_blog_posts_carousel_section',
		'type'				=> 'url',
		'active_callback'	=> 'adore_blog_if_posts_carousel_enabled',
	)
);

/*========================Active Callback==============================*/
function adore_blog_if_posts_carousel_enabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'adore_blog_posts_carousel_enable' )->value();
}

/*========================Partial Refresh==============================*/
function adore_blog_posts_carousel_partial_button() {
	return esc_html( get_theme_mod( 'adore_blog_posts_carousel_button_label' ) );
}
function adore_blog_posts_carousel_partial_title() {
	return esc_html( get_theme_mod( 'adore_blog_posts_carousel_title' ) );
}