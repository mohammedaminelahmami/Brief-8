<?php
/**
* Adore Themes Customizer
*
* @package Adore Blog
*
* Topbar Section
*/

$wp_customize->add_section(
	'adore_blog_top_bar_section',
	array(
		'title' => esc_html__( 'Topbar', 'adore-blog' ),
		'panel' => 'adore_blog_frontpage_panel',
	)
);

//Topbar section enable settings
$wp_customize->add_setting(
	'adore_blog_top_bar_enable',
	array(
		'default'			=> false,
		'sanitize_callback'	=> 'adore_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'adore_blog_top_bar_enable',
	array(
		'label'			=> esc_html__( 'Enable Topbar', 'adore-blog' ),
		'section'		=> 'adore_blog_top_bar_section',
		'type'			=> 'checkbox',
	)
);

//Topbar contact number settings
$wp_customize->add_setting(
	'adore_blog_top_bar_contact_number',
	array(	
		'default'			=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	)
);

$wp_customize->add_control(
	'adore_blog_top_bar_contact_number',
	array(
		'label'				=> esc_html__('Contact Number: ', 'adore-blog'),  
		'section'			=> 'adore_blog_top_bar_section',   		
		'type'				=> 'text',
		'active_callback'	=> 'adore_blog_if_top_bar_enable',
	)
);

$wp_customize->selective_refresh->add_partial( 
	'adore_blog_top_bar_contact_number', 
	array(
        'selector'            => '#top-navigation .contact-number a',
        'settings'            => 'adore_blog_top_bar_contact_number',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'adore_blog_topbar_partial_contact_number',
	) 
);

//Topbar email id settings
$wp_customize->add_setting(
	'adore_blog_top_bar_email_id',
	array(	
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control(
	'adore_blog_top_bar_email_id',
	array(
		'label'				=> esc_html__('Email Id: ', 'adore-blog'),  
		'section'			=> 'adore_blog_top_bar_section',   		
		'type'				=> 'text',
		'active_callback'	=> 'adore_blog_if_top_bar_enable',
	)
);

$wp_customize->selective_refresh->add_partial( 
	'adore_blog_top_bar_email_id', 
	array(
        'selector'            => '#top-navigation .mail-id a',
        'settings'            => 'adore_blog_top_bar_email_id',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'adore_blog_topbar_partial_email_id',
	) 
);

//Topbar social menu settings
$wp_customize->add_setting(
	'adore_blog_top_bar_social_menu',
	array(
		'default'			=> true,
		'sanitize_callback' => 'adore_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'adore_blog_top_bar_social_menu',
	array(
		'label'				=> esc_html__( 'Enable Topbar Menu', 'adore-blog' ),
		'section'			=> 'adore_blog_top_bar_section',
		'type'				=> 'checkbox',
		'active_callback'	=> 'adore_blog_if_top_bar_enable',
	)
);

/*===================Active Callback=========================*/
function adore_blog_if_top_bar_enable( $control ) {
	return $control->manager->get_setting( 'adore_blog_top_bar_enable' )->value();
}

/*===================Partial Refresh=========================*/
function adore_blog_topbar_partial_contact_number() {
	return esc_html( get_theme_mod( 'adore_blog_top_bar_contact_number' ) );
}
function adore_blog_topbar_partial_email_id() {
	return esc_html( get_theme_mod( 'adore_blog_top_bar_email_id' ) );
}