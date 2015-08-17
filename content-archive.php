<section class="post-wrap clearfix">
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'grid' ); ?>>
					<?php diamonds_post_format_icons(); ?>
					<header>
						<a href="<?php the_permalink(); ?>" title="<?php esc_attr_e( 'For More Info on ' ); the_title_attribute(); ?>"><?php the_title( '<h2>', '</h2>' ); ?></a>
					</header>
					<div class="col-3-4 reverse">
					<?php if ( has_post_thumbnail() ) { ?><?php the_post_thumbnail( 'sm-post-thumb', array('class' => 'alignleft') ); } ?>
					<?php the_excerpt(); ?>
					</div>
					<footer class="col-1-4">
						<ul class="meta">
							<li><?php _e( 'Written by ', 'diamonds' ); the_author_posts_link(); ?></li>
							<?php if ( has_post_format() ) { ?><li><?php the_time( 'M d, Y' ); ?></li><?php } ?>
							<?php $open = comments_open(); if ( $open == true ) { ?><li><a href="<?php comments_link(); ?>"><?php $nocomment = __( 'Be the first to comment', 'diamonds'  ); $onecomment = __( 'Only one comment', 'diamonds'  ); $manycomments = __( '% comments', 'diamonds'  ); comments_number( $nocomment, $onecomment, $manycomments ); ?></a></li><?php } ?>
							<li><?php $edit = __( 'Edit this post', 'diamonds'  ); edit_post_link( $edit ); ?></li>
							<li>Categories: <?php the_category( ' &bull; ' ) ?></li>
							<li><?php the_tags( 'Tags: ',' &bull; ' ) ?></li>
						</ul>
					</footer>
				</article>
			</section><!-- /row -->