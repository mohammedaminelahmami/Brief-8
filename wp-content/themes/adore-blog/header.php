<?php
/**
 * The header for our theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Adore Blog
 */
?>
<!doctype html>
<html <?php language_attributes(); ?> >
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>
 
<body <?php body_class(); ?>>

<?php do_action( 'wp_body_open' ); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'adore-blog' ); ?></a>
    
    <div class="menu-overlay"></div>

    <?php 
    $topbar_enable  = get_theme_mod( 'adore_blog_top_bar_enable', false );
    $topbar_number  = get_theme_mod( 'adore_blog_top_bar_contact_number', '' );
    $topbar_email   = get_theme_mod( 'adore_blog_top_bar_email_id', '' );
    if ( $topbar_enable === true ) {
        ?>
        <div id="top-navigation" class="relative">
            <div class="wrapper">
                <div class="col-2">
                    <div class="contact-information clear">
                        <ul>
                            <?php if ( !empty( $topbar_number ) ): ?>
                                <li class="contact-number">
                                    <?php echo adore_blog_get_svg( array( 'icon' => 'phone' ) ); ?>
                                    <a href="tel:<?php echo esc_attr( $topbar_number ); ?>"><?php echo esc_html( $topbar_number ); ?></a>
                                </li>
                                <?php
                                endif;
                                if ( !empty( $topbar_email ) ):
                                ?>
                                <li class="mail-id">
                                    <a href="mailto:<?php echo esc_attr( $topbar_email ); ?>">
                                        <?php echo adore_blog_get_svg( array( 'icon' => 'envelope' ) ); ?>
                                        <?php echo esc_html( $topbar_email ); ?>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <?php 
                    if ( get_theme_mod( 'adore_blog_top_bar_social_menu', true )) {
                        if ( has_nav_menu( 'social' ) ) :
                            ?>
                            <div class="social-icons">
                                <?php  
                                wp_nav_menu( array(
                                    'theme_location'    => 'social',
                                    'container'         => false,
                                    'menu_class'        => 'menu',
                                    'echo'              => true,
                                    'depth'             => 1,
                                    'link_before'       => '<span class="screen-reader-text">',
                                    'link_after'        => '</span>',
                                ) );
                                ?>
                            </div><!-- .social-icons -->
                            <?php elseif( current_user_can( 'edit_theme_options' ) ): ?>
                                <div class="social-icons">
                                    <ul class="menu">
                                        <a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php echo esc_html__( 'Add social menu', 'adore-blog' );?></a>
                                    </ul>
                                </div>
                                <?php
                            endif;
                        }
                        ?>
                    </div>
                </div>
            </div>
        <?php } ?>

    <?php require get_template_directory() . '/inc/header-menu.php';  ?>
    
	<div id="content" class="site-content">