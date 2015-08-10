<?php get_header(); ?>
<?php 
	$cols = new diamondsFlexCol();
	$mainWidth = $cols->_maincol_width;
	$thumbSize = $cols->_size;
	$cols->diamonds_flex( 'left' );
?>
	<div id="main" class="column <?php echo $mainWidth; ?>">
		<?php if (have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<section class="row clearfix">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php if ( get_query_var('paged') == 0 && is_sticky() ) { ?>
					<ul class="date-meta post-icon">
						<li><a href="<?php the_permalink(); ?>" title="<?php esc_attr_e( 'For More Info on ' ); the_title_attribute(); ?>">
						<div class="icon icon-pushpin hide-label"><span>Sticky</span></div></a></li>
					</ul>
				<?php } else { ?>
					<?php diamonds_post_format_icons(); ?>
				<?php } ?>
					<header>
						<h2><a href="<?php the_permalink(); ?>" title="<?php esc_attr_e( 'For More Info on ' ); the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					</header>
					<?php if ( has_post_thumbnail() ) { ?><figure><?php the_post_thumbnail( 'post-thumb' ); ?><figcaption><?php the_post_thumbnail_caption(); ?></figcaption></figure><?php } ?>
					<ul class="meta column fourth">
						<li><?php _e( 'Written by ', 'diamonds' ); the_author_posts_link(); ?></li>
						<?php if ( get_query_var('paged') == 0 && is_sticky() || has_post_format() ) { ?><li><?php the_time( 'M d, Y' ); ?></li><?php } ?>
						<?php $open = comments_open(); if ( $open == true ) { ?><li><a href="<?php comments_link(); ?>"><?php $nocomment = __( 'Be the first to comment', 'diamonds'  ); $onecomment = __( 'Only one comment', 'diamonds'  ); $manycomments = __( '% comments', 'diamonds'  ); comments_number( $nocomment, $onecomment, $manycomments ); ?></a></li><?php } ?>
						<li><?php $edit = __( 'Edit this post', 'diamonds'  ); edit_post_link( $edit ); ?></li>
					</ul>
					<div class="column three-quarters reverse">
						<?php if(strpos(get_the_content(),'more-link') === false) {
							the_excerpt();
						} else {
							the_content('Read on...');
						} ?>
					</div>
					<footer class="column fourth"><ul class="meta"><li>Categories: <?php the_category( ' &bull; ' ) ?></li><li><?php the_tags( 'Tags: ',' &bull; ' ) ?></li></ul></footer>
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