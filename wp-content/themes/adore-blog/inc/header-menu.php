<header id="masthead" class="site-header" role="banner">
    <div class="site-branding-container">
        <div class="wrapper">
            <div class="site-branding-wrapper">
                
                <div class="site-branding">

                    <?php if ( has_custom_logo() ){ ?>
                        <div class="site-logo">
                            <?php the_custom_logo(); ?>
                        </div><!-- .site-logo -->
                    <?php }

                    if ( get_theme_mod( 'adore_blog_header_text_display', true ) === true ){ ?>
                        <div id="site-identity">

                            <?php
                            if ( is_front_page() ) : ?>
                                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                                <?php else : ?>
                                    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                                    <?php
                                endif;

                                $description = get_bloginfo( 'description', 'display' );
                                if ( $description || is_customize_preview() ) {
                                    ?>
                                    <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
                                <?php } ?>

                            </div>
                        <?php } ?>
                    </div><!-- .site-branding -->
            </div><!-- .site-branding-wrapper -->
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                <svg viewBox="0 0 40 40" class="icon-menu">
                    <g>
                        <rect y="7" width="40" height="2"/>
                        <rect y="19" width="40" height="2"/>
                        <rect y="31" width="40" height="2"/>
                    </g>
                </svg>
                <?php echo adore_blog_get_svg( array( 'icon' =>'close' ) ); ?>
                <span class="menu-label"><?php echo esc_html__('Menu', 'adore-blog'); ?></span>
            </button>
            <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="Primary Menu">
                <?php if ( has_nav_menu( 'primary' ) ) :
                    $search_html = '
                    <li class="search-menu">
                    <a href="#">' . 
                    adore_blog_get_svg( array( 'icon' =>'search' ) ) .
                    adore_blog_get_svg( array( 'icon' =>'close' ) ) .
                    '</a>
                    <div id="search">' .
                    get_search_form( $echo = false ) .
                    '</div><!-- #search -->
                    </li>';
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'menu_class'     => 'menu nav-menu', 
                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s' . $search_html . '</ul>',                   
                ) );
                ?>
                <?php elseif( current_user_can( 'edit_theme_options' ) ): ?>
                    <ul id="primary-menu" class="menu nav-menu">
                        <li><a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php echo esc_html__( 'Add primary menu', 'adore-blog' );?></a></li>
                    </ul>
                <?php endif; ?> 
            </nav><!-- .main-navigation-->
        </div><!-- .wrapper -->
    </div><!-- .container -->
</header><!-- #masthead -->