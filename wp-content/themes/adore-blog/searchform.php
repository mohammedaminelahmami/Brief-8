<?php
/**
 * Template for displaying search forms
 *
 * @package Adore Themes
 * @subpackage Adore Blog
 * @since Adore Blog 1.0.0
 */

?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'adore-blog' ) ?></span>
		<input type="search" class="search-field"
		placeholder="<?php echo esc_attr_x( 'Search ...', 'placeholder', 'adore-blog' ) ?>"
		value="<?php echo get_search_query() ?>" name="s"
		title="<?php echo esc_attr_x( 'Search for:', 'label', 'adore-blog' ) ?>" />
	</label>
	<button type="submit" class="search-submit"
	value="<?php echo esc_attr_x( 'Search', 'submit button', 'adore-blog' ) ?>"><?php echo adore_blog_get_svg( array( 'icon' => 'search' ) );?></button>
</form>