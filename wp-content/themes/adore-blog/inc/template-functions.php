<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Adore Blog
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */

function adore_blog_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	
	// When global archive layout is checked.
	if ( is_archive() || adore_blog_is_latest_posts() || is_404() || is_search() ) {
		$archive_sidebar = get_theme_mod( 'adore_blog_archive_sidebar', 'right' ); 
		$classes[] = esc_attr( $archive_sidebar ) . '-sidebar';
	} else if ( is_single() ) { // When global post sidebar is checked.
		$adore_blog_post_sidebar_meta = get_post_meta( get_the_ID(), 'adore-blog-select-sidebar', true );
		if ( ! empty( $adore_blog_post_sidebar_meta ) ) {
			$classes[] = esc_attr( $adore_blog_post_sidebar_meta ) . '-sidebar';
		} else {
			$global_post_sidebar = get_theme_mod( 'adore_blog_global_post_layout', 'right' ); 
			$classes[] = esc_attr( $global_post_sidebar ) . '-sidebar';
		}
	} elseif ( adore_blog_is_frontpage_blog() || is_page() ) {
		if ( adore_blog_is_frontpage_blog() ) {
			$page_id = get_option( 'page_for_posts' );
		} else {
			$page_id = get_the_ID();
		}

		$adore_blog_page_sidebar_meta = get_post_meta( $page_id, 'adore-blog-select-sidebar', true );
		if ( ! empty( $adore_blog_page_sidebar_meta ) ) {
			$classes[] = esc_attr( $adore_blog_page_sidebar_meta ) . '-sidebar';
		} else {
			$global_page_sidebar = get_theme_mod( 'adore_blog_global_page_layout', 'right' ); 
			$classes[] = esc_attr( $global_page_sidebar ) . '-sidebar';
		}
	}

   	$classes[] = 'menu-sticky';

	// Site layout classes
	$site_layout = get_theme_mod( 'adore_blog_site_layout', 'wide' );
	$classes[] = esc_attr( $site_layout ) . '-layout'; 

	return $classes;
}
add_filter( 'body_class', 'adore_blog_body_classes' );

function adore_blog_post_classes( $classes ) {
	if ( adore_blog_is_page_displays_posts() ) {
		// Search 'has-post-thumbnail' returned by default and remove it.
		$key = array_search( 'has-post-thumbnail', $classes );
		unset( $classes[ $key ] );
		
		$archive_img_enable = get_theme_mod( 'adore_blog_enable_archive_featured_img', true );

		if( has_post_thumbnail() && $archive_img_enable ) {
			$classes[] = 'has-post-thumbnail';
		} else {
			$classes[] = 'no-post-thumbnail';
		}
	}
  
	return $classes;
}
add_filter( 'post_class', 'adore_blog_post_classes' );

/**
 * Excerpt length
 * 
 * @since Adore Blog 1.0.0
 * @return Excerpt length
 */
function adore_blog_excerpt_length( $length ){
	if ( is_admin() ) {
		return $length;
	}

	$length = get_theme_mod( 'adore_blog_archive_excerpt_length', 60 );
	return $length;
}
add_filter( 'excerpt_length', 'adore_blog_excerpt_length', 999 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function adore_blog_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'adore_blog_pingback_header' );

/**
 * Get an array of post id and title.
 * 
 */
function adore_blog_get_post_choices() {
	$choices = array( '' => esc_html__( '--Select--', 'adore-blog' ) );
	$args = array( 'numberposts' => -1, );
	$posts = get_posts( $args );

	foreach ( $posts as $post ) {
		$id = $post->ID;
		$title = $post->post_title;
		$choices[ $id ] = $title;
	}

	return $choices;
    wp_reset_postdata();
}

/**
 * Get all pages for customizer Page content type.
 */
function adore_blog_get_page_choices() {
    $pages = get_pages();
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'adore-blog' );
    foreach ( $pages as $page ) {
        $choices[ $page->ID ] = $page->post_title;
    }
    return  $choices;
}

/**
 * Get an array of cat id and title.
 * 
 */
function adore_blog_get_post_cat_choices() {
  $choices = array( '' => esc_html__( '--Select--', 'adore-blog' ) );
	$cats = get_categories();

	foreach ( $cats as $cat ) {
		$id = $cat->term_id;
		$title = $cat->name;
		$choices[ $id ] = $title;
	}

	return $choices;
}

/**
 * Get an list of category sluf.
 * 
 */
function adore_blog_get_category_slug_list($post_id) {
    $cat_list = wp_get_post_categories($post_id);
    $cat_slug = "";
    foreach($cat_list as $cat_id){
        $cat = get_category($cat_id);
        $cat_slug = $cat_slug . "".$cat->slug . " ";
    }

    return $cat_slug;
}

/**
 * Checks to see if we're on the homepage or not.
 */
