<?php
/**
* Template part for displaying front page introduction.
*
* @package Adore Blog
*/

// Get the content type.
$slider_content_type = get_theme_mod( 'adore_blog_slider_enable', 'disable' );

if ( 'disable' === $slider_content_type ) {
return;
}

$content_ids    = array();

for ( $i = 1; $i <= 3; $i++ ) {
    $content_ids[] = get_theme_mod( 'adore_blog_slider_post_' . $i );
}

$args = array(
    'post_type'           => $slider_content_type,
    'post__in'            => array_filter( $content_ids ),
    'orderby'             => 'post__in',
    'posts_per_page'      => absint( 3 ),
    'ignore_sticky_posts' => true,
);

$query = new WP_Query( $args );
if ( $query->have_posts() ) {

$slider_btn         = get_theme_mod( 'adore_blog_slider_button_label', __( 'Read More', 'adore-blog') );
?>

<div id="slider-section" class="paddingt-b same content-alignment-center">
    <div class="blog-slider" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 1000, "dots": false, "arrows":true, "autoplay": true, "draggable": true, "fade": true, "adaptiveHeight": true }'>
        <?php 
        while ( $query->have_posts() ) :
            $query->the_post();
            ?>
            <article style="background-image: url('<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ); ?>');">
                <div class="overlay"></div>
                <div class="wrapper">
                    <div class="entry-container">
                        <div class="entry-meta">
                            <?php
                            adore_blog_post_author(); 
                            adore_blog_posted_on();
                            ?>
                        </div>
                        <header class="entry-header">
                            <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        </header>
                        <div class="entry-content">
                            <p><?php echo wp_kses_post(wp_trim_words( get_the_content(), 20 ) ); ?></p>
                        </div><!-- .entry-content -->
                        <?php if ( !empty( $slider_btn ) ): ?>
                            <div class="read-more">
                                <a href="<?php the_permalink(); ?>" class="btn"><?php echo esc_html( $slider_btn ); ?></a>
                            </div><!-- .read-more -->
                        <?php endif; ?>
                    </div>
                </div>
            </article>
            <?php
        endwhile;
        wp_reset_postdata();
        ?>
    </div>
</div>

<?php } ?>