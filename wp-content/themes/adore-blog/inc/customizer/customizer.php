<?php
/**
 * Adore Themes Customizer
 *
 * @package Adore Blog
 */

//upgrade to pro
require get_template_directory() . '/inc/customizer/upgrade-to-pro/class-customize.php';

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function adore_blog_customize_register( $wp_customize ) {

	$default = adore_blog_get_default_mods();

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'adore_blog_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'adore_blog_customize_partial_blogdescription',
		) );
	}

	//Color Customizer Setting
	require get_template_directory() . '/inc/customizer/color.php';

	// Header text display setting
	$wp_customize->add_setting(	
		'adore_blog_header_text_display',
		array(
			'default'			=> true,
			'sanitize_callback'	=> 'adore_blog_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'adore_blog_header_text_display',
		array(
			'section'	=> 'title_tagline',
			'type'		=> 'checkbox',
			'label'		=> esc_html__( 'Display Site Title and Tagline', 'adore-blog' ),
		)
	);

	// Your latest posts title setting
	$wp_customize->add_setting(	
		'adore_blog_your_latest_posts_title',
		array(
			'default'			=> esc_html__( 'Blogs', 'adore-blog' ),
			'sanitize_callback'	=> 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'adore_blog_your_latest_posts_title',
		array(
			'label'				=> esc_html__( 'Title:', 'adore-blog' ),
			'section'			=> 'static_front_page',
			'active_callback'	=> 'adore_blog_is_latest_posts'
		)
	);

	//frontpage customizer section
	require get_template_directory() . '/inc/customizer/frontpage-customizer/customizer-sections.php';

	//theme options customizer section
	require get_template_directory() . '/inc/customizer/theme-options/theme-options-sections.php';

}
add_action( 'customize_register', 'adore_blog_customize_register' );

// Sanitize Callback
require get_parent_theme_file_path( '/inc/customizer/sanitize-callback.php' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function adore_blog_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function adore_blog_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Get all the default values of the theme mods.
 */
function adore_blog_get_default_mods() {
	$adore_blog_default_mods = array(
		// Footer copyright
		'adore_blog_copyright_txt' => esc_html__( 'Copyright &copy; [the-year] [site-link] ', 'adore-blog' ),
	);

	return apply_filters( 'adore_blog_default_mods', $adore_blog_default_mods );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function adore_blog_customize_preview_js() {
	wp_enqueue_script( 'adore-blog-customizer', get_theme_file_uri( '/assets/js/customizer.js' ), array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'adore_blog_customize_preview_js' );

/**
 * Binds JS handlers for Customizer controls.
 */
function adore_blog_customize_control_js() {
	wp_enqueue_style( 'adore-blog-customize-style', get_theme_file_uri( '/assets/css/customize-controls.css' ), array(), '20151215' );
	wp_enqueue_script( 'adore-blog-customize-control', get_theme_file_uri( '/assets/js/customize-control.js' ), array( 'jquery', 'customize-controls' ), '20151215', true );
	$localized_data = array( 
		'refresh_msg'	=> esc_html__( 'Refresh the page after Save and Publish.', 'adore-blog' ),
		'reset_msg'		=> esc_html__( 'Warning!!! This will reset all the settings. Refresh the page after Save and Publish to reset all.', 'adore-blog' ),
	);
	wp_localize_script( 'adore-blog-customize-control', 'localized_data', $localized_data );
}
add_action( 'customize_controls_enqueue_scripts', 'adore_blog_customize_control_js' );