function adore_blog_is_frontpage() {
	return ( is_front_page() && ! is_home() );
}

/**
 * Checks to see if Static Front Page is set to "Your latest posts".
 */
function adore_blog_is_latest_posts() {
	return ( is_front_page() && is_home() );
}

/**
 * Checks to see if Static Front Page is set to "Posts page".
 */
function adore_blog_is_frontpage_blog() {
	return ( is_home() && ! is_front_page() );
}

/**
 * Checks to see if the current page displays any kind of post listing.
 */
function adore_blog_is_page_displays_posts() {
	return ( adore_blog_is_frontpage_blog() || is_search() || is_archive() || adore_blog_is_latest_posts() );
}

/**
 * Shows a breadcrumb for all types of pages.  This is a wrapper function for the Breadcrumb_Trail class,
 * which should be used in theme templates.
 *
 * @since  1.0.0
 * @access public
 * @param  array $args Arguments to pass to Breadcrumb_Trail.
 * @return void
 */
function adore_blog_breadcrumb( $args = array() ) {
	$breadcrumb = apply_filters( 'breadcrumb_trail_object', null, $args );

	if ( ! is_object( $breadcrumb ) )
		$breadcrumb = new Breadcrumb_Trail( $args );

	return $breadcrumb->trail();
}

/**
 * Add separator for breadcrumb trail.
 */
function adore_blog_breadcrumb_trail_print_styles() {
	$breadcrumb_separator = get_theme_mod( 'adore_blog_breadcrumb_separator', '/' );

	$style = '
		.trail-items li:not(:last-child):after {
			content: "' . $breadcrumb_separator . '";
		}';

	$style = apply_filters( 'adore_blog_breadcrumb_trail_inline_style', trim( str_replace( array( "\r", "\n", "\t", '  ' ), '', $style ) ) );

	if ( $style ) {
		echo "\n" . '<style type="text/css" id="breadcrumb-trail-css">' . $style . '</style>' . "\n";
	}
}
add_action( 'wp_head', 'adore_blog_breadcrumb_trail_print_styles' );

/**
 * Pagination in archive/blog/search pages.
 */
function adore_blog_posts_pagination() { 
	$archive_pagination = get_theme_mod( 'adore_blog_archive_pagination_type', 'numeric' );
	if ( 'disable' === $archive_pagination ) {
		return;
	}
	if ( 'numeric' === $archive_pagination ) {
		the_posts_pagination( array(
            'prev_text'          => adore_blog_get_svg( array( 'icon' => 'left-arrow' ) ),
            'next_text'          => adore_blog_get_svg( array( 'icon' => 'left-arrow' ) ),
        ) );
	} elseif ( 'older_newer' === $archive_pagination ) {
        the_posts_navigation( array(
            'prev_text'          => adore_blog_get_svg( array( 'icon' => 'left' ) ) . '<span>'. esc_html__( 'Older', 'adore-blog' ) .'</span>',
            'next_text'          => '<span>'. esc_html__( 'Newer', 'adore-blog' ) .'</span>' . adore_blog_get_svg( array( 'icon' => 'right' ) ),
        )  );
	}
}

function adore_blog_get_icons_svg_by_url( $url = false ) {
	if ( ! $url ) {
		return false;
	}

	$social_icons = adore_blog_social_links_icons();

	foreach ( $social_icons as $attr => $value ) {
		if ( false !== strpos( $url, $attr ) ) {
			return adore_blog_get_svg( array( 'icon' => esc_attr( $value ) ) );
		}
	}
}

if ( ! function_exists( 'adore_blog_the_excerpt' ) ) :

  /**
   * Generate excerpt.
   *
   * @since 1.0.0
   *
   * @param int     $length Excerpt length in words.
   * @param WP_Post $post_obj WP_Post instance (Optional).
   * @return string Excerpt.
   */
  function adore_blog_the_excerpt( $length = 0, $post_obj = null ) {

    global $post;

    if ( is_null( $post_obj ) ) {
      $post_obj = $post;
    }

    $length = absint( $length );

    if ( 0 === $length ) {
      return;
    }

    $source_content = $post_obj->post_content;

    if ( ! empty( $post_obj->post_excerpt ) ) {
      $source_content = $post_obj->post_excerpt;
    }

    $source_content = preg_replace( '`\[[^\]]*\]`', '', $source_content );
    $trimmed_content = wp_trim_words( $source_content, $length, '&hellip;' );
    return $trimmed_content;

  }

endif;

// Add auto p to the palces where get_the_excerpt is being called.
add_filter( 'get_the_excerpt', 'wpautop' );

if ( ! function_exists( 'adore_blog_category_title' ) ) :

function adore_blog_category_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    }
    return $title;
}
add_filter( 'get_the_archive_title', 'adore_blog_category_title' );

endif;