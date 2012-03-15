<?php
/**
 * The template for displaying audio attachments.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

		<div id="primary" class="audio-attachment">
			<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
			
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<h1 class="entry-title"><?php the_title(); ?></h1>

					<div class="entry-meta">
						<?php
								$metadata = wp_get_attachment_metadata();
								printf( __( '<span class="meta-prep meta-prep-entry-date">Published </span> <span class="entry-date"><abbr class="published" title="%1$s">%2$s</abbr></span> in <a href="%3$s" title="Return to %4$s" rel="gallery">%5$s</a>', 'twentyeleven' ),
										esc_attr( get_the_time() ),
										get_the_date(),
										esc_url( get_permalink( $post->post_parent ) ),
										esc_attr( strip_tags( get_the_title( $post->post_parent ) ) ),
										get_the_title( $post->post_parent )
									);

								edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-meta -->

				</header><!-- .entry-header -->

				<div class="entry-content">

					<div class="entry-attachment">
						<div class="attachment">

							<!-- AUDIO DISPLAY CODE -->
							<audio><source src="<?php echo wp_get_attachment_url( $post->ID ); ?>" type="audio/mpeg" /></audio>

							<!-- Display Caption -->
							<?php if ( ! empty( $post->post_excerpt ) ) : ?>
								<div class="entry-caption">
									<?php the_excerpt(); ?>
								</div>
							<?php endif; ?>
						</div><!-- .attachment -->

					</div><!-- .entry-attachment -->

				</div><!-- .entry-content -->

			</article><!-- #post-<?php the_ID(); ?> -->

			<?php comments_template(); ?>

			<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>