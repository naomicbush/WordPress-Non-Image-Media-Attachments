<?php
/**
 * The template for displaying non-image attachments.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

		<div id="primary" class="all-attachments">
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

							<!-- 1. Get File Type -->
							<?php $type = get_post_mime_type( $post->ID ); ?>

							<!-- 2. Display Code for Each File Type -->
							<?php switch ( $type ) {

									//DOCUMENTS
									case 'application/pdf':
									case 'application/rtf':?>
										<iframe src="http://docs.google.com/viewer?url=<?php echo wp_get_attachment_url( $post->ID ) ?>&embedded=true" width="591" height="600" style="border: none;"></iframe>
									<?php break;

									//AUDIO
									case 'audio/mpeg': ?>
										<audio><source src="<?php echo wp_get_attachment_url( $post->ID ); ?>" type="audio/mpeg" /></audio>
									<?php break;

									//VIDEO
									case 'video/mp4': ?>
										<video controls><source src="<?php echo wp_get_attachment_url( $post->ID ) ?>" type='video/mp4' /></video>
										<?php break;


									default: ?>
										<p class="attachment"><?php echo wp_get_attachment_link(0, 'medium', false); ?></p>
							<?php } ?>

							<!-- Display Caption, if provided -->
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