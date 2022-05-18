<?php 
/**
* Adore Themes Customizer
*
* @package Adore Blog
*
* Subscription section
*/

// Subscription section
$wp_customize->add_section(
	'adore_blog_subscription_section',
	array(
		'title'			=> esc_html__( 'Subscription', 'adore-blog' ),
		'description'	=> sprintf( esc_html__( '%1$sJetpack%2$s should be active and site should be connected to WordPress.com for this section to work.', 'adore-blog' ), '<a target="_blank" href="https://wordpress.org/plugins/jetpack">', '</a>' ),
		'panel'			=> 'adore_blog_frontpage_panel',
	)
);

// Subscription enable setting
$wp_customize->add_setting(
	'adore_blog_subscription_enable',
	array(
		'default'			=> false,
		'sanitize_callback'	=> 'adore_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'adore_blog_subscription_enable',
	array(
		'label'			=> esc_html__( 'Enable subscription.', 'adore-blog' ),
		'section'		=> 'adore_blog_subscription_section',
		'type'			=> 'checkbox',
	)
);

//subscription bg image setting
$wp_customize->add_setting( 
	'adore_blog_subscription_bg_image',
	array(
		'default'			=> '',
		'sanitize_callback'	=> 'adore_blog_sanitize_image',
	) 
);

$wp_customize->add_control( 
	new WP_Customize_Image_Control( $wp_customize, 'adore_blog_subscription_bg_image',
		array(
			'label'				=> esc_html__( 'Background Image', 'adore-blog' ),
			'section'			=> 'adore_blog_subscription_section',
			'active_callback'	=> 'adore_blog_if_subscription_enabled',
		)
	) );

// Subscribe title setting
$wp_customize->add_setting(
	'adore_blog_subscription_title',
	array(
		'default'			=> __( 'Subscribe To Our Newsletter', 'adore-blog' ),
		'sanitize_callback'	=> 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'adore_blog_subscription_title',
	array(
		'label'				=> esc_html__( 'Title', 'adore-blog' ),
		'section'			=> 'adore_blog_subscription_section',
		'active_callback'	=> 'adore_blog_if_subscription_enabled'
	)
);

$wp_customize->selective_refresh->add_partial( 
	'adore_blog_subscription_title', 
	array(
		'selector'				=> '#subscription-section h3.widget-title',
		'settings'				=> 'adore_blog_subscription_title',
		'container_inclusive'	=> false,
		'fallback_refresh'		=> true,
		'render_callback'		=> 'adore_blog_subscription_partial_title',
	) 
);

// Subscribe title setting
$wp_customize->add_setting(
	'adore_blog_subscription_description',
	array(
		'default'			=> '',
		'sanitize_callback' => 'adore_blog_sanitize_html',
	)
);

$wp_customize->add_control(
	'adore_blog_subscription_description',
	array(
		'label'				=> esc_html__( 'Description', 'adore-blog' ),
		'section'			=> 'adore_blog_subscription_section',
		'active_callback'	=> 'adore_blog_if_subscription_enabled',
		'type'				=> 'textarea',
	)
);

$wp_customize->selective_refresh->add_partial( 
	'adore_blog_subscription_description', 
	array(
		'selector'				=> '#subscription-section .subscribe-text',
		'settings'				=> 'adore_blog_subscription_description',
		'container_inclusive'	=> false,
		'fallback_refresh'		=> true,
		'render_callback'		=> 'adore_blog_subscription_partial_description',
	) 
);

// Subscribe button label setting
$wp_customize->add_setting(
	'adore_blog_subscription_btn_label',
	array(
		'default'			=> __( 'SUBSCRIBE', 'adore-blog' ),
		'sanitize_callback'	=> 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'adore_blog_subscription_btn_label',
	array(
		'label'				=> esc_html__( 'Button Label', 'adore-blog' ),
		'section'			=> 'adore_blog_subscription_section',
		'active_callback'	=> 'adore_blog_if_subscription_enabled'
	)
);

/*===================Active Callback=========================*/
function adore_blog_if_subscription_enabled( $control ) {
	return $control->manager->get_setting( 'adore_blog_subscription_enable' )->value();
}

/*========================Partial Refresh==============================*/
function adore_blog_subscription_partial_title() {
	return esc_html( get_theme_mod( 'adore_blog_subscription_title' ) );
}
function adore_blog_subscription_partial_description() {
	return esc_html( get_theme_mod( 'adore_blog_subscription_description' ) );
}