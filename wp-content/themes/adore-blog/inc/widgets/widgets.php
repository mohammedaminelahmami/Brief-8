<?php 

// Popular Posts Widget.
require get_template_directory() . '/inc/widgets/popular-posts-widget.php';

// Facourite Posts Widget.
require get_template_directory() . '/inc/widgets/favourite-post-widget.php';

// Social Links Widget.
require get_template_directory() . '/inc/widgets/social-links.php';

/**
* Register Widgets
*/
function adore_blog_register_widgets() {

	register_widget( 'Adore_Blog_Popular_Posts_Widget' );

	register_widget( 'Adore_Blog_Favourite_Posts_Widget' );

	register_widget( 'Adore_Blog_Social_Links_Widget' );

}
add_action( 'widgets_init', 'adore_blog_register_widgets' );