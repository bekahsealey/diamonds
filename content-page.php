				<section class="post-wrap clearfix">
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'grid' ); ?>>
						<?php diamonds_page_icon(); ?>
						<header>
							<a href="<?php the_permalink(); ?>" title="<?php esc_attr_e( 'For More Info on ' ); the_title_attribute(); ?>"><?php the_title( '<h2>', '</h2>' ); ?></a>
						</header>
						<div class="col-3-4 reverse">
							<?php the_content(); ?>
							<?php wp_link_pages( array(
								'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'diamonds' ) . '</span>',
								'after'       => '</div>',
								'link_before' => '<span>',
								'link_after'  => '</span>',
								) );
							?>
						</div>
						<footer class="col-1-4">
							<ul class="meta">
								<?php $open = comments_open(); if ( $open == true ) { ?><li><a href="<?php comments_link(); ?>"><?php $nocomment = __( 'Be the first to comment', 'diamonds'  ); $onecomment = __( 'Only one comment', 'diamonds'  ); $manycomments = __( '% comments', 'diamonds'  ); comments_number( $nocomment, $onecomment, $manycomments ); ?></a></li><?php } ?>
								<?php $edit = __( 'Edit this post', 'diamonds'  ); edit_post_link( $edit, '<li>', '</li>' ); ?>
							</ul>
						</footer>
					</article>
				</section><!-- /row -->	