<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class( array( 'blog_post', 'hover_eff', 'mb-4', 'bg-white' ) ); ?>>
<div class="post_img <?php echo ( ! has_post_thumbnail() ) ? 'no-image' : 'img_eff '; ?>">
		<?php
		corposet_post_thumbnail();
		// <!-- Meta Date -->
		if ( get_theme_mod( 'date_meta_display', true ) ) {
			?>
		<span class="date"><a href="<?php echo esc_url( get_month_link( get_post_time( 'Y' ), get_post_time( 'm' ) ) ); ?>"><time><?php echo esc_html( get_the_date() ); ?></time></a></span>
		<?php } ?>
	</div>
	<div class="post_content">
<?php if ( (bool) get_theme_mod( 'cat_meta_display', true ) || (bool) get_theme_mod( 'author_meta_display', true ) ) {
		if(get_theme_mod( 'author_meta_display', true )) {
 ?>
		<div class="post_meta df">
		<?php } else { ?> 
				<div class="post_meta">
		<?php } ?>
 			<!-- Meta Author -->
			<?php if ( get_theme_mod( 'author_meta_display', true ) ) { ?>
				<span class="author">
				<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?></a>
				<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a></span>
			<?php } ?>
<!-- @todo seting to hide it default -->
			<span class="comment-links">
			 <a href="<?php echo esc_url(get_comments_link( )); ?>#respond"><?php echo esc_html(get_comments_number()); ?> <?php esc_html_e('Comments','corposet'); ?></a>
			</span>

			<!-- Meta Category-->
			<?php if ( get_theme_mod( 'cat_meta_display', true ) ) { ?>
				<span class="categories">
					<?php
					$corposet_cats = get_the_category_list();
					if ( ! empty( $corposet_cats ) ) {
						?>
						<?php the_category( ' ' ); ?>
					<?php } ?>
				</span>
			<?php } ?>

		</div>

		<?php } ?>



		<?php
		if ( is_singular() ) :
			the_title( '<h4 class="mb-3">', '</h4>' );
		else :
			the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
		endif;
		?>
		<p>
		<?php
			/*
			 * Content may be excerpt or content as defined by settings
			 */
		if ( is_singular() ) {
			the_content();
		} else {
			if ( function_exists( 'corposet_ExcerptOrContent' ) ) {
				corposet_ExcerptOrContent();
			}
		}
		?>
			</p>
	</div>
</div>
