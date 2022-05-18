<?php
/**
 * Template part for displaying content  in post.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Adore Blog
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'hentry' ); ?>>
	<?php
	$adore_blog_enable_single_featured_img = get_theme_mod( 'adore_blog_enable_single_featured_img', true );
	if ( has_post_thumbnail() && $adore_blog_enable_single_featured_img ) : ?>
		<div class="featured-image">
	        <?php the_post_thumbnail( 'full', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
		</div><!-- .featured-post-image -->
	<?php endif; ?>

	<div class="entry-container">
	    <div class="entry-content">

	        <?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'adore-blog' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'adore-blog' ),
				'after'  => '</div>',
			) );
			?>
	    </div><!-- .entry-content -->
	    
	</div><!-- .entry-container -->
    <div class="entry-meta">
    	<?php echo adore_blog_cats(); adore_blog_tags(); ?>
    	<?php
		    $single_date_enable = get_theme_mod( 'adore_blog_enable_single_date', true );
			if ( $single_date_enable ) {
	    		adore_blog_posted_on();
	    	}
	    ?>
	    <?php
		    $single_author_enable = get_theme_mod( 'adore_blog_enable_single_author', true );
		    if ( $single_author_enable ) {
		    	adore_blog_post_author();
	    } ?>
    </div><!-- .entry-meta -->

</article><!-- #post-<?php the_ID(); ?> -->