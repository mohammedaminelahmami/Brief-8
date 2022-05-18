<?php

// Home Page Customizer panel
$wp_customize->add_panel(
	'adore_blog_frontpage_panel',
	array(
		'title' => esc_html__( 'Frontpage Sections', 'adore-blog' ),
		'priority' => 140,
	)
);

$customizer_settings = array( 'top-bar','slider','posts-carousel','trending','recent-posts','advertisement-area','latest-posts','subscription' );

foreach ($customizer_settings as $customizer ) {
	require get_parent_theme_file_path( '/inc/customizer/frontpage-customizer/'.$customizer.'.php' );
}