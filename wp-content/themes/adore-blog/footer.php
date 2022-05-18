<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Adore Blog
 */

$default = adore_blog_get_default_mods();
?>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php  
		$count = 0;
		for ( $i=1; $i <=4 ; $i++ ) { 
			if ( is_active_sidebar( 'footer-' . $i ) ) {
				$count++;
			}
		}
		
		if ( 0 !== $count ) : ?>
			<div class="footer-widgets-area page-section col-4">
			    <div class="wrapper">
					<?php 
					for ( $j=1; $j <=4; $j++ ) { 
						if ( is_active_sidebar( 'footer-' . $j ) ) {
			    			echo '<div class="hentry">';
							dynamic_sidebar( 'footer-' . $j ); 
			    			echo '</div>';
						}
					}
					?>
				</div><!-- .wrapper -->
			</div><!-- .footer-widget-area -->

		<?php endif;
		 $adore_blog_search = array( '[the-year]', '[site-link]' );

        $replace = array( date( 'Y' ), '<a href="'. esc_url( home_url( '/' ) ) .'">'. esc_attr( get_bloginfo( 'name', 'display' ) ) . '</a>' );

        $copyright = str_replace( $adore_blog_search, $replace, get_theme_mod( 'adore_blog_copyright_txt', $default['adore_blog_copyright_txt'] ) );

			?>
			<div class="site-info">
				<div class="wrapper">
					<span>
						<?php echo wp_kses_post(  $copyright ); ?>
						<?php echo sprintf( esc_html__( 'Theme: %1$s By %2$s.', 'adore-blog' ), wp_get_theme()->get('Name'), '<a href="'. wp_get_theme()->get('AuthorURI') .'">'. wp_get_theme()->get('Author') .'</a>' ) ;?>
					</span>			    
				</div><!-- .wrapper -->    
			</div><!-- .site-info -->
			
	</footer><!-- #colophon -->
	
	<?php  
	$backtop = get_theme_mod( 'adore_blog_back_to_top_enable', true );
	if ( $backtop ) { ?>
		<div class="backtotop"><?php echo adore_blog_get_svg( array( 'icon' => 'up-arrow' ) ); ?></div>
	<?php }	?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>