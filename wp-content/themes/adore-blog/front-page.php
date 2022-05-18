<?php
/**
 * The front page template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Adore Blog
 */

get_header(); 

if ( adore_blog_is_latest_posts() ) {

	require get_home_template();

} elseif ( adore_blog_is_frontpage() ) {
	$sorted_sections = array( 'slider', 'posts-carousel', 'main-content-section', 'latest-posts', 'subscription' );
	foreach ( $sorted_sections as $sorted_section ) {
		get_template_part( 'inc/frontpage-sections/' . $sorted_section ); 
	}
}

get_footer();