<?php
/**
 * Template part for displaying front page imtroduction.
 *
 * @package Adore Blog
 */

// Get the content type.
$advertisement          = get_theme_mod( 'adore_blog_advertisement_enable', false );
$advertisement_image    = get_theme_mod( 'adore_blog_advertisement_image', '' );
$advertisement_url      = get_theme_mod( 'adore_blog_advertisement_image_url', '#' );

if ( false === $advertisement ) {
    return;
}
?>

<?php if ( !empty( $advertisement_image ) ): ?>
<div id="primary-ads-section">
    <article>
        <div class="featured-image">
            <a href="<?php echo esc_url( $advertisement_url ); ?>"><img src="<?php echo esc_url( $advertisement_image ); ?>"></a>
        </div>
    </article>
</div>
<?php endif; ?>