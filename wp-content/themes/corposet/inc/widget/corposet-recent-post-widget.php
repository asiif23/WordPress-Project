<?php

class Corposet_Post_Widget extends WP_Widget
{

	function __construct()
	{
		$widget_ops = array(
			'classname'   => 'latest-posts-widget',
			'description' => __('List latest posts of your site with thumbnails', 'corposet'),
		);
		parent::__construct('latest-posts-widget', __('Corposet Latest Posts', 'corposet'), $widget_ops);
	}

	// Displays latest posts widget on blog.
	function widget($args, $instance)
	{
		global $post;

		extract($args);

		// $sizes = get_option( 'mkrdip_latest_posts_thumb_sizes' );

		$valid_sort_orders = array('date', 'title', 'comment_count', 'rand');
		if (in_array($instance['sort_by'], $valid_sort_orders)) {
			$sort_by    = $instance['sort_by'];
			$sort_order = (bool) isset($instance['asc_sort_order']) ? 'ASC' : 'DESC';
		} else {
			// by default, display latest first
			$sort_by    = 'date';
			$sort_order = 'DESC';
		}

		// Get array of post info.
		$cat_posts = new WP_Query(
			array(
				'posts_per_page' => $instance['num'],
				'orderby'        => $sort_by,
				'order'          => $sort_order,
			)
		);

		echo esc_attr($before_widget);

		// Widget title
		if (!empty($instance['title'])) {
			echo esc_attr($before_title);
			echo esc_attr($instance['title']);
			echo esc_attr($after_title);
		}

		// Post list
		echo "<ul class='list-unstyled'>\n";

		while ($cat_posts->have_posts()) {
			$cat_posts->the_post();
?>
			<li class="media recent-post-thumb-item">

				<?php
				the_post_thumbnail(
					array(70, 70),
					array(
						'class' => 'mr-3',
						'style' => 'margin:auto;',
					)
				);
				?>


				<div class="media-body">
					<h5 class="mt-0 mb-1">
						<a class="post-title" href="<?php the_permalink(); ?>" rel="bookmark" title=" <?php esc_html_e('Permanent link to','corposet');?> <?php the_title_attribute(); ?>">
							<?php the_title(); ?>
						</a>
					</h5>

					<?php
					$theContnt          = apply_filters('the_content', get_the_content());
					$theContntStripTags = wp_strip_all_tags($theContnt);
					if (strlen($theContntStripTags) > (int) 20) {
						$post_trimmed               = substr($theContntStripTags, 0, strpos($theContntStripTags, ' ', (int) 20));
						$t_text = $post_trimmed . '...';
						echo esc_html($t_text);
					}else{
						echo esc_html($theContntStripTags);
					}

					?>
				</div>



			</li>
		<?php
		}

		echo "</ul>\n";

		echo esc_attr($after_widget);

		// remove_filter( 'excerpt_length', $new_excerpt_length );

		wp_reset_postdata();
	}


	/**
	 * The widget configuration form back end.
	 *
	 * @param  array $instance
	 * @return void
	 */
	function form($instance)
	{
		$instance = wp_parse_args(
			(array) $instance,
			array(
				'title'          => __('Latest Posts', 'corposet'),
				'num'            => '',
				'sort_by'        => '',
				'asc_sort_order' => '',
				'excerpt'        => '',
				'excerpt_length' => '',
				'comment_num'    => '',
				'date'           => '',
				'thumb'          =>'',
				'thumb_w'        => '',
				'thumb_h'        => '',
			)
		);

		$title          = $instance['title'];
		$num            = $instance['num'];
		$sort_by        = $instance['sort_by'];
		$asc_sort_order = $instance['asc_sort_order'];
		$excerpt        = $instance['excerpt'];
		$excerpt_length = $instance['excerpt_length'];
		$comment_num    = $instance['comment_num'];
		$date           = $instance['date'];
		$thumb          = $instance['thumb'];
		$thumb_w        = $instance['thumb_w'];
		$thumb_h        = $instance['thumb_h'];
		?>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
				<?php esc_html_e('Title', 'corposet' ); ?>:
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
			</label>
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id('num')); ?>">
				<?php esc_html_e('Number of posts to show', 'corposet'); ?>:
				<input style="text-align: center;" id="<?php echo esc_attr($this->get_field_id('num')); ?>" name="<?php echo esc_attr($this->get_field_name('num')); ?>" type="text" value="<?php echo esc_attr(absint($instance['num'])); ?>" size='3' />
			</label>
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id('sort_by')); ?>">
				<?php esc_html_e('Sort by', 'corposet'); ?>:
				<select id="<?php echo esc_attr($this->get_field_id('sort_by')); ?>" name="<?php echo esc_attr($this->get_field_name('sort_by')); ?>">
					<option value="date" <?php selected($instance['sort_by'], 'date'); ?>> <?php esc_html_e('Date','corposet'); ?></option>
					<option value="title" <?php selected($instance['sort_by'], 'title'); ?>><?php esc_html_e('Title','corposet'); ?></option>
					<option value="comment_count" <?php selected($instance['sort_by'], 'comment_count'); ?>><?php esc_html_e('Number of comments','corposet'); ?></option>
					<option value="rand" <?php selected($instance['sort_by'], 'rand'); ?>><?php esc_html_e('Random','corposet'); ?></option>
				</select>
			</label>
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id('asc_sort_order')); ?>">
				<input type="checkbox" class="checkbox" id="<?php echo esc_attr($this->get_field_id('asc_sort_order')); ?>" name="<?php echo esc_attr($this->get_field_name('asc_sort_order')); ?>" <?php checked((bool) $instance['asc_sort_order'], true); ?> />
				<?php esc_html_e('Reverse sort order (ascending)', 'corposet'); ?>
			</label>
		</p>





<?php
	}
}
function corposet_wp_register_widgets()
{
	register_widget('Corposet_Post_Widget');
}
add_action('widgets_init', 'corposet_wp_register_widgets');
