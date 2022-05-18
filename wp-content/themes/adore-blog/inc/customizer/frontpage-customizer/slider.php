<?php
/**
* Adore Themes Customizer
*
* @package Adore Blog
*
* slider section
*/

$wp_customize->add_section(
	'adore_blog_slider_section',
	array(
		'title' => esc_html__( 'Slider Section', 'adore-blog' ),
		'panel' => 'adore_blog_frontpage_panel',
	)
);

// slider enable settings
$wp_customize->add_setting(
	'adore_blog_slider_enable',
	array(
		'default'			=> 'disable',
		'sanitize_callback'	=> 'adore_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'adore_blog_slider_enable',
	array(
		'label'			=> esc_html__( 'Content type:', 'adore-blog' ),
		'description'	=> esc_html__( 'Choose where you want to render the content from.', 'adore-blog' ),
		'section'		=> 'adore_blog_slider_section',
		'type'			=> 'select',
		'choices'		=> array( 
			'disable'		=> esc_html__( '--Disable--', 'adore-blog' ),
			'post'			=> esc_html__( 'Post', 'adore-blog' ),
		)
	)
);

for ($i=1; $i <= 3; $i++) { 
	// slider post setting
	$wp_customize->add_setting(
		'adore_blog_slider_post_'.$i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'adore_blog_slider_post_'.$i,
		array(
			'label'				=> sprintf( esc_html__( 'Post %d', 'adore-blog' ), $i),
			'section'			=> 'adore_blog_slider_section',
			'type'				=> 'select',
			'choices'			=> adore_blog_get_post_choices(),
			'active_callback'	=> 'adore_blog_if_slider_enabled',
		)
	);

}

//slider button label setting
$wp_customize->add_setting(
	'adore_blog_slider_button_label',
	array(	
		'default'			=> esc_html__( 'Read More', 'adore-blog' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'adore_blog_slider_button_label',
	array(
		'label'				=> __('Button Label', 'adore-blog'),  
		'section'			=> 'adore_blog_slider_section',   		
		'type'				=> 'text',
		'active_callback'	=> 'adore_blog_if_slider_enabled',
	)
);

$wp_customize->selective_refresh->add_partial( 
	'adore_blog_slider_button_label', 
	array(
		'selector'            => '#slider-section a.btn',
		'settings'            => 'adore_blog_slider_button_label',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'adore_blog_slider_partial_button',
	) 
);

/*========================Active Callback==============================*/
function adore_blog_if_slider_enabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'adore_blog_slider_enable' )->value();
}

/*========================Partial Refresh==============================*/
function adore_blog_slider_partial_button() {
	return esc_html( get_theme_mod( 'adore_blog_slider_button_label' ) );
}