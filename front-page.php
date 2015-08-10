<?php
 get_header(); ?>
		
<?php 
	$cols = new diamondsFlexCol();
	$mainWidth = $cols->_maincol_width;
	$thumbSize = $cols->_size;
	$cols->diamonds_flex( 'left' );
?>
<div id="main" class="clearfix column <?php echo $mainWidth; ?>">
		<?php if (have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<section class="row clearfix">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php if ( get_query_var('paged') == 0 && is_sticky() ) { ?>
					<ul class="date-meta post-icon">
						<li><a href="<?php the_permalink(); ?>" title="<?php esc_attr_e( 'For More Info on ' ); the_title_attribute(); ?>"><div class="icon icon-pushpin hide-label"><span>Sticky</span></div></a></li>
					</ul>
				<?php } else { ?>
					<?php if ( get_option( 'show_on_front' ) == 'posts' ) { ?>
					<?php diamonds_post_format_icons(); ?>
					<?php } elseif ( get_option( 'show_on_front' ) == 'page' ) { ?>
					<ul class="date-meta post-icon">
						<li><div class="icon icon-home hide-label"><span>Home</span></div></li>
					</ul>
					<?php } ?>
				<?php } ?>
					<header>
						<h2><a href="<?php the_permalink(); ?>" title="<?php esc_attr_e( 'For More Info on ' ); the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					</header>
					<?php if ( has_post_thumbnail() ) { ?><figure><?php the_post_thumbnail( 'post-thumb' ); ?><figcaption><?php the_post_thumbnail_caption(); ?></figcaption></figure><?php } ?>
					<?php if ( get_option( 'show_on_front' ) == 'posts' ) { ?>
					<ul class="meta column fourth">
						<li><?php _e( 'Written by ', 'diamonds' ); the_author_posts_link(); ?></li>
						<?php if ( get_query_var('paged') == 0 && is_sticky() || has_post_format() ) { ?><li><?php the_time( 'M d, Y' ); ?></li><?php } ?>
						<?php $open = comments_open(); if ( $open == true ) { ?><li><a href="<?php comments_link(); ?>"><?php $nocomment = __( 'Be the first to comment', 'diamonds'  ); $onecomment = __( 'Only one comment', 'diamonds'  ); $manycomments = __( '% comments', 'diamonds'  ); comments_number( $nocomment, $onecomment, $manycomments ); ?></a></li><?php } ?>
						<li><?php $edit = __( 'Edit this post', 'diamonds'  ); edit_post_link( $edit ); ?></li>
					</ul>
					<div class="column three-quarters reverse">
						<?php the_excerpt(); ?>
					<?php } else { ?>
						<?php the_content(); ?>
						<?php wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'diamonds' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
							) );
						?>
						<?php } ?>
					<?php if ( get_option( 'show_on_front' ) == 'posts' ) { ?>
					</div>
					<footer class="column fourth">
					<?php } elseif ( get_option( 'show_on_front' ) == 'page' ) { ?>
					<footer>
					<?php } ?>
						<ul class="meta">
							<?php if ( get_option( 'show_on_front' ) == 'posts' ) { ?><li>Categories: <?php the_category( ' &bull; ' ) ?></li><?php } ?>
							<li><?php the_tags( 'Tags: ',' &bull; ' ) ?></li>
							<?php if ( get_option( 'show_on_front' ) == 'page' ) { ?><li><?php $edit = __( 'Edit this post', 'diamonds'  ); edit_post_link( $edit ); ?></li><?php } ?>
						</ul>
					</footer>
				</article>
			</section><!-- /row -->
		<?php endwhile; else: ?>
			<p><?php _e( 'Sorry, no posts matched your criteria.', 'diamonds' ); ?></p>
		<?php endif; ?>
			<div class="row clearfix">
				<div class="paginate column full">
					<?php if( $wp_query->max_num_pages > 1 ) { ?>
							<div id="pagination">
								<?php diamonds_paginate(); ?>
							</div><!-- .pagination -->
					<?php } ?>
				</div>
			</div><!-- /row -->
	</div>
<?php 
	$cols->diamonds_flex( 'right' ); 
?>
<?php get_footer(); ?>