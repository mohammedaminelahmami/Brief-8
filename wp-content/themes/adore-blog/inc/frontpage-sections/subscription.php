<?php
/**
* Template part for displaying front page introduction.
*
* @package Adore Blog
*/

if ( ! class_exists( 'Jetpack' ) ) {
	return;
}

$subscription				= get_theme_mod( 'adore_blog_subscription_enable', false );
$subscription_image 		= get_theme_mod( 'adore_blog_subscription_bg_image', '' );
$subscription_title 		= get_theme_mod( 'adore_blog_subscription_title', __( 'Subscribe To Our Newsletter', 'adore-blog') );
$subscription_description	= get_theme_mod( 'adore_blog_subscription_description','' );
$subscription_btn_label		= get_theme_mod( 'adore_blog_subscription_btn_label', __( 'SUBSCRIBE', 'adore-blog') );

if ( ! $subscription ) {
	return;
}

?>

<div id="subscription-section" class=" paddingt-b same" style="background-image: url('<?php echo esc_url( $subscription_image ); ?>');">
	<div class="overlay"></div>
	<div class="wrapper">
		<div class="subscribe-wrapper clear">
			<div class="entry-container">
				<?php if ( !empty( $subscription_title ) ) { ?>
					<h3 class="widget-title"><?php echo esc_html( $subscription_title ); ?></h3>
				<?php } ?>
				<?php if ( !empty( $subscription_description ) ) { ?>
					<div class="subscribe-text">
						<p><?php echo wp_kses_post( $subscription_description ); ?></p>
					</div>
				<?php } ?>
			</div>
			<?php 
			$subscription_shortcode = '[jetpack_subscription_form title="" subscribe_text="" subscribe_button="' . esc_html( $subscription_btn_label ) . '" show_subscribers_total="0"]';
			echo do_shortcode( wp_kses_post( $subscription_shortcode ) ); 
			?>
		</div>
	</div>
</div>