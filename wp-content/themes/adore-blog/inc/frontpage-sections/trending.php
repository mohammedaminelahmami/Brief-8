<?php
/**
* Template part for displaying front page introduction.
*
* @package Adore Blog
*/

// Get the content type.
$trending_content_type = get_theme_mod( 'adore_blog_trending_enable', 'disable' );

if ( 'disable' === $trending_content_type ) {
return;
}

$content_ids    = array();

for ( $i = 1; $i <= 4; $i++ ) {
    $content_ids[] = get_theme_mod( 'adore_blog_trending_' . $trending_content_type . '_' . $i );
}

$args = array(
    'post_type'           => $trending_content_type,
    'post__in'            => array_filter( $content_ids ),
    'orderby'             => 'post__in',
    'posts_per_page'      => absint( 4 ),
    'ignore_sticky_posts' => true,
);

$query = new WP_Query( $args );
if ( $query->have_posts() ) {

$section_title      = get_theme_mod( 'adore_blog_trending_title', __('Trending Section', 'adore-blog') );
$trending_btn       = get_theme_mod( 'adore_blog_trending_button_label', __( 'View All', 'adore-blog') );
$trending_btn_url   = get_theme_mod( 'adore_blog_trending_button_url', '#' );
?>

<div id="primary-trending-section" class="paddingt-b same">
    <?php if ( !empty( $section_title ) ): ?>
        <div class="section-header">
            <h2 class="section-title"><?php echo esc_html( $section_title ); ?></h2>
        </div>
    <?php endif; ?>
    <div class="col-2">
        <?php 
        while ( $query->have_posts() ) :
            $query->the_post();
            ?>
            <article>
                <div class="featured-image" style="background-image: url('<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'post-thumbnail' ) ); ?>');">
                    <span class="cat-links">
                        <?php the_category( '', '', get_the_ID() ); ?>
                    </span>
                </div>
                <div class="entry-container">
                    <header class="entry-header">
                        <h2 class="entry-title"><a href="<?php the_permalink(); ?>" tabindex="0"><?php the_title(); ?></a></h2>
                    </header>
                    <div class="entry-content">
                        <p><?php echo wp_kses_post(wp_trim_words( get_the_content(), 10 ) ); ?></p>
                    </div>
                    <div class="entry-meta">
                        <?php
                        adore_blog_posted_on();
                        adore_blog_post_author(); 
                        ?>
                    </div>
                </div>
            </article>
            <?php
        endwhile;
        wp_reset_postdata();
        ?>
    </div>
    <?php if ( !empty( $trending_btn ) ) : ?>
        <div class="show-more">
            <a href="<?php echo esc_url( $trending_btn_url ); ?>"><?php echo esc_html( $trending_btn ); ?><i class="fa fa-caret-right" aria-hidden="true"></i></a>
        </div>
    <?php endif; ?>
</div>
<?php } ?>