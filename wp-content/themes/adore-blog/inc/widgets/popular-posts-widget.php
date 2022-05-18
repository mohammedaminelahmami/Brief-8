<?php

if ( ! class_exists( 'Adore_Blog_Popular_Posts_Widget' ) ) {
/**
* Adds Popular Posts Widget.
*/
class Adore_Blog_Popular_Posts_Widget extends WP_Widget {

/**
* Register widget.
*/
public function __construct() {
	$adore_blog_popular_post_widget = array(
		'classname'   => 'widget widget_popular_post',
		'description' => __( 'Retrive Popular Posts Widgets', 'adore-blog' ),
	);
	parent::__construct(
		'adore_blog_popular_posts_widget',
		__( 'AT: Popular Posts Widget', 'adore-blog' ),
		$adore_blog_popular_post_widget
	);
}

/**
* Front-end display of widget.
*/
public function widget( $args, $instance ) {
	if ( ! isset( $args['widget_id'] ) ) {
		$args['widget_id'] = $this->id;
	}
	$popular_post_title        = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
	$popular_post_title        = apply_filters( 'widget_title', $popular_post_title, $instance, $this->id_base );
	$popular_post_post_offset  = isset( $instance['offset'] ) ? absint( $instance['offset'] ) : '';
	$popular_post_category     = isset( $instance['category'] ) ? absint( $instance['category'] ) : '';

	echo $args['before_widget'];
	if ( ! empty( $popular_post_title ) ) {
		?>
		<div class="widget-header">
			<?php
			echo $args['before_title'] . esc_html( $popular_post_title ) . $args['after_title'];
			?>
		</div>
	<?php } ?>
	<ul>
		<?php
		$popular_post_widgets_args = array(
			'post_type'      => 'post',
			'posts_per_page' => absint( 5 ),
			'offset'         => absint( $popular_post_post_offset ),
			'orderby'        => 'date',
			'order'          => 'asc',
			'cat'            => absint( $popular_post_category ),
		);

		$query = new WP_Query( $popular_post_widgets_args );
		if ( $query->have_posts() ) :
			while ( $query->have_posts() ) :
				$query->the_post();
				?>
				<li class="has-post-thumbnail">
					<div class="popular-post-wrapper">
						<div class="featured-image" style="background-image: url('<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'post-thumbnail' ) ); ?>');">
							<a href="<?php the_permalink(); ?>" class="post-thumbnail-link"></a>
						</div><!-- .featured-image -->
						<div class="entry-container">
							<header class="entry-header">
								<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							</header>
							<div class="entry-meta">
								<?php echo get_the_date(); ?>
							</div>
						</div><!-- .entry-container -->
					</div>
				</li>
				<?php
			endwhile;
			wp_reset_postdata();
		endif;
		?>
	</ul>
	<?php
	echo $args['after_widget'];
}

/**
* Back-end widget form.
* @see WP_Widget::form()
*/
public function form( $instance ) {
	$popular_post_title        = isset( $instance['title'] ) ? $instance['title'] : '';
	$popular_post_post_offset  = isset( $instance['offset'] ) ? absint( $instance['offset'] ) : '';
	$popular_post_category     = isset( $instance['category'] ) ? absint( $instance['category'] ) : '';
	?>
	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Section Title:', 'adore-blog' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $popular_post_title ); ?>" />
	</p>
	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'offset' ) ); ?>"><?php esc_html_e( 'Number of posts to displace or pass over:', 'adore-blog' ); ?></label>
		<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'offset' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'offset' ) ); ?>" type="number" step="1" min="0" value="<?php echo absint( $popular_post_post_offset ); ?>" size="3" />
	</p>
	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>"><?php esc_html_e( 'Select the category to show posts:', 'adore-blog' ); ?></label>
		<select id="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'category' ) ); ?>" class="widefat" style="width:100%;">
			<?php
			$categories = adore_blog_get_post_cat_choices();
			foreach ( $categories as $category => $value ) {
				?>
				<option value="<?php echo absint( $category ); ?>" <?php selected( $popular_post_category, $category ); ?>><?php echo esc_html( $value ); ?></option>
			<?php } ?>      
		</select>
	</p>
	<?php
}

/**
* Sanitize widget form values as they are saved.
* @see WP_Widget::update()
*/
public function update( $new_instance, $old_instance ) {
	$instance				= $old_instance;
	$instance['title']		= sanitize_text_field( $new_instance['title'] );
	$instance['offset']		= (int) $new_instance['offset'];
	$instance['category']	= $new_instance['category'];
	return $instance;
}

}
}