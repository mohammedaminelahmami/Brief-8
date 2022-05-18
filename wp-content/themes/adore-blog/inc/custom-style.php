<?php
/**
* @see adore_blog_custom_header_setup().
*/
function adore_blog_header_text_style() {
// If we get this far, we have custom styles. Let's do this.
	$header_text_display = get_theme_mod( 'adore_blog_header_text_display' );
	?>
	<style type="text/css">

		/* Site title and tagline color css */
		.site-title a{
			color: #<?php echo esc_attr( get_header_textcolor() ); ?>;
		}
		.site-description {
			color: <?php echo esc_attr( get_theme_mod( 'adore_blog_header_tagline', '#2e2e2e' ) ); ?>;
		}
		/* End Site title and tagline color css */

</style>

<?php
}
add_action( 'wp_head', 'adore_blog_header_text_style' );