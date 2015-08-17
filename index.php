<?php get_header(); ?>
		<?php $cols->diamonds_flex( 'left' ); ?>
		<main class="col-<?php echo $mainWidth; ?>">
			<?php if (have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<section class="post-wrap clearfix">
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'grid' ); ?>>
					<?php if ( get_query_var('paged') == 0 && is_sticky() ) { ?>
						<ul class="date-meta post-icon">
							<li><a href="<?php the_permalink(); ?>" title="<?php esc_attr_e( 'For More Info on ' ); the_title_attribute(); ?>">
							<div class="icon icon-pushpin hide-label"><span>Sticky</span></div></a></li>
						</ul>
					<?php } else { ?>
						<?php diamonds_post_format_icons(); ?>
					<?php } ?>
						<header>
							<a href="<?php the_permalink(); ?>" title="<?php esc_attr_e( 'For More Info on ' ); the_title_attribute(); ?>"><?php the_title( '<h2>', '</h2>' ); ?></a>
						</header>
						<?php if ( has_post_thumbnail() ) { ?><figure><?php the_post_thumbnail( 'post-thumb' ); ?><figcaption><?php the_post_thumbnail_caption(); ?></figcaption></figure><?php } ?>
						<div class="col-3-4 reverse">
							<?php if(strpos(get_the_content(),'more-link') === false) {
								the_excerpt();
							} else {
								the_content('Read on...');
							} ?>
						</div>
						<footer class="col-1-4">
							<ul class="meta">
								<li><?php _e( 'Written by ', 'diamonds' ); the_author_posts_link(); ?></li>
								<?php if ( get_query_var('paged') == 0 && is_sticky() || has_post_format() ) { ?><li><?php the_time( 'M d, Y' ); ?></li><?php } ?>
								<?php $open = comments_open(); if ( $open == true ) { ?><li><a href="<?php comments_link(); ?>"><?php $nocomment = __( 'Be the first to comment', 'diamonds'  ); $onecomment = __( 'Only one comment', 'diamonds'  ); $manycomments = __( '% comments', 'diamonds'  ); comments_number( $nocomment, $onecomment, $manycomments ); ?></a></li><?php } ?>
								<li><?php $edit = __( 'Edit this post', 'diamonds'  ); edit_post_link( $edit ); ?></li>
								<li>Categories: <?php the_category( ' &bull; ' ) ?></li>
								<li><?php the_tags( 'Tags: ',' &bull; ' ) ?></li>
							</ul>
						</footer>
					</article>
				</section><!-- /row -->
			<?php endwhile; else: ?>
				<p><?php _e( 'Sorry, no posts matched your criteria.', 'diamonds' ); ?></p>
			<?php endif; ?>
				<div class="grid clearfix">
					<div class="paginate col-1-1">
					<?php if( $wp_query->max_num_pages > 1 ) { ?>
						<div id="pagination">
							<?php diamonds_paginate(); ?>
						</div><!-- .pagination -->
					<?php } ?>
					</div>
				</div><!-- /row -->
		</main>	
		<?php $cols->diamonds_flex( 'right' ); ?>	
<?php get_footer(); ?>