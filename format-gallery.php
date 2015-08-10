	<section class="row clearfix">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php diamonds_post_format_icons(); ?>
					<header>
						<h2><a href="<?php the_permalink(); ?>" title="<?php esc_attr_e( 'For More Info on ' ); the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					</header>
					<ul class="meta column fourth">
						<li><?php _e( 'Taken by ', 'diamonds' ); the_author_posts_link(); ?></li>
						<?php $open = comments_open(); if ( $open == true ) { ?><li><a href="<?php comments_link(); ?>"><?php $nocomment = __( 'Be the first to comment', 'diamonds'  ); $onecomment = __( 'Only one comment', 'diamonds'  ); $manycomments = __( '% comments', 'diamonds'  ); comments_number( $nocomment, $onecomment, $manycomments ); ?></a></li><?php } ?>
						<li><?php $edit = __( 'Edit this post', 'diamonds'  ); edit_post_link( $edit ); ?></li>
					</ul>
					<div class="column three-quarters reverse">
						<?php the_excerpt(); ?>
						<?php the_content(); ?>
						<?php wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'diamonds' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
							) );
						?>
					</div>
					<footer class="column fourth"><ul class="meta"><li>Categories: <?php the_category( ' &bull; ' ) ?></li><li><?php the_tags( 'Tags: ',' &bull; ') ?></li></ul></footer>
						<section class="author row clearfix">
						<hr>
							<?php if( get_the_author_meta( 'description' ) ) { ?>
							<?php echo get_avatar( get_the_author_meta( 'email' ), '80', 'mm', 'Avatar of '.get_the_author_meta( 'first_name' ).' '.get_the_author_meta( 'last_name' ) ); ?>
							<h3>Written by: <?php the_author_posts_link(); ?></h3>
								<p><?php the_author_meta( 'description' ); ?></p>
							<?php } ?>
							<?php if( get_the_author_meta( 'user_url' ) ) { ?>
								<a href="<?php the_author_meta( 'user_url' ); ?>" title="<?php the_author_meta( 'first_name' ); ?>'s Website" target="_blank">
							<?php the_author_meta( 'user_url' ); ?></a> 
							<?php } ?>
							<p>Other posts by <?php the_author_posts_link(); ?></p>
						</section><!-- author row-->
						<hr>
						<section class="sidebar clearfix">
							<?php get_sidebar( 'single'); ?>
						</section>
				</article>
			</section><!-- /row -->