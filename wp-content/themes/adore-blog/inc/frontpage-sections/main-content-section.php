<div id="content-wrapper" class="paddingt-b">
    <div class="wrapper">
        <div id="primary" class="content-area">

            <?php
            require get_template_directory() . '/inc/frontpage-sections/trending.php';
            require get_template_directory() . '/inc/frontpage-sections/recent-posts.php';
            require get_template_directory() . '/inc/frontpage-sections/advertisement-area.php';
            ?>

        </div>

        <div id="secondary" class="widget-area">
           <?php dynamic_sidebar( 'main-content-wrapper-sidebar' ); ?>
        </div>
    </div>
</div>