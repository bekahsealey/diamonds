			<section class="post-wrap clearfix">
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'grid' ); ?>>
					<?php diamonds_post_format_icons(); ?>
					<header>
						<a href="<?php the_permalink(); ?>" title="<?php esc_attr_e( 'For More Info on ' ); the_title_attribute(); ?>"><?php the_title( '<h2>', '</h2>' ); ?></a>
					</header>
					<div class="col-3-4 reverse">
					<?php has_post_format( 'status' ) ? diamonds_status_excerpt() : the_content(); ?>
					<?php if ( has_post_format( array( 'aside', 'status', 'quote', 'link' ) ) ) { ?><p><?php $edit = __( 'Edit this post', 'diamonds'  ); edit_post_link( $edit ); ?></p><?php } ?>
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
							<li><?php if ( has_post_format( 'gallery' ) ) { ?><?php _e( 'Taken by ', 'diamonds' ); the_author_posts_link(); ?><?php } else { ?><?php _e( 'Written by ', 'diamonds' ); the_author_posts_link(); ?><?php } ?></li>
							<?php if ( has_post_format() ) { ?><li><?php the_time( 'M d, Y' ); ?></li><?php } ?>
							<?php $open = comments_open(); if ( $open == true ) { ?><li><a href="<?php comments_link(); ?>"><?php $nocomment = __( 'Be the first to comment', 'diamonds'  ); $onecomment = __( 'Only one comment', 'diamonds'  ); $manycomments = __( '% comments', 'diamonds'  ); comments_number( $nocomment, $onecomment, $manycomments ); ?></a></li><?php } ?>
							<li><?php $edit = __( 'Edit this post', 'diamonds'  ); edit_post_link( $edit ); ?></li>
							<li>Categories: <?php the_category( ' &bull; ' ) ?></li>
							<li><?php the_tags( 'Tags: ',' &bull; ' ) ?></li>
						</ul>
					<?php if ( has_post_format( 'gallery' ) ) { ?>
						<section class="excerpt clearfix">
						<hr>
						<?php the_excerpt(); ?>
						<hr>
						</section>
					<?php } ?>
					</footer>
				</article>
					<aside class="author">
					<hr>
						<?php if( get_the_author_meta( 'description' ) ) { ?>
						<?php echo get_avatar( get_the_author_meta( 'email' ), '80', 'mm', 'Avatar of '.get_the_author_meta( 'first_name' ).' '.get_the_author_meta( 'last_name' ) ); ?>
						<h3>By: <?php the_author_posts_link(); ?></h3>
								<?php $description = get_the_author_meta( 'description' );
								$description = apply_filters( 'the_content', $description );
								$description = str_replace( ']]>', ']]&gt;', $description ); ?>
								<?php echo $description; ?>
						<?php } ?>
						<?php if( get_the_author_meta( 'user_url' ) ) { ?>
							<a href="<?php the_author_meta( 'user_url' ); ?>" title="<?php the_author_meta( 'first_name' ); ?>'s Website" target="_blank">
						<?php the_author_meta( 'user_url' ); ?></a> 
						<?php } ?>
						<p>Other posts by <?php the_author_posts_link(); ?></p>
					<hr>
					</aside><!-- author-->
					<aside class="sidebar post-widgets col-1-1 clearfix">
						<?php get_sidebar( 'single'); ?>
					</aside>
			</section><!-- /row -->