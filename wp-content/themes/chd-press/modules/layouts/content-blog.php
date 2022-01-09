<?php
/**
 * List Layout for Blog
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CHD Press
 */

 switch($args) :
    case 'default':
        $cols = 'col-12';
    break;
 	case 'col_3':
 		$cols = 'col-md-6 col-lg-4';
 	break;
 	case 'col_2':
 		$cols = 'col-md-6';
 	break;
    case 'related':
        $cols = 'col-md-4';
    break;
 	default:
 		$cols = 'col-12';
 endswitch;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('chdp-blog ' . $cols . ' ' . $args); ?>>
		<div class="chdp-card-wrapper <?php if ($args == 'default') echo 'row no-gutters' ?>">
			<div class="chdp-thumb <?php if ($args == 'default') echo 'col-3' ?>">
				<?php if ( has_post_thumbnail() ): ?>
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(  $args == 'default' ?  'chdp_square_thumb' :  'chdp_blog_thumb'); ?></a>
				<?php endif; ?>
			</div>

			<div class="chdp-card-content <?php if ($args == 'default') echo 'col-9' ?>">
				<div class="entry-meta">
					<a href="<?php the_permalink(); ?>"><?php echo get_the_date('j M y'); ?></a>
					<?php
					chdp_posted_by();
					?>
				</div><!-- .entry-meta -->

				<header class="entry-header">
					<?php
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
					 ?>
				</header><!-- .entry-header -->

				<div class="chdp_excerpt">
					<?php do_action('chdp_blog_excerpt', esc_html( get_theme_mod( 'chdp-blog-excerpt-length', 15 ) ) ); ?>
				</div>

				<div class="blog-footer">
					<div class="chdp_cats">
						<?php echo get_the_category_list(', '); ?>
					</div>
				</div>
			</div>
		</div>
</article><!-- #post-<?php the_ID(); ?> -->
